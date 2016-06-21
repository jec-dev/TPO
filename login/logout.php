<?php
  include_once 'login_config.php';
  session_start();
  session_destroy();
  header('location:'.$BASE_URL);
?>