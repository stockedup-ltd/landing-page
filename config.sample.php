<?php
/**
 * Configuration template.
 * Rename this file to config.php and fill in your actual credentials.
 * DO NOT commit config.php to version control.
 */

return [
    'smtp' => [
        'host' => 'smtp.gmail.com',
        'auth' => true,
        'username' => 'your-email@gmail.com',
        'password' => 'your-app-password',
        'secure' => 'tls',
        'port' => 587,
    ],
    'email' => [
        'from_email' => 'no-reply@stockedup.africa',
        'from_name' => 'StockedUp Africa',
        'admin_email' => 'admin@stockedup.africa',
    ],
];
