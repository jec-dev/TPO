<?php
  include_once 'login_config.php';

  if(isset($_GET['page'])){
    if($_GET['page']=="problems"){
      header('location:'.$LOGIN_URL.'problems.php');
    }else{
      header('location:'.$LOGIN_URL.'login.php?errno=3');
    }
  }else{

    session_start();
    if(!isset($_SESSION['username'])){
      session_destroy();
    }else{
      if($_SESSION['acc_type']=="admin"){
        header('location:'.$ADMIN_URL);
      }else{
        //echo 'session revd';
        header('location:'.$STUDENT_URL);
      }
      exit(0);
    }

    if(isset($_POST['login-submit'])){

      //echo 'LOGIN_SUBMIT';

      $username = htmlentities(trim($_POST['username']),ENT_QUOTES,"utf-8");
      $password = htmlentities(trim($_POST['password']),ENT_QUOTES,"utf-8");
      $batch = $_POST['batch'];

      /*------------Input Validation------------------------------------------------------------*/

      if($username=="" || $password=="" || $batch==""){
        header('location:'.$LOGIN_URL.'login.php?errno=5');
        exit(0);
      }

      /*--------------------ends-----------------------------------------------------*/

      $dbConn = openDB($batch);
      //echo 'DB Connected';

      $sql = "SELECT * FROM `login` WHERE username LIKE '$username' AND password = '$password'";
      $r = mysqli_query($dbConn,$sql) or die('DB Error. Unable to Run Query on DB.');

      closeDB($dbConn);
      //echo 'DB Connection Closed';

      if(mysqli_num_rows($r)!=1){
        header('location:'.$LOGIN_URL.'login.php?errno=1');
        exit(0);
      }

      $data=mysqli_fetch_assoc($r);
      //echo 'Data fetched';

      if(count($data)<2){
        die('Data corrupted. Try again...');
      }

      /*--------------------------------------------------
      Check if account active or not.
      ---------------------------------------------------*/
      if($data['acc_active']==0){
        header('location:'.$LOGIN_URL.'login.php?errno=6');
        exit(0);
      }


      /*-------------------------------------------------
      Start session and redirect to the subsystem.
      --------------------------------------------------*/
      session_start();

      foreach($data as $key=>$value){
        $_SESSION[$key]=$value;
      }

      $_SESSION['password_hash']=md5($data['password']);

      if($_SESSION['acc_type']=="admin"){
        header('location:'.$ADMIN_URL);
        exit(0);
      }else{
        header('location:'.$STUDENT_URL);
        exit(0);
      }
    }else{
      //echo 'all else';
      header('location:'.$BASE_URL);
    }

  }/*-----------------------$_GET--------------------------*/
?>