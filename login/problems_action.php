<?php
  include_once 'login_config.php';

  if(!isset($_POST['problem-submit'])){
    header('location:'.$BASE_URL);
    exit(0);
  }

  if(trim($_POST['username'])==''){
    header('location:'.$LOGIN_URL.'problems.php?errno=1');
    exit(0);
  }

  if($_POST['problem-value']==''){
    header('location:'.$LOGIN_URL.'problems.php?errno=2');
    exit(0);
  }


  /*------------------------------------------------------------------------------
  GET LOGIN DETAILS AND SETUP DEFAULT VALUES
  --------------------------------------------------------------------------------*/
  $batch = $_POST['batch'];
  $username = $_POST['username'];

  $dbConn=openDB($batch);
  $sql = "SELECT * FROM `login` WHERE `username` = '$username' ";

  $r = mysqli_query($dbConn, $sql)  or die(mysqli_error($dbConn));
  closeDB($dbConn);
  if(!$r){
    header('location:'.$LOGIN_URL.'problems.php?errno=4');
    exit(0);
  }

  $dbConn=openDB($batch);

  $data = mysqli_fetch_assoc($r);
  $password_hash = md5($data['password']);

  $sql = "UPDATE `login` SET `password_hash` = '$password_hash' WHERE `username` LIKE '$username'";

  $r = mysqli_query($dbConn, $sql) or die(mysqli_error($dbConn));
  closeDB($dbConn);
  if(!$r){
    header('location:'.$LOGIN_URL.'problems.php?errno=4');
    exit(0);
  }


  /*------------------------------------------------------------------------------
  SET EMAIL AND HEADER VALUES
  --------------------------------------------------------------------------------*/

  $to = $data['email'];
  $header = "From: TPO Helpdesk - JEC Jabalpur<tpohelp@jec-jabalpur.org>\r\n";
  $header.= "Content-type: text/html; charset=iso-859-1 \r\n";
  $header.= "MIME-version: 1.0 \r\n";
  $subject = "TPO LOGIN HELP - INSTRUCTIONS";
  $body='';


  /*------------------------------------------------------------------------------
  REDIRECT AND SEND EMAIL ACCORDINGLY
  --------------------------------------------------------------------------------*/

  if($_POST['problem-value']=='password'){

    $link = "http://tpo.jec-jabalpur.org/v3/login/resetPassword.php?key=$password_hash&batch=$batch&username=$username";
    $replace = 'Please follow the link : <br/><a href="'.$link.'">'.$link.'</a><br/> to reset your password for JEC TPO Online Portal.';
    $subject.=" - PASSWORD RESET";
    $body = $body = '
    <html>
    <head></head>
    <body>
      <h5>Dear '.$data['firstName'].' '.$data['lastName'].',</h5>
      <p>
          '.$replace.'
      </p>
      <p>
        <div>PS: This is an automated E-mail. DO NOT REPLY.</div>
        <h5>Regards</h5>
        <h5>TPO Helpdesk</h5>
        <h5><a href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a></h5>
      </p>
    </body>
    <html>';
    //echo $body;
    //exit(0);
  }

  if($_POST['problem-value']=='email'){
    $link = $LOGIN_URL."resetEmail.php?key=$password_hash&batch=$batch&username=$username";
    header('location:'.$link);
    exit(0);
  }

  if($_POST['problem-value']=='security'){
    $link = $LOGIN_URL."resetSecurity.php?key=$password_hash&batch=$batch&username=$username";
    header('location:'.$link);
    exit(0);
  }

  if($_POST['problem-value']=='activation'){
    $link = "http://tpo.jec-jabalpur.org/v3/login/activate.php?key=$password_hash&batch=$batch&username=$username";
    $replace = 'Please follow the link : <br/><a href="'.$link.'">'.$link.'</a><br/> to activate your account on JEC TPO Online Portal.';
    $subject.=" - ACCOUNT ACTIVATION";
    $body = '
    <html>
    <head></head>
    <body>
      <h5>Dear '.$data['firstName'].' '.$data['lastName'].',</h5>
      <p>
          '.$replace.'
      </p>
      <p>
        <div>PS: This is an automated E-mail. DO NOT REPLY.</div>
        <h5>Regards</h5>
        <h5>TPO Helpdesk</h5>
        <h5><a href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a></h5>
      </p>
    </body>
    <html>';
    //echo $body;
    //exit(0);
  }

  if(!mail($to,$subject,$body,$header)){
    header('location:'.$LOGIN_URL.'problems.php?errno=3'  );
    exit(0);
  }

  header('location:'.$LOGIN_URL.'problems.php?success=email'  );
  exit(0);

  print_r($_POST);
?>