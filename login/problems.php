<?php
  include_once 'login_config.php';
  include_once $TEMPLATE_URL.'head.php';
  include_once $TEMPLATE_URL.'body_header.php';

  $err='';
  $success='';

  if(isset($_GET['errno'])){
    switch($_GET['errno']){
      case 1: $err='EMPTY VALUE ENTERED!'; break;
      case 2: $err='PROBLEM NOT SELECTED!'; break;
      case 3: $err='EMAIL NOT SENT! CONTACT TPO'; break;
      case 4: $err='DB QUERY ERROR! CONTACT TPO'; break;
      default: $err='UNKNOWN ERROR! CONTACT TPO'; break;
    }
  }

  if(isset($_GET['success'])){
    $success='EMAIL SENT SUCCESSFULLY!';
  }
?>

<div class="container-fluid">

<?php if($err!=''): ?>
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div class="alert alert-danger alert-dismissible align-center">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="noshadow-heading align-center"><?php echo $err; ?></h4>
        <p class="align-center">If this error is occouring frequently, contact tpo helpdesk : <a href="mailto:tpohelp@jec-jabalpur.org" class="alert-link">tpohelp@jec-jabalpur.org</a></p>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
<?php elseif($success!=''): ?>
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <div class="alert alert-success alert-dismissible align-center">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="noshadow-heading align-center"><?php echo $success; ?></h4>
        <h5>AN EMAIL HAS BEEN SENT TO YOUR REGISTERED EMAIL ID WITH FURTHER INSTRUCTIONS</h5>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
<?php endif; ?>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h2 style="margin-top: 4%">STUDENT LOGIN HELP</h2>
                <p>Get Help regarding various login problems.</p>
            </div>
        </div>
    </div>
</section>
<!--/#title-->
<section id="problems" class="container">
<div class="row" style="margin-top: 3%">
    <div class="col-sm-6">
            <form role="form" class="form form-horizontal" method="POST" action="<?php echo $LOGIN_URL.'problems_action.php'; ?>">
                <div class="form-group">
                    <div class="col-lg-4">
                        <label class="control-label">Batch</label>
                    </div>
                    <div class="col-lg-4">
                        <select class="form-control" name="batch" required>
                            <option value="" selected>Select Batch</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label class="control-label">Username(Roll Number)</label>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" type="text" name="username" required/>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label class="control-label">Activate</label>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="radio">
                                <!-- <label class="">
                                    <input class="" type="radio" name="problem-value" value="password" required />Forgot Password (2 step process)</label>
                            </div>
                            <div class="radio">
                                <label class="">
                                    <input class="" type="radio" name="problem-value" value="email" required />Wrong Recovery Email Entered</label>
                            </div>
                            <div class="radio">
                                <label class="">
                                    <input class="" type="radio" name="problem-value" value="security" disabled />Forgot Security Question/Answer (login required)</label>
                            </div> -->
                            <div class="radio">
                                <label class="">
                                    <input class="" type="radio" name="problem-value" value="activation" />Send Account Activation Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <input class="form-control btn btn-success" type="submit" value="Submit" name="problem-submit" />
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </form>
            <!-- <div class="align-center">
                <h4>2017 Batch Registration</h4>
                <p><a class="btn btn-primary" href="<?php echo $LOGIN_URL.'register.php'; ?>">Register</a>
                </p> -->
            </div>
        </div>
    </div>
</div>
</div>
</section>



<?php
  include_once $TEMPLATE_URL.'body_footer.php';
?>