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
        $err="PASSWORD CANNOT BE EMPTY";
        break;
      }
      $_POST[$key]=$value;
    }

    $batch = $_POST['batch'];
    $username= $_POST['username'];
    $newPassword = $_POST['password'];
    $newPasswordConfirm = $_POST['passwordConfirm'];

    if($err==''){
      if($newPassword!=$newPasswordConfirm){
        $err='PASSWORD MISMATCH';
      }else{
        $dbConn = openDB($batch);
        $password_hash = md5($newPassword);
        $sql = "UPDATE `login` SET `password`='$newPassword', `password_hash`= '$password_hash' WHERE `username` LIKE '$username'";
        $r = mysqli_query($dbConn,$sql) or die('DB Query Error!');
        closeDB($dbConn);

        if(!$r){
          $err='ERROR UPDATING PASSWORD! TRY AGAIN';
        }else{
          header('location:'.$LOGIN_URL.'login.php?success=1');
          exit(0);
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
        <h2 class="align-center">RESET PASSWORD</h2>
        <form role="form" class="form form-horizontal" method="POST" action="">
          <div class="form-group">
            <div class="col-lg-2"></div>
            <div class="col-lg-4"><label class="control-label">Batch</label></div>
            <div class="col-lg-4"><input class="form-control" type="text" name="batch" value="<?php echo $batch; ?>" readonly required /></div>
            <div class="col-lg-2"></div>
          </div>
          <div class="form-group">
            <div class="col-lg-2"></div>
            <div class="col-lg-4"><label class="control-label">Username(Roll Number)</label></div>
            <div class="col-lg-4"><input class="form-control" type="text" name="username" value="<?php echo $username; ?>" readonly required /></div>
            <div class="col-lg-2"></div>
          </div>
          <div class="form-group">
            <div class="col-lg-2"></div>
            <div class="col-lg-4"><label class="control-label">New Password</label></div>
            <div class="col-lg-4"><input class="form-control" type="password" name="password" required /></div>
            <div class="col-lg-2"></div>
          </div>
          <div class="form-group">
            <div class="col-lg-2"></div>
            <div class="col-lg-4"><label class="control-label">Cofirm New Password</label></div>
            <div class="col-lg-4"><input class="form-control" type="password" name="passwordConfirm" required /></div>
            <div class="col-lg-2"></div>
          </div>
          <div class="form-group">
            <div class="col-lg-2"></div>
            <div class="col-lg-8"><input class=" btn btn-success" type="submit" value="Reset Password" required name="reset-submit"/><span class="help-block text-muted">logged-out, you will be required to log-in again.</span></div>
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