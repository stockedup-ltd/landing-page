<?php
// Load PHPMailer classes manually
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log POST data
error_log("POST data received: " . print_r($_POST, true));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Form fields
        $full_name = trim($_POST['full_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $user_type = trim($_POST['user_type'] ?? '');
        $referral_source = trim($_POST['referral_source'] ?? '');

        if (empty($full_name) || empty($email) || empty($phone) || empty($user_type)) {
            throw new Exception('Required fields are missing');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email format');
        }

        // Build email message
        $message = "New waitlist submission:\n\n";
        $message .= "Full Name: $full_name\n";
        $message .= "Email: $email\n";
        $message .= "Phone: $phone\n";
        $message .= "User Type: $user_type\n\n";

        if ($user_type === 'buyer') {
            $buyer_address = trim($_POST['buyer_address'] ?? '');
            $buyer_interests = $_POST['buyer_interests'] ?? [];
            $buyer_interests_other = trim($_POST['buyer_interests_other'] ?? '');
            $shopping_frequency = trim($_POST['shopping_frequency'] ?? '');
            $buyer_why = trim($_POST['buyer_why'] ?? '');

            $message .= "== Buyer Info ==\n";
            $message .= "Delivery Address: $buyer_address\n";
            $message .= "Interests: " . (is_array($buyer_interests) ? implode(', ', $buyer_interests) : 'None selected') . "\n";
            if (!empty($buyer_interests_other)) $message .= "Other Interests: $buyer_interests_other\n";
            $message .= "Shopping Frequency: $shopping_frequency\n";
            $message .= "Why StockedUp: $buyer_why\n";
        }

        if ($user_type === 'seller') {
            $business_name = trim($_POST['business_name'] ?? '');
            $business_address = trim($_POST['business_address'] ?? '');
            $products_sold = $_POST['products_sold'] ?? [];
            $products_sold_other = trim($_POST['products_sold_other'] ?? '');
            $seller_why = trim($_POST['seller_why'] ?? '');

            $message .= "== Vendor Info ==\n";
            $message .= "Business Name: $business_name\n";
            $message .= "Business Address: $business_address\n";
            $message .= "Products Sold: " . (is_array($products_sold) ? implode(', ', $products_sold) : 'None selected') . "\n";
            if (!empty($products_sold_other)) $message .= "Other Products: $products_sold_other\n";
            $message .= "Why StockedUp: $seller_why\n";
        }

        $message .= "\nReferral Source: $referral_source\n";
        $message .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";

        // Create PHPMailer instance
        $mail = new PHPMailer(true);

        // Use built-in mail() function
        $mail->isMail(); // or configure SMTP below

         /*$mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'REMOVED_EMAIL@example.com';
         $mail->Password = 'REMOVED_PASSWORD';
         $mail->SMTPSecure = 'tls';
         $mail->Port = 587;*/

        $mail->setFrom('no-reply@stockedup.com', 'StockedUp Waitlist');
        $mail->addAddress('REMOVED_EMAIL@example.com');
        $mail->addReplyTo($email, $full_name);

        $mail->Subject = 'New Waitlist Submission';
        $mail->Body = $message;
        $mail->isHTML(false);

        $mail->send();

        error_log("PHPMailer: Success from $email ($full_name)");
        echo json_encode(['status' => 'success', 'message' => 'Email sent successfully']);

    } catch (Exception $e) {
        error_log("PHPMailer error: " . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
