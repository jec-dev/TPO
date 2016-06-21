<?php
  $formpage=0;
  if(isset($_GET['formpage'])){
    $formpage=$_GET['formpage'];
  }

  $rollno=$_SESSION['username'];
  $batch=$_SESSION['batch'];

  if($formpage==0):
?>
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1 style="margin-top: 4%">FILL DETAILS</h1>
                <p>Read Instructions carefully for filling the form.</p>
            </div>
        </div>
    </div>
</section>
<!--/#title-->
 <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="push"></div>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 well">
        <div class="alert alert-info">
            <h4>INSTRUCTIONS FOR FILLING DETAILS FORM</h4>
            <p>
                <h6>Read the instructions carefully before filling the form:</h6>
                <ul>
                    <li>Fields marked with asterisk (*) are mandatory.</li>
                    <li>Use 'NA' where-ever applicable.</li>
                    <li>More instructions are provided in REMARK sections for help.</li>
                    <li>Do <b>NOT</b> use small devices (mobile, tablet etc) for filling this form.</li>
                    <li>Do <b>NOT</b> fill characters in places where numbers are required (e.g. Eye Power)</li>
                    <li>Details of a page are saved when <b>NEXT</b> is clicked.</li>
                    <li>Details can be edited/modified any number of times before submitting the form.</li>
                </ul>
            </p>

            <ul class="pager visible-desktop">
                <li><a class="" href="?page=fillDetails&formpage=1">Fill Details Form &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="push"></div>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php
  /*---------------------------------------------------------------------------------------------------------------
  This is page 1 for form.
  ----------------------------------------------------------------------------------------------------------------*/

  elseif($formpage==1):

  $dbConn = openDB($batch);
  $sql = "SELECT
    `FName`,
    `MName`,
    `LName`,
    `fatherName`,
    `fatherOccupation`,
    `motherName`,
    `motherOccupation`,
    `familyIncome`,
    `willing`,
    `dob`,
    `gender`,
    `course`,
    `branch`,
    `entryLevel`,
    `category`,
    `generalRank`,
    `categoryRank`,
    `admissionYear`,
    `university`,
    `passingYear`,
    `mes`,
    `semCurrent`,
    `dropYear`,
    `formLock`,
    `page1Saved`
      FROM `student` WHERE `rollno` LIKE '$rollno'";
  $r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
  $data = mysqli_fetch_assoc($r);
  if(count($data)<2){
    die('DB Error! No Values found for the given user');
  }
  closeDB($dbConn);

  $FName=$data['FName'];
  $MName=$data['MName'];
  $LName=$data['LName'];
  $fatherName=$data['fatherName'];
  $fatherOccupation=$data['fatherOccupation'];
  $motherName=$data['motherName'];
  $motherOccupation=$data['motherOccupation'];
  $familyIncome=$data['familyIncome'];
  $willing=$data['willing'];
  $dob=$data['dob'];
  $gender=$data['gender'];
  $course=$data['course'];
  $branch=$data['branch'];
  $entryLevel=$data['entryLevel'];
  $category=$data['category'];
  $generalRank=$data['generalRank'];
  $categoryRank=$data['categoryRank'];
  $admissionYear=$data['admissionYear'];
  $passingYear=$data['passingYear'];
  $university=$data['university'];
  $mes=$data['mes'];
  $semCurrent=$data['semCurrent'];
  $dropYear=$data['dropYear'];
  $formLock=$data['formLock'];
  $page1Saved=$data['page1Saved'];
?>
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 well">
        <div class="well">
            <h4>TPO - DETAILS FORM - PAGE 1</h4>
            <div class="table-responsive">
                <form class="form form-horizontal" method="POST" action="">
                    <fieldset <fieldset <?php if($formLock==1 && $page1Saved==1){echo 'disabled'; } ?> >
                        <table class="table table-condensed table-hover table-bordered">
                            <tbody>
                                <tr class="table-section-head">
                                    <td colspan=4>Personal Details<span class="help-block table-section-head-muted">as per marksheets</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">ROLL NUMBER</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="rollno" value="<?php echo $rollno; ?>" disabled required/>
                                    </td>
                                    <td>
                                        <label class="control-label">BATCH</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="Last Name *" name="batch" value="<?php echo $batch; ?>" disabled required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">FULL NAME</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="First Name *" name="FName" value="<?php echo $FName; ?>" required/>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="Middle Name" name="MName" value="<?php echo $MName; ?>" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="Last Name *" name="LName" value="<?php echo $LName; ?>" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">FATHER'S NAME</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="fatherName" placeholder="Father's Name *" value="<?php echo $fatherName; ?>" required/>
                                    </td>
                                    <td>
                                        <label class="control-label">MOTHER'S NAME</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="motherName" placeholder="Mother's Name *" value="<?php echo $motherName; ?>" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">FATHER'S OCCUPATION</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="fatherOccupation" placeholder="Father's Occupation *" value="<?php echo $fatherOccupation; ?>" required/>
                                    </td>
                                    <td>
                                        <label class="control-label">MOTHER'S OCCUPATION</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="motherOccupation" placeholder="Mother's Occupation *" value="<?php echo $motherOccupation; ?>" required/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label class="control-label">FAMILY'S ANNUAL INCOME</label>
                                    </td>
                                  <td>
                                      <select class="form-control" type="text" placeholder="Family's Annual Income *" name="familyIncome" required>
                                          <option value="" <?php if($familyIncome=='' ){echo 'selected';} ?> >Select Income</option>
                                          <option value="200000" <?php if($familyIncome=='200000' ){echo 'selected';} ?>>Less than 2 LAKHS</option>
                                          <option value="300000" <?php if($familyIncome=='300000' ){echo 'selected';} ?>>Between 2 - 3 LAKHS</option>
                                          <option value="500000" <?php if($familyIncome=='500000' ){echo 'selected';} ?>>Between 3 - 5 LAKHS</option>
                                          <option value="600000" <?php if($familyIncome=='600000' ){echo 'selected';} ?>>Above 5 LAKHS</option>
                                      </select>
                                    </td>
                                    <td>
                                        <label class="control-label">COMPANY PREFERENCE</label>
                                        <p>You will be allowed only to sit in company you have preferred.</p>
                                    </td>
                                    <td>
                                        <select class="form-control" type="text" placeholder="Select Company Type *" name="willing" required>
                                            <option value="" <?php if($willing=='' ){echo 'selected';} ?> >Select Company Type</option>
                                            <option value="1" <?php if($willing=='1' ){echo 'selected';} ?> >Both SeRvice and Core</option>
                                            <option value="2" <?php if($willing=='2' ){echo 'selected';} ?>>Only Service</option>
                                            <option value="3" <?php if($willing=='3' ){echo 'selected';} ?>>Only Core</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">DATE OF BIRTH</label><span class="help-block table-section-head-muted">format: yyyy-mm-dd</span>
                                    </td>
                                    <td>
                                        <input class="form-control datepicker" type="date" placeholder="YYYY-MM-DD Format *" name="dob" value="<?php echo $dob; ?>" required/>
                                    </td>
                                    <td>
                                        <label class="control-label">GENDER</label>
                                    </td>
                                    <td>
                                        <select class="form-control" type="text" placeholder="Last Name *" name="gender" required>
                                            <option value="" <?php if($gender=='' ){echo 'selected';} ?> >Select Gender</option>
                                            <option value="Male" <?php if($gender=='MALE' ){echo 'selected';} ?>>Male</option>
                                            <option value="Female" <?php if($gender=='FEMALE' ){echo 'selected';} ?>>Female</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="table-section-head">
                                    <td colspan=4>Current Academic Details<span class="help-block table-section-head-muted">Current Degree Details</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">COURSE</label><span class="help-block table-section-head-muted">current degree</span>
                                    </td>
                                    <td>
                                        <select class="form-control" name="course" required>
                                            <option value="" <?php if($course=='' ){echo 'selected';} ?> >Select Course</option>
                                            <option value="BE" <?php if($course=='BE' ){echo 'selected';} ?> >BE</option>
                                            <option value="ME" <?php if($course=='ME' ){echo 'selected';} ?> >ME</option>
                                            <option value="MCA" <?php if($course=='MCA' ){echo 'selected';} ?> >MCA</option>
                                            <option value="MSc" <?php if($course=='MSC' ){echo 'selected';} ?> >MSc</option>
                                    </td>
                                    <td>
                                        <label class="control-label">BRANCH</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="branch" required>
                                            <option value="" <?php if($branch=='' ){echo 'selected';} ?> >Select Branch</option>
                                            <option value="CSE" <?php if($branch=='CSE' ){echo 'selected';} ?> >Computer Science & Engineering</option>
                                            <option value="Civil" <?php if($branch=='CIVIL' ){echo 'selected';} ?> >Civil Engineering</option>
                                            <option value="Electrical" <?php if($branch=='ELECTRICAL' ){echo 'selected';} ?> >Electrical Engineering</option>
                                            <option value="E&TC" <?php if($branch=='E&TC' ){echo 'selected';} ?> >Electronics & Telecomm Engineering </option>
                                            <option value="IP" <?php if($branch=='IP' ){echo 'selected';} ?> >Industrial & Prod Engineering</option>
                                            <option value="IT" <?php if($branch=='IT' ){echo 'selected';} ?> >Information Technology</option>
                                            <option value="Mechanical" <?php if($branch=='MECHANICAL' ){echo 'selected';} ?> >Mechanical Engineering</option>
                                            <option value="MCA" <?php if($branch=='MCA' ){echo 'selected';} ?> >Computer Application</option>
                                            <option value="Maths" <?php if($branch=='MATHS' ){echo 'selected';} ?> >Applied Maths</option>
                                            <option value="Chemistry" <?php if($branch=='CHEMISTRY' ){echo 'selected';} ?> >Applied Chemistry</option>
                                            <option value="Physics" <?php if($branch=='PHYSICS' ){echo 'selected';} ?> >Applied Physics</option>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">ENTRY LEVEL</label><span class="help-block table-section-head-muted">exam cleared / quota used</span>
                                    </td>
                                    <td>
                                        <select class="form-control" name="entryLevel" required>
                                            <option value="" selected>Select Level</option>
                                            <option value="EL0" <?php if($entryLevel=="EL0" ){echo 'selected';}?> >Level 0</option>
                                            <option value="EL1" <?php if($entryLevel=="EL1" ){echo 'selected';}?> >Level 1</option>
                                            <option value="EL2" <?php if($entryLevel=="EL2" ){echo 'selected';}?> >Level 2</option>
                                    </td>

                                    <td class="text-muted" colspan="2">
                                        <ul class="sample">
                                            <li><b>Level 0:</b> JEE-Mains/PET/NRI/State Quota/College Level BE-BTech Counselling</li>
                                            <li><b>Level 1:</b> Lateral Entry/Diploma Entry</li>
                                            <li><b>Level 2:</b> GATE/College Level ME-MTech Counselling/MCA Counselling/MSc Counselling</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">Category</label><span class="help-block table-section-head-muted">Fill category: GEN, OBC, SC/ST</span>
                                    </td>                       
                                    <td>
                                        <select class="form-control" name="category" required>                                        
                                            <option value="GEN" <?php if($category=='GEN'){echo 'selected';} ?>>GEN</option>
                                            <option value="OBC" <?php if($category=='OBC'){echo 'selected';} ?>>OBC</option>
                                            <option value="SC" <?php if($category=='SC'){echo 'selected';} ?>>SC</option>
                                            <option value="ST" <?php if($category=='ST'){echo 'selected';} ?>>ST</option>
                                        </select>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <label class="control-label">PET Rank (General)</label><span class="help-block table-section-head-muted">Fill your PET general category rank</span>
                                    </td>                       
                                    <td>
                                        <input class="form-control" type="text" name="generalRank" placeholder="PET General Rank" value="<?php echo $generalRank; ?>" required/>
                                    </td>
                                </tr>       
                                <tr>
                                    <td>
                                        <label class="control-label">PET Rank (Category)</label><span class="help-block table-section-head-muted">Fill your PET "Category" rank (if applicable)</span>
                                    </td>                       
                                    <td>
                                        <input class="form-control" type="text" name="categoryRank" placeholder="PET Category Rank" value="<?php echo $categoryRank; ?>"/>
                                    </td>
                                </tr>   -->                                                      
                                <tr>
                                    <td>
                                        <label class="control-label">ADMISSION YEAR</label><span class="help-block table-section-head-muted">for current degree</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="admissionYear" placeholder="Admission Year *" value="<?php echo $admissionYear; ?>" required />
                                    </td>
                                    <td>
                                        <label class="control-label">PASSING YEAR</label><span class="help-block table-section-head-muted">tentative</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="passingYear" placeholder="Passing Year *" value="<?php echo $passingYear; ?>" required />
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">UNIVERSITY</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="university" required>
                                            <option value="" <?php if($university=='' ){echo 'selected';} ?> >Select University</option>
                                            <option value="RGPV" <?php if($university=='RGPV' ){echo 'selected';} ?> >RGPV Bhopal</option>
                                            <option value="RDVV" <?php if($university=='RDVV' ){echo 'selected';} ?> >RDVV Jabalpur</option>
                                        </select>
                                    </td>
                                    <td>
                                        <label class="control-label">CURRENT SEMESTER</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="semCurrent" required />
                                        <option value="" <?php if($semCurrent==0){echo 'selected';} ?>>Select Semester</option>
                                        <option value="1" <?php if($semCurrent==1){echo 'selected';} ?>>1</option>
                                        <option value="2" <?php if($semCurrent==2){echo 'selected';} ?>>2</option>
                                        <option value="3" <?php if($semCurrent==3){echo 'selected';} ?>>3</option>
                                        <option value="4" <?php if($semCurrent==4){echo 'selected';} ?>>4</option>
                                        <option value="5" <?php if($semCurrent==5){echo 'selected';} ?>>5</option>
                                        <option value="6" <?php if($semCurrent==6){echo 'selected';} ?>>6</option>
                                        <option value="7" <?php if($semCurrent==7){echo 'selected';} ?>>7</option>
                                        <option value="8" <?php if($semCurrent==8){echo 'selected';} ?>>8</option>
                                        <option value="9" <?php if($semCurrent==9){echo 'selected';} ?>>Passed College</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">DROP YEARS</label><span class="help-block table-section-head-muted">number of years dropped before current degree</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="dropYear" placeholder="Years Dropped *" value="<?php echo $dropYear; ?>" />
                                    </td>
                                    <td>
                                        <label class="control-label">MASTER'S SPECIALIZATION</label><span class="help-block table-section-head-muted">enter full name or use NA otherwise</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="mes" placeholder="ME Specialization *" value="<?php echo $mes; ?>" required />
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="pager visible-desktop align-center">
                                        <input class="btn btn-primary" type="reset" value="Reset" />
                                        <!-- <input class="btn btn-success" type="submit" name="tpoform-page1-submit" value="Save & Next" formaction="?page=fillDetails&formpage=2" /> -->
                                    	<input class="btn btn-success" type="submit" name="tpoform-page1-submit" value="Save & Next" formaction="?page=fillDetails&formpage=2"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
            <ul class="pager visible-desktop">
                <li><a class="" href="?page=fillDetails&formpage=2">Page 2 &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
  /*---------------------------------------------------------------------------------------------------------------
  This is page 2 for form. *NOTE: I've edited this for initial registration process of 2017 batch. PLease correct it for complete process*
  ----------------------------------------------------------------------------------------------------------------*/
  elseif($formpage==2):

  $dbConn = openDB($batch);
  $err = "";
  $success="";
  $err_cause="";
  //$d=array();

  if(isset($_POST['tpoform-page1-submit'])){

    foreach($_POST as $key=>$value){
      $value=trim(strtoupper($value));
      if($value=="" && $key!="MName"){
        $err = "EMPTY VALUES! PAGE 1 - VALUES NOT SAVED!";
        break;
      }else{
        $_POST[$key]=$value;
      }
    }

    //$d = $_POST;

    if($err==""){

      $FName=$_POST['FName'];
      $MName=$_POST['MName'];
      $LName=$_POST['LName'];
      $fatherName=$_POST['fatherName'];
      $fatherOccupation=$_POST['fatherOccupation'];
      $motherName=$_POST['motherName'];
      $motherOccupation=$_POST['motherOccupation'];
      $familyIncome=$_POST['familyIncome'];
      $willing=$_POST['willing'];
      $dob=$_POST['dob'];
      $gender=$_POST['gender'];
      $course=$_POST['course'];
      $branch=$_POST['branch'];
      $entryLevel=$_POST['entryLevel'];
      $category=$_POST['category'];
      $generalRank=$_POST['generalRank'];
      $categoryRank=$_POST['categoryRank'];
      $admissionYear=$_POST['admissionYear'];
      $passingYear=$_POST['passingYear'];
      $university=$_POST['university'];
      $mes=$_POST['mes'];
      $semCurrent=$_POST['semCurrent'];
      $dropYear=$_POST['dropYear'];


      $sql1="UPDATE `student` SET
        `FName`='$FName',
        `MName`='$MName',
        `LName`='$LName',
        `fatherName`='$fatherName',
        `fatherOccupation`='$fatherOccupation',
        `motherName`='$motherName',
        `motherOccupation`='$motherOccupation',
        `familyIncome`='$familyIncome',
        `willing`='$willing',
        `dob`='$dob',
        `gender`='$gender',
        `course`='$course',
        `branch`='$branch',
        `entryLevel`='$entryLevel',
        `category`='$category',
	`generalRank`='$generalRank',
	`categoryRank`='$categoryRank',
        `admissionYear`=$admissionYear,
        `passingYear`=$passingYear,
        `university`='$university',
        `mes`='$mes',
        `semCurrent`=$semCurrent,
        `dropYear`=$dropYear,
        `page1Saved`=1
        WHERE `rollno` LIKE '$rollno' ";

      $r1 = mysqli_query($dbConn,$sql1);

     $sql2="UPDATE `selection` SET
        `FName`='$FName',
        `MName`='$MName',
        `LName`='$LName',
        `gender`='$gender',
        `course`='$course',
        `branch`='$branch',
        `mes`='$mes'
        WHERE `rollno` LIKE '$rollno' ";

      $r2 = mysqli_query($dbConn,$sql2);

      if(!$r1 & !$r2 ){
        $err = "QUERY ERROR! PAGE 1 - VALUES NOT SAVED!";
        $err_cause = mysqli_error($dbConn);
      }
    }

    $success= "PAGE 1  -  VALUES SAVED!";

  }

  $sql = "SELECT
    `sem1sgpa`,
    `sem2sgpa`,
    `sem3sgpa`,
    `sem4sgpa`,
    `sem5sgpa`,
    `sem6sgpa`,
    `sem7sgpa`,
    `sem8sgpa`,
    `sem1credits`,
    `sem2credits`,
    `sem3credits`,
    `sem4credits`,
    `sem5credits`,
    `sem6credits`,
    `sem7credits`,
    `sem8credits`,
    `cgpa`,
    `percentage`,
    `backlogTotal`,
    `backlogCleared`,
    `backlogCurrent`,
    `failYear`,
    `semCurrent`,
    `minorTraining`,
    `minorProject`,
    `formLock`,
    `page2Saved`
      FROM `student` WHERE `rollno` LIKE '$rollno'";
  $r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
  $data = mysqli_fetch_assoc($r);
  if(count($data)<2){
    die('DB Error! No Values found for the given user');
  }
  closeDB($dbConn);

  $sem1sgpa=$data['sem1sgpa'];
  $sem2sgpa=$data['sem2sgpa'];
  $sem3sgpa=$data['sem3sgpa'];
  $sem4sgpa=$data['sem4sgpa'];
  $sem5sgpa=$data['sem5sgpa'];
  $sem6sgpa=$data['sem6sgpa'];
  $sem7sgpa=$data['sem7sgpa'];
  $sem8sgpa=$data['sem8sgpa'];
  $sem1credits=$data['sem1credits'];
  $sem2credits=$data['sem2credits'];
  $sem3credits=$data['sem3credits'];
  $sem4credits=$data['sem4credits'];
  $sem5credits=$data['sem5credits'];
  $sem6credits=$data['sem6credits'];
  $sem7credits=$data['sem7credits'];
  $sem8credits=$data['sem8credits'];
  $cgpa=$data['cgpa'];
  $percentage=$data['percentage'];
  $backlogTotal=$data['backlogTotal'];
  $backlogCleared=$data['backlogCleared'];
  $backlogCurrent=$data['backlogCurrent'];
  $failYear=$data['failYear'];
  $semCurrent=$data['semCurrent'];
  $minorProject=$data['minorProject'];
  $minorTraining=$data['minorTraining'];
  $formLock=$data['formLock'];
  $page2Saved=$data['page2Saved'];
  
  if($err!=""):
?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $err; ?></h3>
      <h5 class="align-center noshadow-heading"><?php echo $err_cause; ?></h5>
      <p><ul>
        <li>Values entered in page 1 have <b>NOT</b> been saved.</li>
        <li>Go back to page 1. You may close this message by clicking the 'close' (x) on the right side.</li>
        <li>If this error is occouring frequently contact TPO Helpdesk : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>.</li>
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php elseif($success!=""): ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $success; ?></h3>
      <p><ul>
        <li>Values entered in page 1 have been saved successfully.</li>
        <li>Continue filling page 2. You may close this message by clicking the 'close' (x) on the right side.
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php endif; ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 well">
    <div class="well">
        <h4>TPO - DETAILS FORM - PAGE 2</h4>
        <div class="table-responsive">
        <form class="form form-horizontal" method="POST" action=""><fieldset <fieldset <?php if($page1Saved==1){echo 'disabled'; } ?> >
          <table class="table table-condensed table-hover table-bordered">
          <tbody>
            <tr class="table-section-head"><td colspan=4>Semester-wise SGPA-Credit Details<span class="help-block table-section-head-muted">Current Marks Details</span></td></tr>
            <tr class="align-center">
              <td><span class="help-block table-section-head-muted">fill page 1 to enable further pages</span></td>
              <td><label class="control-label">SGPA</label></td>
              <td><label class="control-label">CREDITS</label></td>
              <td rowspan=9>
                <span class="help-block table-section-head-muted">(for office use)</span>
              </td>
            </tr>
            <tr class="">

							<td><label class="control-label">SEMESTER I</label><span class="help-block table-section-head-muted">fill 0 (zero) for lateral entry</span></td>

							
							<td><input <?php if(!($semCurrent>1)){ echo 'readonly'; } ?> type="text" class="form-control" name="sem1sgpa" placeholder="Semester 1 SGPA *" value="<?php echo $sem1sgpa; ?>"/></td>
							<td><input <?php if(!($semCurrent>1)){ echo 'readonly'; } ?> type="text" class="form-control" name="sem1credits" placeholder="Semester 1 CREDITS *" value="<?php echo $sem1credits; ?>"/></td>
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER II</label><span class="help-block table-section-head-muted">fill 0 (zero) for lateral entry</span></td>
							<td><input <?php if(!($semCurrent>2)){ echo 'readonly'; }?> type="text" class="form-control" name="sem2sgpa" placeholder="Semester 2 SGPA *" value="<?php echo $sem2sgpa; ?>"/></td>
							<td><input <?php if(!($semCurrent>2)){ echo 'readonly'; }?> type="text" class="form-control" name="sem2credits" placeholder="Semester 2 CREDITS *" value="<?php echo $sem2credits; ?>"/></td>
							
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER III</label><span class="help-block table-section-head-muted">fill 0 (zero) for PG Course</span></td>
							<td><input  <?php if(!($semCurrent>3)){ echo 'readonly'; }?> type="text" class="form-control" name="sem3sgpa" placeholder="Semester 3 SGPA *" value="<?php echo $sem3sgpa; ?>"/></td>
							<td><input  <?php if(!($semCurrent>3)){ echo 'readonly'; }?> type="text" class="form-control" name="sem3credits" placeholder="Semester 3 CREDITS *" value="<?php echo $sem3credits; ?>""/></td>
							
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER IV</label><span class="help-block table-section-head-muted">fill 0 (zero) for PG Course</span></td>
							<td><input  <?php if(!($semCurrent>4)){ echo 'readonly'; }?> type="text" class="form-control" name="sem4sgpa" placeholder="Semester 4 SGPA *" value="<?php echo $sem4sgpa; ?>"/></td>
							<td><input  <?php if(!($semCurrent>4)){ echo 'readonly'; }?> type="text" class="form-control" name="sem4credits" placeholder="Semester 4 CREDITS *" value="<?php echo $sem4credits; ?>"/></td>
							
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER V</label><span class="help-block table-section-head-muted">fill 0 (zero) for PG Course</span></td>
							<td><input  <?php if(!($semCurrent>5)){ echo 'readonly'; }?> type="text" class="form-control" name="sem5sgpa" placeholder="Semester 5 SGPA *" value="<?php echo $sem5sgpa; ?>"/></td>
							<td><input  <?php if(!($semCurrent>5)){ echo 'readonly'; }?> type="text" class="form-control" name="sem5credits" placeholder="Semester 5 CREDITS *" value="<?php echo $sem5credits; ?>"/></td>
							
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER VI</label><span class="help-block table-section-head-muted">fill 0 (zero) for PG Course</span></td>
							<td><input  <?php if(!($semCurrent>6)){ echo 'readonly'; }?> type="text" class="form-control" name="sem6sgpa" placeholder="Semester 6 SGPA *" value="<?php echo $sem6sgpa; ?>"/></td>
							<td><input  <?php if(!($semCurrent>6)){ echo 'readonly'; }?> type="text" class="form-control" name="sem6credits" placeholder="Semester 6 CREDITS *" value="<?php echo $sem6credits; ?>"/></td>
							
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER VII</label><span class="help-block table-section-head-muted">fill 0 (zero) for PG course</span></td>
							<td><input  <?php if(!($semCurrent>7)){ echo 'readonly'; }?> type="text" class="form-control" name="sem7sgpa" placeholder="Semester 7 SGPA *" value="<?php echo $sem7sgpa; ?>"/></td>
							<td><input  <?php if(!($semCurrent>7)){ echo 'readonly'; }?> type="text" class="form-control" name="sem7credits" placeholder="Semester 7 CREDITS *" value="<?php echo $sem7credits; ?>"/></td>
							
						</tr>
						<tr class="">
							<td><label class="control-label">SEMESTER VIII</label><span class="help-block table-section-head-muted">fill 0 (zero) for PG course</span></td>
							<td><input  <?php if(!($semCurrent>8)){ echo 'readonly'; }?> type="text" class="form-control" name="sem8sgpa" placeholder="Semester 8 SGPA *" value="<?php echo $sem8sgpa; ?>"/></td>
							<td><input  <?php if(!($semCurrent>8)){ echo 'readonly'; }?> type="text" class="form-control" name="sem8credits" placeholder="Semester 8 CREDITS *" value="<?php echo $sem8credits; ?>" /></td>
						</tr>
            <tr class="">
              <td><label class="control-label">CGPA</label><span class="help-block table-section-head-muted">Will be automatically calculated, click save and next</span></td>
              <td><input type="text" class="form-control" name="cgpa" placeholder="CGPA *" value="<?php echo $cgpa; ?>" disabled/></td>
              <td><label class="control-label">EQUIVALENT PERCENTAGE</label><span class="help-block table-section-head-muted">Will be automatically calculated, click save and next</span></td>
              <td><input type="text" class="form-control" placeholder="Equivalent Percentage *" value="<?php echo $percentage; ?>" disabled/></td>
            </tr>
            <tr class="">
              <td><label class="control-label">TOTAL BACKLOGS</label><span class="help-block table-section-head-muted">till now</span></td>
              <td><input type="text" class="form-control" name="backlogTotal" placeholder="Total backlogs *" value="<?php echo $backlogTotal; ?>" /></td>
              <td><label class="control-label">BACKLOGS CLEARED</label><span class="help-block table-section-head-muted">cleared till now</span></td>
              <td><input type="text" class="form-control" name="backlogCleared" placeholder="Backlogs Cleared *" value="<?php echo $backlogCleared; ?>" /></td>
            </tr>
            <tr class="">
              <td><label class="control-label">FAIL YEARS</label><span class="help-block table-section-head-muted">number of years failed in current degree</span></td>
              <td><input type="text" class="form-control" name="failYear" placeholder="Years Failed *" value="<?php echo $failYear; ?>" /></td>
              <td><label class="control-label">CURRENT BACKLOGS</label><span class="help-block table-section-head-muted">not cleared till now</span></td>
              <td><input type="text" class="form-control" name="backlogCurrent" placeholder="Current backlogs *" value="<?php echo $backlogCurrent; ?>" /></td>
            </tr>
            <tr>
              <td><label class="control-label">MINOR TRAINING</label><span class="help-block table-section-head-muted">Minor Training Company, Topic</span></td>
              <td colspan="3"><input type="text" class="form-control" name="minorTraining" placeholder="Minor Training Company, Topic *" value="<?php echo $minorTraining; ?>" /></td>
            </tr>
            <tr>
              <td><label class="control-label">MINOR PROJECT</label><span class="help-block table-section-head-muted">Minor Project Topic</span></td>
              <td colspan="3"><input type="text" class="form-control" name="minorProject" placeholder="Minor Project Topic *" value="<?php echo $minorProject; ?>" /></td>
            </tr>
            <tr>
              <td colspan="4" class="align-center pager visible-desktop">
                <input class="btn btn-primary" type="reset" value="Reset"/>
                <input class="btn btn-success" type="submit" name="tpoform-page2-submit" value="Save & Next" formaction="?page=fillDetails&formpage=3"/>
              </td>
            </tr>
          </tbody>
          </table>
          </fieldset></form>
        </div>

        <ul class="pager visible-desktop">
          <li><a class="" href="?page=fillDetails&formpage=1">&larr; Page 1</a></li>
          <li><a class="" href="?page=fillDetails&formpage=3">Page 3 &rarr;</a></li>
        </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>

<?php
  /*---------------------------------------------------------------------------------------------------------------
  This is page 3 for form.
  ----------------------------------------------------------------------------------------------------------------*/
  elseif($formpage==3):


  $dbConn = openDB($batch);
  $err = "";
  $success="";
  $err_cause="";
  //$d=array();

  if(isset($_POST['tpoform-page2-submit'])){

    foreach($_POST as $key=>$value){
      $value=trim(strtoupper($value));
      if($value=="" && $key!="MName"){
        $err = "EMPTY VALUES! PAGE 2 - VALUES NOT SAVED!";
        break;
      }else{
        $_POST[$key]=$value;
      }
    }

    //$d = $_POST;

    if($err==""){

      $sem1sgpa=$_POST['sem1sgpa'];
      $sem2sgpa=$_POST['sem2sgpa'];
      $sem3sgpa=$_POST['sem3sgpa'];
      $sem4sgpa=$_POST['sem4sgpa'];
      $sem5sgpa=$_POST['sem5sgpa'];
      $sem6sgpa=$_POST['sem6sgpa'];
      $sem7sgpa=$_POST['sem7sgpa'];
      $sem8sgpa=$_POST['sem8sgpa'];
      $sem1credits=$_POST['sem1credits'];
      $sem2credits=$_POST['sem2credits'];
      $sem3credits=$_POST['sem3credits'];
      $sem4credits=$_POST['sem4credits'];
      $sem5credits=$_POST['sem5credits'];
      $sem6credits=$_POST['sem6credits'];
      $sem7credits=$_POST['sem7credits'];
      $sem8credits=$_POST['sem8credits'];
      $minorTraining=$_POST['minorTraining'];
      $minorProject=$_POST['minorProject'];


      $backlogTotal=$_POST['backlogTotal'];
      $backlogCleared=$_POST['backlogCleared'];
      $backlogCurrent=$_POST['backlogCurrent'];
      $failYear=$_POST['failYear'];

    /*------------------------------------------------------------------------------------
        CALCULATE CGPA
    ----------------------------------------------------------------------------------------*/
      $sem1=$sem1sgpa*$sem1credits;
      $sem2=$sem2sgpa*$sem2credits;
      $sem3=$sem3sgpa*$sem3credits;
      $sem4=$sem4sgpa*$sem4credits;
      $sem5=$sem5sgpa*$sem5credits;
      $sem6=$sem6sgpa*$sem6credits;
      $sem7=$sem7sgpa*$sem7credits;
      $sem8=$sem8sgpa*$sem8credits;

      $total=$sem1+$sem2+$sem3+$sem4+$sem5+$sem6+$sem7+$sem8;
      $credits = $sem1credits+$sem2credits+$sem3credits+$sem4credits+$sem5credits+$sem6credits+$sem7credits+$sem8credits;

      $cgpa = round($total/$credits,2);
      $percentage = $cgpa*10;


      $sql="UPDATE `student` SET
        `sem1sgpa`='$sem1sgpa',
        `sem2sgpa`='$sem2sgpa',
        `sem3sgpa`='$sem3sgpa',
        `sem4sgpa`='$sem4sgpa',
        `sem5sgpa`='$sem5sgpa',
        `sem6sgpa`='$sem6sgpa',
        `sem7sgpa`='$sem7sgpa',
        `sem8sgpa`='$sem8sgpa',
        `sem1credits`='$sem1credits',
        `sem2credits`='$sem2credits',
        `sem3credits`='$sem3credits',
        `sem4credits`='$sem4credits',
        `sem5credits`='$sem5credits',
        `sem6credits`='$sem6credits',
        `sem7credits`='$sem7credits',
        `sem8credits`='$sem8credits',
        `minorTraining`='$minorTraining',
        `minorProject`='$minorProject',
        `backlogTotal`='$backlogTotal',
        `backlogCleared`='$backlogCleared',
        `backlogCurrent`='$backlogCurrent',
        `failYear`='$failYear',
        `cgpa`='$cgpa',
        `percentage`='$percentage',
        `page2Saved`=1
        WHERE `rollno` LIKE '$rollno' ";

      $r = mysqli_query($dbConn,$sql);

      if(!$r){
        $err = "QUERY ERROR! PAGE 2 - VALUES NOT SAVED!";
        $err_cause = mysqli_error($dbConn);
      }
    }

    $success= "PAGE 2  -  VALUES SAVED!";

  }

  $sql = "SELECT
    `GDegree`,
    `GCourse`,
    `GUniversity`,
    `GPassYear`,
    `GAggPercent`,
    `GTotal`,
    `GMarks`,
    `GAvgPercent`,
    `GApplicable`,
    `DCourse`,
    `DUniversity`,
    `DPassYear`,
    `DAggPercent`,
    `DTotal`,
    `DMarks`,
    `DAvgPercent`,
    `DApplicable`,
    `formLock`,
    `page3Saved`
      FROM `student` WHERE `rollno` LIKE '$rollno'";
  $r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
  $data = mysqli_fetch_assoc($r);
  if(count($data)<2){
    die('DB Error! No Values found for the given user');
  }
  closeDB($dbConn);

  $GDegree=$data['GDegree'];
  $GCourse=$data['GCourse'];
  $GUniversity=$data['GUniversity'];
  $GPassYear=$data['GPassYear'];
  $GAggPercent=$data['GAggPercent'];
  $GTotal=$data['GTotal'];
  $GMarks=$data['GMarks'];
  $GAvgPercent=$data['GAvgPercent'];
  $GApplicable=$data['GApplicable'];
  $DCourse=$data['DCourse'];
  $DUniversity=$data['DUniversity'];
  $DPassYear=$data['DPassYear'];
  $DAggPercent=$data['DAggPercent'];
  $DTotal=$data['DTotal'];
  $DMarks=$data['DMarks'];
  $DAvgPercent=$data['DAvgPercent'];
  $DApplicable=$data['DApplicable'];
  $formLock=$data['formLock'];
  //$page3Saved=$data['page3Saved'];
  $page3Saved=1;

  if($err!=""):
?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $err; ?></h3>
      <h5 class="align-center noshadow-heading"><?php echo $err_cause; ?></h5>
      <p><ul>
        <li>Values entered in page 2 have <b>NOT</b> been saved.</li>
        <li>Go back to page 2. You may close this message by clicking the 'close' (x) on the right side.</li>
        <li>If this error is occouring frequently contact TPO Helpdesk : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>.</li>
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php elseif($success!=""): ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $success; ?></h3>
      <p><ul>
        <li>Values entered in page 2 have been saved successfully.</li>
        <li>Continue filling page 3. You may close this message by clicking the 'close' (x) on the right side.
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php endif; ?>

  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 well">
    <div class="well">
        <h4>TPO - DETAILS FORM - PAGE 3</h4>
        <div class="table-responsive">
        <form class="form form-horizontal" method="POST" action=""><fieldset <fieldset <?php if($page1Saved==1){echo 'disabled'; } ?> >
          <table class="table table-condensed table-hover table-bordered">
          <tbody>
            <tr class="table-section-head"><td colspan="4">Graduation Details <span class="help-block table-section-head-muted">Fill only if you have completed your graduation         </span</td></tr>
            <tr class="align-center">
              <td colspan="4">
                <div class=""><label>
                  Tick <input type="checkbox" name="GApplicable" id="gradFlag" value="no" onChange="gradFlagChange()" <?php if($GApplicable==0){echo 'checked';} ?>  /> -  if this section is NOT applicable.
                </label></div>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">GRADUATION DEGREE</label></td>
              <td>
                <select class="form-control gradInput" name="GDegree" required  <?php if($GApplicable==0){echo 'disabled';} ?> >
                  <option value="" <?php if($GDegree==''){echo 'selected';} ?> >Select Degree</option>
                  <option value="BE" <?php if($GDegree=='BE'){echo 'selected';} ?> >BE</option>
                  <option value="BTECH" <?php if($GDegree=='BTECH'){echo 'selected';} ?> >BTech</option>
                  <option value="BCA" <?php if($GDegree=='BCA'){echo 'selected';} ?> >BCA</option>
                  <option value="BSC" <?php if($GDegree=='BSC'){echo 'selected';} ?> >BSc</option>
                  <option value="BCOM" <?php if($GDegree=='BCOM'){echo 'selected';} ?> >BCom</option>
                </select>
              </td>
              <td colspan="2" rowspan="8">
                <ul class="text-muted sample">
                  <h4>Instructions & Sample Input</h4>
                  <li><b>UNIVERSITY:</b> <b>RDVV, Jabalpur</b>/<b>RGPV, Bhopal</b> (use similar format)</li>
                  <li><b>PASSING YEAR:</b> <b>2012</b></li>
                  <li><b>AGGREGATE PERCENTAGE:</b> Enter over all percentage as per degree</li>
                  <li><b>TOTAL MARKS:</b> Total marks of all the semsters/years as per degree</li>
                  <li><b>MARKS OBTAINED:</b> Marks obtained out of total marks as per degree</li>
                  <li><b>AVERAGE PERCENTAGE:</b> This is calculated automatically</li>
                  <h5>Note 1: For CGPA systems enter equivalent percentage.</h5>
                  <h5>Note 2: For CGPA systems enter equivalent percentage in <b>marks obatined</b> and "100" in <b>total marks</b>.</h5>
                  <h5>Note 3: <b>Aggregate</b> and <b>Average</b> percentage may or may not be equal.</h5>
                </ul>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">GRADUATION COURSE</label></td>
              <td>
                <select class="form-control gradInput" name="GCourse" required <?php if($GApplicable==0){echo 'disabled';} ?>  >
                  <option value="" <?php if($GCourse==''){echo 'selected';} ?>  >Select Course</option>
                  <option value="CIVIL" <?php if($GCourse=='CIVIL'){echo 'selected';} ?> >Civil</option>
                  <option value="CSE" <?php if($GCourse=='CSE'){echo 'selected';} ?> >CSE</option>
                  <option value="ElECTRICAL" <?php if($GCourse=='ELECTRICAL'){echo 'selected';} ?> >Electrical</option>
                  <option value="EEE" <?php if($GCourse=='EEE'){echo 'selected';} ?> >Electrical & Electronics</option>
                  <option value="EC" <?php if($GCourse=='EC'){echo 'selected';} ?> >Electronics & Comm</option>
                  <option value="E&TC" <?php if($GCourse=='E&TC'){echo 'selected';} ?> >Electronics & TeleComm</option>
                  <option value="EI" <?php if($GCourse=='EI'){echo 'selected';} ?> >Electronics & Instrumentation</option>
                  <option value="IP" <?php if($GCourse=='IP'){echo 'selected';} ?> >IP</option>
                  <option value="IT" <?php if($GCourse=='IT'){echo 'selected';} ?> >IT</option>
                  <option value="MECHANICAL" <?php if($GCourse=='MECHANICAL'){echo 'selected';} ?> >Mechanical</option>
                  <option value="PHYSICS" <?php if($GCourse=='PHYSICS'){echo 'selected';} ?> >Physics</option>
                  <option value="CHEMISTRY" <?php if($GCourse=='CHEMISTRY'){echo 'selected';} ?> >Chemistry</option>
                  <option value="MATHS" <?php if($GCourse=='MATHS'){echo 'selected';} ?> >Mathematics</option>
                  <option value="CA" <?php if($GCourse=='CA'){echo 'selected';} ?> >Computer Application</option>
                </select>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">UNIVERSITY</label></td>
              <td><input class="form-control gradInput" type="text"  name="GUniversity" value="<?php echo $GUniversity; ?>" placeholder="University *" required <?php if($GApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">PASSING YEAR</label></td>
              <td><input class="form-control gradInput" type="text"  name="GPassYear" value="<?php echo $GPassYear; ?>" placeholder="Passing Year *" required <?php if($GApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
              <td><input class="form-control gradInput" type="text"  name="GAggPercent" value="<?php echo $GAggPercent; ?>" placeholder="Aggregate Percentage *" required <?php if($GApplicable==0){echo 'disabled';} ?>  /></td>
            </tr>
            <tr>
              <td><label class="control-label">TOTAL MARKS</label></td>
              <td><input class="form-control gradInput" type="text"  name="GTotal" value="<?php echo $GTotal; ?>" placeholder="Total Marks *" required <?php if($GApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">MARKS OBTAINED</label></td>
              <td><input class="form-control gradInput" type="text"  name="GMarks" value="<?php echo $GMarks; ?>" placeholder="Marks Obtained *" required <?php if($GApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">AVERAGE PERCENTAGE</label></td>
              <td><input class="form-control" type=""  name="GAvgPercent" value="<?php echo $GAvgPercent; ?>" placeholder="Average Percentage" disabled/></td>
            </tr>

            <tr class="table-section-head"><td colspan="4">Diploma Details</td></tr>
            <tr class="align-center">
              <td colspan="4">
                <div class=""><label>
                  Tick <input type="checkbox" name="DApplicable" id="diplomaFlag" value="no" onChange="diplomaFlagChange()" <?php if($DApplicable==0){echo 'checked';} ?>/> -  if this section is NOT applicable.
                </label></div>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">DIPLOMA COURSE</label></td>
              <td>
                <select class="form-control diplomaInput" name="DCourse" required <?php if($DApplicable==0){echo 'disabled';} ?> disabled >
                  <option value="" <?php if($DCourse==''){echo 'selected';} ?>  >Select Course</option>
                  <option value="CIVIL" <?php if($DCourse=='CIVIL'){echo 'selected';} ?>  >Civil</option>
                  <option value="CSE" <?php if($DCourse=='CSE'){echo 'selected';} ?>  >CSE</option>
                  <option value="ELECTRICAL" <?php if($DCourse=='ElECTRICAL'){echo 'selected';} ?>  >Electrical</option>
                  <option value="EEE" <?php if($DCourse=='EEE'){echo 'selected';} ?>  >Electrical & Electronics</option>
                  <option value="EC" <?php if($DCourse=='EC'){echo 'selected';} ?>  >Electronics & Comm</option>
                  <option value="E&TC" <?php if($DCourse=='E&TC'){echo 'selected';} ?>  >Electronics & TeleComm</option>
                  <option value="EI" <?php if($DCourse=='EI'){echo 'selected';} ?>  >Electronics & Instrumentation</option>
                  <option value="IP" <?php if($DCourse=='IP'){echo 'selected';} ?>  >IP</option>
                  <option value="IT" <?php if($DCourse=='IT'){echo 'selected';} ?>  >IT</option>
                  <option value="MECHANICAL" <?php if($DCourse=='MECHANICAL'){echo 'selected';} ?>  >Mechanical</option>
                </select>
              </td>
              <td colspan="2" rowspan="7">
                <ul class="text-muted sample">
                  <h4>Instructions & Sample Input</h4>
                  <li><b>UNIVERSITY:</b> <b>RDVV, Jabalpur</b>/<b>RGPV, Bhopal</b> (use similar format)</li>
                  <li><b>PASSING YEAR:</b> <b>2012</b></li>
                  <li><b>AGGREGATE PERCENTAGE:</b> Enter over all percentage as per diploma</li>
                  <li><b>TOTAL MARKS:</b> Total marks of all the semsters/years in diploma</li>
                  <li><b>MARKS OBTAINED:</b> Marks obtained out of total marks in diploma</li>
                  <li><b>AVERAGE PERCENTAGE:</b> This is calculated automatically</li>
                  <h5>Note 1: For CGPA systems enter equivalent percentage.</h5>
                  <h5>Note 2: For CGPA systems enter equivalent percentage in <b>marks obatined</b> and "100" in <b>total marks</b>.</h5>
                  <h5>Note 3: <b>Aggregate</b> and <b>Average</b> percentage may or may not be equal.</h5>
                </ul>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">UNIVERSITY</label></td>
              <td><input class="form-control diplomaInput" type="text"  name="DUniversity" value="<?php echo $DUniversity; ?>" placeholder="University *" required <?php if($DApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">PASSING YEAR</label></td>
              <td><input class="form-control diplomaInput" type="text"  name="DPassYear" value="<?php echo $DPassYear; ?>" placeholder="Passing Year *" required <?php if($DApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
              <td><input class="form-control diplomaInput" type="text"  name="DAggPercent" value="<?php echo $DAggPercent; ?>" placeholder="Aggregate Percentage *" required <?php if($DApplicable==0){echo 'disabled';} ?>  /></td>
            </tr>
            <tr>
              <td><label class="control-label">TOTAL MARKS</label></td>
              <td><input class="form-control diplomaInput" type="text"  name="DTotal" value="<?php echo $DTotal; ?>" placeholder="Total Marks *" required <?php if($DApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">MARKS OBTAINED</label></td>
              <td><input class="form-control diplomaInput" type="text"  name="DMarks" value="<?php echo $DMarks; ?>" placeholder="Marks Obtained *" required <?php if($DApplicable==0){echo 'disabled';} ?> /></td>
            </tr>
            <tr>
              <td><label class="control-label">AVERAGE PERCENTAGE</label></td>
              <td><input class="form-control" type=""  name="DAvgPercent" value="<?php echo $DAvgPercent; ?>" placeholder="Average Percentage" disabled/></td>
            </tr>

            <tr>
              <td colspan=4 class="align-center pager visible-desktop">
                <input class="btn btn-primary" type="reset" value="Reset"/>
                <input class="btn btn-success" type="submit" name="tpoform-page3-submit" value="Save & Next" formaction="?page=fillDetails&formpage=4"/>
              </td>
            </tr>
          </tbody>
          </table>
          </fieldset></form>
        </div>

        <ul class="pager visible-desktop">
          <li><a class="" href="?page=fillDetails&formpage=2">&larr; Page 2</a></li>
          <li><a class="" href="?page=fillDetails&formpage=4">Page 4 &rarr;</a></li>
        </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>

<?php
  /*---------------------------------------------------------------------------------------------------------------
  This is page 4 for form.
  ----------------------------------------------------------------------------------------------------------------*/
  elseif($formpage==4):

  $dbConn = openDB($batch);
  $err = "";
  $success="";
  $err_cause="";
  //$d=array();

  if(isset($_POST['tpoform-page3-submit'])){

    foreach($_POST as $key=>$value){
      $value=trim(strtoupper($value));
      if($value=="" && $key!="MName"){
        $err = "EMPTY VALUES! PAGE 3 - VALUES NOT SAVED!";
        break;
      }else{
        $_POST[$key]=$value;
      }
    }

    //$d = $_POST;

    if($err==""){

      $GDegree='';
      $GCourse='';
      $GUniversity='';
      $GPassYear=0;
      $GAggPercent=0.00;
      $GTotal=0;
      $GMarks=0;
      $GAvgPercent=0.00;
      $GApplicable=0;
      $DCourse='';
      $DUniversity='';
      $DPassYear=0;
      $DAggPercent=0.00;
      $DTotal=0;
      $DMarks=0;
      $DAvgPercent=0.00;
      $DApplicable=0;


    /*------------------------------------------------------------------------------------
        CHECK GRADUTATION FLAG AND SET DEFAULT IF REQUIRED
    ----------------------------------------------------------------------------------------*/
      if(!isset($_POST['GApplicable'])){
        $GDegree=$_POST['GDegree'];
        $GCourse=$_POST['GCourse'];
        $GUniversity=$_POST['GUniversity'];
        $GPassYear=$_POST['GPassYear'];
        $GAggPercent=$_POST['GAggPercent'];
        $GTotal=$_POST['GTotal'];
        $GMarks=$_POST['GMarks'];
        $GAvgPercent=round((($GMarks/$GTotal)*100),2);
        $GApplicable=1;
      }


    /*------------------------------------------------------------------------------------
        CHECK DIPLOMA FLAG AND SET DEFAULT IF REQUIRED
    ----------------------------------------------------------------------------------------*/
      if(! (isset($_POST['DApplicable']))){
        $DCourse=$_POST['DCourse'];
        $DUniversity=$_POST['DUniversity'];
        $DPassYear=$_POST['DPassYear'];
        $DAggPercent=$_POST['DAggPercent'];
        $DTotal=$_POST['DTotal'];
        $DMarks=$_POST['DMarks'];
        $DAvgPercent=round((($DMarks/$DTotal)*100),2);
        $DApplicable=1;
      }

      $sql="UPDATE `student` SET
        `GDegree`='$GDegree',
        `GCourse`='$GCourse',
        `GUniversity`='$GUniversity',
        `GPassYear`=$GPassYear,
        `GAggPercent`='$GAggPercent',
        `GTotal`=$GTotal,
        `GMarks`=$GMarks,
        `GAvgPercent`='$GAvgPercent',
        `GApplicable`=$GApplicable,
        `DCourse`='$DCourse',
        `DUniversity`='$DUniversity',
        `DPassYear`=$DPassYear,
        `DAggPercent`='$DAggPercent',
        `DTotal`=$DTotal,
        `DMarks`=$DMarks,
        `DAvgPercent`='$DAvgPercent',
        `DApplicable`=$DApplicable,
        `page3Saved`=1
          WHERE `rollno` LIKE '$rollno' ";

      $r = mysqli_query($dbConn,$sql);

      if(!$r){
        $err = "QUERY ERROR! PAGE 3 - VALUES NOT SAVED!";
        $err_cause = mysqli_error($dbConn);
      }
    }

    $success= "PAGE 3  -  VALUES SAVED!";

  }

  $sql = "SELECT
    `TwBoard`,
    `TwPassYear`,
    `TwAggPercent`,
    `TwTotal`,
    `TwMarks`,
    `TwAvgPercent`,
    `TwApplicable`,
    `TenBoard`,
    `TenPassYear`,
    `TenAggPercent`,
    `TenTotal`,
    `TenMarks`,
    `TenAvgPercent`,
    `formLock`,
    `page4Saved`
      FROM `student` WHERE `rollno` LIKE '$rollno'";
  $r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
  $data = mysqli_fetch_assoc($r);
  if(count($data)<2){
    die('DB Error! No Values found for the given user');
  }
  closeDB($dbConn);

  $TwBoard=$data['TwBoard'];
  $TwPassYear=$data['TwPassYear'];
  $TwAggPercent=$data['TwAggPercent'];
  $TwTotal=$data['TwTotal'];
  $TwMarks=$data['TwMarks'];
  $TwAvgPercent=$data['TwAvgPercent'];
  $TwApplicable=$data['TwApplicable'];;

  $TenBoard=$data['TenBoard'];
  $TenPassYear=$data['TenPassYear'];
  $TenAggPercent=$data['TenAggPercent'];
  $TenTotal=$data['TenTotal'];
  $TenMarks=$data['TenMarks'];
  $TenAvgPercent=$data['TenAvgPercent'];

  $formLock=$data['formLock'];
  $page4Saved=$data['page4Saved'];
  

  if($err!=""):
?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $err; ?></h3>
      <h5 class="align-center noshadow-heading"><?php echo $err_cause; ?></h5>
      <p><ul>
        <li>Values entered in page 3 have <b>NOT</b> been saved.</li>
        <li>Go back to page 3. You may close this message by clicking the 'close' (x) on the right side.</li>
        <li>If this error is occouring frequently contact TPO Helpdesk : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>.</li>
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php elseif($success!=""): ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $success; ?></h3>
      <p><ul>
        <li>Values entered in page 3 have been saved successfully.</li>
        <li>Continue filling page 4. You may close this message by clicking the 'close' (x) on the right side.
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php endif; ?>

  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 well">
    <div class="well">
        <h4>TPO - DETAILS FORM - PAGE 4</h4>
        <div class="table-responsive">
          <form class="form form-horizontal" method="POST" action=""><fieldset <fieldset <?php if($page1Saved==1){echo 'disabled'; } ?> >
          <table class="table table-condensed table-hover table-bordered">
          <tbody>
            <tr class="table-section-head"><td colspan="4">Higher Secondary School (XII) Details</td></tr>
            <tr class="align-center">
              <td colspan="4">
                <div class=""><label>
                  Tick <input type="checkbox" name="TwApplicable" id="HSSchoolFlag" value="no" onChange="HSSchoolFlagChange()" <?php if($TwApplicable==0){echo 'checked';} ?> /> -  if this section is NOT applicable.
                </label></div>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">BOARD</label></td>
              <td><input class="form-control HSSchoolInput" type="text" placeholder="Board *" name="TwBoard" value="<?php echo $TwBoard; ?>" required  <?php if($TwApplicable==0){echo 'disabled';} ?> /></td>
              <td colspan="2" rowspan="6">
                <ul class="text-muted sample">
                  <h4>Instructions & Sample Input</h4>
                  <li><b>BOARD:</b> <b>CBSE</b>/<b>MP BOARD</b> (use similar format)</li>
                  <li><b>PASSING YEAR:</b> <b>2009</b></li>
                  <li><b>AGGREGATE PERCENTAGE:</b> Enter percentage as per result</li>
                  <li><b>TOTAL MARKS:</b> Total maximum marks of all the subjects in marksheet.</li>
                  <li><b>MARKS OBTAINED:</b> Marks obtained out of total marks in marksheet.</li>
                  <li><b>AVERAGE PERCENTAGE:</b> This is calculated automatically</li>
                  <h5>Note 1: For CGPA systems enter equivalent percentage.</h5>
                  <h5>Note 2: For CGPA systems enter equivalent percentage in <b>marks obatined</b> and "100" in <b>total marks</b>.</h5>
                  <h5>Note 3: <b>Aggregate</b> and <b>Average</b> percentage may or may not be equal.</h5>
                </ul>
              </td>
            </tr>

            <tr>
              <td><label class="control-label">PASSING YEAR</label></td>
              <td><input class="form-control HSSchoolInput" type="text" placeholder="Passing Year *" name="TwPassYear" value="<?php echo $TwPassYear; ?>" required <?php if($TwApplicable==0){echo 'disabled';} ?>  /></td>
            </tr>
            <tr>
              <td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
              <td><input class="form-control HSSchoolInput" type="text" placeholder="Aggregate Percentage *" name="TwAggPercent" value="<?php echo $TwAggPercent; ?>" required <?php if($TwApplicable==0){echo 'disabled';} ?>  /></td>
            </tr>
            <tr>
              <td><label class="control-label">TOTAL MARKS</label></td>
              <td><input class="form-control HSSchoolInput" type="text" placeholder="Total Marks *" name="TwTotal" value="<?php echo $TwTotal; ?>" required <?php if($TwApplicable==0){echo 'disabled';} ?>  /></td>
            </tr>
            <tr>
              <td><label class="control-label">MARKS OBTAINED</label></td>
              <td><input class="form-control HSSchoolInput" type="text" placeholder="Marks Obtained *" name="TwMarks" value="<?php echo $TwMarks ?>" required <?php if($TwApplicable==0){echo 'disabled';} ?>  /></td>
            </tr>
            <tr>
              <td><label class="control-label">AVERAGE PERCENTAGE</label></td>
              <td><input class="form-control " type="text"  name="TwAvgPercent" value="<?php echo $TwAvgPercent; ?>" placeholder="Average Percentage" disabled/></td>
            </tr>

            <tr class="table-section-head"><td colspan="4">High School (X) Details</td></tr>
            <tr>
              <td><label class="control-label">BOARD</label></td>
              <td><input class="form-control HighSchoolInput" type="text" placeholder="Board *" name="TenBoard" value="<?php echo $TenBoard; ?>" required/></td>
              <td colspan="2" rowspan="6">
                <ul class="text-muted sample">
                  <h4>Instructions & Sample Input</h4>
                  <li><b>BOARD:</b> <b>CBSE</b>/<b>MP BOARD</b> (use similar format)</li>
                  <li><b>PASSING YEAR:</b> <b>2009</b></li>
                  <li><b>AGGREGATE PERCENTAGE:</b> Enter percentage as per result</li>
                  <li><b>TOTAL MARKS:</b> Total maximum marks of all the subjects in marksheet.</li>
                  <li><b>MARKS OBTAINED:</b> Marks obtained out of total marks in marksheet.</li>
                  <li><b>AVERAGE PERCENTAGE:</b> This is calculated automatically</li>
                  <h5>Note 1: For CGPA systems enter equivalent percentage.</h5>
                  <h5>Note 2: For CGPA systems enter equivalent percentage in <b>marks obatined</b> and "100" in <b>total marks</b>.</h5>
                  <h5>Note 3: <b>Aggregate</b> and <b>Average</b> percentage may or may not be equal.</h5>
                </ul>
              </td>
            </tr>

            <tr>
              <td><label class="control-label">PASSING YEAR</label></td>
              <td><input class="form-control HighSchoolInput" type="text" placeholder="Passing Year *" name="TenPassYear" value="<?php echo $TenPassYear
              ; ?>" required /></td>
            </tr>
            <tr>
              <td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
              <td><input class="form-control HighSchoolInput" type="text" placeholder="Aggregate Percentage *" name="TenAggPercent" value="<?php echo $TenAggPercent; ?>" required /></td>
            </tr>
            <tr>
              <td><label class="control-label">TOTAL MARKS</label></td>
              <td><input class="form-control HighSchoolInput" type="text" placeholder="Total Marks *" name="TenTotal" value="<?php echo $TenTotal; ?>" required /></td>
            </tr>
            <tr>
              <td><label class="control-label">MARKS OBTAINED</label></td>
              <td><input class="form-control HighSchoolInput" type="text" placeholder="Marks Obtained *" name="TenMarks" value="<?php echo $TenMarks; ?>" required /></td>
            </tr>
            <tr>
              <td><label class="control-label">AVERAGE PERCENTAGE</label></td>
              <td><input class="form-control " type="text"  name="TenAvgPercent" value="<?php echo $TenAvgPercent; ?>" placeholder="Average Percentage" disabled/></td>
            </tr>
            <tr>
              <td colspan=4 class="align-center pager visible-desktop">
                <input class="btn btn-primary" type="reset" value="Reset"/>
                <input class="btn btn-success" type="submit" name="tpoform-page4-submit" value="Save & Next" formaction="?page=fillDetails&formpage=5"/>
              </td>
            </tr>
          </tbody>
          </table>
          </fieldset></form>
        </div>

        <ul class="pager visible-desktop">
          <li><a class="" href="?page=fillDetails&formpage=3">&larr; Page 3</a></li>
          <li><a class="" href="?page=fillDetails&formpage=5">Page 5 &rarr;</a></li>
        </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>

<?php
  /*---------------------------------------------------------------------------------------------------------------
  This is page 5 for form.
  ----------------------------------------------------------------------------------------------------------------*/
  elseif($formpage==5):


  $dbConn = openDB($batch);
  $err = "";
  $success="";
  $err_cause="";
  //$d=array();

  if(isset($_POST['tpoform-page4-submit'])){

    foreach($_POST as $key=>$value){
      $value=trim(strtoupper($value));
      if($value=="" && $key!="MName"){
        $err = "EMPTY VALUES! PAGE 4 - VALUES NOT SAVED!";
        break;
      }else{
        $_POST[$key]=$value;
      }
    }

    //$d = $_POST;

    if($err==""){

      $TwBoard='';
      $TwPassYear=0;
      $TwAggPercent=0.00;
      $TwTotal=0;
      $TwMarks=0;
      $TwAvgPercent=0.00;
      $TwApplicable=0;

      /*------------------------------------------------------------------------------------
        CHECK HSSCHOOL FLAG AND SET DEFAULT IF REQUIRED
      ----------------------------------------------------------------------------------------*/

      if(!isset($_POST['TwApplicable'])){
        $TwBoard=$_POST['TwBoard'];
        $TwPassYear=$_POST['TwPassYear'];
        $TwAggPercent=$_POST['TwAggPercent'];
        $TwTotal=$_POST['TwTotal'];
        $TwMarks=$_POST['TwMarks'];
        $TwAvgPercent=round(($TwMarks/$TwTotal)*100,2);
        $TwApplicable=1;
      }

      $TenBoard=$_POST['TenBoard'];
      $TenPassYear=$_POST['TenPassYear'];
      $TenAggPercent=$_POST['TenAggPercent'];
      $TenTotal=$_POST['TenTotal'];
      $TenMarks=$_POST['TenMarks'];
      $TenAvgPercent=round(($TenMarks/$TenTotal)*100,2);

      $sql="UPDATE `student` SET
        `TwBoard`='$TwBoard',
        `TwPassYear`=$TwPassYear,
        `TwAggPercent`=$TwAggPercent,
        `TwTotal`=$TwTotal,
        `TwMarks`=$TwMarks,
        `TwAvgPercent`=$TwAvgPercent,
        `TwApplicable`=$TwApplicable,
        `TenBoard`='$TenBoard',
        `TenPassYear`=$TenPassYear,
        `TenAggPercent`=$TenAggPercent,
        `TenTotal`=$TenTotal,
        `TenMarks`=$TenMarks,
        `TenAvgPercent`=$TenAvgPercent,
        `page4Saved`=1
          WHERE `rollno` LIKE '$rollno' ";

      $r = mysqli_query($dbConn,$sql);

      if(!$r){
        $err = "QUERY ERROR! PAGE 4 - VALUES NOT SAVED!";
        $err_cause = mysqli_error($dbConn);
      }
    }

    $success= "PAGE 4  -  VALUES SAVED!";

  }

  $sql = "SELECT
    `PAddress`,
    `PCity`,
    `PState`,
    `PPin`,
    `CAddress`,
    `CCity`,
    `CState`,
    `CPin`,
    `mobile`,
    `phone`,
    `email`,
    `altEmail`,
    `height`,
    `weight`,
    `LEye`,
    `REye`,
    `BGroup`,
    `HFlag`,
    `HDetail`,
    `formLock`,
    `page5Saved`
      FROM `student` WHERE `rollno` LIKE '$rollno'";
  $r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
  $data = mysqli_fetch_assoc($r);
  if(count($data)<2){
    die('DB Error! No Values found for the given user');
  }
  closeDB($dbConn);

  $PAddress=$data['PAddress'];
  $PCity=$data['PCity'];
  $PState=$data['PState'];
  $PPin=$data['PPin'];
  $CAddress=$data['CAddress'];
  $CCity=$data['CCity'];
  $CState=$data['CState'];
  $CPin=$data['CPin'];
  $mobile=$data['mobile'];
  $phone=$data['phone'];
  $altEmail=$data['altEmail'];
  $height=$data['height'];
  $weight=$data['weight'];
  $LEye=$data['LEye'];
  $REye=$data['REye'];
  $BGroup=$data['BGroup'];
  $HFlag=$data['HFlag'];
  $HDetail=$data['HDetail'];
  $formLock=$data['formLock'];
  $page5Saved=$data['page5Saved'];
  

  if($err!=""):
?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $err; ?></h3>
      <h5 class="align-center noshadow-heading"><?php echo $err_cause; ?></h5>
      <p><ul>
        <li>Values entered in page 4 have <b>NOT</b> been saved.</li>
        <li>Go back to page 4. You may close this message by clicking the 'close' (x) on the right side.</li>
        <li>If this error is occouring frequently contact TPO Helpdesk : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>.</li>
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php elseif($success!=""): ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $success; ?></h3>
      <p><ul>
        <li>Values entered in page 4 have been saved successfully.</li>
        <li>Continue filling page 5. You may close this message by clicking the 'close' (x) on the right side.
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php endif; ?>

  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 well">
    <div class="well">
      <h4>TPO - DETAILS FORM - PAGE 5</h4>
      <div class="table-responsive">
        <form class="form form-horizontal" method="POST" action=""><fieldset <fieldset <?php if($formLock==1 && $page5Saved==1){echo 'disabled'; } ?> >
          <table class="table table-condensed table-hover table-bordered">
          <tbody>
            <tr class="table-section-head"><td colspan="4">Contact Details</td></tr>
            <tr>
              <td colspan=""><label class="control-label">PERMANENT ADDRESS</label></td>
              <td colspan="3" class="">
                <textarea class="form-control" id="addPermanent" name="PAddress" placeholder="DO NOT WRITE STATE OR PINCODE HERE " required><?php echo $PAddress; ?></textarea>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">CITY</label></td>
              <td><input type="text" class="form-control" id="cityPermanent" name="PCity" placeholder="City *" value="<?php echo $PCity; ?>" required/></td>
              <td><label class="control-label">STATE</label><span class="help-block table-section-head-muted">use full name</span></td>
              <td><input type="text" class="form-control" id="statePermanent" name="PState" placeholder="State *" value="<?php echo $PState; ?>" required/></td>
            </tr>
            <tr>
              <td><label class="control-label">PINCODE</label></td>
              <td><input type="text" class="form-control" id="pinPermanent" name="PPin" placeholder="Pincode *" value="<?php echo $PPin; ?>" required /></td>
            </tr>

            <tr>
              <td colspan="" rowspan="2"><label class="control-label">CURRENT ADDRESS</label></td>
              <td colspan="3" class="">
                <label>
                  Tick <input type="checkbox" name="SameAsPermanent" id="currentAddressFlag" value="yes" onChange="currentAddressFlagChange()" /> -  If Current Address is same as Permanent Address.
                </label>
              </td>
            </tr>
            <tr>
              <td colspan="3" class="">
                <textarea class="form-control addCurrent" name="CAddress" placeholder="DO NOT WRITE STATE OR PINCODE HERE " required><?php echo $CAddress; ?></textarea>
              </td>
            </tr>
            <tr>
              <td><label class="control-label">CITY</label></td>
              <td><input type="text" class="form-control addCurrent" name="CCity" placeholder="City *" value="<?php echo $CCity; ?>" required/></td>
              <td><label class="control-label">STATE</label><span class="help-block table-section-head-muted">use full name</span></td>
              <td><input type="text" class="form-control addCurrent" name="CState" placeholder="State *" value="<?php echo $CState; ?>" required/></td>
            </tr>
            <tr>
              <td><label class="control-label">PINCODE</label></td>
              <td><input type="text" class="form-control addCurrent" name="CPin" placeholder="Pincode *" value="<?php echo $CPin; ?>" required/></td>
            </tr>
            <tr>
              <td><label class="control-label">MOBILE NUMBER</label><span class="help-block table-section-head-muted">10 digit only</span></td>
              <td><input type="text" class="form-control" name="mobile" placeholder="Mobile *" value="<?php echo $mobile; ?>" required/></td>
              <td><label class="control-label">ALTERNATE NUMBER</label><span class="help-block table-section-head-muted">mobile or landline<br/>use STD code with landline e.g. 076126*****<br/>use NA otherwise</span></td>
              <td><input type="text" class="form-control"  name="phone" placeholder="Alternate Number *" value="<?php echo $phone; ?>" required/></td>
            </tr>
            <tr>
              <td><label class="control-label">E-MAIL</label></td>
              <td><input type="text" class="form-control" name="email" placeholder="Email *" value="<?php echo $_SESSION['email']; ?>" required readonly/></td>
              <td><label class="control-label">ALTERNATE E-MAIL</label><span class="help-block table-section-head-muted"> use NA otherwise</span></td>
              <td><input type="text" class="form-control" name="altEmail" placeholder="Alternate Email *" value="<?php echo $altEmail; ?>" required/></td>
            </tr>
            <tr class="table-section-head"><td colspan="4">Physical Health Details</td></tr>
            <tr>
              <td><label class="contorl-label">HEIGHT</label><span class="help-block table-section-head-muted">in Centimeter</span></td>
              <td><input type="text" class="form-control" name="height" placeholder="Height" value="<?php echo $height; ?>" required/></td>
              <td><label class="contorl-label">WEIGHT</label><span class="help-block table-section-head-muted">in Kilograms</span></td>
              <td><input type="text" class="form-control" name="weight" placeholder="Weight *" value="<?php echo $weight; ?>" required/></td>
            </tr>
            <tr>
              <td><label class="contorl-label">LEFT EYE POWER</label><span class="help-block table-section-head-muted">use '-' (minus) for negative power</span></td>
              <td><input type="text" class="form-control" name="LEye" placeholder="Left Eye Powet *" value="<?php echo $LEye; ?>" required/></td>
              <td><label class="contorl-label">RIGHT EYE POWER</label><span class="help-block table-section-head-muted">use '-' (minus) for negative power</span></td>
              <td><input type="text" class="form-control" name="REye" placeholder="Right Eye Power *" value="<?php echo $REye; ?>" required/></td>
            </tr>
            <tr>
              <td><label class="contorl-label">BLOOD GROUP</label></td>
              <td>
                <select class="form-control" name="BGroup" required>
                  <option value="" <?php if($BGroup==''){echo 'selected';} ?> >Select Blood Group</option>
                  <option value="A+" <?php if($BGroup=='A+'){echo 'selected';} ?>>A+</option>
                  <option value="A-" <?php if($BGroup=='A-'){echo 'selected';} ?> >A-</option>
                  <option value="B+" <?php if($BGroup=='B+'){echo 'selected';} ?>>B+</option>
                  <option value="B-" <?php if($BGroup=='B-'){echo 'selected';} ?>>B-</option>
                  <option value="O+" <?php if($BGroup=='O+'){echo 'selected';} ?>>O+</option>
                  <option value="O-" <?php if($BGroup=='O-'){echo 'selected';} ?>>O-</option>
                  <option value="AB+" <?php if($BGroup=='AB+'){echo 'selected';} ?>>AB+</option>
                  <option value="AB-" <?php if($BGroup=='AB-'){echo 'selected';} ?>>AB-</option>
                  <option value="DKw" <?php if($BGroup=='DKw'){echo 'selected';} ?>>Don't Know</option>
                </select>
              </td>
              <td><label class="contorl-label">HANDICAPPED</label></td>
              <td>
                <select class="form-control" id="handicapDetailFlag" name="HFlag" onChange="handicapDetailFlagChange()" required>
                  <option value="">Select Yes/No</option>
                  <option value="yes" <?php if($HFlag=='YES'){echo 'selected';} ?> >Yes</option>
                  <option value="no" <?php if($HFlag=='NO'){echo 'selected';} ?> >No</option>
                </select>
              </td>
            <tr>
              <td><label class="contorl-label">HANDICAP DETAILS</label><span class="help-block table-section-head-muted">Percent & description (max 100 words)</span></td>
              <td colspan="3">
                <textarea class="form-control" placeholder="Handicap Details" name="HDetail" id="handicapDescription"  <?php if($HFlag!='YES'){echo 'disabled';} ?> required><?php echo $HDetail; ?></textarea>
              </td>
            </tr>
            <tr>
              <td colspan=4 class="align-center pager visible-desktop">
                <input class="btn btn-primary" type="reset" value="Reset"/>
                <input class="btn btn-success" type="submit" name="tpoform-page5-submit" value="Save & Next" formaction="?page=fillDetails&formpage=6"/>
              </td>
            </tr>
          </tbody>
          </table>
        </fieldset></form>
        </div>

      <ul class="pager visible-desktop">
          <li><a class="" href="?page=fillDetails&formpage=4">&larr; Page 4</a></li>
          <li><a class="" href="?page=fillDetails&formpage=6">Page 6 &rarr;</a></li>
        </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>

<?php
  /*---------------------------------------------------------------------------------------------------------------
  This is page 6 for form.
  ----------------------------------------------------------------------------------------------------------------*/
  elseif($formpage==6):


  $dbConn = openDB($batch);
  $err = "";
  $success="";
  $err_cause="";
  //$d=array();

  if(isset($_POST['tpoform-page5-submit'])){

    foreach($_POST as $key=>$value){
      $value=trim(strtoupper($value));
      if($value=="" && $key!="MName"){
        $err = "EMPTY VALUES! PAGE 5 - VALUES NOT SAVED!";
        break;
      }else{
        $_POST[$key]=$value;
      }
    }


    //$d = $_POST;

    if($err==""){

      $PAddress=$_POST['PAddress'];
      $PCity=$_POST['PCity'];
      $PState=$_POST['PState'];
      $PPin=$_POST['PPin'];
      $CAddress='';
      $CCity='';
      $CState='';
      $CPin='';

      /*------------------------------------------------------------------------------------
        CHECK SameAsPermanent FLAG AND SET DEFAULT IF REQUIRED
      ----------------------------------------------------------------------------------------*/

      if(isset($_POST['SameAsPermanent'])){
        $CAddress=$_POST['PAddress'];
        $CCity=$_POST['PCity'];
        $CState=$_POST['PState'];
        $CPin=$_POST['PPin'];
      }else{
        $CAddress=$_POST['CAddress'];
        $CCity=$_POST['CCity'];
        $CState=$_POST['CState'];
        $CPin=$_POST['CPin'];
      }

      $mobile=$_POST['mobile'];
      $phone=$_POST['phone'];
      $email = $_POST['email'];
      $altEmail=$_POST['altEmail'];
      $height=$_POST['height'];
      $weight=$_POST['weight'];
      $LEye=$_POST['LEye'];
      $REye=$_POST['REye'];
      $BGroup=$_POST['BGroup'];
      $HFlag=$_POST['HFlag'];

      /*------------------------------------------------------------------------------------
        CHECK Handicapped FLAG AND SET DEFAULT IF REQUIRED
      ----------------------------------------------------------------------------------------*/
      if($HFlag=='YES'){
        $HDetail=$_POST['HDetail'];
      }else{
        $HDetail = 'NA';
      }



      $sql="UPDATE `student` SET
        `PAddress`='$PAddress',
        `PCity`='$PCity',
        `PState`='$PState',
        `PPin`='$PPin',
        `CAddress`='$CAddress',
        `CCity`='$CCity',
        `CState`='$CState',
        `CPin`='$CPin',
        `mobile`='$mobile',
        `phone`='$phone',
        `email`='$email',
        `altEmail`='$altEmail',
        `height`=$height,
        `weight`=$weight,
        `LEye`=$LEye,
        `REye`=$REye,
        `BGroup`='$BGroup',
        `HFlag`='$HFlag',
        `HDetail`='$HDetail',
        `page5Saved`=1
          WHERE `rollno` LIKE '$rollno' ";

      $r = mysqli_query($dbConn,$sql);

      if(!$r){
        $err = "QUERY ERROR! PAGE 5 - VALUES NOT SAVED!";
        $err_cause = mysqli_error($dbConn);
      }
    }

    $success= "PAGE 5  -  VALUES SAVED!";

  }
  $sql = "SELECT
    `formLock`,
    `page6Saved`
      FROM `student` WHERE `rollno` LIKE '$rollno'";

  $r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));

  $data = mysqli_fetch_assoc($r);

  if(count($data)<2){
    die('DB Error! No Values found for the given user');
  }

  closeDB($dbConn);

  $formLock=$data['formLock'];
  $page6Saved=$data['page6Saved'];

  if($err!=""):
?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $err; ?></h3>
      <h5 class="align-center noshadow-heading"><?php echo $err_cause; ?></h5>
      <p><ul>
        <li>Values entered in page 5 have <b>NOT</b> been saved.</li>
        <li>Go back to page 5. You may close this message by clicking the 'close' (x) on the right side.</li>
        <li>If this error is occouring frequently contact TPO Helpdesk : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>.</li>
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php elseif($success!=""): ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $success; ?></h3>
      <p><ul>
        <li>Values entered in page 5 have been saved successfully.</li>
        <li>Contnue filling page 6. You may close this message by clicking the 'close' (x) on the right side.
      </ul></p>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php endif; ?>

  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 well">
    <div class="well">
      <h4>TPO - DETAILS FORM - PAGE 6</h4>
      <div class="table-responsive">
        <form class="form form-horizontal" method="POST" action=""><fieldset <fieldset <?php if($formLock==1 && $page6Saved==1){echo 'disabled'; } ?> >
          <table class="table table-condensed table-hover table-bordered">
          <tbody>
            <tr class="table-section-head"><td colspan="4">Student Undertaking</td></tr>
            <tr>
              <td>
                <ol>
                  <li>I shall abide by the rules of TPO - JEC JABALPUR.</li>
                  <li>In all cases decision of TPO will be final.</li>
                  <li>I will not involve in activities that harm the prestige of JEC JABALPUR and/or ANY TPO ASSOCIATED ORGANISATION.</li>
                  <li>I understand that, Training & Placement Information provided to students is confidential and should not be published anywhere without prior consent of TPO.</li>
                  <li>I understand that if I have filled willigness for any organization; NOT appearing in written/interview of the organization, without prior application to TPO, will lead to strict disciplinary action against me.</li>
                </ol>
                <div class="checkbox">
                  <input type="checkbox" class="" value="agreed" name="undertakingFlag" <?php if($page6Saved==1){echo 'checked'; } ?> required/><span class="label label-danger">I agree to all the points mentioned above.</span>
                </div>
              </td>
            </tr>
            <tr class="table-section-head"><td colspan="4">Declaration</td></tr>
            <tr>
              <td>
                <div class="checkbox">
                  <input type="checkbox" class="" value="agreed" name="delarationFlag"  <?php if($page6Saved==1){echo 'checked'; } ?> required/>I declare that information filled is this form is true to best of my knowledge. I agree that if any any of this information is found to false or misleading, I will be debarred from Training and Placement activities along with disciplinary action against me.
                </div>
              </td>
            </tr>
            <tr>
              <td colspan=4 class="align-center pager visible-desktop">
                <input class="btn btn-primary" type="reset" value="Reset"/>
                <input class="btn btn-success" type="submit" name="tpoform-page6-submit" value="Submit & Lock" formaction="?page=fillDetails&formpage=7"/>
                <span class="help-block">Once locked, you will not be able to edit the form</span>
              </td>
            </tr>
          </tbody>
          </table>
        </fieldset></form>
        </div>

      <ul class="pager visible-desktop">
          <li><a class="" href="?page=fillDetails&formpage=5">&larr; Page 5</a></li>
        </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
</div>


<?php
  else:

  $dbConn = openDB($batch);
  $err = "";
  $success="";
  $err_cause="";
  //$d=array();

  if(isset($_POST['tpoform-page6-submit'])){

    foreach($_POST as $key=>$value){
      $value=trim(strtoupper($value));
      if($value=="" && $key!="MName"){
        $err = "EMPTY VALUES! PAGE 5 - VALUES NOT SAVED!";
        break;
      }else{
        $_POST[$key]=$value;
      }
    }


    //$d = $_POST;

    if($err==""){

      $sql="SELECT
        `page1Saved`,
        `page2Saved`,
        `page3Saved`,
        `page4Saved`,
        `page5Saved`
          FROM `student` WHERE RollNo LIKE '$rollno'";

      $r = mysqli_query($dbConn,$sql);

      if(!$r){
        $err = "QUERY ERROR! PAGE 6 - FORM NOT LOCKED!";
        $err_cause = mysqli_error($dbConn);
        continue;
      }

      $data=mysqli_fetch_assoc($r);

      foreach($data as $key=>$value){
        if($value==0){
          $err = "SUBMIT ERROR! PAGE 6 - FORM NOT LOCKED!";
          $err_cause = "PREVIOUS PAGES NOT SAVED! SAVE VALUES OF ALL PAGES THEN LOCK THE FORM";
          break;
        }
      }

      if($err==''){
        $sql="UPDATE `student` SET
          `page6Saved`=1,
          `formLock`=1
            WHERE `rollno` LIKE '$rollno' ";

        $r = mysqli_query($dbConn,$sql);

        if(!$r){
          $err = "QUERY ERROR! PAGE 6 - FORM NOT LOCKED!";
          $err_cause = mysqli_error($dbConn);
        }
      }
    }

    $success= "FORM LOCKED!";

  }

  closeDB($dbConn);

  if($err!=""):
?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $err; ?></h3>
      <h5 class="align-center noshadow-heading"><?php echo $err_cause; ?></h5>
      <h5 class="align-center noshadow-heading">Review form and Save all details.</h5>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php elseif($success!=""): ?>
  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h3 class="align-center noshadow-heading"><?php echo $success; ?></h3>
      <h5 class="align-center noshadow-heading">Take print out of the details form & get it verified from TPO.</h5>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php endif; ?>

  <div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8 well">
    <div class="well">
        <h4>TPO - DETAILS FORM - SUBMISSION PROCEDURE</h4>
        <ul>
          <li>Take printout of the filled & locked Details form.</li>
          <li>Take original & one set of photocopy of all the marksheets till now (X, XII, Diploma, Graduation, Current Degree) for verification.</li>
          <li>Take one passport size photo as uploaded.</li>
          <li>Take original & one photocopy of your college ID card.</li>
          <li>For more information, contact TPO Helpdesk : <a href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a></li>
        </ul>
        <ul class="pager visible-desktop">
          <li><a class="" href="?page=fillDetails&formpage=1">&larr; Review Form</a></li>
          <li><a class="" href="?page=printDetails">Print &rarr;</a></li>
        </ul>
    </div>
  </div>
  <div class="col-lg-2"></div>
  </div>
<?php
  endif;
?>