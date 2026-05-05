<?php
// We no longer need send_email.php or the waitlist modal processing,
// but we keep the file as index.php to retain routing and server setup.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StockedUp | Bringing the Market to Your Door</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;0,9..144,900;1,9..144,400&family=DM+Sans:wght@300;400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --cream: #FFFFFF;
      --deep: #111111;
      --terra: #F97316;
      --gold: #F97316;
      --sage: #F97316;
      --warm: #FFF5EE;
      --dark-text: #111111;
      --mid: #555555;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--cream);
      color: var(--dark-text);
      overflow-x: hidden;
    }

    /* ── NAV ─────────────────────────────────────────────── */
    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.2rem 4rem;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(17, 24, 39, 0.08);
    }

    .nav-logo {
      font-family: 'Fraunces', serif;
      font-weight: 900;
      font-size: 1.5rem;
      color: var(--deep);
      letter-spacing: -0.5px;
    }

    .nav-logo span {
      color: var(--terra);
    }

    .nav-links {
      display: flex;
      gap: 2.5rem;
      list-style: none;
    }

    .nav-links a {
      text-decoration: none;
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--mid);
      letter-spacing: 0.02em;
      transition: color 0.2s;
    }

    .nav-links a:hover {
      color: var(--terra);
    }

    .nav-cta {
      background: var(--terra);
      color: #fff;
      border: none;
      cursor: pointer;
      text-decoration: none;
      padding: 0.7rem 1.6rem;
      border-radius: 100px;
      font-family: 'DM Sans', sans-serif;
      font-weight: 500;
      font-size: 0.875rem;
      letter-spacing: 0.02em;
      transition: background 0.2s, transform 0.15s;
    }

    .nav-cta:hover {
      background: #a8391200;
      color: var(--terra);
      border: 1.5px solid var(--terra);
      transform: translateY(-1px);
    }

    /* ── HERO ────────────────────────────────────────────── */
    #home {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
      padding: 8rem 4rem 5rem;
      position: relative;
      overflow: hidden;
      gap: 3rem;
      align-items: center;
      background: linear-gradient(rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.92)), url('images/slide1.jpg') center/cover no-repeat;
    }

    .hero-bg-circle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
    }

    .hero-bg-circle.c1 {
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(249, 115, 22, 0.12) 0%, transparent 70%);
      top: -100px;
      right: -100px;
    }

    .hero-bg-circle.c2 {
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(249, 115, 22, 0.15) 0%, transparent 70%);
      bottom: 0;
      left: 200px;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(249, 115, 22, 0.1);
      border: 1px solid rgba(249, 115, 22, 0.25);
      color: var(--terra);
      padding: 0.4rem 1rem;
      border-radius: 100px;
      font-size: 0.8rem;
      font-weight: 500;
      letter-spacing: 0.04em;
      margin-bottom: 1.5rem;
    }

    .hero-tag .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--terra);
      animation: pulse 1.8s infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1
      }

      50% {
        opacity: 0.3
      }
    }

    .hero-title {
      font-family: 'Fraunces', serif;
      font-weight: 900;
      font-size: clamp(3rem, 5vw, 5rem);
      line-height: 1.0;
      letter-spacing: -2px;
      color: var(--deep);
      margin-bottom: 1.5rem;
    }

    .hero-title em {
      color: var(--terra);
      font-style: italic;
    }

    .hero-title .underline-gold {
      display: inline;
      position: relative;
    }

    .hero-title .underline-gold::after {
      content: '';
      position: absolute;
      bottom: 2px;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--gold);
      border-radius: 2px;
    }

    .hero-sub {
      font-size: 1.1rem;
      color: var(--mid);
      line-height: 1.7;
      max-width: 420px;
      margin-bottom: 2.5rem;
      font-weight: 300;
    }

    .hero-actions {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      align-items: flex-start;
    }

    .btn-primary {
      background: var(--deep);
      color: var(--cream);
      padding: 0.9rem 2rem;
      border-radius: 100px;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
      cursor: pointer;
      border: none;
      transition: transform 0.2s, box-shadow 0.2s;
      font-family: 'DM Sans', sans-serif;
      display: inline-block;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(17, 24, 39, 0.25);
    }

    .btn-ghost {
      background: transparent;
      color: var(--dark-text);
      padding: 0.9rem 2rem;
      border-radius: 100px;
      font-weight: 500;
      font-size: 0.95rem;
      cursor: pointer;
      border: 1.5px solid rgba(17, 24, 39, 0.25);
      transition: border-color 0.2s;
      font-family: 'DM Sans', sans-serif;
    }

    .btn-ghost:hover {
      border-color: var(--terra);
      color: var(--terra);
    }

    .store-badges {
      display: flex;
      gap: 1rem;
      align-items: center;
      flex-wrap: wrap;
    }

    .store-badge {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      background: var(--deep);
      color: var(--cream);
      padding: 0.6rem 1.2rem;
      border-radius: 12px;
      text-decoration: none;
      transition: transform 0.2s, box-shadow 0.2s;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .store-badge:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(17, 24, 39, 0.25);
    }

    .store-badge i {
      font-size: 1.8rem;
    }

    .store-badge .text {
      display: flex;
      flex-direction: column;
      text-align: left;
    }

    .store-badge .text small {
      font-size: 0.65rem;
      font-weight: 400;
      opacity: 0.8;
    }

    .store-badge .text span {
      font-size: 0.95rem;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
    }

    .hero-stats {
      display: flex;
      gap: 2.5rem;
      margin-top: 3rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(17, 24, 39, 0.1);
    }

    .stat-item .num {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.8rem;
      color: var(--deep);
      display: block;
    }

    .stat-item .label {
      font-size: 0.8rem;
      color: var(--mid);
      font-weight: 400;
    }

    /* Hero visual side */
    .hero-visual {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-card-main {
      background: var(--deep);
      color: var(--cream);
      border-radius: 24px;
      padding: 2.5rem;
      width: 320px;
      position: relative;
      z-index: 2;
      transform: rotate(-2deg);
      box-shadow: 20px 20px 60px rgba(17, 24, 39, 0.2);
    }

    .hero-card-main .card-icon {
      width: 56px;
      height: 56px;
      background: var(--terra);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 1.2rem;
    }

    .hero-card-main h3 {
      font-family: 'Fraunces', serif;
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      line-height: 1.2;
    }

    .hero-card-main p {
      font-size: 0.85rem;
      opacity: 0.65;
      line-height: 1.6;
    }

    .card-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-top: 1.2rem;
    }

    .card-tags span {
      background: rgba(255, 255, 255, 0.1);
      padding: 0.3rem 0.8rem;
      border-radius: 100px;
      font-size: 0.75rem;
      border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .hero-card-float {
      position: absolute;
      background: #fff;
      border-radius: 16px;
      padding: 1rem 1.2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .hero-card-float.f1 {
      top: 30px;
      right: -20px;
      z-index: 3;
    }

    .hero-card-float.f2 {
      bottom: 40px;
      left: -10px;
      z-index: 3;
    }

    .float-row {
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }

    .float-row .avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--sage);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 0.75rem;
      font-weight: 600;
      flex-shrink: 0;
    }

    .float-row .info .name {
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--deep);
    }

    .float-row .info .sub {
      font-size: 0.72rem;
      color: var(--mid);
    }

    .delivery-pill {
      background: rgba(249, 115, 22, 0.1);
      color: #F97316;
      padding: 0.4rem 0.9rem;
      border-radius: 100px;
      font-size: 0.75rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .delivery-pill::before {
      content: '✓';
      font-weight: 700;
    }

    /* ── MARQUEE ─────────────────────────────────────────── */
    .marquee-strip {
      background: var(--terra);
      overflow: hidden;
      padding: 1rem 0;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .marquee-inner {
      display: flex;
      gap: 4rem;
      animation: marquee 18s linear infinite;
      white-space: nowrap;
    }

    .marquee-inner span {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.1rem;
      color: var(--cream);
      letter-spacing: 0.02em;
      flex-shrink: 0;
    }

    .marquee-inner span.dot-sep {
      color: rgba(255, 255, 255, 0.4);
      font-size: 0.8rem;
      margin-top: 3px;
    }

    @keyframes marquee {
      from {
        transform: translateX(0)
      }

      to {
        transform: translateX(-50%)
      }
    }

    /* ── ABOUT ───────────────────────────────────────────── */
    #about {
      padding: 7rem 4rem;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 5rem;
      align-items: center;
    }

    .section-tag {
      font-size: 0.75rem;
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--terra);
      margin-bottom: 1rem;
      display: block;
    }

    .section-title {
      font-family: 'Fraunces', serif;
      font-weight: 900;
      font-size: clamp(2rem, 3.5vw, 3rem);
      line-height: 1.1;
      letter-spacing: -1px;
      color: var(--deep);
      margin-bottom: 1.5rem;
    }

    .section-title em {
      font-style: italic;
      color: var(--sage);
    }

    .section-body {
      font-size: 1rem;
      color: var(--mid);
      line-height: 1.8;
      font-weight: 300;
    }

    .about-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .about-card {
      background: var(--warm);
      border-radius: 18px;
      padding: 1.5rem;
      border: 1px solid rgba(17, 24, 39, 0.06);
      transition: transform 0.2s;
    }

    .about-card:hover {
      transform: translateY(-3px);
    }

    .about-card.accent {
      background: var(--deep);
      color: var(--cream);
    }

    .about-card .about-icon {
      font-size: 1.8rem;
      margin-bottom: 0.8rem;
    }

    .about-card h4 {
      font-family: 'Fraunces', serif;
      font-size: 1.05rem;
      font-weight: 700;
      margin-bottom: 0.4rem;
      line-height: 1.2;
    }

    .about-card.accent h4 {
      color: var(--cream);
    }

    .about-card p {
      font-size: 0.82rem;
      line-height: 1.6;
      color: var(--mid);
    }

    .about-card.accent p {
      color: rgba(255, 255, 255, 0.65);
    }

    /* ── OFFER ───────────────────────────────────────────── */
    #offer {
      padding: 7rem 4rem;
      background: linear-gradient(rgba(17, 17, 17, 0.9), rgba(17, 17, 17, 0.9)), url('images/slide7.jpg') center/cover no-repeat;
      position: relative;
      overflow: hidden;
    }

    #offer::before {
      content: '';
      position: absolute;
      inset: 0;
      background: repeating-linear-gradient(45deg, transparent, transparent 40px, rgba(255, 255, 255, 0.015) 40px, rgba(255, 255, 255, 0.015) 41px);
    }

    .offer-header {
      text-align: center;
      margin-bottom: 4rem;
      position: relative;
    }

    .offer-header .section-title {
      color: var(--cream);
    }

    .offer-header .section-tag {
      color: var(--gold);
    }

    .offer-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      position: relative;
    }

    .offer-card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 2rem;
      transition: background 0.3s, transform 0.2s;
      cursor: default;
    }

    .offer-card:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateY(-4px);
    }

    .offer-card.featured {
      background: var(--terra);
      border-color: var(--terra);
    }

    .offer-icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      background: rgba(255, 255, 255, 0.12);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      margin-bottom: 1.2rem;
    }

    .offer-card.featured .offer-icon {
      background: rgba(255, 255, 255, 0.25);
    }

    .offer-card h4 {
      font-family: 'Fraunces', serif;
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--cream);
      margin-bottom: 0.5rem;
    }

    .offer-card p {
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.6);
      line-height: 1.6;
    }

    /* ── HOW IT WORKS ────────────────────────────────────── */
    #howitworks {
      padding: 7rem 4rem;
    }

    .hiw-header {
      text-align: center;
      margin-bottom: 5rem;
    }

    .hiw-steps {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
      position: relative;
    }

    .hiw-steps::before {
      content: '';
      position: absolute;
      top: 32px;
      left: 12.5%;
      right: 12.5%;
      height: 1px;
      border-top: 2px dashed rgba(249, 115, 22, 0.3);
    }

    .step-card {
      text-align: center;
      padding: 2rem 1rem;
      position: relative;
    }

    .step-num {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      background: var(--cream);
      border: 2px solid rgba(249, 115, 22, 0.25);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Fraunces', serif;
      font-size: 1.4rem;
      font-weight: 900;
      color: var(--terra);
      margin: 0 auto 1.5rem;
      position: relative;
      z-index: 1;
      transition: background 0.3s, color 0.3s;
    }

    .step-card:hover .step-num {
      background: var(--terra);
      color: #fff;
      border-color: var(--terra);
    }

    .step-card h4 {
      font-family: 'Fraunces', serif;
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: var(--deep);
    }

    .step-card p {
      font-size: 0.85rem;
      color: var(--mid);
      line-height: 1.6;
    }

    /* ── AUDIENCE ────────────────────────────────────────── */
    #audience {
      padding: 7rem 4rem;
    }

    .audience-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    .audience-card {
      border-radius: 24px;
      padding: 3rem;
      position: relative;
      overflow: hidden;
    }

    .audience-card.buyers {
      background: linear-gradient(rgba(249, 115, 22, 0.85), rgba(249, 115, 22, 0.85)), url('images/slide4.jpeg') center/cover no-repeat;
      color: var(--cream);
    }

    .audience-card.vendors {
      background: linear-gradient(rgba(249, 115, 22, 0.9), rgba(249, 115, 22, 0.9)), url('images/slide3.jpg') center/cover no-repeat;
      color: var(--deep);
    }

    .audience-card .aud-tag {
      display: inline-block;
      background: rgba(255, 255, 255, 0.2);
      padding: 0.3rem 0.9rem;
      border-radius: 100px;
      font-size: 0.75rem;
      font-weight: 500;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      margin-bottom: 1.5rem;
    }

    .audience-card.vendors .aud-tag {
      background: rgba(17, 24, 39, 0.15);
    }

    .audience-card h3 {
      font-family: 'Fraunces', serif;
      font-size: 2rem;
      font-weight: 900;
      margin-bottom: 1rem;
      line-height: 1.1;
    }

    .audience-card ul {
      list-style: none;
    }

    .audience-card ul li {
      padding: 0.5rem 0;
      font-size: 0.95rem;
      font-weight: 300;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      display: flex;
      align-items: center;
      gap: 0.7rem;
    }

    .audience-card.vendors ul li {
      border-bottom-color: rgba(17, 24, 39, 0.1);
    }

    .audience-card ul li::before {
      content: '→';
      font-weight: 700;
      flex-shrink: 0;
    }

    .audience-card ul li:last-child {
      border-bottom: none;
    }

    .aud-deco {
      position: absolute;
      right: -30px;
      top: -30px;
      font-size: 10rem;
      opacity: 0.06;
      pointer-events: none;
      font-family: 'Fraunces', serif;
      font-weight: 900;
      line-height: 1;
    }

    /* ── TESTIMONIALS ────────────────────────────────────── */
    #testimonial {
      padding: 7rem 4rem;
      background: linear-gradient(rgba(255, 245, 238, 0.9), rgba(255, 245, 238, 0.9)), url('images/slide2.jpg') center/cover no-repeat;
    }

    .testi-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .testi-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
    }

    .testi-card {
      background: #fff;
      border-radius: 20px;
      padding: 2rem;
      border: 1px solid rgba(17, 24, 39, 0.07);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .testi-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.07);
    }

    .testi-card.featured {
      background: var(--terra);
    }

    .stars {
      color: var(--gold);
      font-size: 0.9rem;
      margin-bottom: 1rem;
      letter-spacing: 2px;
    }

    .testi-card.featured .stars {
      filter: brightness(1.4);
    }

    .testi-text {
      font-size: 0.9rem;
      line-height: 1.7;
      color: var(--mid);
      margin-bottom: 1.5rem;
      font-style: italic;
    }

    .testi-card.featured .testi-text {
      color: rgba(255, 255, 255, 0.8);
    }

    .testi-author {
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    .testi-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
      font-weight: 700;
      flex-shrink: 0;
      color: #fff;
    }

    .testi-author .author-name {
      font-weight: 500;
      font-size: 0.85rem;
      color: var(--deep);
    }

    .testi-card.featured .author-name {
      color: var(--cream);
    }

    .testi-author .author-role {
      font-size: 0.75rem;
      color: var(--mid);
    }

    .testi-card.featured .author-role {
      color: rgba(255, 255, 255, 0.6);
    }

    /* ── FOUNDER MESSAGE ─────────────────────────────────── */
    #founder-message {
      padding: 7rem 4rem;
      background: var(--warm);
      display: grid;
      grid-template-columns: 1fr 1.5fr;
      gap: 4rem;
      align-items: center;
    }

    .founder-image {
      position: relative;
    }

    .founder-image img {
      width: 100%;
      border-radius: 24px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 2;
    }

    .founder-image::before {
      content: '';
      position: absolute;
      top: -20px;
      left: -20px;
      width: 100%;
      height: 100%;
      background: rgba(249, 115, 22, 0.1);
      border-radius: 24px;
      z-index: 1;
    }

    .founder-content h2 {
      font-family: 'Fraunces', serif;
      font-weight: 900;
      font-size: 2.5rem;
      color: var(--deep);
      margin-bottom: 1.5rem;
      line-height: 1.1;
    }

    .founder-content h2 em {
      color: var(--terra);
      font-style: italic;
    }

    .founder-content p {
      font-size: 1rem;
      color: var(--mid);
      line-height: 1.8;
      margin-bottom: 1rem;
    }

    .founder-content ul {
      list-style: none;
      margin: 1.5rem 0;
    }

    .founder-content ul li {
      position: relative;
      padding-left: 1.8rem;
      margin-bottom: 0.8rem;
      font-size: 0.95rem;
      color: var(--deep);
      font-weight: 500;
    }

    .founder-content ul li::before {
      content: '✓';
      position: absolute;
      left: 0;
      top: 0;
      color: var(--terra);
      font-weight: 700;
    }

    .founder-signature {
      margin-top: 2rem;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(17, 24, 39, 0.1);
    }

    .founder-signature strong {
      display: block;
      color: var(--deep);
      font-size: 1.1rem;
      margin-bottom: 0.2rem;
    }

    .founder-signature span {
      color: var(--mid);
      font-size: 0.85rem;
    }

    /* ── FAQ ─────────────────────────────────────────────── */
    #faq {
      padding: 7rem 4rem;
    }

    .faq-wrap {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 5rem;
      align-items: start;
    }

    .faq-sticky {
      position: sticky;
      top: 6rem;
    }

    .faq-list {
      display: flex;
      flex-direction: column;
      gap: 1px;
    }

    .faq-item {
      border-bottom: 1px solid rgba(17, 24, 39, 0.1);
      overflow: hidden;
    }

    .faq-q {
      width: 100%;
      background: none;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.2rem 0;
      text-align: left;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.95rem;
      font-weight: 500;
      color: var(--deep);
      transition: color 0.2s;
    }

    .faq-q:hover {
      color: var(--terra);
    }

    .faq-toggle {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: rgba(249, 115, 22, 0.1);
      color: var(--terra);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      flex-shrink: 0;
      transition: transform 0.25s, background 0.2s;
    }

    .faq-item.open .faq-toggle {
      transform: rotate(45deg);
      background: var(--terra);
      color: #fff;
    }

    .faq-a {
      max-height: 0;
      overflow: hidden;
      font-size: 0.88rem;
      color: var(--mid);
      line-height: 1.7;
      transition: max-height 0.3s ease, padding 0.3s;
      padding: 0;
    }

    .faq-item.open .faq-a {
      max-height: 300px;
      padding-bottom: 1.2rem;
    }

    /* ── CTA BAND ────────────────────────────────────────── */
    #cta {
      padding: 7rem 4rem;
      background: linear-gradient(rgba(17, 17, 17, 0.85), rgba(17, 17, 17, 0.85)), url('images/slide5.jpeg') center/cover no-repeat;
      text-align: center;
      position: relative;
      overflow: hidden;
      color: #fff;
    }

    .cta-deco {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 600px;
      height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(249, 115, 22, 0.15) 0%, transparent 70%);
      pointer-events: none;
    }

    #cta .section-tag {
      color: var(--gold);
    }

    #cta .section-title {
      color: var(--cream);
      margin: 0 auto 1.5rem;
      max-width: 560px;
    }

    #cta .section-body {
      color: rgba(255, 255, 255, 0.6);
      max-width: 520px;
      margin: 0 auto 2.5rem;
    }

    /* ── FOOTER ──────────────────────────────────────────── */
    footer {
      background: #111827;
      padding: 4rem 4rem 2rem;
      color: rgba(255, 255, 255, 0.6);
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 3rem;
      margin-bottom: 3rem;
    }

    .footer-brand .nav-logo {
      font-size: 1.3rem;
      margin-bottom: 1rem;
      display: block;
    }

    .footer-brand p {
      font-size: 0.85rem;
      line-height: 1.7;
      max-width: 240px;
    }

    .footer-col h5 {
      font-family: 'DM Sans', sans-serif;
      font-weight: 500;
      font-size: 0.8rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.4);
      margin-bottom: 1rem;
    }

    .footer-col a {
      display: block;
      font-size: 0.85rem;
      color: rgba(255, 255, 255, 0.65);
      text-decoration: none;
      margin-bottom: 0.6rem;
      transition: color 0.2s;
    }

    .footer-col a:hover {
      color: var(--terra);
    }

    .footer-bottom {
      padding-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.8rem;
    }

    .footer-bottom a {
      color: rgba(255, 255, 255, 0.4);
      text-decoration: none;
      margin-left: 1.5rem;
    }

    .footer-bottom a:hover {
      color: var(--terra);
    }

    .footer-socials {
      display: flex;
      gap: 0.75rem;
      align-items: center;
    }

    .footer-socials a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.08);
      color: rgba(255, 255, 255, 0.6);
      transition: background 0.2s, color 0.2s;
      margin-left: 0;
    }

    .footer-socials a svg {
      width: 16px;
      height: 16px;
    }

    .footer-socials a:hover {
      background: var(--terra);
      color: #fff;
    }

    /* ── UTILS ───────────────────────────────────────────── */
    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: none;
    }

    /* ── RESPONSIVE ──────────────────────────────────────── */
    /* ── RESPONSIVE ──────────────────────────────────────── */
    @media(max-width:1100px) {
      #home {
        grid-template-columns: 1fr 1fr;
        padding: 7rem 2rem 4rem;
        gap: 2rem;
      }

      .hero-card-main {
        width: 260px;
      }

      #about {
        padding: 5rem 2rem;
        gap: 3rem;
      }

      #offer,
      #howitworks,
      #audience,
      #testimonial,
      #founder-message,
      #faq,
      #cta {
        padding: 5rem 2rem;
      }

      footer {
        padding: 3rem 2rem 2rem;
      }
    }

    @media(max-width:900px) {
      nav {
        padding: 1rem;
        flex-direction: column;
        gap: 1rem;
        height: auto;
      }

      .nav-links {
        display: flex;
        gap: 1.5rem;
        font-size: 0.85rem;
      }

      .nav-cta {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        font-size: 0.85rem;
      }

      #home {
        grid-template-columns: 1fr;
        padding: 8rem 1rem 3rem;
        text-align: center;
      }

      .hero-visual {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
      }

      .hero-card-main {
        width: 100%;
        max-width: 360px;
        transform: rotate(0deg);
      }

      .hero-card-float {
        display: block;
        position: static;
        margin-top: 1rem;
      }

      #about,
      #founder-message,
      .faq-wrap {
        grid-template-columns: 1fr;
        gap: 2.5rem;
      }

      #founder-message .founder-image::before {
        top: 20px;
        left: 20px;
      }

      #offer,
      #howitworks,
      #audience,
      #testimonial,
      #founder-message,
      #faq,
      #cta,
      footer {
        padding: 4rem 1rem;
      }

      .offer-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .testi-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .hiw-steps {
        grid-template-columns: 1fr 1fr;
      }

      .hiw-steps::before {
        display: none;
      }

      .audience-grid {
        grid-template-columns: 1fr;
      }

      .footer-grid {
        grid-template-columns: 1fr 1fr;
      }

      .about-grid {
        grid-template-columns: 1fr;
      }
    }

    @media(max-width:600px) {
      .nav-links {
        gap: 0.8rem;
        flex-wrap: wrap;
        justify-content: center;
      }

      .hero-title {
        font-size: 2.2rem;
      }

      .hero-sub {
        font-size: 0.9rem;
      }

      .hero-stats {
        flex-wrap: wrap;
        justify-content: center;
        gap: 1.5rem;
      }

      .offer-grid,
      .testi-grid,
      .hiw-steps {
        grid-template-columns: 1fr;
      }

      .audience-card {
        padding: 2rem 1.5rem;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
      }

      .footer-brand {
        align-items: center;
        text-align: center;
      }

      .footer-bottom {
        flex-direction: column;
        gap: 1rem;
      }
    }

    @media(max-width:420px) {
      .hiw-steps {
        grid-template-columns: 1fr;
      }

      nav img {
        height: 30px;
      }

      .hero-title {
        font-size: 2rem;
      }
    }

    /* ── MODAL ───────────────────────────────────────────── */
    .apk-modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(17, 24, 39, 0.7);
      backdrop-filter: blur(4px);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
    }

    .apk-modal-overlay.active {
      opacity: 1;
      pointer-events: auto;
    }

    .apk-modal-content {
      background: #fff;
      width: 90%;
      max-width: 400px;
      border-radius: 24px;
      padding: 2.5rem 2rem;
      text-align: center;
      position: relative;
      transform: translateY(20px);
      transition: transform 0.3s ease;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .apk-modal-overlay.active .apk-modal-content {
      transform: translateY(0);
    }

    .apk-modal-close {
      position: absolute;
      top: 15px;
      right: 15px;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: rgba(17, 24, 39, 0.05);
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: var(--mid);
      transition: background 0.2s, color 0.2s;
    }

    .apk-modal-close:hover {
      background: rgba(17, 24, 39, 0.1);
      color: var(--deep);
    }

    .apk-modal-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .apk-modal-content h3 {
      font-family: 'Fraunces', serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--deep);
      margin-bottom: 1rem;
    }

    .apk-modal-content p {
      font-size: 0.95rem;
      color: var(--mid);
      line-height: 1.6;
      margin-bottom: 1rem;
    }

    .apk-modal-content .highlight-box {
      background: rgba(249, 115, 22, 0.08);
      border-left: 3px solid var(--terra);
      padding: 1rem;
      border-radius: 8px;
      text-align: left;
      margin: 1.5rem 0;
      font-size: 0.85rem;
      color: var(--deep);
    }

    .apk-modal-btn {
      display: inline-block;
      width: 100%;
      background: var(--terra);
      color: #fff;
      padding: 1rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      margin-top: 1rem;
      transition: background 0.2s;
      border: none;
      cursor: pointer;
    }

    .apk-modal-btn:hover {
      background: #e06512;
    }
  </style>
</head>

<body>

  <!-- NAV -->
  <nav>
    <img src="images/logo1.png" alt="StockedUp Logo" style="height: 40px; width: auto;" />
    <ul class="nav-links">
      <li><a href="#about">About</a></li>
      <li><a href="#offer">Offer</a></li>
      <li><a href="#howitworks">How it works</a></li>
      <li><a href="#founder-message">Founder</a></li>
      <li><a href="#faq">FAQ</a></li>
    </ul>
    <a href="mailto:hello@stockedup.africa" class="nav-cta">Contact Us</a>
  </nav>

  <!-- HERO -->
  <section id="home">
    <div class="hero-bg-circle c1"></div>
    <div class="hero-bg-circle c2"></div>
    <div class="hero-content reveal">
      <div class="hero-tag"><span class="dot"></span> Soft Launching in <span id="timer"
          style="font-weight: 700; color: var(--terra);">00d 00h 00m 00s</span></div>
      <h1 class="hero-title">
        Your market,<br>
        <em>delivered</em><br>
        <span class="underline-gold">to your door</span>
      </h1>
      <p class="hero-sub">StockedUp connects busy families and professionals with trusted local vendors — fresh
        groceries, zero market stress.</p>

      <div class="hero-actions">
        <div class="store-badges" style="flex-wrap: wrap; gap: 1rem;">
          <a href="https://stockedup.africa/apk.php" class="store-badge" id="apk-download-btn-hero" download
            style="background: var(--terra); border-color: var(--terra); color: #fff;">
            <i class="fab fa-android"></i>
            <div class="text">
              <small>Get early access</small>
              <span>Download Android</span>
            </div>
          </a>
          <a href="https://whatsapp.com/channel/0029Vb6XFXT3GJOyEaxnwk1v" target="_blank" class="store-badge"
            style="background: #25D366; border-color: #25D366; color: #fff;">
            <i class="fab fa-whatsapp" style="font-size: 1.8rem;"></i>
            <div class="text">
              <small>Updates & Bonuses</small>
              <span>Join WhatsApp</span>
            </div>
          </a>
          <a href="#cta" class="store-badge">
            <i class="fab fa-google-play"></i>
            <div class="text">
              <small>Coming soon to</small>
              <span>Play Store</span>
            </div>
          </a>
          <a href="#cta" class="store-badge">
            <i class="fab fa-apple"></i>
            <div class="text">
              <small>Coming soon to</small>
              <span>Apple Store</span>
            </div>
          </a>
        </div>
        <button class="btn-ghost" onclick="document.getElementById('howitworks').scrollIntoView({behavior:'smooth'})"
          style="margin-top: 0.5rem;">How it works</button>
      </div>

      <div class="hero-stats">
        <div class="stat-item"><span class="num">500+</span><span class="label">Early signups</span></div>
        <div class="stat-item"><span class="num">10+</span><span class="label">Trusted vendors</span></div>
        <div class="stat-item"><span class="num">1hr</span><span class="label">Avg delivery</span></div>
      </div>
    </div>
    <div class="hero-visual reveal">
      <img src="images/slide6.jpeg" alt="StockedUp Mobile App"
        style="width: 100%; max-width: 450px; border-radius: 40px; box-shadow: 0 30px 60px rgba(0,0,0,0.15); position: relative; z-index: 1;">

      <div class="hero-card-float f1">
        <div class="float-row">
          <div class="avatar">AWKA</div>
          <div class="info">
            <div class="name">
              <div id="ORD-D11062AE"></div> ORD-D11062AE placed
            </div>
            <div class="sub">Just now · unizik junction</div>
          </div>
        </div>
      </div>
      <div class="hero-card-float f2">
        <div class="delivery-pill">Delivered in 1h 45m</div>
      </div>
    </div>
  </section>

  <!-- MARQUEE -->
  <div class="marquee-strip">
    <div class="marquee-inner">
      <span>Fresh Groceries</span><span class="dot-sep">◆</span>
      <span>Canned Foods</span><span class="dot-sep">◆</span>
      <span>Fast Delivery</span><span class="dot-sep">◆</span>
      <span>Trusted Vendors</span><span class="dot-sep">◆</span>
      <span>Real-Time Tracking</span><span class="dot-sep">◆</span>
      <span>Loyalty Points</span><span class="dot-sep">◆</span>
      <span>Fresh Veggies</span><span class="dot-sep">◆</span>
      <span>Doorstep Delivery</span><span class="dot-sep">◆</span>
      <span>Fresh Groceries</span><span class="dot-sep">◆</span>
      <span>Canned Foods</span><span class="dot-sep">◆</span>
      <span>Fast Delivery</span><span class="dot-sep">◆</span>
      <span>Trusted Vendors</span><span class="dot-sep">◆</span>
      <span>Real-Time Tracking</span><span class="dot-sep">◆</span>
      <span>Loyalty Points</span><span class="dot-sep">◆</span>
      <span>Fresh Veggies</span><span class="dot-sep">◆</span>
      <span>Doorstep Delivery</span><span class="dot-sep">◆</span>
    </div>
  </div>

  <!-- ABOUT -->
  <section id="about" style="display: flex; flex-wrap: wrap; align-items: center; gap: 4rem;">
    <div style="flex: 1; min-width: 300px;">
      <div class="reveal">
        <span class="section-tag">Who we are</span>
        <h2 class="section-title">Bridging buyers<br>and <em>trusted vendors</em></h2>
        <p class="section-body">StockedUp removes the friction between you and your weekly groceries. We connect you to
          vetted local vendors — no haggling, no market stress, no wasted time.</p>
      </div>
      <div class="about-grid reveal" style="margin-top: 2rem;">
        <div class="about-card accent">
          <div class="about-icon">⚡</div>
          <h4>Built for speed</h4>
          <p>From browsing to doorstep — the fastest grocery experience in your city.</p>
        </div>
        <div class="about-card">
          <div class="about-icon">🤝</div>
          <h4>Vetted vendors</h4>
          <p>Every vendor on our platform is screened for quality and reliability.</p>
        </div>
        <div class="about-card">
          <div class="about-icon">📍</div>
          <h4>Local first</h4>
          <p>We support local market sellers while making their produce accessible to everyone.</p>
        </div>
        <div class="about-card">
          <div class="about-icon">🎁</div>
          <h4>Loyalty rewards</h4>
          <p>Earn points on every order and refer friends for extra bonuses.</p>
        </div>
      </div>
    </div>
    <div class="about-visual reveal" style="flex: 1; min-width: 300px;">
      <img src="images/slide4.jpeg" alt="StockedUp Freshness"
        style="width: 100%; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.15);">
    </div>
  </section>

  <!-- OFFER -->
  <section id="offer">
    <div class="offer-header reveal">
      <span class="section-tag">What we offer</span>
      <h2 class="section-title" style="color: var(--cream);">Everything from<br>the <em
          style="color:var(--gold);">market</em>, online</h2>
    </div>
    <div class="offer-grid">
      <div class="offer-card reveal">
        <div class="offer-icon">🛍️</div>
        <h4>Groceries & Foodstuffs</h4>
        <p>Rice, beans, cooking oil, spices and every staple you need — sourced fresh from local vendors.</p>
      </div>
      <div class="offer-card featured reveal">
        <div class="offer-icon">🚚</div>
        <h4>Doorstep Delivery</h4>
        <p>Track your order in real time. Our logistics partners bring it straight to you.</p>
      </div>
      <div class="offer-card reveal">
        <div class="offer-icon">🥦</div>
        <h4>Fresh Vegetables</h4>
        <p>Tomatoes, ugu, garden eggs, peppers — straight from the farm, not from storage.</p>
      </div>
      <div class="offer-card reveal">
        <div class="offer-icon">🥫</div>
        <h4>Canned Foods</h4>
        <p>Your favourite packaged and canned essentials, stocked and ready to order.</p>
      </div>
      <div class="offer-card reveal">
        <div class="offer-icon">🌾</div>
        <h4>Flour & Grains</h4>
        <p>Semolina, wheat flour, garri, millet — bulk or small portions, always available.</p>
      </div>
      <div class="offer-card reveal">
        <div class="offer-icon">📊</div>
        <h4>Customer Dashboard</h4>
        <p>Manage orders, track deliveries, view history and redeem loyalty points in one place.</p>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section id="howitworks">
    <div class="hiw-header reveal">
      <span class="section-tag">How it works</span>
      <h2 class="section-title">Four steps to<br><em>fresh groceries</em></h2>
    </div>
    <div class="hiw-steps">
      <div class="step-card reveal">
        <div class="step-num">1</div>
        <h4>Browse</h4>
        <p>Explore a curated selection of fresh food and groceries from trusted vendors near you.</p>
      </div>
      <div class="step-card reveal">
        <div class="step-num">2</div>
        <h4>Order</h4>
        <p>Add items to your cart, choose delivery time, and pay securely through multiple options.</p>
      </div>
      <div class="step-card reveal">
        <div class="step-num">3</div>
        <h4>Track</h4>
        <p>Follow your order in real time — from the vendor's hands to your doorstep.</p>
      </div>
      <div class="step-card reveal">
        <div class="step-num">4</div>
        <h4>Delivered</h4>
        <p>Receive your groceries fresh, on time, right where you are. Easy.</p>
      </div>
    </div>
  </section>

  <!-- AUDIENCE -->
  <section id="audience">
    <div style="text-align:center; margin-bottom:3rem;" class="reveal">
      <span class="section-tag">Built for both sides</span>
      <h2 class="section-title">Buyers & <em>vendors</em>,<br>both win</h2>
    </div>
    <div class="audience-grid">
      <div class="audience-card buyers reveal">
        <div class="aud-tag">For Buyers</div>
        <h3>Shop smart,<br>save time</h3>
        <ul>
          <li>Order from home, office or anywhere</li>
          <li>Transparent pricing — no surprises</li>
          <li>Doorstep delivery at your schedule</li>
          <li>Loyalty points on every purchase</li>
          <li>Real-time order tracking</li>
        </ul>
        <div class="aud-deco">B</div>
      </div>
      <div class="audience-card vendors reveal">
        <div class="aud-tag">For Vendors</div>
        <h3>Grow your<br>business online</h3>
        <ul>
          <li>Reach hundreds of new customers</li>
          <li>Easy inventory management tools</li>
          <li>Delivery handled for you</li>
          <li>Reliable payment and payout system</li>
          <li>Dedicated vendor onboarding support</li>
        </ul>
        <div class="aud-deco">V</div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section id="testimonial">
    <div class="testi-header reveal">
      <span class="section-tag">Early voices</span>
      <h2 class="section-title">What early users<br>are <em>saying</em></h2>
    </div>
    <div class="testi-grid">
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"This service completely transformed how we do shopping. The attention to detail and
          professional approach exceeded all our expectations."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:var(--sage);">SE</div>
          <div>
            <div class="author-name">Sarah Elota</div>
            <div class="author-role">Early user · Awka</div>
          </div>
        </div>
      </div>
      <div class="testi-card featured reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"I've never experienced such dedication and quality. The team went above and beyond to
          deliver exactly what we needed. Highly recommended!"</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:rgba(255,255,255,0.25); color:var(--cream);">EM</div>
          <div>
            <div class="author-name">Enu Micheal</div>
            <div class="author-role">Vendor partner</div>
          </div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"Exceptional results that speak for themselves. Professional, reliable, and incredibly
          talented. This is the partnership we've been looking for."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:var(--terra);">DC</div>
          <div>
            <div class="author-name">David Chukwuemeka</div>
            <div class="author-role">Early user · Awka</div>
          </div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"As a trader in Eke-Awka market, I was sceptical at first. But the StockedUp team came
          personally to verify my stand and explained the whole thing. Now I'm reaching customers in Amawbia and Nnewi
          that I've never sold to before. My daily turnover has improved already."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:var(--sage);">EO</div>
          <div>
            <div class="author-name">Emeka Obi</div>
            <div class="author-role">Grains Vendor, Eke-Awka</div>
          </div>
        </div>
      </div>
      <div class="testi-card featured reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"I'm a mum of three in Okpuno and the market is far from us. StockedUp beta has been a
          lifesaver — I ordered ugu leaves, crayfish, and garri last week and it came within hours. The packaging was
          clean and fresh. Very impressed with the professionalism."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:rgba(255,255,255,0.25); color:var(--cream);">CN</div>
          <div>
            <div class="author-name">Chioma Nwosu</div>
            <div class="author-role">Stay-at-home mum, Okpuno</div>
          </div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="stars">★★★★☆</div>
        <p class="testi-text">"I live near UNIZIK and I order for my hostel almost every week now. The prices are fair —
          same as market price — and the delivery guys are always polite. Better than going to Eke-Awka and bargaining
          under the sun. I've referred five friends already."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:var(--terra);">CA</div>
          <div>
            <div class="author-name">Chukwuebuka Ani</div>
            <div class="author-role">Student, UNIZIK Awka</div>
          </div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"I sell fresh tomatoes and pepper around Aroma junction. StockedUp gave me a dashboard to
          list my stock and manage orders — something I never thought I'd have. It's simple enough that even my sister
          who isn't tech-savvy uses it. Waiting eagerly for the full launch."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:var(--sage);">NE</div>
          <div>
            <div class="author-name">Ngozi Eze</div>
            <div class="author-role">Produce Vendor, Aroma Junction</div>
          </div>
        </div>
      </div>
      <div class="testi-card featured reveal">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"My farm is in Nibo but most of my customers are in Awka proper. StockedUp handles
          delivery for me — I just harvest, list, and pack. The coordination is smooth and I finally have a business
          that feels organised. Very proud to be one of their first vendor partners."</p>
        <div class="testi-author">
          <div class="testi-avatar" style="background:rgba(255,255,255,0.25); color:var(--cream);">IE</div>
          <div>
            <div class="author-name">Ikenna Ezeh</div>
            <div class="author-role">Farm Owner, Nibo</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOUNDER MESSAGE -->
  <section id="founder-message">
    <div class="founder-image reveal">
      <img src="images/Founder.jpg" alt="Henry Chukwuebuka - Founder of StockedUp" />
    </div>
    <div class="founder-content reveal">
      <span class="section-tag">A Message from the Founder 👋</span>
      <h2>Hi, I'm Henry, <br>founder of <em>StockedUp.</em></h2>

      <p>May 4th, is a special day for us. We officially launched, and we've already seen our very first real customer
        place an order. That moment reminded me why we started building StockedUp in the first place — to make buying
        food and groceries easier, faster, and stress-free.</p>

      <p>If you're downloading this app, I want you to know this:</p>
      <p><strong>Your trust means everything to us.</strong></p>

      <p>Because we are still in our early stage, our app is currently downloaded directly from our website, which is
        why your phone may show a security prompt during installation. This is completely normal for apps not yet on the
        Play Store.</p>

      <p>We want to assure you that:</p>
      <ul>
        <li>We do not collect unnecessary or harmful data</li>
        <li>Your information is safe and handled responsibly</li>
        <li>This is our official app, built and managed by our team</li>
      </ul>

      <p>We are working towards getting StockedUp on the Play Store very soon. Thank you for believing in us this early.
        You're not just a user—you're part of the journey.</p>

      <div class="founder-signature">
        <strong>Henry Chukwuebuka</strong>
        <span>Founder, StockedUp Africa</span>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq">
    <div class="faq-wrap">
      <div class="reveal">
        <span class="section-tag">FAQ</span>
        <h2 class="section-title">Got<br>questions?<br><em>We've got<br>answers.</em></h2>
        <p class="section-body" style="margin-top:1rem;">Everything you need to know before StockedUp goes live.</p>
        <a href="https://wa.me/2348104436235" target="_blank" class="btn-primary" style="margin-top:2rem;">Contact
          Customer Care →</a>
      </div>
      <div class="faq-list reveal">
        <div class="faq-item">
          <button class="faq-q">What is StockedUp? <span class="faq-toggle">+</span></button>
          <div class="faq-a">StockedUp is an indigenous digital platform that connects foodstuff vendors with
            individuals
            and families who want a faster, easier way to shop for groceries. Think of it as your local market — online,
            reliable, and delivered to your doorstep.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Is the app available now? <span class="faq-toggle">+</span></button>
          <div class="faq-a">Yes! While we prepare for our official Play Store and Apple Store launch, you can download
            the early access Android APK directly from this page.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Who can use StockedUp? <span class="faq-toggle">+</span></button>
          <div class="faq-a">Both buyers who want to skip market stress and shop conveniently, and vendors who want to
            take their foodstuff business online and reach more customers.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Where will StockedUp be available? <span class="faq-toggle">+</span></button>
          <div class="faq-a">We're starting with Awka and its environs, and expanding to more cities soon
            after launch.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q">How can I become a vendor? <span class="faq-toggle">+</span></button>
          <div class="faq-a">Reach out to us via our customer care or email us at hello@stockedup.africa. Our team will
            guide you through the onboarding process ahead of launch — it takes less than 5 minutes.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q">What items will be sold on StockedUp? <span class="faq-toggle">+</span></button>
          <div class="faq-a">Everything you'd expect at the local market: rice, beans, grains, cooking oil, vegetables,
            fruits, meat, spices, canned foods, flour, and much more.</div>
        </div>
        <div class="faq-item">
          <button class="faq-q">How can I contact the team? <span class="faq-toggle">+</span></button>
          <div class="faq-a">Email us at support@stockedup.africa or reach out via our official social media pages. We
            respond to every message.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA BAND -->
  <section id="cta">
    <div class="cta-deco"></div>
    <span class="section-tag reveal">Get early access</span>
    <h2 class="section-title reveal">We are<br><em>live</em></h2>
    <p class="section-body reveal">The StockedUp app is ready. While we prepare our official Play Store and Apple Store
      releases for our public launch, you can download the early access Android APK right here and start shopping today.
    </p>

    <div class="store-badges reveal" style="justify-content: center; margin-top: 2rem; flex-wrap: wrap; gap: 1rem;">
      <a href="https://stockedup.africa/apk.php" class="store-badge" id="apk-download-btn-cta" download
        style="background: var(--terra); border-color: var(--terra); color: #fff;">
        <i class="fab fa-android"></i>
        <div class="text" style="text-align: left;">
          <small>Get early access</small>
          <span>Download Android</span>
        </div>
      </a>
      <a href="https://whatsapp.com/channel/0029Vb6XFXT3GJOyEaxnwk1v" target="_blank" class="store-badge"
        style="background: #25D366; border-color: #25D366; color: #fff;">
        <i class="fab fa-whatsapp" style="font-size: 1.8rem;"></i>
        <div class="text" style="text-align: left;">
          <small>Updates & Bonuses</small>
          <span>Join WhatsApp</span>
        </div>
      </a>
      <a href="mailto:hello@stockedup.africa" class="store-badge">
        <i class="fab fa-google-play"></i>
        <div class="text" style="text-align: left;">
          <small>Coming soon to</small>
          <span>Play Store</span>
        </div>
      </a>
      <a href="mailto:hello@stockedup.africa" class="store-badge">
        <i class="fab fa-apple"></i>
        <div class="text" style="text-align: left;">
          <small>Coming soon to</small>
          <span>Apple Store</span>
        </div>
      </a>
    </div>
    <p class="reveal"
      style="text-align: center; color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin-top: 1.5rem;">Join our
      WhatsApp channel for more exclusive launch updates and bonuses..</p>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="footer-grid">
      <div class="footer-brand">
        <img src="images/logo1.png" alt="StockedUp Logo" style="height: 40px; width: auto;" />
        <p>Bringing the local food market to your door. FRESH. FAST. RELIABLE</p>
      </div>
      <div class="footer-col">
        <h5>Categories</h5>
        <a href="#">Groceries & Foodstuffs</a>
        <a href="#">Canned Foods</a>
        <a href="#">Fresh Vegetables</a>
        <a href="#">Flour & Grains</a>
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
        <a href="#">Awka, Anambra, Nigeria</a>
        <a href="tel:08104436235">08104436235</a>
        <a href="mailto:hello@stockedup.africa">hello@stockedup.africa</a>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 StockedUp. All rights reserved.</span>

      <div class="footer-socials">
        <a href="https://x.com/stockedupafrica" aria-label="X (Twitter)">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.253 5.622 5.91-5.622Zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
          </svg>
        </a>
        <a href="https://www.instagram.com/stockedupafrica?igsh=b2txYTJ4NjRud3Zo" aria-label="Instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
          </svg>
        </a>
        <a href="https://www.facebook.com/share/17fNxJhgNF/" aria-label="Facebook">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.791-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.514c-1.491 0-1.956.931-1.956 1.886v2.268h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
          </svg>
        </a>
        <a href="https://www.linkedin.com/company/stockedup-ltd/" aria-label="LinkedIn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
          </svg>
        </a>
        <a href="https://www.tiktok.com/@stockedupafrica?_r=1&_t=ZS-95wj8J3JmNA" aria-label="TikTok">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
          </svg>
        </a>
      </div>

      <div>
        <a href="privacy.php">Privacy Policy</a>
        <a href="terms.php">Terms of Service</a>
        <a href="#">Cookies</a>
      </div>
    </div>
  </footer>

  <!-- APK DOWNLOAD MODAL -->
  <div class="apk-modal-overlay" id="apkModal">
    <div class="apk-modal-content">
      <button class="apk-modal-close" id="closeApkModal">
        <i class="fas fa-times"></i>
      </button>
      <div class="apk-modal-icon">⚠️</div>
      <h3>Important Before You Install</h3>
      <p>Because you are downloading from our website (not Play Store), your phone may show a warning like:</p>

      <div class="highlight-box">
        <strong>"This type of file can harm your device"</strong>
      </div>

      <p>👉 Don't worry — this is normal for all apps downloaded outside Play Store.</p>

      <button class="apk-modal-btn" id="confirmApkDownload">Download anyway</button>
    </div>
  </div>

  <script>
    // Countdown Timer
    const countdownDate = new Date("May 4, 2026 00:00:00").getTime();
    const timerElement = document.getElementById("timer");

    function updateTimer() {
      const now = new Date().getTime();
      const distance = countdownDate - now;

      if (distance < 0) {
        timerElement.innerHTML = "LIVE NOW!";
        return;
      }

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      timerElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    updateTimer();
    setInterval(updateTimer, 1000);

    // Scroll reveal
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // FAQ
    document.querySelectorAll('.faq-q').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = btn.parentElement;
        const wasOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        if (!wasOpen) item.classList.add('open');
      });
    });

    // APK Modal Logic
    const apkModal = document.getElementById('apkModal');
    const closeApkModal = document.getElementById('closeApkModal');
    const confirmApkDownload = document.getElementById('confirmApkDownload');
    const apkUrl = "https://stockedup.africa/apk.php";

    // Select both download buttons
    const downloadBtns = document.querySelectorAll('#apk-download-btn-hero, #apk-download-btn-cta');

    downloadBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault(); // Stop immediate download
        apkModal.classList.add('active');
      });
    });

    // Close modal
    closeApkModal.addEventListener('click', () => {
      apkModal.classList.remove('active');
    });

    // Click outside to close
    apkModal.addEventListener('click', (e) => {
      if (e.target === apkModal) {
        apkModal.classList.remove('active');
      }
    });

    // Handle actual download
    confirmApkDownload.addEventListener('click', () => {
      // Trigger download
      const a = document.createElement('a');
      a.href = apkUrl;
      a.download = "StockedUp.apk";
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);

      // Close modal
      apkModal.classList.remove('active');
    });
  </script>
</body>

</html>