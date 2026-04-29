<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Privacy Policy | StockedUp</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;0,9..144,900;1,9..144,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --cream:    #FFFFFF;
    --deep:     #111827;
    --terra:    #F97316;
    --gold:     #2D8A4E;
    --sage:     #22C55E;
    --warm:     #FFF7F2;
    --dark-text:#111827;
    --mid:      #5A6B5F;
  }
  html { scroll-behavior: smooth; }
  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--dark-text);
    overflow-x: hidden;
  }

  /* ── NAV ─────────────────────────────────────────────── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 1.2rem 4rem;
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(17,24,39,0.08);
  }
  .nav-logo {
    font-family: 'Fraunces', serif;
    font-weight: 900; font-size: 1.5rem;
    color: var(--deep); letter-spacing: -0.5px;
  }
  .nav-logo span { color: var(--terra); }
  .nav-links { display: flex; gap: 2.5rem; list-style: none; }
  .nav-links a {
    text-decoration: none; font-size: 0.875rem; font-weight: 500;
    color: var(--mid); letter-spacing: 0.02em;
    transition: color 0.2s;
  }
  .nav-links a:hover { color: var(--terra); }
  .nav-cta {
    background: var(--terra); color: #fff;
    border: none; cursor: pointer; text-decoration: none;
    padding: 0.7rem 1.6rem; border-radius: 100px;
    font-family: 'DM Sans', sans-serif; font-weight: 500; font-size: 0.875rem;
    letter-spacing: 0.02em; transition: background 0.2s, transform 0.15s;
  }
  .nav-cta:hover { background: #a8391200; color: var(--terra); border: 1.5px solid var(--terra); transform: translateY(-1px); }

  /* ── FOOTER ──────────────────────────────────────────── */
  footer {
    background: #111827; padding: 4rem 4rem 2rem;
    color: rgba(255,255,255,0.6);
  }
  .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 3rem; }
  .footer-brand .nav-logo { font-size: 1.3rem; margin-bottom: 1rem; display: block; }
  .footer-brand p { font-size: 0.85rem; line-height: 1.7; max-width: 240px; }
  .footer-col h5 {
    font-family: 'DM Sans', sans-serif; font-weight: 500; font-size: 0.8rem;
    letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255,255,255,0.4);
    margin-bottom: 1rem;
  }
  .footer-col a {
    display: block; font-size: 0.85rem; color: rgba(255,255,255,0.65);
    text-decoration: none; margin-bottom: 0.6rem; transition: color 0.2s;
  }
  .footer-col a:hover { color: var(--terra); }
  .footer-bottom {
    padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.08);
    display: flex; justify-content: space-between; align-items: center;
    font-size: 0.8rem;
  }
  .footer-bottom a { color: rgba(255,255,255,0.4); text-decoration: none; margin-left: 1.5rem; }
  .footer-bottom a:hover { color: var(--terra); }

  /* ── LEGAL CONTENT ───────────────────────────────────── */
  .legal-content {
    padding: 10rem 4rem 6rem;
    max-width: 800px; margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.03);
    margin-top: 8rem; margin-bottom: 4rem;
  }
  .legal-content h1 {
    font-family: 'Fraunces', serif; font-size: 2.8rem;
    color: var(--deep); margin-bottom: 0.5rem; letter-spacing: -1px;
  }
  .legal-content .effective-date {
    display: block; font-size: 0.9rem; font-weight: 500;
    color: var(--terra); margin-bottom: 2.5rem; letter-spacing: 0.05em; text-transform: uppercase;
  }
  .legal-content h2 {
    font-family: 'Fraunces', serif; font-size: 1.6rem;
    color: var(--deep); margin: 2.5rem 0 1rem; padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(17,24,39,0.08);
  }
  .legal-content p { color: var(--mid); margin-bottom: 1.2rem; font-size: 1rem; line-height: 1.8; }
  .legal-content ul { color: var(--mid); margin-bottom: 1.5rem; padding-left: 1.5rem; font-size: 1rem; line-height: 1.8; }
  .legal-content li { margin-bottom: 0.5rem; }
  .legal-content a { color: var(--terra); text-decoration: none; font-weight: 500; }
  .legal-content a:hover { text-decoration: underline; }

  @media(max-width:900px) {
    nav { padding: 1rem 1.5rem; }
    .nav-links, .nav-cta { display: none; }
    .legal-content { padding: 3rem 1.5rem; margin: 6rem 1.5rem 3rem; }
    footer { padding: 4rem 1.5rem; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="index.php" style="text-decoration:none;"><img src="images/logo.png" alt="StockedUp Logo" style="height: 40px; width: auto;" /></a>
  <ul class="nav-links">
    <li><a href="index.php#about">About</a></li>
    <li><a href="index.php#offer">Offer</a></li>
    <li><a href="index.php#howitworks">How it works</a></li>
    <li><a href="index.php#faq">FAQ</a></li>
  </ul>
  <a href="mailto:hello@stockedup.africa" class="nav-cta">Contact Us</a>
</nav>

<!-- LEGAL CONTENT -->
<section class="legal-content">
  <h1>StockedUp Privacy Policy</h1>
  <span class="effective-date">Effective Date: 4th May, 2026</span>
  <p>StockedUp ("we", "our", "us") operates a mobile application that connects users with foodstuff vendors.</p>

  <h2>1. Information We Collect</h2>
  <p>We may collect:</p>
  <ul>
    <li>Personal information (name, phone number, email address)</li>
    <li>Delivery address</li>
    <li>Order details and transaction history</li>
    <li>Device information (IP address, device type)</li>
  </ul>

  <h2>2. How We Use Information</h2>
  <p>We use collected data to:</p>
  <ul>
    <li>Process and deliver orders</li>
    <li>Connect users with vendors</li>
    <li>Improve app performance and user experience</li>
    <li>Communicate updates, promotions, and support</li>
  </ul>

  <h2>3. Sharing of Information</h2>
  <p>We may share information with:</p>
  <ul>
    <li>Vendors to fulfill orders</li>
    <li>Service providers (e.g., hosting, analytics)</li>
    <li>Legal authorities when required</li>
  </ul>
  <p>We do not sell user data.</p>

  <h2>4. Data Security</h2>
  <p>We implement reasonable security measures to protect your data, but no system is 100% secure.</p>

  <h2>5. User Rights</h2>
  <p>Users can:</p>
  <ul>
    <li>Request access to their data</li>
    <li>Request deletion of their account/data</li>
  </ul>

  <h2>6. Third-Party Services</h2>
  <p>We may use third-party tools (e.g., payment processors, analytics services) which have their own privacy policies.</p>

  <h2>7. Children’s Privacy</h2>
  <p>Our app is not intended for children under 15.</p>

  <h2>8. Changes to This Policy</h2>
  <p>We may update this policy. Changes will be posted in the app.</p>

  <h2>9. Contact Us</h2>
  <p>Email: <a href="mailto:privacy@stockedup.africa">privacy@stockedup.africa</a></p>
  <p>Customer care: <a href="tel:08104436235">081-0443-6235</a></p>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <img src="images/logo.png" alt="StockedUp Logo" style="height: 40px; width: auto;" />
      <p>Bringing the Nigerian market to your door — convenient, reliable, and always fresh.</p>
    </div>
    <div class="footer-col">
      <h5>Categories</h5>
      <a href="index.php#">Groceries & Foodstuffs</a>
      <a href="index.php#">Canned Foods</a>
      <a href="index.php#">Fresh Vegetables</a>
      <a href="index.php#">Flour & Grains</a>
    </div>
    <div class="footer-col">
      <h5>Policy</h5>
      <a href="return-policy.php">Return Policy</a>
      <a href="shipping-policy.php">Shipping Policy</a>
      <a href="quality-guarantee.php">Quality Guarantee</a>
      <a href="vendor-terms.php">Vendor Terms</a>
    </div>
    <div class="footer-col">
      <h5>Contact</h5>
      <a href="index.php#">Awka, Anambra, Nigeria</a>
      <a href="tel:08104436235">08104436235</a>
      <a href="mailto:hello@stockedup.africa">hello@stockedup.africa</a>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 StockedUp. All rights reserved.</span>
    <div>
      <a href="privacy.php">Privacy Policy</a>
      <a href="terms.php">Terms of Service</a>
      <a href="index.php#">Cookies</a>
    </div>
  </div>
</footer>

</body>
</html>
