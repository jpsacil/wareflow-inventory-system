<?php
  require_once('includes/load.php');

  if(!isset($_POST['username'], $_POST['password'])) {
    $session->msg('d', 'Please enter username and password.');
    redirect('login.php', false);
  }

  $req_fields = array('username','password');
  validate_fields($req_fields);

  $username = remove_junk($_POST['username']);
  $password = remove_junk($_POST['password']);

  if(empty($errors)) {
    $user = authenticate_v2($username, $password);
    if($user) {
      $session->login($user['id']);
      updateLastLogIn($user['id']);
      $session->msg('s', 'Hello ' . $user['username'] . ', Welcome to WAREFLOW.');
      if($user['user_level'] === '1') {
        redirect('admin.php', false);
      } elseif($user['user_level'] === '2') {
        redirect('special.php', false);
      } else {
        redirect('home.php', false);
      }
    } else {
      $session->msg('d', 'Sorry Username/Password incorrect.');
      redirect('login.php', false);
    }
  } else {
     $session->msg('d', $errors);
     redirect('login.php', false);
  }
?>
