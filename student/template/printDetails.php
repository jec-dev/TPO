<?php
  $rollno=$_SESSION['username'];
  $batch=$_SESSION['batch'];
  /*--------------------------------------------------------------------------
  This is page 1 for form.
  ----------------------------------------------------------------------------*/
  $dbConn = openDB($batch);
  $sql = "SELECT
  `rollno`,
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
  $rollno=$data['rollno'];
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
  $admissionYear=$data['admissionYear'];
  $passingYear=$data['passingYear'];
  $university=$data['university'];
  $mes=$data['mes'];
  $semCurrent=$data['semCurrent'];
  $dropYear=$data['dropYear'];
  $formLock=$data['formLock'];
  $page1Saved=$data['page1Saved'];
?>
<style>
  @media print {
    .printPage {
      margin-top: -95px;
    }
  }
</style>
<section class="printPage">
<section class="container" style="margin-top: 1%">
<div class="row">
  <div class="col-sm-12">
      <div class="table-responsive">
        <form class="form form-horizontal" method="POST" action="">
            <table class="table table-condensed table-hover table-bordered">
              <tbody>
                <tr class="table-section-head" style="background: #e1bee7">
                  <td colspan="4" align="center"><h3>Personal Details</h3>
                  </td>
                </tr>

                <tr>
                  <td>
                    <label class="control-label">FULL NAME</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $FName; ?>
                    </label>
                  </td>
                  <td>
                    <label>
                      <?php echo $MName; ?>
                    </label>
                  </td>
                  <td>
                    <label>
                      <?php echo $LName; ?>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">ROLL NUMBER</label>
                  </td>
                  <td>
                    <label class="control-label">
                      <?php echo $rollno; ?>
                    </label>
                  </td>
                  <td>
                    <img class="thumbnail" src="getPhoto.php?rollno=<?php echo $rollno; ?>&batch=<?php echo $batch; ?>" alt="Your Photo will be shown here" width="160px" height="200px"/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">BATCH</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $batch; ?>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">FATHER'S NAME</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $fatherName; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">MOTHER'S NAME</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $motherName; ?>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">FATHER'S OCCUPATION</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $fatherOccupation; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">MOTHER'S OCCUPATION</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $motherOccupation; ?>
                    </label>
                  </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label">FAMILY'S ANNUAL INCOME</label>
                    </td>
                  <td>
                      <label>
                          <?php
                            switch ($familyIncome) {
                              case '200000': echo "Below 2 LAKHS";
                                             break;
                              case '300000': echo "Between 2-3 LAKHS";
                                             break;
                              case '500000': echo "Between 3-5 LAKHS";
                                             break;
                              case '600000': echo "Above 5 LAKHS";
                                             break;
                              default: echo "Not Specified";
                                             break;
                            }
                          ?>
                        </label>
                      </select>
                    </td>
                    <td>
                        <label class="control-label">COMPANY PREFERENCE</label>
                    </td>
                    <td>
                      <label>
                          <?php
                            switch ($willing) {
                              case '0': echo "Not Specified";
                                             break;
                              case '1': echo "Both Service and Core";
                                             break;
                              case '2': echo "Only Service";
                                             break;
                              case '3': echo "Only Core";
                                             break;
                              default: echo "Not Specified";
                                             break;
                            }
                          ?>
                        </label>
                    </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">DATE OF BIRTH</label>
                    <span class="help-block table-section-head-muted">format: yyyy-mm-dd</span>
                  </td>
                  <td>
                    <label>
                      <?php echo $dob; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">GENDER</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $gender; ?>
                    </label>
                  </td>
                </tr>

                <tr class="table-section-head" style="background: #e1bee7">
                  <td colspan=4 align="center"><h3>Current Academic Details</h3>
                    <span class="help-block table-section-head-muted"><h4>Current Degree Details</h4></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">COURSE</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $course; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">BRANCH</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $branch; ?>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">ENTRY LEVEL</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $entryLevel; ?>
                    </label>
                  </td>
                  <td class="text-muted" colspan="2">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="control-label">ADMISSION YEAR</label>
                    <span class="help-block table-section-head-muted">for current degree</span>
                  </td>
                  <td>
                    <label>
                      <?php echo $admissionYear; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">PASSING YEAR</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $passingYear; ?>
                    </label>
                  </td>
                </tr>
                <tr class="">
                  <td>
                    <label class="control-label">UNIVERSITY</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $university; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">CURRENT SEMESTER</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $semCurrent; ?>
                    </label>
                  </td>
                </tr>
                <tr class="">
                  <td>
                    <label class="control-label">DROP YEARS</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $dropYear; ?>
                    </label>
                  </td>
                  <td>
                    <label class="control-label">MASTER'S SPECIALIZATION</label>
                  </td>
                  <td>
                    <label>
                      <?php echo $mes; ?>
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>
        </form>
      </div>
    </div>
  </div>
</div>
</section>



<?php
/*----------------------------------------------------------------------------
This is page 2 for form.
-----------------------------------------------------------------------------*/

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
$motherName=$_POST['motherName'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$branch=$_POST['branch'];
$entryLevel=$_POST['entryLevel'];
$admissionYear=$_POST['admissionYear'];
$passingYear=$_POST['passingYear'];
$university=$_POST['university'];
$mes=$_POST['mes'];
$semCurrent=$_POST['semCurrent'];
$dropYear=$_POST['dropYear'];


$sql="UPDATE `student` SET
`FName`='$FName',
`MName`='$MName',
`LName`='$LName',
`fatherName`='$fatherName',
`motherName`='$motherName',
`dob`='$dob',
`gender`='$gender',
`course`='$course',
`branch`='$branch',
`entryLevel`='$entryLevel',
`admissionYear`=$admissionYear,
`passingYear`=$passingYear,
`university`='$university',
`mes`='$mes',
`semCurrent`=$semCurrent,
`dropYear`=$dropYear,
`page1Saved`=1
WHERE `rollno` LIKE '$rollno' ";

$r = mysqli_query($dbConn,$sql);

if(!$r){
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
$minorTraining=$data['minorTraining'];
$minorProject=$data['minorProject'];
$formLock=$data['formLock'];
$page2Saved=$data['page2Saved'];

if($err!=""):
?>
<?php elseif($success!="" ): ?>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
</div>
<?php endif; ?>

<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <form class="form form-horizontal" method="POST" action="">
                    <fieldset <fieldset <?php if($formLock==1 && $page2Saved==1){echo 'disabled'; } ?>>
                        <table class="table table-condensed table-hover table-bordered">
                            <tbody>
                                <tr class="table-section-head" style="background: #e1bee7">
                                    <td colspan=4 align="center"><h3>Semester-wise SGPA-Credit Details</h3>
                                        <span class="help-block table-section-head-muted">Current Marks Details</span>
                                    </td>
                                </tr>
                                <tr class="align-center">
                                    <td>
                                        <span class="help-block table-section-head-muted"></span>
                                    </td>
                                    <td>
                                        <label class="control-label">SGPA</label>
                                    </td>
                                    <td>
                                        <label class="control-label">CREDITS</label>
                                    </td>
                                    <td rowspan=9>
                                        <span class="help-block table-section-head-muted">(for office use)</span>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER I</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem1sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem1credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER II</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem2sgpa; ?>
                                        </label>
                                        <td>
                                            <label>
                                                <?php echo $sem2credits; ?>
                                            </label>
                                        </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER III</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem3sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem3credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER IV</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem4sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem4credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER V</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem5sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem5credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER VI</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem6sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem6credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER VII</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem7sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem7credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">SEMESTER VIII</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem8sgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $sem8credits; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">CGPA</label>
                                        <span class="help-block table-section-head-muted">till now</span>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $cgpa; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="control-label">EQUIVALENT PERCENTAGE</label>
                                        <span class="help-block table-section-head-muted">till now</span>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $percentage; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">TOTAL BACKLOGS</label>
                                        <span class="help-block table-section-head-muted">till now</span>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $backlogTotal; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="control-label">BACKLOGS CLEARED</label>
                                        <span class="help-block table-section-head-muted">cleared till now</span>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $backlogCleared; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">FAIL YEARS</label>
                                        <span class="help-block table-section-head-muted">number of years failed in current degree</span>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $failYear; ?>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="control-label">CURRENT BACKLOGS</label>
                                        <span class="help-block table-section-head-muted">not cleared till now</span>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $backlogCurrent; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">MINOR TRAINING</label>
                                    </td>
                                    <td colspan="3">
                                        <label>
                                            <?php echo $minorTraining; ?>
                                        </label>
                                    </td>
                                </tr
                                <tr>
                                    <td>
                                        <label class="control-label">MINOR PROJECT</label>
                                    </td>
                                    <td colspan="3">
                                        <label>
                                            <?php echo $minorProject; ?>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>



<?php
/*---------------------------------------------------------------------------------------------------------------
This is page 3 for form.
----------------------------------------------------------------------------------------------------------------*/
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
$page3Saved=$data['page3Saved'];

if($err!=""):
?>
<?php elseif($success!="" ): ?>
<?php endif; ?>
<section class="container" style="padding: 0 15px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <form class="form form-horizontal" method="POST" action="">
                    <fieldset <fieldset <?php if($formLock==1 && $page3Saved==1){echo 'disabled'; } ?>>
                        <table class="table table-condensed table-hover table-bordered">
                            <tbody>
                                <tr class="table-section-head" style="background: #e1bee7">
                                    <td colspan="4" align="center"><h3>Graduation Details</h3></td>
                                </tr>
                                <tr class="align-center">
                                    <td colspan="4">
                                        <div class="">
                                            <label>
                                                Tick
                                                <input type="checkbox" name="GApplicable" id="gradFlag" value="no" onChange="gradFlagChange()" <?php if($GApplicable==0){echo 'checked';} ?>/> - if this section is NOT applicable.
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">GRADUATION DEGREE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GDegree; ?>
                                        </label>
                                    </td>
                                    <td colspan="2" rowspan="8">
                                        <ul class="text-muted sample">
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">GRADUATION COURSE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GCourse; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">UNIVERSITY</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GUniversity; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">PASSING YEAR</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GPassYear; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">AGGR PERCENTAGE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GAggPercent; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">TOTAL MARKS</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GTotal; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">MARKS OBTAINED</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GMarks; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">AVG PERCENTAGE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $GAvgPercent; ?>
                                        </label>
                                    </td>
                                </tr>

                                <tr class="table-section-head">
                                    <td colspan="4">Diploma Details</td>
                                </tr>
                                <tr class="align-center">
                                    <td colspan="4">
                                        <div class="">
                                            <label>
                                                Tick
                                                <input type="checkbox" name="DApplicable" id="diplomaFlag" value="no" <?php if($DApplicable==0){echo 'checked';} ?>/> - if this section is NOT applicable.
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">DIPLOMA COURSE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $DCourse; ?>
                                        </label>
                                    </td>
                                    <td colspan="2" rowspan="7">
                                        <ul class="text-muted sample">
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">UNIVERSITY</label>
                                    </td>

                                    <td>
                                        <label>
                                            <?php echo $DUniversity; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">PASSING YEAR</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $DPassYear; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">AGGR PERCENTAGE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $DAggPercent; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">TOTAL MARKS</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $DTotal; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">MARKS OBTAINED</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $DMarks; ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">AVG PERCENTAGE</label>
                                    </td>
                                    <td>
                                        <label>
                                            <?php echo $DAvgPercent; ?>
                                        </label>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
    </div>
</section>



<?php
/*---------------------------------------------------------------------------------------------------------------
This is page 4 for form.
----------------------------------------------------------------------------------------------------------------*/


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
<?php elseif($success!="" ): ?>
<?php endif; ?>
<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <div class="table-responsive">
                    <form class="form form-horizontal" method="POST" action="">
                        <fieldset <fieldset <?php if($formLock==1 && $page4Saved==1){echo 'disabled'; } ?>>
                            <table class="table table-condensed table-hover table-bordered">
                                <tbody>
                                    <tr class="table-section-head" style="background: #e1bee7">
                                        <td colspan="4" align="center"><h3>Higher Secondary School (XII) Details</h3></td>
                                    </tr>
                                    <tr class="align-center">
                                        <td colspan="4">
                                            <div class="">
                                                <label>
                                                    Tick
                                                    <input type="checkbox" name="TwApplicable" id="HSSchoolFlag" value="no" onChange="HSSchoolFlagChange()" <?php if($TwApplicable==0){echo 'checked';} ?>/> - if this section is NOT applicable.
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">BOARD</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TwBoard; ?>
                                            </label>
                                        </td>
                                        <td colspan="2" rowspan="6">
                                            <ul class="text-muted sample">
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="control-label">PASSING YEAR</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TwPassYear; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">AGGREGATE PERCENTAGE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TwAggPercent; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">TOTAL MARKS</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TwTotal; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">MARKS OBTAINED</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TwMarks; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">AVERAGE PERCENTAGE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TwAvgPercent; ?>
                                            </label>
                                        </td>
                                    </tr>

                                    <tr class="table-section-head">
                                        <td colspan="4">High School (X) Details</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">BOARD</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TenBoard; ?>
                                            </label>
                                        </td>
                                        <td colspan="2" rowspan="6">
                                            <ul class="text-muted sample">
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label class="control-label">PASSING YEAR</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TenPassYear; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">AGGREGATE PERCENTAGE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TenAggPercent; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">TOTAL MARKS</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TenTotal; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">MARKS OBTAINED</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TenMarks; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">AVERAGE PERCENTAGE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $TenAvgPercent; ?>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>



<?php
/*---------------------------------------------------------------------------------------------------------------
This is page 5 for form.
----------------------------------------------------------------------------------------------------------------*/

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
$email=$data['email'];
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
<?php elseif($success!="" ): ?>
<?php endif; ?>
<section class="container" style="padding: 0 15px">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <div class="table-responsive">
                    <form class="form form-horizontal" method="POST" action="">
                        <fieldset <fieldset <?php if($formLock==1 && $page5Saved==1){echo 'disabled'; } ?>>
                            <table class="table table-condensed table-hover table-bordered">
                                <tbody>
                                    <tr class="table-section-head" style="background: #e1bee7">
                                        <td colspan="4" align="center"><h3>Contact Details</h3></td>
                                    </tr>
                                    <tr>
                                        <td colspan="">
                                            <label class="control-label">PERMANENT ADDRESS</label>
                                        </td>
                                        <td colspan="3" class="">
                                            <label>
                                                <?php echo $PAddress; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">CITY</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $PCity; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="control-label">STATE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $PState; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">PINCODE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $PPin; ?>
                                            </label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="" rowspan="2">
                                            <label class="control-label">CURRENT ADDRESS</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="">
                                            <label>
                                                <?php echo $CAddress; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">CITY</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $CCity; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="control-label">STATE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $CState; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">PINCODE</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $CPin; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">MOBILE NUMBER</label>
                                            <span class="help-block table-section-head-muted">10 digit only</span>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $mobile; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="control-label">ALTERNATE NUMBER</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $phone; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label">E-MAIL</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $email; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="control-label">ALTERNATE E-MAIL</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $altEmail; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr class="table-section-head">
                                        <td colspan="4">Physical Health Details</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="contorl-label">HEIGHT</label>
                                            <span class="help-block table-section-head-muted">in Centimeter</span>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $height; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="contorl-label">WEIGHT</label>
                                            <span class="help-block table-section-head-muted">in Kilograms</span>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $weight; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="contorl-label">LEFT EYE POWER</label>
                                            <span class="help-block table-section-head-muted"> '-' (minus) for negative power</span>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $LEye; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="contorl-label">RIGHT EYE POWER</label>
                                            <span class="help-block table-section-head-muted">'-' (minus) for negative power</span>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $REye; ?>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="contorl-label">BLOOD GROUP</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $BGroup; ?>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="contorl-label">HANDICAPPED</label>
                                        </td>
                                        <td>
                                            <label>
                                                <?php echo $HFlag; ?>
                                            </label>
                                        </td>
                                        <tr>
                                            <td>
                                                <label class="contorl-label">HANDICAP DETAILS</label>
                                            </td>
                                            <td colspan="3">
                                                <label>
                                                    <?php echo $HDetail; ?>
                                                </label>
                                                </textarea>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>



<?php
/*---------------------------------------------------------------------------------------------------------------
This is page 6 for form.
----------------------------------------------------------------------------------------------------------------*/

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
<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h3 class="align-center noshadow-heading">
        <?php echo $err; ?>
      </h3>
                <h5 class="align-center noshadow-heading">
        <?php echo $err_cause; ?>
      </h5>
                <p>
                    <ul>
                        <li>Values entered in page 5 have <b>NOT</b> been saved.</li>
                        <li>Go back to page 5. You may close this message by clicking the 'close' (x) on the right side.</li>
                        <li>If this error is occouring frequently contact TPO Helpdesk : <a class="alert-link" href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>.</li>
                    </ul>
                </p>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>

<?php elseif($success!="" ): ?>
<?php endif; ?>

<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <div class="table-responsive">
                    <form class="form form-horizontal" method="POST" action="">
                        <fieldset <fieldset <?php if($formLock==1 && $page6Saved==1){echo 'disabled'; } ?>>
                            <table class="table table-condensed table-hover table-bordered">
                                <tbody>
                                    <tr class="table-section-head" style="background: #e1bee7">
                                        <td colspan="4" align="center"><h3>Student Undertaking</h3></td>
                                    </tr>
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
                                                <input type="checkbox" class="" value="agreed" name="undertakingFlag" <?php if($page6Saved==1){echo 'checked'; } ?>required/>
                                                <span class="label label-danger">I<?php echo ", ", $FName, " ", $MName, " ", $LName; ?>, agree to all the points mentioned above.</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="table-section-head">
                                        <td colspan="4">Declaration</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <input type="checkbox" class="" value="agreed" name="delarationFlag" <?php if($page6Saved==1){echo 'checked'; } ?>required/>I
                                                <?php echo ", ", $FName, " ", $MName, " ", $LName; ?>, declare that information filled is this form is true to best of my knowledge. I agree that if any any of this information is found to false or misleading, I will be debarred from Training and Placement activities along with disciplinary action against me.
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</section>
<?php


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
      <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <h3 class="align-center noshadow-heading">
        <?php echo $err; ?>
      </h3>
      <h5 class="align-center noshadow-heading">
        <?php echo $err_cause; ?>
      </h5>
      <h5 class="align-center noshadow-heading">Review form and Save all details.</h5>
    </div>
  </div>
  <div class="col-lg-2"></div>
</div>
<?php elseif($success!="" ): ?>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
      </button>
      <h3 class="align-center noshadow-heading">
        <?php echo $success; ?>
      </h3>
      <h5 class="align-center noshadow-heading">Take print out of the details form & get it verified from TPO.</h5>
    </div>
  </div>
  <div class="col-lg-2"></div>
</div>
<?php endif; ?>

<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <h4 align="center">TPO - DETAILS FORM - SUBMISSION AND VERIFICATION PROCEDURE</h4>
                <ul>
                    <li>Take printout of the filled & locked Details form.</li>
                    <li>Take original & one set of photocopy of all the marksheets till now (X, XII, Diploma, Graduation, Current Degree) for verification.</li>
                    <li>Take original Gap Certificate, if you are having an education gap.</li>
                    <li>Take one passport size photo as uploaded.</li>
                    <li>Take original & one photocopy of your college ID card.</li>
                    <li>Bring these documents <b>IN PERSON</b> during the specified verification date.</li>
                    <li>For more information, contact TPO Helpdesk : <a href="mailto:tpohelp@jec-jabalpur.org">tpohelp@jec-jabalpur.org</a>
                    </li>
                </ul>
                <center>
                    <h5><br>Use Firefox to take the printout: SIZE: A4, MARGIN: Default, ORIENTATION: Portrait</h5>
                    <input class="btn btn-success" type="button" value="Print this page" onClick="window.print()">
                </center>
            </div>
        </div>
    </div>
</section>
</section>


