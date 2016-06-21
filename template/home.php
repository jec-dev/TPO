<?php /*------------------------------------------------------------- This is used to issue urget and important messages "Automatically" after fetching notice level --------------------------------------------------------------*/ ?>
<section id="homePage" class="container" style="color: #fff background: none repeat scroll 0% 0% #1C0132">
    <div class="row">
        <div class="col-sm-3">
            <form class="form-signin" role="form" action="<?php echo $LOGIN_URL;?>" method="POST">
                <fieldset>
                    <h4 class="form-signin-heading align-center" style="padding-top: 6%">STUDENT LOG-IN</h4>
                    <div class="form-group">
                        <select class="form-control" name="batch" required>
                            <option value="">Select Batch</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Roll Number" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" value="Log-in " name="login-submit" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Having trouble loging-in? <a href="<?php echo $LOGIN_URL; ?>?page=problems">Click here</a> for help.</label>
                    </div>
                </fieldset>
            </form>
            <div class="align-center">
                <h4>2017 Batch Campus</h4>
                <!-- <p class="btn btn-primary">Registrations Closed !</p> -->
                <p> <a class="btn btn-primary" href="<?php echo $LOGIN_URL.'register.php'; ?>">Register  Here</a> </p>
                <h5 class="contact">Registration process: <a href="./shared/tpo_registration_guide.pdf" target="_TAB">Click Here</a></h5>
                <h5 class="contact">Sample verification form: <a href="./shared/sample_verification_form.pdf" target="_TAB">Click Here</a></h5>
                
            </div>
        </div>
        <!--/.col-sm-6-->
        <div class="col-sm-9">
            <div class="col-lg-12 col-md-9 col-xs-12 visible-lg visible-md hidden-xs hidden-sm">
                <div>
                    <?php include_once $NOTICE_URL. 'noticeboard_default.php'; ?>
                    <h4>Click <b><a href="http://goo.gl/forms/FtqgTs0t6w" target="_blank">here</a></b> to fill the form for volunteering in campus drives</h4>                    
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-xs-12 hidden-lg hidden-md visible-xs visible-sm">
                <div class="col-sm-10">
                   <?php include_once $NOTICE_URL. 'noticeboard_mobile.php'; ?>
                                                          <h4>Click <b><a href="http://goo.gl/forms/FtqgTs0t6w" target="_blank">here</a></b> to fill the form for volunteering in campus drives</h4>  
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 5%">
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center gap">
                            <h2>Why choose JEC?</h2>
                            <p>JEC was established as the Government Engineering College, Jabalpur on 7 July 1947, during the British rule in India, making it the oldest engineering institute of central India and among the oldest engineering colleges in India. The TPO team active since 1970's take utmost care in providing the students career based trainings and making them Industry ready.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-star icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading"> Min 45 Days Ind. Training </h3>
                                <p>During the even semester break students undergo Summer Internships and Vocational training at various Industries in India and abroad. By the end of III year every student has got a minimum 45 days of Industry exposure in his area of epxertise.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-time icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Employability Tests</h3>
                                <p>We conduct frequent employability and assessment tests at college to prepare students for campus placemenets. Since its inagural we have seen a sharp spike in our placements.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-road icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Sessions by Ind. Experts</h3>
                                <p>Various companies visit our campus all round the year for interaction sessions with the students and guide them with the latest trends and technologies. Students have a beforehand knowledge about the industry needs.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                </div>
                <!--/.row-->
                <div class="gap"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-plane icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">High End Laboratories</h3>
                                <p>The departments are equipped with high end lab facilities. High Voltage Lab, Electrical Dept. has been awarded as Centre of Excellence by Indian Govt. and is one of its kind in India. Labs at Civil and Mechanical dept. are used by Govt. for various testing purposes. COmputer Science dept. has over 350 computers with 100Mbps Internet facility.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-globe icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Alumni Interaction Meets</h3>
                                <p>Being one of the oldest college in Central India we have a strong alumni base. Our alumni from all round the globe come and deliver Workshops & Seminars on various trending topics and also share their experiences with the students.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="pull-left">
                                <i class="icon-list icon-md"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">More than academics</h3>
                                <p>We have a wide spectrum of students in excelling in different fieldsets. Our students have presented papers at International level, cleared Google Summer of Code, are inerns at Top International Universities, winners of National Level Sports and Clutural Championships. JEC provides a platform for overall development of students thus providing them exposure with brighter career oppurtunities.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                </div>
                <!--/.row-->
            </div>
        </section>
        <!--/#services-->
    </div>
</section>
<script type="text/javascript">
var homePage = document.getElementById("homePage");
homePage.parentNode.style.background = "#170020";
homePage.parentNode.style.color = "#fff";
</script>