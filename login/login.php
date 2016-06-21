<?php include_once 'login_config.php'; session_start(); session_destroy(); $sucess='' ; $errno='' ; $err="" ; if(isset($_GET[ 'success'])){ $success=$_GET[ 'success']; switch($success){ case 1: $success="PASSWORD CHANGED!" ; break; case 2: $success="EMAIL UPDATED SUCCESSFULLY!" ; break; case 3: $success="ACCOUNT ACTIVATED!" ; break; default: $err="WE ARE SMART! DON'T TRY US" ; } }else{ if(isset($_GET[ 'errno'])){ $errno=$_GET[ 'errno']; switch($errno){ case 1: $err="WRONG USERNAME/PASSWORD!" ; break; case 2: $err="LOGIN REQUIRED!" ; break; case 3: $err="INVALID ACCESS ATTEMPT!" ; break; case 4: $err="ERROR! TRY AGAIN" ; break; case 5: $err="INVALID VALUES PROVIDED!" ; break; case 6: $err="ACCOUNT DEACTIVATED!<br>ACTIVATE YOUR ACCOUNT<br><a href='$LOGIN_URL?page=problems'>Click here to activate</a>" ; break; default: $err="WE ARE SMART! DON'T TRY US" ; } }else{ header( 'location:'.$BASE_URL); } } include_once $TEMPLATE_URL. 'head.php'; include_once $TEMPLATE_URL. 'body_header.php'; ?>

<div class="container-fluid">
    <?php if($err!="" ): ?>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 well">
            <div class="alert alert-danger align-center ">
                <h2 class="noshadow-heading"><?php echo $err;?></h2>
                <p>If this error is occouring frequently, please contact TPO Helpdesk : <a href="mailto:tpo@jec-jabalpur.org">tpo@jec-jabalpur.org</a>
                </p>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <?php elseif($success!="" ): ?>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 well">
            <div class="alert alert-success align-center ">
                <h2 class="noshadow-heading"><?php echo $success;?></h2>
                <p>login to your account</p>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 well">
            <div class="well">
                <h2 class="align-center">STUDENT LOG-IN</h2>
                <form role="form" class="form form-horizontal" method="POST" action="<?php echo $LOGIN_URL; ?>">
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <label class="control-label">Batch</label>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-control" name="batch" required>
                                <option value="">Select Batch</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <label class="control-label">Username(Roll Number)</label>
                        </div>
                        <div class="col-lg-4">
                            <input class="form-control" type="text" name="username" required />
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <label class="control-label">Password</label>
                        </div>
                        <div class="col-lg-4">
                            <input class="form-control" type="password" name="password" required />
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <input class="form-control btn btn-success" type="submit" value="Log-in" required name="login-submit" />
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <div class="form-group align-center">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <label class="control-label">Having trouble loging-in? <a href="<?php echo $LOGIN_URL; ?>?page=problems">Click here</a> for help.</label>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </form>
                <div class="align-center">
                    <h4>2016 Batch Registration</h4>
                    <p><a class="btn btn-primary" href="<?php echo $LOGIN_URL; ?>register.php">Register</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>


<?php include_once $TEMPLATE_URL. 'body_footer.php'; ?>