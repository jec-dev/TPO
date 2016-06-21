<?php
	$formpage=0;
	if(isset($_GET['formpage'])){
		$formpage=$_GET['formpage'];
	}
	
	$rollno=$_SESSION['username'];
	$batch=$_SESSION['batch'];
	
	if($formpage==0):
?>
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
				<p><h6>Read the instructions carefully before filling the form:</h6>
				<ul>
					<li>Fields marked with asterisk (*) are mandatory.</li>
					<li>Use 'NA' where-ever applicable.</li>
					<li>More instructions are provided in REMARK sections for help.</li>
					<li>Do <b>NOT</b> use small devices (mobile, tablet etc) for filling this form.</li>
					<li>Do <b>NOT</b> fill characters in places where numbers are required (e.g. Eye Power)</li>
					<li>Details of a page are saved when <b>NEXT</b> is clicked.</li>
					<li>Details can be edited/modified any number of times before submitting the form.</li>
				</ul> </p>
			
				<ul class="pager visible-desktop">
					<li><a class="" href="?page=fillDetails&formpage=1">Fill Details Form &rarr;</a></li>
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
	$sql = "SELECT `firstName`,`middleName`,`lastName`,`fatherName`,`motherName`,`dob`,`gender`,`course`,`branch`,`entryLevel`,`admissionYear`,`university`,`passingYear`,`mes`,`semCurrent`,`dropYear` FROM `student` WHERE `rollno` LIKE '$rollno'";
	$r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
	$data = mysqli_fetch_assoc($r);
	if(count($data)<2){
		die('DB Error! No Values found for the given user');
	}
	closeDB($dbConn);
	
	$firstName=$data['firstName'];
	$middleName=$data['middleName'];
	$lastName=$data['lastName'];
	$fatherName=$data['fatherName'];
	$motherName=$data['motherName'];
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
?>
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
		<div class="well">
				<h4>TPO - DETAILS FORM - PAGE 1</h4>
				<div class="table-responsive">
				<form class="form form-horizontal" method="POST" action=""><fieldset>
					<table class="table table-condensed table-hover table-bordered">
					<tbody>
						<tr class="table-section-head"><td colspan=4>Personal Details<span class="help-block table-section-head-muted">as per marksheets</span></td><tr>
						<tr>
							<td><label class="control-label">ROLL NUMBER</label></td>
							<td><input class="form-control" type="text" placeholder="First Name *" name="rollno" value="<?php echo $rollno; ?>" readonly required/></td>
							<td><label class="control-label">BATCH</label></td>
							<td><input class="form-control" type="text" placeholder="Last Name *" name="batch" value="<?php echo $batch; ?>" readonly required/></td>
						</tr>
						<tr>
							<td><label class="control-label">FULL NAME</label></td>
							<td><input class="form-control" type="text" placeholder="First Name *" name="firstName" value="<?php echo $firstName; ?>" required/></td>
							<td><input class="form-control" type="text" placeholder="Middle Name" name="middleName" value="<?php echo $middleName; ?>"/></td>
							<td><input class="form-control" type="text" placeholder="Last Name *" name="lastName" value="<?php echo $lastName; ?>" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">FATHER'S NAME</label></td>
							<td><input class="form-control" type="text" name="fatherName" placeholder="Fathers Name *" value="<?php echo $fatherName; ?>" required/></td>
							<td><label class="control-label">MOTHER'S NAME</label></td>
							<td><input class="form-control" type="text" name="motherName" placeholder="Mothers Name *" value="<?php echo $motherName; ?>" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">DATE OF BIRTH</label></td>
							<td><input class="form-control datepicker" type="date" placeholder="YYYY-MM-DD Format *" name="dob" value="<?php echo $dob; ?>" required/></td>
							<td><label class="control-label">GENDER</label></td>
							<td>
								<select class="form-control" type="text" placeholder="Last Name *" name="gender" required>
									<option value="" <?php if($gender==''){echo 'selected';} ?> >Select Gender</option>
									<option value="Male" <?php if($gender=='Male'){echo 'selected';} ?>>Male</option>
									<option value="Female" <?php if($gender=='Female'){echo 'selected';} ?>>Female</option>
								</select>
							</td>
						</tr>
						
						<tr class="table-section-head"><td colspan=4>Current Academic Details<span class="help-block table-section-head-muted">Current Degree Details</span></td><tr>
						<tr>
							<td><label class="control-label">COURSE</label><span class="help-block table-section-head-muted">current degree</span></td>
							<td><select class="form-control" name="course"  required>
								<option value="" <?php if($course==''){echo 'selected';} ?> >Select Course</option>
								<option value="BE" <?php if($course=='BE'){echo 'selected';} ?> >BE</option>
								<option value="ME" <?php if($course=='ME'){echo 'selected';} ?> >ME</option>
								<option value="MCA" <?php if($course=='MCA'){echo 'selected';} ?> >MCA</option>
								<option value="MSc" <?php if($course=='MSc'){echo 'selected';} ?> >MSc</option>
							</td>
							<td><label class="control-label">BRANCH</label></td>
							<td><select class="form-control" name="branch"  required>
								<option value="" <?php if($branch==''){echo 'selected';} ?> >Select Branch</option>
								<option value="CSE" <?php if($branch=='CSE'){echo 'selected';} ?> >Computer Science & Engineering</option>
								<option value="CIvil" <?php if($branch=='Civil'){echo 'selected';} ?> >Civil Engineering</option>
								<option value="Electrical" <?php if($branch=='Electrical'){echo 'selected';} ?> >Electrical Engineering</option>
								<option value="E&TC" <?php if($branch=='E&TC'){echo 'selected';} ?> >Electronics & Telecomm Engineering </option>
								<option value="IP" <?php if($branch=='IP'){echo 'selected';} ?> >Industrial & Prod Engineering</option>
								<option value="IT" <?php if($branch=='IT'){echo 'selected';} ?> >Information Technology</option>
								<option value="Mechanical" <?php if($branch=='Mechanical'){echo 'selected';} ?> >Mechanical Engineering</option>
								<option value="MCA" <?php if($branch=='MCA'){echo 'selected';} ?> >Computer Application</option>
								<option value="Maths" <?php if($branch=='Maths'){echo 'selected';} ?> >Applied Maths</option>
								<option value="Chemistry" <?php if($branch=='Chemistry'){echo 'selected';} ?> >Applied Chemistry</option>
								<option value="Physics" <?php if($branch=='Physics'){echo 'selected';} ?> >Applied Physics</option>
							</td>
						</tr>
						<tr>
							<td><label class="control-label">ENTRY LEVEL</label><span class="help-block table-section-head-muted">exam cleared / quota used</span></td>
							<td><select class="form-control" name="entryLevel"  required>
								<option value="" selected>Select Level</option>
								<option value="EL0" <?php if($entryLevel=="EL0"){echo 'selected';}?> >Level 0</option>
								<option value="EL1" <?php if($entryLevel=="EL1"){echo 'selected';}?> >Level 1</option>
								<option value="EL2" <?php if($entryLevel=="EL2"){echo 'selected';}?> >Level 2</option>
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
							<td><label class="control-label">ADMISSION YEAR</label><span class="help-block table-section-head-muted">for current degree</span></td>
							<td><input type="text" class="form-control" name="admissionYear" placeholder="Admission Year *" value="<?php echo $admissionYear; ?>"  required /></td>
							<td><label class="control-label">PASSING YEAR</label><span class="help-block table-section-head-muted">tentative</span></td>
							<td><input type="text" class="form-control" name="passingYear" placeholder="Passing Year *" value="<?php echo $passingYear; ?>" required /></td>
						</tr>
						<tr class="">
							<td><label class="control-label">UNIVERSITY</label></td>
							<td>
								<select class="form-control" name="university" required>
									<option value=""  <?php if($university==''){echo 'selected';} ?> >Select University</option>
									<option value="RGPV" <?php if($university=='RGPV'){echo 'selected';} ?> >RGPV Bhopal</option>
									<option value="RDVV" <?php if($university=='RDVV'){echo 'selected';} ?> >RDVV Jabalpur</option>
								</select>
							</td>
							<td><label class="control-label">CURRENT SEMESTER</label></td>
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
							<td><label class="control-label">DROP YEARS</label><span class="help-block table-section-head-muted">number of years dropped before current degree</span></td>
							<td><input type="text" class="form-control" name="dropYear" placeholder="Years Dropped *" value="<?php echo $dropYear; ?>" /></td>
							<td><label class="control-label">ME SPECIALIZATION</label><span class="help-block table-section-head-muted">enter full name or use NA otherwise</span></td>
							<td><input type="text" class="form-control" name="mes" placeholder="ME Specialization *" value="<?php echo $mes; ?>"  required /></td>
						</tr>
						
						<tr>
							<td colspan=4 class="align-center">
								<input class="btn btn-primary" type="reset" value="Reset"/>
								<input class="btn btn-success" type="submit" name="tpoform-page1-submit" value="Save & Next" formaction="?page=fillDetails&formpage=2"/>
							</td>
						</tr>
					</tbody>	
					</table>
					</fieldset></form>
				</div>
				<ul class="pager visible-desktop">
					
					<li><a class="" href="?page=fillDetails&formpage=2">Page 2 &rarr;</a></li>
				</ul>
		</div>
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	
<?php	
	/*---------------------------------------------------------------------------------------------------------------
	This is page 2 for form.
	----------------------------------------------------------------------------------------------------------------*/
	elseif($formpage==2):
	
	$dbConn = openDB($batch);
	$err = "";
	$success="";
	$err_cause="";
	//$d=array();
	
	if(isset($_POST['tpoform-page1-submit'])){
		
		foreach($_POST as $key=>$value){
			$value=trim($value);
			if($value=="" && $key!="middleName"){
				$err = "EMPTY VALUES! PAGE 1 - VALUES NOT SAVED!";
				break;
			}else{
				$_POST[$key]=$value;
			}
		}
		
		//$d = $_POST;
		
		if($err==""){
						
			$firstName=$_POST['firstName'];
			$middleName=$_POST['middleName'];
			$lastName=$_POST['lastName'];
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
				`firstName`='$firstName',
				`middleName`='$middleName',
				`lastName`='$lastName',
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
				`dropYear`=$dropYear
				WHERE `rollno` LIKE '$rollno' ";
				
			$r = mysqli_query($dbConn,$sql);
			
			if(!$r){
				$err = "QUERY ERROR! PAGE 1 - VALUES NOT SAVED!";
				$err_cause = mysqli_error($dbConn);
			}
		}
		
		$success= "PAGE 1  -  VALUES SAVED!";
	
	}
	
	$sql = "SELECT `sem1sgpa`,`sem2sgpa`,`sem3sgpa`,`sem4sgpa`,`sem5sgpa`,`sem6sgpa`,`sem7sgpa`,`sem8sgpa`, `sem1credits`,`sem2credits`,`sem3credits`,`sem4credits`,`sem5credits`,`sem6credits`,`sem7credits`,`sem8credits`,`cgpa`,`percentage`,`backlogTotal`,`backlogCleared`,`backlogCurrent`,`failYear`,`semCurrent` FROM `student` WHERE `rollno` LIKE '$rollno'";
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
				<form class="form form-horizontal" method="POST" action=""><fieldset>
					<table class="table table-condensed table-hover table-bordered">
					<tbody>
						<tr class="table-section-head"><td colspan=4>Semester-wise SGPA-Credit Details<span class="help-block table-section-head-muted">Current Marks Details</span></td><tr>
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
							<td><input <?php if(!($semCurrent>1)){ echo 'hello'; } ?> type="text" class="form-control" name="sem1sgpa" placeholder="Semester 1 SGPA *" value="<?php echo $sem1sgpa; ?>"/></td>
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
							<td><label class="control-label">CGPA</label><span class="help-block table-section-head-muted">till now</span></td>
							<td><input type="text" class="form-control" name="cgpa" placeholder="CGPA *" value="<?php echo $cgpa; ?>" disabled/></td>
							<td><label class="control-label">EQUIVALENT PERCENTAGE</label><span class="help-block table-section-head-muted">till now</span></td>
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
							<td colspan=4 class="align-center">
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
			$value=trim($value);
			if($value=="" && $key!="middleName"){
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
				`percentage`='$percentage'
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
		`DApplicable` 
			FROM `student` WHERE `rollno` LIKE '$rollno'";/*
	$r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
	$data = mysqli_fetch_assoc($r);
	if(count($data)<2){
		die('DB Error! No Values found for the given user');
	}*/
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
				<h4>TPO - DETAILS FORM - PAGE 3</h4>
				<div class="table-responsive">
				<form class="form form-horizontal" method="POST" action=""><fieldset>
					<table class="table table-condensed table-hover table-bordered">
					<tbody>
						<tr class="table-section-head"><td colspan="4">Graduation Details</td><tr>
						<tr class="align-center">
							<td colspan="4">
								<div class=""><label>
									Tick <input type="checkbox" name="gradApplicable" id="gradFlag" value="no" onChange="gradFlagChange()" /> -  if this section is not applicable.
								</label></div>
							</td>
						</tr>
						<tr>
							<td><label class="control-label">GRADUATION DEGREE</label></td>
							<td>
								<select class="form-control gradInput" name="GDegree" required>
									<option value="">Select Degree</option>
									<option value="BE">BE</option>
									<option value="BTech">BTech</option>
									<option value="BCA">BCA</option>
									<option value="BSc">BSc</option>
									<option value="BCom">BCom</option>
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
								<select class="form-control gradInput" name="GCourse" required>
									<option value="">Select Course</option>
									<option value="Civil">Civil</option>
									<option value="CSE">CSE</option>
									<option value="Eectrical">Electrical</option>
									<option value="EEE">Electrical & Electronics</option>
									<option value="EC">Electronics & Comm</option>
									<option value="E&TC">Electronics & TeleComm</option>
									<option value="EI">Electronics & Instrumentation</option>
									<option value="IP">IP</option>
									<option value="IT">IT</option>
									<option value="Mechanical">Mechanical</option>
									<option value="Physics">Physics</option>
									<option value="Chemistry">Chemistry</option>
									<option value="Maths">Mathematics</option>
									<option value="CA">Computer Application</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label class="control-label">UNIVERSITY</label></td>
							<td><input class="form-control gradInput" type="text"  name="GUniversity" value="<?php echo '0'; ?>" placeholder="Average Percentage" /></td>
						</tr>
						<tr>
							<td><label class="control-label">PASSING YEAR</label></td>
							<td><input class="form-control gradInput" type="text"  name="GPassYear" value="<?php echo '0'; ?>" placeholder="Average Percentage" /></td>
						</tr>
						<tr>
							<td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
							<td><input class="form-control gradInput" type="text"  name="GAggPercent" value="<?php echo '0'; ?>" placeholder="Average Percentage" /></td>
						</tr>
						<tr>
							<td><label class="control-label">TOTAL MARKS</label></td>
							<td><input class="form-control gradInput" type="text"  name="GTotal" value="<?php echo '0'; ?>" placeholder="Total Marks *" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">MARKS OBTAINED</label></td>
							<td><input class="form-control gradInput" type="text"  name="GMarks" value="<?php echo '0'; ?>" placeholder="Marks Obtained *" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">AVERAGE PERCENTAGE</label></td>
							<td><input class="form-control" type=""  name="GAvgPercent" value="<?php echo '0'; ?>" placeholder="Average Percentage" disabled/></td>
						</tr>
						
						<tr class="table-section-head"><td colspan="4">Diploma Details</td><tr>
						<tr class="align-center">
							<td colspan="4">
								<div class=""><label>
									Tick <input type="checkbox" name="diplomaApplicable" id="diplomaFlag" value="no" onChange="diplomaFlagChange()" /> -  if this section is not applicable.
								</label></div>
							</td>
						</tr>
						<tr>
							<td><label class="control-label">DIPLOMA COURSE</label></td>
							<td>
								<select class="form-control diplomaInput" required>
									<option value="">Select Course</option>
									<option value="Civil">Civil</option>
									<option value="CSE">CSE</option>
									<option value="Eectrical">Electrical</option>
									<option value="EEE">Electrical & Electronics</option>
									<option value="EC">Electronics & Comm</option>
									<option value="E&TC">Electronics & TeleComm</option>
									<option value="EI">Electronics & Instrumentation</option>
									<option value="IP">IP</option>
									<option value="IT">IT</option>
									<option value="Mechanical">Mechanical</option>	
								</select>
							</td>
							<td colspan="2" rowspan="7">
								<ul class="text-muted sample">
									<h4>Instructions & Sample Input</h4>
									<li><b>UNIVERSITY:</b> <b>RDVV, Jabalpur</b>/<b>RGPV, Bhopal</b> (use similar format)</li>
									<li><b>PASSING YEAR:</b> <b>2012</b></li>
									<li><b>AGGREGATE PERCENTAGE:</b> Enter over all percentage as per diploma</li>
									<li><b>TOTAL MARKS:</b> Total marks of all the semsters/years as per diploma</li>
									<li><b>MARKS OBTAINED:</b> Marks obtained out of total marks as per diploma</li>
									<li><b>AVERAGE PERCENTAGE:</b> This is calculated automatically</li>
									<h5>Note 1: For CGPA systems enter equivalent percentage.</h5>
									<h5>Note 2: For CGPA systems enter equivalent percentage in <b>marks obatined</b> and "100" in <b>total marks</b>.</h5>
									<h5>Note 3: <b>Aggregate</b> and <b>Average</b> percentage may or may not be equal.</h5>
								</ul>
							</td> 
						</tr>
						<tr>
							<td><label class="control-label">UNIVERSITY</label></td>
							<td><input class="form-control diplomaInput" type="text"  value="" /></td>
						</tr>
						<tr>
							<td><label class="control-label">PASSING YEAR</label></td>
							<td><input class="form-control diplomaInput" type="text"  value="" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
							<td><input class="form-control diplomaInput" type="text"  value="" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">TOTAL MARKS</label></td>
							<td><input class="form-control diplomaInput" type="text"  value="" required/></td>
						</tr>
						<tr>
							<td><label class="control-label">MARKS OBTAINED</label></td>
							<td><input class="form-control diplomaInput" type="text"  value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">AVERAGE PERCENTAGE</label></td>
							<td><input class="form-control diplomaInput" type=""  name="GAvgPercent" value="<?php echo '0'; ?>" placeholder="Average Percentage" disabled/></td>
						</tr>
						
						<tr>
							<td colspan=4 class="align-center">
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
?>	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
		<div class="well">
				<h4>TPO - DETAILS FORM - PAGE 4</h4>
				<?php print_r($_POST); ?>
				<div class="table-responsive">
					<form class="form form-horizontal" method="POST" action=""><fieldset>
					<table class="table table-condensed table-hover table-bordered">
					<tbody>				
						<tr class="table-section-head"><td colspan="4">Higher Secondary School (XII) Details</td><tr>
						<tr class="align-center">
							<td colspan="4">
								<div class=""><label>
									Tick <input type="checkbox" name="HSSchoolApplcable" id="HSSchoolFlag" value="no" onChange="HSSchoolFlagChange()" /> -  if this section is not applicable.
								</label></div>
							</td>
						</tr>
						<tr>
							<td><label class="control-label">BOARD</label></td>
							<td><input class="form-control HSSchoolInput" type="text" placeholder="Board" value="" required/></td>
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
							<td><input class="form-control HSSchoolInput" type="text" placeholder="Passing Year *" name="TwPassYear" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
							<td><input class="form-control HSSchoolInput" type="text" placeholder="Aggregate Percentage *" name="TwAggPercent" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">TOTAL MARKS</label></td>
							<td><input class="form-control HSSchoolInput" type="text" placeholder="Total Marks *" name="TwTotal" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">MARKS OBTAINED</label></td>
							<td><input class="form-control HSSchoolInput" type="text" placeholder="Marks Obtained *" name="TwMarks" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">AVERAGE PERCENTAGE</label></td>
							<td><input class="form-control " type="text"  name="TwAvgPercent" value="<?php echo '0'; ?>" placeholder="Average Percentage" disabled/></td>
						</tr>
						
						<tr class="table-section-head"><td colspan="4">High School (X) Details</td><tr>
						<tr>
							<td><label class="control-label">BOARD</label></td>
							<td><input class="form-control HighSchoolInput" type="text" placeholder="Board *" name="TenBoard" value="" required/></td>
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
							<td><input class="form-control HighSchoolInput" type="text" placeholder="Passing Year *" name="TenPassYear" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">AGGREGATE PERCENTAGE</label></td>
							<td><input class="form-control HighSchoolInput" type="text" placeholder="Aggregate Percentage *" name="TenAggPercent" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">TOTAL MARKS</label></td>
							<td><input class="form-control HighSchoolInput" type="text" placeholder="Total Marks *" name="TenTotal" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">MARKS OBTAINED</label></td>
							<td><input class="form-control HighSchoolInput" type="text" placeholder="Marks Obtained *" name="TenMarks" value="" required /></td>
						</tr>
						<tr>
							<td><label class="control-label">AVERAGE PERCENTAGE</label></td>
							<td><input class="form-control " type="text"  name="TenAvgPercent" value="<?php echo '0'; ?>" placeholder="Average Percentage" disabled/></td>
						</tr>
						<tr>
							<td colspan=4 class="align-center">
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
?>	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
		<div class="well">
				<h4>TPO - DETAILS FORM - PAGE 5</h4>
				<?php print_r($_POST); ?>				
				<ul class="pager visible-desktop">
					<li><a class="" href="?page=fillDetails&formpage=3">&larr; Page 3</a></li>
					<li><a class="" href="?page=fillDetails&formpage=5">Page 5 &rarr;</a></li>
				</ul>
		</div>
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	
<?php
	else:
?>	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
		<div class="well">
				<h4>TPO - DETAILS FORM - SUBMITTED</h4>
				<ul>
					<li>Fields marked with asterisk (*) are mandatory.</li>
					<li>Use 'NA' where-ever applicable.</li>
					<li>More instructions are provided in REMARK sections for help.</li>
					<li>Do <b>NOT</b> use small devices (mobile, tablet etc) for filling this form.</li>
					<li>Do <b>NOT</b> fill characters in places where numbers are required (e.g. Eye Power)</li>
				</ul>
				<h3 class="noshadow-heading align-center">GO BACK TO DASHBOARD</h3>
		</div>
	</div>
	<div class="col-lg-2"></div>
	</div>
<?php	
	endif;
?>	