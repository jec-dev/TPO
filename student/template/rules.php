<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-top: 4%">Code of Conduct</h1>
                <p>The students must agree to the below rules to be able to sit in Campus activities.</p>
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
                <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=fillDetails">Fill Details</a>
                <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=printDetails">Print Details</a>
                <a class="list-group-item " href="<?php echo $STUDENT_URL; ?>?page=uploadPhoto">Upload Photo</a>
                <a class="list-group-item " href="<?php echo $LOGIN_URL; ?>logout.php">Logout</a>
            </div>
        </div>
        <!--/.col-sm-8-->
        <div class="col-sm-9">
            <div>
                <p>
                <h1 class="align-center">Rules and Regulations </h1>
            </p>
            <br>
            <ol>
                <li>Students getting two or more offers in Day ONE shared companies will not be allowed to appear in any further IT  service companies. However, such students will  be allowed to appear in core companies campus placement drives until they get at least one offer from core companies.
                    <ul>
  <li>Core companies are the companies which allow the students only from specific branch.</li>
  <li>IT Service Companies are the companies which allow the students irrespective of their branch.</li>
  </ul>
                </li>
                <br>
                <li>The students having two offers in IT service companies will be allowed to appear in further IT service companies placement drive if the compensation of the said company is more than or equal to 4.5 lakh/annum.</li>
                <br>
                <li>Students are advised to refrain from posting any comment related to campus activities in any social/public platform/forum. If any student is found violating this will not be allowed to participate in any TPO activities. Further, in case of the students, even after leaving the campus after the completion of their degree is found violating the same, the TPO office will be free to take action(s) which may result in the student ending up losing his/her job.</li>
                <br>
                <li>All the notices regarding TPO activities will be uploaded only on TPO portal. No separate SMS will be sent. Therefore, you are requested to visit TPO portal at least 4-5 times per day.</li>
                <br>
                <li>You cannot leave the process in between for what so ever reasons. In case of any exception, you will have to present your case personally to the TPO.</li>
                <br>
                <li>Student must bring their Enrollment ID Card / Smart Card on the due campus drive date.</li>
                <br>
                <li>In case of any discrepancy the decision of TPO shall be considered final.</li>
                <br>
                <li>A student who applies and gets shortlisted is bound to go through the entire selection process unless rejected midway by the company. Any student who withdraws deliberately or otherwise in the middle of a selection process  will be disallowed from placement for the rest of the academic year.</li>
                <br>
                <li>Late comers for the aptitude test/GD/Interview may not be allowed to appear for the selection process.</li>
                <br>
                <li>DRESS CODE: Students must be formally dressed whenever students participate in any interaction including PPT with a company. This office reserves the right to refuse permission to a student to attend the selection process/PPT, if he/she is not formally dressed.</li>
                <br>
                <li>DRESS CODE for Volunteers: Volunteers must be formally dressed at the time of campus activities. </li>
                <br>
                
                <li>Failing to abide by the rules laid, the student will be debarred from the TPO activities and any offer what so ever will be scrapped.</li>
                <br>

                  </ol>
            </div>
        </div>
        <!--/.col-sm-4-->
    </div>
</section>