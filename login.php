<?php
  ob_start();
  require_once 'includes/load.php';
  if ($session->isUserLoggedIn()) { redirect('home.php', false); exit; }
  include_once 'layouts/header.php';
?>

<div class="login-page">
    <div class="text-center">
       <div class="brand-badge">WareFlow</div>
       <h1>Welcome back</h1>
       <p>Sign in to manage your inventory, sales, and users.</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth_v2.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info">Login</button>
        </div>
    </form>
    <div class="text-center helper-links">
      <a href="index.php">Back to home</a>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
