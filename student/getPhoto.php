<?php
	include_once 'student_config.php';
	
	if(!(isset($_GET['rollno']) && isset($_GET['batch']))){
		echo "INVALID ACCESS ATTEMPT";
	}else{
		$rollno = $_GET['rollno'];
		$dbConn = openDB($_GET['batch']);
		$sql = "SELECT `studentPhoto`,`studentPhotoSaved` FROM `studentdocs` WHERE `rollno` LIKE '$rollno' ";
		$r = mysqli_query($dbConn,$sql);
		closeDB($dbConn);
		
		if(!$r){
			echo "DB QUERY ERROR";
		}else{
			$d = mysqli_fetch_assoc($r);
			if($d['studentPhotoSaved']==1){
				header("content-type: image/jpeg");
				$photo_data = $d['studentPhoto'];
				echo $photo_data;
			}else{
				echo "PHOTO NOT UPLOADED";
			}
		}
		
	}	
?>