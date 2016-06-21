<?php
  include_once 'login_config.php';

  if(!isset($_POST['register-submit'])){
    //print_r($_POST);
    header('location:'.$LOGIN_URL);
    exit(0);
  }

  $errno=0;

  foreach($_POST as $key=>$value){
    $v = trim($value);
    if($v==''){
      $errno=1;
      break;
    }
    $_POST[$key]=strtoupper($v);
  }

  if($errno>0){
    //print_r($_POST);
    header('location:'.$LOGIN_URL.'register.php?success=false&errno=1');
    exit(0);
  }

  $str='abcdefghijklmnopqrstuvwxyz0123456789';
  $pwd=substr(str_shuffle($str),0,7);

  $batch=$_POST['batch'];
  $username=$_POST['username'];
  $password=$pwd;
  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $email = strtolower($_POST['email']);
  $securityQ=$_POST['securityQ'];
  $securityA=$_POST['securityA'];

  $dbConn=openDB($batch);

  $sql = "INSERT INTO `login`(
    `username`,
    `password`,
    `firstName`,
    `lastName`,
    `batch`,
    `email`,
    `securityQ`,
    `securityA`
      )VALUES(
    '$username',
    '$password',
    '$firstName',
    '$lastName',
    '$batch',
    '$email',
    '$securityQ',
    '$securityA'
      );";

  $sql.="INSERT INTO `student`(`rollno`)VALUES('$username');";
  $sql.="INSERT INTO `selection`(`rollno`)VALUES('$username');";
  $sql.="INSERT INTO `studentdocs`(`rollno`)VALUES('$username');";

  $r = mysqli_multi_query($dbConn,$sql);

  if(!$r){
    //echo $sql;
    header('location:'.$LOGIN_URL.'register.php?success=false&errno=2');
    exit(0);
  }

  $header = "From: TPO-JEC<no-reply@jec-jabalpur.org>\r\n";
  $header .= "MIME-Version: 1.0 \r\n";
  $header .= "Content-type: text/html; charset=iso-8859-1 \r\n";

  $to = $email;
  $subject = "TPO-JEC Jabalpur - Online Portal Registration Successful.";

  $body = "<html>
  <head>
    <title>Registration Information | TPO JEC Jabalpur</title>
  </head>
  <body>
    <h5><b>Dear $firstName $lastName,</b></h5>
    <p>Your Registration at TPO Online portal - JEC Jabalpur is successful. Your login username and password is :</p>
    <p>
      <h4><b>USERNAME: $username</b></h4>
      <h4><b>PASSWORD: $password</b></h4>
    </p>
    <p>Please activate your account at: <a href=\"http://tpo.jec-jabalpur.org/v3/login/problems.php\" target=\"_TAB\">TPO Online Portal - JEC Jabalpur</a><br>
    You will then receive another email by clicking on which your account will be activated.</p>
    <h5>PS: This is an automated e-mail. Do NOT reply.</h5>

    <h5>Regards,<h5>
    <p>
      <h5>TPO - JEC Jabalpur</h5>
      <div><a href=\"mailto:tpo@jec-jabalpur.org\">tpo@jec-jabalpur.org</a></div>
      <div><a href=\"mailto:tpo@jec-jabalpur.org\">tpohelp@jec-jabalpur.org</a></div>
    </p>
  </body>
  </html>";
  //echo $body;

  if(!mail($to,$subject,$body,$header)){
    //echo $sql;
    header('location:'.$LOGIN_URL.'register.php?success=false&errno=3');
    exit(0);
  }

  header('location:'.$LOGIN_URL.'register.php?success=true');
  exit(0);

?>