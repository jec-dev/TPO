<?php include_once 'login_config.php'; include_once $TEMPLATE_URL. 'head.php'; include_once $TEMPLATE_URL. 'body_header.php'; $err='' ; $success='' ; if(isset($_GET[ 'errno'])){ switch($_GET[ 'errno']){ case 1: $err='EMPTY VALUES PROVIDED!' ; break; case 2: $err='UNABLE TO REGISTER! QUERY ERROR. CONTACT TPO' ; break; case 3: $err='REGISTERED BUT UNABLE TO SEND EMAIL! CONTACT TPO' ; break; case 4: break; case 5: break; default: $err='UNKNOWN ERROR OCCOURED!' ; break; } } if(isset($_GET[ 'success'])){ $success='SUCCESSFULLY REGISTERED!' ; } ?>

<div class="container-fluid">
    <?php if($err!='' ): ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-danger alert-dismissible align-center">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="noshadow-heading align-center"><?php echo $err; ?></h4>
                <h5>YOUR IP IS BEING MONITORED</h5>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <?php elseif($success!='' ): ?>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible align-center">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
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
                <div class="col-sm-6">
                    <h1 style="margin-top: 4%">Registration</h1>
                    <label class="control-label">
                        IP Address :
                        <?php echo $_SERVER[ 'REMOTE_ADDR']; ?>
                    </label>
                    <span> - this form is being monitored for <i>false</i> registration</span>
                </div>
            </div>
        </div>
    </section>
    <!--/#title-->
    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <form class="form form-horizontal" method="POST" action="<?php echo $LOGIN_URL.'register_action.php'; ?>">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">Batch</label>
                                </div>
                                <div class="col-lg-4">
                                    <select class="form-control" name="batch" required>
                                        <option value="">Select Batch</option>
                                        <option value="2017" selected>2017</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">First Name</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="firstName" placeholder="First Name *" required/>
                                    <span class="help-block text-muted">Include your middle name in first name, if applicable</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">Last Name</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="lastName" placeholder="Last Name *" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">Roll Number</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="username" placeholder="Roll Number *" required/>
                                    <span class="help-block text-muted">This will be your username, do NOT use whitespaces</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">E-mail</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="email" name="email" placeholder="E-mail *" required/>
                                    <span class="help-block text-muted">This will be used for future communication</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">Security Question</label>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-control" name="securityQ" required>
                                        <option value="">Select Security Question</option>
                                        <option value="What is your mother''s maiden name?">What is your mother's maiden name?</option>
                                        <option value="What was your first mobile number?">What was your first mobile number?</option>
                                        <option value="Where is your birth place?">Where is your birth place?</option>
                                        <option value="Your dream company is?">Your dream company is?</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label class="control-label">Security Answer</label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="securityA" placeholder="Security Answer *" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-8">
                                    <input class="btn btn-success" type="submit" name="register-submit" value="Register" />
                                    <input class="btn btn-primary" type="reset" name="" />
                                    <span class="help-block text-muted">by registering you agree to share your details with us</span>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 well">
                <div class="well">
                    <h3 class="align-center">INSTRUCTIONS & GUIDELINES</h3>
                    <div class="alert alert-success">
                        <h5 class="align-center">USE MOZILLA FIREFOX OR GOOGLE CHROME ONLY</h5>
                    </div>
                    <div class="alert alert-danger">
                        <h5 class="align-center">DO NOT USE INTERNET EXPLORER</h5>
                    </div>
                    <div class="alert alert-warning">
                        <h5 class="align-center">FOLLOW THE INSTRUCTIONS PROVIDED ALONG WITH THE FORM</h5>
                    </div>
                    <div class="alert">
                        <h5 class="align-center">SAMPLE INPUT</h5>
                        <p class="">
                            Batch : <a class="alert-link" href="#">2017</a>
                            <br/>
                        </p>
                        <p class="">
                            First Name : <a class="alert-link" href="#">ASHOK KUMAR</a>
                            <br/>
                        </p>
                        <p class="">
                            Last Name : <a class="alert-link" href="#">PANDEY</a>
                            <br/>
                        </p>
                        <p class="">
                            Roll Number : <a class="alert-link" href="#">0201IT0000XX</a>
                            <br/>
                        </p>
                        <p class="">
                            E-mail : <a class="alert-link" href="#">yourself@domain.com</a>
                            <br/>
                        </p>
                        <p class="">
                            Security Question : <a class="alert-link" href="#">Your dream company is?</a>
                            <br/>
                        </p>
                        <p class="">
                            Security Answer : <a class="alert-link" href="#">BHEL</a>
                            <br/>
                        </p>
                    </div>
                    <div class="alert alert-info">
                        <h5 class="align-center">USE FOLLOWING LINKS FOR HELP & SUPPORT</h5>
                        <p class="">
                            E-mail : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>
                            <br/>
                        </p>
                        <p class="">
                            Get in touch with : <a class="alert-link" href="<?php echo $BASE_URL; ?>?page=contactus">Student Coordinators</a>
                        </p>
                        <p class="">
                            Get Reference by reading : <a class="alert-link" href="http://tpo.jec-jabalpur.org/v3/shared/TPOFormFillingprocedure.pdf" target="_blank">Registration Help Instructions (pdf)</a>
                            <br/>
                        </p>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-----container-fluid--- -->
</section>
<?php include_once $TEMPLATE_URL. 'body_footer.php'; ?>