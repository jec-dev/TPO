<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
body{
				padding:0px;
				margin:0px;
			}
h4{
	padding:0px;
	margin:0px;
}

#options{
	position:fixed;
	top:0px;
	left:0px;
	background:#c44;
	padding:4px;
	border:1px solid #000;
}

a{
	text-decoration:none;
	color:;
}

table.info{
	width:680px;
	border-collapse:collapse;
}

.info tr{
	height: 14pt;
	padding: 2px;
}

.info tr td:nth-child(2n+1){
	font-weight:bold;
	background:#e9e9e9;
}
</style>
</head>
<body>

<?php
	session_start();
	include 'config.php';
	
	if(!isset($_SESSION['tname'])){
		//echo '<h4>Login required</h4><a href="http://tpo.jec-jabalpur.org/admin.php">click here to login</a>';
		echo '<h4>Login required</h4><a href="index.php">click here to login</a>';
		die('<hr/>');
	}
?>	
	

<center>
<b>UPDATE DETAILS</b><hr/>
<form method="POST" action="">
	<label>Batch : </label><input type="text" name="batch" value="2016"/>
	<label>Roll Number : </label><input type="text" name="rollNo"/>
	<input type="submit" name="detailShowSubmit" value="Show Detail"/>
</form>

<?php
if(isset($_POST['detailUpdateSubmit']))
	{
		foreach($_POST as $key=>$value)
		{
			$_POST[$key]=trim($value);
		}
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

		$qry="UPDATE `student` SET `FName`='".$_POST['FName']."', 
		`MName`='".$_POST['MName']."',
		`LName`='".$_POST['LName']."', 
		`dob`='".$_POST['dob']."',
		`gender`='".$_POST['gender']."',
		`fatherName`='".$_POST['fatherName']."',
		  `fatherOccupation`='".$_POST['fatherOccupation']."',
		   `motherName`='".$_POST['motherName']."',
		   `motherOccupation`='".$_POST['motherOccupation']."',
		    `familyIncome`='".$_POST['familyIncome']."',
		     `course`='".$_POST['course']."',
		     `branch`='".$_POST['branch']."',
		     `entryLevel`='".$_POST['entryLevel']."',
		      `university`='".$_POST['university']."',
		      `admissionYear`='".$_POST['admissionYear']."',
		       `semCurrent`='".$_POST['semCurrent']."',
		       `mes`='".$_POST['mes']."',
		       `dropYear`='".$_POST['dropYear']."',
		       `sem1sgpa`='".$sem1sgpa."'
        `sem2sgpa`='".$sem2sgpa."',
        `sem3sgpa`='".$sem3sgpa."',
        `sem4sgpa`='".$sem4sgpa."',
        `sem5sgpa`='".$sem5sgpa."',
        `sem6sgpa`='".$sem6sgpa."',
        `sem7sgpa`='".$sem7sgpa."',
        `sem8sgpa`='".$sem8sgpa."',
        `sem1credits`='".$sem1credits."',
        `sem2credits`='".$sem2credits."',
        `sem3credits`='".$sem3credits."',
        `sem4credits`='".$sem4credits."',
        `sem5credits`='".$sem5credits."',
        `sem6credits`='".$sem6credits."',
        `sem7credits`='".$sem7credits."',
        `sem8credits`='".$sem8credits."',
		             `cgpa`='".$cgpa."',
		             `percentage`='".$percentage."',
		             `backlogTotal`='".$_POST['backlogTotal']."',
		              `backlogCleared`='".$_POST['backlogCleared']."',
		              `failYear`='".$_POST['failYear']."',
		              `minorTraining`='".$_POST['minorTraining']."',
		              `majorTraining`='".$_POST['majorTraining']."', 
		              `minorProject`='".$_POST['minorProject']."',
		              `majorProject`='".$_POST['majorProject']."',
		              `GDegree`='".$_POST['GDegree']."',
		              `GCourse`='".$_POST['GCourse']."',
		               `GUniversity`='".$_POST['GUniversity']."',
		               `GPassYear`='".$_POST['GPassYear']."',
		               `GAggPercent`='".$_POST['GAggPercent']."',
		                `GTotal`='".$_POST['GTotal']."',
		                 `GMarks`='".$_POST['GMarks']."',
		                 `GAvgPercent`='".$_POST['GAvgPercent']."',
		                  `DCourse`='".$_POST['DCourse']."',
		                  `DUniversity`='".$_POST['DUniversity']."',
		                  `DPassYear`='".$_POST['DPassYear']."',
		                  `DAggPercent`='".$_POST['DAggPercent']."',
		                   `DTotal`='".$_POST['DTotal']."',
		                   `DMarks`='".$_POST['DMarks']."',
		                   `DAvgPercent`='".$_POST['DAvgPercent']."',
		                   `TwBoard`='".$_POST['TwBoard']."',
		                    `TwPassYear`='".$_POST['TwPassYear']."',
		                    `TwAggPercent`='".$_POST['TwAggPercent']."',
		                    `TwTotal`='".$_POST['TwTotal']."',
		                    `TwMarks`='".$_POST['TwMarks']."',

		          `TwAvgPercent`='".$_POST['TwAvgPercent']."',
		          `TwApplicable`='".$_POST['TwApplicable']."',
		          `TenBoard`='".$_POST['TenBoard']."', 
		          `TenPassYear`='".$_POST['TenPassYear']."',
		           `TenAggPercent`='".$_POST['TenAggPercent']."', 
		           `TenTotal`='".$_POST['TenTotal']."',
		           `TenMarks`='".$_POST['TenMarks']."',
		            `TenAvgPercent`='".$_POST['TenAvgPercent']."',
		            `TenTotal`='".$_POST['TenTotal']."',
		            `TenMarks`='".$_POST['TenMarks']."',
		             `TenAvgPercent`='".$_POST['TenAvgPercent']."',
		             `PAddress`='".$_POST['PAddress']."',
		             `PCity`='".$_POST['PCity']."',
		             `PState`='".$_POST['PState']."',
		              `PPin`='".$_POST['PPin']."',
		              `CAddress`='".$_POST['CAddress']."',
		              `CCity`='".$_POST['CCity']."',
		              `CState`='".$_POST['CState']."', 
		              `CPin`='".$_POST['CPin']."',
		              `mobile`='".$_POST['mobile']."',
		              `phone`='".$_POST['phone']."',
		              `email`='".$_POST['email']."',
		               `altEmail`='".$_POST['altEmail']."',
		               `height`='".$_POST['height']."',
		               `weight`='".$_POST['weight']."',
		                `LEye`='".$_POST['LEye']."',
		                 `REye`='".$_POST['REye']."',
		                 `BGroup`='".$_POST['BGroup']."',
		                 `HFlag`='".$_POST['HFlag']."',
		                 `HDetail`='".$_POST['HDetail']."',
		                   `formLock`='".$_POST['formLock']."',
		                   `verified`='".$_POST['verified']."',
		                    `willing`='".$_POST['willing']."',
		                    `topper_75`='".$_POST['topper_75']."',
		                    `ne_company`='".$_POST['ne_company']."',
		                    `gate_reg`='".$_POST['gate_reg']."'

		                     WHERE `rollno` LIKE '".$_POST['rollno']."' ";
		

		$r=mysql_query($qry);
		if($r){
			echo '<center><h4>updated</h4></center>';
		}else{
			echo '<center><h4>failed</h4></center>';
		}
		
	}
?>
<?php

echo '<hr />' ;

if(isset($_POST['detailShowSubmit']) || isset($_POST['detailUpdateSubmit']) || isset($_POST['verifySubmit'])){

$rno=$_POST['rollNo'];
$query = "Select * from `student` where rollNo = '$rno'" ;

$result = mysql_query($query) ;
$n=mysql_num_rows($result);
if($n<1){
	die('No record found');
}
$row = mysql_fetch_assoc($result);

$alias = array();

foreach($row as $fn=>$value)
{
    $alias[$fn] = mysql_result($result,0,$fn);
}


echo '
<table align="center" border="1" class="info">
			<thead>
				<td>FName</td>
				<td>LName</td>
				<td>10th</td>
				<td>12th</td>
				<td>Physical</td>
				<td>Address</td>
			</thead>
			<tr>
				<td>'.$alias['FName'].'</td>
				<td>'.$alias['LName'].'</td>
				<td>'.$alias['TenBoard'].'</td>
				<td>'.$alias['TwBoard'].'</td>
				<td>'.$alias['HFlag'].'</td>
				<td>'.$alias['PAddress'].'</td>
			</tr></table><br/>';
			
echo '<form method="POST" action="">';
echo '<input type="hidden" name="rollNo" value="'.$alias['rollno'].'"/>';
echo '<table class="info" border="1" align="center">' ;

echo '<tr><td>Roll Number</td><td>' .$alias['rollno'] .'</td></tr>' ;
echo '<tr>
<td>Tenth Board</td>
<td><input type="text" name="TenBoard" value="'.$alias['TenBoard'].'" /></td>
<td>Tenth Passing Year</td>
<td><input type="text" name="TenYear" value="'.$alias['TenPassYear'].'" /></td></tr><tr>
<td>Marks obtained in Tenth</td>
<td><input type="text" name="TenMarks" value="'.$alias['TenMarks'].'" /></td>
<td>Total Marks</td>
<td><input type="text" name="TenTotal" value="'.$alias['TenTotal'].'" /></td>
</tr>' ;

echo '<tr><td>Percent in Tenth</td><td><input type="text" name="TenAvgPercent" value="'.$alias['TenAvgPercent'].'" /></td></tr>';

echo '<tr>
<td>Twelfth Board</td>
<td><input type="text" name="TwBoard" value="'.$alias['TwBoard'].'" /></td>
<td>Twelfth Passing Year</td>
<td><input type="text" name="TwPassYear" value="'.$alias['TwPassYear'].'" /></td></tr><tr>
<td>Marks obtained in Twelfth</td>
<td><input type="text" name="TwMarks" value="'.$alias['TwMarks'].'" /></td>
<td>Total Marks</td>
<td><input type="text" name="TwTotal" value="'.$alias['TwTotal'].'" /></td>
<td>Twelfth Aggregate</td>
<td><input type="text" name="TwAggPercent" value="'.$alias['TwAggPercent'].'" /></td>
</tr>' ;
echo '<tr><td>Percent in Twelfth</td><td><input type="text" name="TwAvgPercent" value="'.$alias['TwAvgPercent'].'" /></td></tr>';

echo '<tr><td>No. of years Dropped</td><td><input type="text" name="dropYear" value="'.$alias['dropYear'].'" /></td><td>No. of years Failed</td>
<td><input type="text" name="failYear" value="'.$alias['failYear'].'" /></td></tr>' ;


echo '<tr><td>Entry Level</td><td><input type="text" name="entryLevel" value="'.$alias['entryLevel'].' "/></td><td>University</td>
<td><input type="text" name="university" value="'.$alias['university'].' "/></td></tr>' ;

echo '<tr><td>Admission Taken in the Year</td><td><input type="text" name="admissionYear" value="'.$alias['admissionYear'].' "/></td><td>Passing Year</td>
<td><input type="text" name="passingYear" value="'.$alias['passingYear'].' "/></td></tr>' ;

echo '<tr>
<td>Current Semester</td>
<td><input type="text" name="semCurrent" value="'.$alias['semCurrent'].' "/></td>
<td>Sem 1 %</td>
<td><input type="text" name="sem1sgpa" value="'.$alias['sem1sgpa'].' "/></td></tr><tr>
<td>Sem 2 %</td>
<td><input type="text" name="sem2sgpa" value="'.$alias['sem2sgpa'].' "/></td>
<td>Sem 3 %</td>
<td><input type="text" name="sem3sgpa" value="'.$alias['sem3sgpa'].' "/></td></tr><tr>
<td>Sem 4 %</td>
<td><input type="text" name="sem4sgpa" value="'.$alias['sem4sgpa'].' "/></td>
<tr><td>Sem 5 %</td>
<td><input type="text" name="sem5sgpa" value="'.$alias['sem5sgpa'].' "/></td></tr><tr>
<td>Sem 6 %</td>
<td><input type="text" name="sem6sgpa" value="'.$alias['sem6sgpa'].' "/></td>
<td>Sem 7 %</td>
<td><input type="text" name="sem7sgpa" value="'.$alias['sem7sgpa'].' "/></td></tr>
<td>Sem 8 %</td>
<td><input type="text" name="sem8sgpa" value="'.$alias['sem8sgpa'].' "/></td>
<tr>

<td>Sem 1 Credits</td>
<td><input type="text" name="sem1credits" value="'.$alias['sem1credits'].' "/></td>
<td>Sem 2 Credits</td>
<td><input type="text" name="sem2credits" value="'.$alias['sem2credits'].' "/></td></tr><tr>
<td>Sem 3 Credits</td>
<td><input type="text" name="sem3credits" value="'.$alias['sem3credits'].' "/></td>
<td>Sem 4 Credits</td>
<td><input type="text" name="sem4credits" value="'.$alias['sem4credits'].' "/></td></tr>
<tr><td>Sem 5 Credits</td>
<td><input type="text" name="sem5credits" value="'.$alias['sem5credits'].' "/></td>
<tr>
<td>Sem 6 Credits</td>
<td><input type="text" name="sem6credits" value="'.$alias['sem7credits'].' "/></td>
<td>Sem 7 Credits</td>
<td><input type="text" name="sem7credits" value="'.$alias['sem7credits'].' "/></td>
<td>Sem 8 Credits</td>
<td><input type="text" name="sem8credits" value="'.$alias['sem8credits'].' "/></td></tr>
<br>
<td>Percentage</td>
<td><input type="text" name="percentage" value="'.$alias['percentage'].' "/></td></tr>

</tr>';

echo '<tr>
	<td>Minor Training</td>
	<td><input type="text" name="minorTraining" value="'.$alias['minorTraining'].' "/></td>
	<td>Minor Project</td>
	<td><input type="text" name="minorProject" value="'.$alias['minorProject'].' "/></td><tr>
	<td>Major Training</td>
	<td><input type="text" name="majorTraining" value="'.$alias['majorTraining'].' "/></td>
	<td>Major Project</td>
	<td><input type="text" name="majorProject" value="'.$alias['majorProject'].' "/></td></tr>
</tr>' ;

echo '<tr><td>Aggregate %</td><td><input type="text" name="cgpa" value="'.$alias['cgpa'].' "/></td></tr>';

echo '<tr><td>No. of BackLogs</td><td><input type="text" name="backlogTotal" value="'.$alias['backlogTotal'].' "/></td><td>No. Backlogs Cleared </td>
<td><input type="text" name="backlogCleared" value="'.$alias['backlogCleared'].' "/></td></tr>
<tr><td>Current Backlogs</td><td><input type="text" name="backlogCurrent" value="'.$alias['backlogCurrent'].' "/></td></tr>' ;
 

echo '<tr><td><center><b>Graduation Details</b></center> </td></tr>' ;

echo '<tr><td>Marks Obtained</td><td><input type="text" name="GMarks" value="'.$alias['GMarks'].' "/></td><td>Total Marks </td>
<td><input type="text" name="GTotal" value="'.$alias['GTotal'].' "/></td></tr>' ;

echo '<tr>
	<td>Graduation Percent</td><td><input type="text" name="GAvgPercent" value="'.$alias['GAggPercent'].' "/></td>
	<td>ME Specialization</td><td><input type="text" name="mes" value="'.$alias['mes'].' "/></td></tr>' ;


echo '<tr>
	<td>Graduation Degree</td><td><input type="text" name="GDegree" value="'.$alias['GDegree'].' "/></td>
	<td>Graduation Course</td><td><input type="text" name="GCourse" value="'.$alias['GCourse'].' "/></td><tr>
    <td>Graduation University</td><td><input type="text" name="GUniversity" value="'.$alias['GUniversity'].' "/></td>
	<td>Graduation Pass Year</td><td><input type="text" name="GPassYear" value="'.$alias['GPassYear'].' "/></td><tr>
	<td>Graduation Aggregate</td><td><input type="text" name="GAggPercent" value="'.$alias['GAggPercent'].' "/></td>
	<td>Graduation Average</td><td><input type="text" name="GAvgPercent" value="'.$alias['GAvgPercent'].' "/></td></tr></tr>
	</tr>' ;	

//echo '</table>';

echo '<br /><hr />' ;

echo '<tr>
<tr><td>Twelfth</td>
<td><input type="text" name="TwApplicable" value="'.$alias['TwApplicable'].' "/></td>
<td>Tenth Pass Year</td>
<td><input type="text" name="TenPassYear" value="'.$alias['TenPassYear'].' "/></td>
<td>Tenth Aggregate</td>
<td><input type="text" name="TenAggPercent" value="'.$alias['TenAggPercent'].' "/></td>
</tr>
<td>Alternate Email</td>
<td><input type="text" name="altEmail" value="'.$alias['altEmail'].' "/></td>
<td>Height</td>
<td><input type="text" name="height" value="'.$alias['height'].' "/></td>
<tr><td>Weight</td>
<td><input type="text" name="weight" value="'.$alias['weight'].' "/></td>
<td>Left Eye</td>
<td><input type="text" name="LEye" value="'.$alias['LEye'].' "/></td>
<tr>
<td>Right Eye</td>
<td><input type="text" name="REye" value="'.$alias['REye'].' "/></td>
<td>FORM LOCK Status</td>
<td><input type="text" name="formLock" value="'.$alias['formLock'].' "/></td>
<td>VERIFIED</td>
<td><input type="text" name="verified" value="'.$alias['verified'].' "/></td>
</tr>
<tr>
<td>WIllING</td>
<td><input type="text" name="willing" value="'.$alias['willing'].' "/></td>
<td>Topper 75</td>
<td><input type="text" name="topper_75" value="'.$alias['topper_75'].' "/></td><tr>
<td>No. of Company</td>
<td><input type="text" name="ne_company" value="'.$alias['ne_company'].' "/></td>
<td>Gate Reg. No.</td>
<td><input type="text" name="gate_reg" value="'.$alias['gate_reg'].' "/></td></tr></tr>

</tr>';

//echo $_SESSION['entry']; 


echo '<table class="info" border="1" align="center">' ;
echo '<th>Lateral Entry</th>
<tr>
	<td>Course</td>
	<td><input type="text" name="DCourse" value="'.$alias['DCourse'].' "/></td>
</tr>
<tr>
	<td>University</td>
	<td><input type="text" name="DUniversity" value="'.$alias['DUniversity'].' "/></td>
</tr>

<tr>
	<td>Diploma Total</td>
	<td><input type="text" name="DTotal" value="'.$alias['DTotal'].' "/></td>
</tr>
<tr>
	<td>Diploma Marks</td>
	<td><input type="text" name="DMarks" value="'.$alias['DMarks'].' "/></td>
</tr>

<tr>
	<td>Diploma Average Percentage</td>
	<td><input type="text" name="DAvgPercent" value="'.$alias['DAvgPercent'].' "/></td>
</tr>

<tr>
	<td>Year of Passing</td>
	<td><input type="text" name="DPassYear" value="'.$alias['DPassYear'].' "/></td>
</tr>
<tr>
	<td>Percent</td>
	<td><input type="text" name="DAggPercent" value="'.$alias['DAggPercent'].' "/></td>
</tr>';


echo '</table>' ;

echo '<br /><hr />' ;


echo '<table class="info" border="1" align="center">' ;

echo '<tr>
	<td>First Name</td>
	<td><input type="text" name="FName" value="'.$alias['FName'].' "/></td>
	<td>Middle Name</td>
	<td><input type="text" name="MName" value="'.$alias['MName'].' "/></td>
	<td>Last Name</td>
	<td><input type="text" name="LName" value="'.$alias['LName'].' "/></td>
</tr>' ;

echo '<tr>
	<td>Father Name</td>
	<td><input type="text" name="fatherName" value="'.$alias['fatherName'].' "/></td>
	<td>Mother Name</td>
	<td><input type="text" name="motherName" value="'.$alias['motherName'].' "/></td>
	<td>Gender</td>
	<td><input type="text" name="gender" value="'.$alias['gender'].' "/></td><br>
	
</tr>' ;

echo '<tr>
    <td>Father Occupation</td>
	<td><input type="text" name="fatherOccupation" value="'.$alias['fatherOccupation'].' "/></td>
	<td>Mother Occupation</td>
	<td><input type="text" name="motherOccupation" value="'.$alias['motherOccupation'].' "/></td>
	<td>Family Income</td>
	<td><input type="text" name="familyIncome" value="'.$alias['familyIncome'].' "/></td>
	</tr>';

echo '<tr>
	<td>Course</td>
	<td><input type="text" name="course" value="'.$alias['course'].' "/></td>
	<td>Branch</td>
	<td><input type="text" name="branch" value="'.$alias['branch'].' "/></td>
	<td>Current Semester</td>
	<td><input type="text" name="sem" value="'.$alias['semCurrent'].' "/></td>
	</tr>' ;
	
echo '<tr>
	<td>Phone number</td>
	<td><input type="text" name="phone" value="'.$alias['phone'].' "/></td>
	<td>Mobile</td>
	<td><input type="text" name="mobile" value="'.$alias['mobile'].' "/></td>
	<td>Email</td>
	<td><input type="text" name="email" value="'.$alias['email'].' "/></td></tr><tr>
	<td>Date of Birth</td>
	<td><input type="text" name="dob" value="'.$alias['dob'].' "/></td>
	<td>Blood Group</td>
	<td><input type="text" name="BGroup" value="'.$alias['BGroup'].' "/></td>
	</tr>' ;	
	
echo '<tr>
	<td>Permanent Address</td>
	<td colspan="3"><textarea name="PAddress">'.$alias['PAddress'].' </textarea></td>
	<td>State</td>
	<td><input type="text" name="PState" value="'.$alias['PState'].' "/></td></tr><tr>
	<td>City</td>
	<td colspan="3"><input type="text" name="PCity" value="'.$alias['PCity'].' "/></td>
	<td>Pin Code</td>
	<td><input type="text" name="PPin" value="'.$alias['PPin'].' "/></td>
	</tr>' ;	

	echo '<tr>
	<td>Local Address</td>
	<td colspan="3"><textarea name="CAddress">'.$alias['CAddress'].'</textarea></td>
	<td>State</td>
	<td><input type="text" name="CState" value="'.$alias['CState'].' "/></td></tr><tr>
	<td>City</td>
	<td colspan="3"><input type="text" name="CCity" value="'.$alias['CCity'].' "/></td>
	<td>Pin Code</td>
	<td><input type="text" name="CPin" value="'.$alias['CPin'].' "/></td>
	</tr>' ;	
	
echo '<tr>
	<td>Height</td>
	<td><input type="text" name="Height" value="'.$alias['height'].' "/></td>
	<td>Weight</td>
	<td><input type="text" name="Weight" value="'.$alias['weight'].' "/></td></tr><tr>
	<td>Left Eye Power</td>
	<td><input type="text" name="LPower" value="'.$alias['LEye'].' "/></td>
	<td>Right Eye Power</td>
	<td><input type="text" name="RPower" value="'.$alias['REye'].' "/></td>
	</tr>' ;

echo '<tr>
	<td>Handicapped</td>
	<td><input type="text" name="HFlag" value="'.$alias['HFlag'].' "/></td>
	<td>Handicap Detail</td>
	<td><textarea name="HDetail">'.$alias['HDetail'].'</textarea></td>
	</tr>' ;	
	


echo '</table>
<input type="submit" name="detailUpdateSubmit" value="Update" />
</form>';

}//----if end----

else{
	echo "<h4>Enter Roll Number above:</h4>";

}//--else end--



?>

</body>
</html>