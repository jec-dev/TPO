<?php
  include_once 'login_config.php';

  /*---------------------------------------------------------------------------------------------------
  RESET PASSWORD ACTION STARTS HERE.
  SET UP REQUIRED VALUES FROM _POST VARIABLE
  DETECT ERRORS AND DISPLAY THEM.
  IF NO ERROR FOUND, UPDATE PASSWORD AND PASSWORD HASH.
  REDIRECT BACK TO LOGIN.
  -----------------------------------------------------------------------------------------------------*/
  $err='';
  if(isset($_POST['reset-submit'])){

    foreach($_POST as $key=>$value){
      $v=trim($value);
      if($v==''){
        $err="ANSWER CANNOT BE EMPTY";
        break;
      }
      $_POST[$key]=$value;
    }

    $batch = $_POST['batch'];
    $username= $_POST['username'];
    $newSecurityA = strtoupper($_POST['securityA']);
    $newEmail = $_POST['email'];

    $dbConn = openDB($batch);
    $sql = "SELECT * FROM `login` WHERE `username` LIKE '$username'";
    $r = mysqli_query($dbConn,$sql) or die('DB Query Error!');
    closeDB($dbConn);

    $data=mysqli_fetch_assoc($r);
    $newSecurityAConfirm = $data['securityA'];
    $password_hash = $data['password_hash'];

    if($err==''){
      if($newSecurityA!=$newSecurityAConfirm){
        $err='ANSWER MISMATCH';
      }else{
        $dbConn = openDB($batch);
        $sql = "UPDATE `login` SET `email`='$newEmail',`acc_active`=0 WHERE `username` LIKE '$username'";
        $r = mysqli_query($dbConn,$sql) or die('DB Query Error!');
        closeDB($dbConn);

        if(!$r){
          $err='ERROR UPDATING EMAIL! TRY AGAIN';
        }else{

          /*------------------------------------------------------------------------------
          SET EMAIL AND HEADER VALUES
          --------------------------------------------------------------------------------*/

          $to = $data['email'];
          $header = "From: TPO Helpdesk - JEC Jabalpur<tpohelp@jec-jabalpur.org>\r\n";
          $header.= "Content-type: text/html; charset=iso-859-1 \r\n";
          $header.= "MIME-version: 1.0 \r\n";
          $subject = "TPO LOGIN HELP - INSTRUCTIONS";
          $body='';

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
          if(!mail($to,$subject,$body,$header)){
            header('location:'.$LOGIN_URL.'login.php?errno=6');
            exit(0);
          }else{
            header('location:'.$LOGIN_URL.'login.php?success=2');
            exit(0);
          }
        }
      }
    }

    $dbConn = openDB($batch);
    $sql = "SELECT * FROM `login` WHERE `username` LIKE '$username'";
    $r = mysqli_query($dbConn,$sql) or die('DB Query Error!');
    closeDB($dbConn);

    $data = mysqli_fetch_assoc($r);

    $_GET['key']=md5($data['password']);
    $_GET['batch']=$data['batch'];
    $_GET['username']=$data['username'];

  }

  /*---------------------------------------------------------------------------------------------------
  RESET PASSWORD FORM STARTS HERE.
  SET UP REQUIRED VALUES FROM SESSION OR _GET VARIABLE
  -----------------------------------------------------------------------------------------------------*/
  session_start();
  if(!(isset($_SESSION['username']) && isset($_SESSION['batch'])) || $err!=''){
    session_destroy();
  }else{
    $_GET['key']=md5($_SESSION['password']);
    $_GET['batch']=$_SESSION['batch'];
    $_GET['username']=$_SESSION['username'];

    session_destroy();
  }

  if(! (isset($_GET['key']) && isset($_GET['batch']) && isset($_GET['username']))){
    header('location:'.$LOGIN_URL.'login.php?errno=3');
    exit(0);
  }

  $username=$_GET['username'];
  $batch = $_GET['batch'];
  $key = $_GET['key'];

  $dbConn = openDB($batch);
  $sql = "SELECT * FROM `login` WHERE `username` LIKE '$username'";
  $r = mysqli_query($dbConn,$sql) or die('DB Query Error!');
  closeDB($dbConn);

  $data = mysqli_fetch_assoc($r);

  if($key!=$data['password_hash']){
    header('location:'.$LOGIN_URL.'login.php?errno=5');
    exit(0);
  }

  $securityQ=$data['securityQ'];

  include_once $TEMPLATE_URL.'head.php';
  include_once $TEMPLATE_URL.'body_header.php';
?>
<div class="container-fluid">

<?php if($err!=""): ?>
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 well">
      <div class="alert alert-danger align-center ">
        <h2 class="noshadow-heading"><?php echo $err;?></h2>
        <p>If this error is occouring frequently, please contact TPO Helpdesk : <a href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a></p>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
<?php endif; ?>

  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 well">
      <div class="well">
        <h2 class="align-center">RESET RECOVERY E-MAIL</h2>
        <form role="form" class="form form-horizontal" method="POST" action="">
          <div class="form-group">
            <div class="col-lg-3"><label class="control-label">Batch</label></div>
            <div class="col-lg-4"><input class="form-control" type="text" name="batch" value="<?php echo $batch; ?>" readonly required /></div>
          </div>
          <div class="form-group">
            <div class="col-lg-3"><label class="control-label">Username</label></div>
            <div class="col-lg-4"><input class="form-control" type="text" name="username" value="<?php echo $username; ?>" readonly required /></div>
          </div>
          <div class="form-group">
            <div class="col-lg-3"><label class="control-label">Security Question</label></div>
            <div class="col-lg-9"><input class="form-control" type="text" name="securityQ" value="<?php echo $securityQ; ?>" readonly required /></div>

          </div>
          <div class="form-group">
            <div class="col-lg-3"><label class="control-label">Security Answer</label></div>
            <div class="col-lg-6"><input class="form-control" type="text" name="securityA" required /></div>
          </div>
          <div class="form-group">
            <div class="col-lg-3"><label class="control-label">New E-mail ID</label></div>
            <div class="col-lg-6"><input class="form-control" type="email" name="email" required /></div>
          </div>
          <div class="form-group">
            <div class="col-lg-2"></div>
            <div class="col-lg-8"><input class=" btn btn-success" type="submit" value="Reset Email" required name="reset-submit"/><span class="help-block text-muted">after resetting, activation email will be sent to your new email Id.</span></div>
            <div class="col-lg-2"></div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
<?php
  include_once $TEMPLATE_URL.'body_footer.php';
?>