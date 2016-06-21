<?php
	include_once 'student_config.php';
	
	if(!(isset($_GET['rollno']) && isset($_GET['batch']))){
		echo "INVALID ACCESS ATTEMPT";
	}else{
		$rollno = $_GET['rollno'];
		$dbConn = openDB($_GET['batch']);
		$sql = "SELECT `studentCV`,`studentCVSaved` FROM `studentdocs` WHERE `rollno` LIKE '$rollno' ";
		$r = mysqli_query($dbConn,$sql);
		closeDB($dbConn);
		
		if(!$r){
			echo "DB QUERY ERROR";
		}else{
			$d = mysqli_fetch_assoc($r);
			if($d['studentCVSaved']==1){
				$name = $rollno.'_CV.pdf';
				header("Content-disposition: attachment; filename=$name");
				header("content-type: application/pdf");
				$cv_data = $d['studentCV'];
				echo $cv_data;
			}else{
				echo "CV NOT UPLOADED";
			}
		}
		
	}	
?>