<?php
  include_once 'login_config.php';

  session_start();

  if(!isset($_SESSION['username'])){
    session_destroy();
    header('location:'.$LOGIN_URL.'login.php?errno=2');
    exit(0);
  }

  $batch = $_SESSION['batch'];
  $username = $_SESSION['username'];
?>