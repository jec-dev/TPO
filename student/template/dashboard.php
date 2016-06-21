<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-top: 4%">Dashboard</h1>
                <p>See all the latest notice here.</p>
            </div>
        </div>
    </div>
</section>
<!--/#title-->


<section id="dashboard" class="container">
    <div class="row">
        <div class="col-sm-3">
            <h4 class="align-center" style="padding-top: 6%">USER INFORMATION</h4>
            <table class="table table-condensed table-hover">
                <tr>
                    <td>Roll Number</td>
                    <td>
                        <?php echo $_SESSION[ 'username']; ?>
                    </td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td>
                        <?php echo $_SESSION[ 'firstName']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <?php echo $_SESSION[ 'lastName']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Batch</td>
                    <td>
                        <?php echo $_SESSION[ 'batch']; ?>
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
                        <?php echo $_SESSION[ 'email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>IP Address</td>
                    <td>
                        <?php echo $_SERVER[ 'REMOTE_ADDR']; ?>
                    </td>
                </tr>
            </table>
            <h4 class="align-center">QUICK LINKS</h4>
            <div class="list-group align-center">
                <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=rules">Code of Conduct</a>
                <!-- <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=fillDetails">Fill Details</a>
                <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=printDetails">Print Details</a>
                <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=uploadPhoto">Upload Photo</a> -->
                <a class="list-group-item " href="<?php echo $LOGIN_URL; ?>logout.php">Logout</a>
            </div>
        </div>
        <!--/.col-sm-8-->
        <div class="col-sm-9">
            <div>
                <?php include_once $NOTICE_URL. 'noticeboard_student.php';?>
            </div>
        </div>
        <!--/.col-sm-4-->
    </div>
</section>