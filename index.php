<?php
  ob_start();
  require_once 'includes/load.php';
  if ($session->isUserLoggedIn()) { redirect('home.php', false); exit; }
  include_once 'layouts/header.php';
?>

<div class="landing-shell">
  <div class="landing-hero">
    <div class="landing-copy">
      <div class="brand-pill">WareFlow Inventory</div>
      <h1>Control stock, sales, and users from one modern dashboard.</h1>
      <p>Keep your business moving with a clean, simple inventory system built for daily operations.</p>
      <div class="landing-actions">
        <a class="btn btn-primary btn-lg" href="login.php">Login</a>
        <a class="btn btn-default btn-lg" href="#features">Explore features</a>
      </div>
    </div>
    <div class="landing-card">
      <h3>Why teams use WareFlow</h3>
      <ul>
        <li>Track products and quantities in real time</li>
        <li>Record sales quickly and stay organized</li>
        <li>Manage user roles and access securely</li>
      </ul>
    </div>
  </div>

  <div class="landing-features" id="features">
    <div class="feature-box">
      <h4>Inventory Overview</h4>
      <p>See your products, stock levels, and pricing at a glance.</p>
    </div>
    <div class="feature-box">
      <h4>Sales Tracking</h4>
      <p>Capture sales instantly and keep your records up to date.</p>
    </div>
    <div class="feature-box">
      <h4>User Access</h4>
      <p>Support different roles with clear permissions and controls.</p>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
