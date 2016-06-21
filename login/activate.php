<?php
  include_once 'login_config.php';

  if(!(isset($_GET['key']) && isset($_GET['username']) && isset($_GET['batch']))){
    header('location:'.$LOGIN_URL.'login.php?errno=3');
    exit(0);
  }

  $username = $_GET['username'];
  $batch = $_GET['batch'];
  $key = $_GET['key'];

  $dbConn=openDB($batch);

  $sql = "SELECT * FROM `login` WHERE `username` LIKE '$username'";
  $r = mysqli_query($dbConn,$sql) or die('DB Query error!');
  $data = mysqli_fetch_assoc($r);

  closeDB($dbConn);


  if($data['password_hash']!=$key){
    header('location:'.$LOGIN_URL.'login.php?errno=5');
    exit(0);
  }

  $dbConn=openDB($batch);

  $sql = "UPDATE `login` SET `acc_active`=1 WHERE `username` LIKE '$username'";
  $r = mysqli_query($dbConn,$sql);

  closeDB($dbConn);

  if(!$r){
    header('location:'.$LOGIN_URL.'login.php?errno=4');
    exit(0);
  }

  header('location:'.$LOGIN_URL.'login.php?success=3');
  exit(0);

?>