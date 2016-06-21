<?php

include_once 'config.php';

$dbConn = openDB(2015);
$sql = "SELECT `username` AS `rollno` FROM login";
$r = mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));;
$count = mysqli_num_rows($r);

echo 'Total Rows: '.$count.'<br><br>';
$n=1;
$status="";
$table = "studentdocs"; 
while($row = mysqli_fetch_assoc($r)){
	//print_r($row);
	$rollno = $row['rollno'];
	$sql = "INSERT INTO `$table`(`rollno`) VALUES ('$rollno')";
	$re = mysqli_query($dbConn,$sql);
	if($re){
		$status="success";
	}else{
		$status = mysqli_error($dbConn);
	}
	echo $n.' - '.$row['rollno'].' - '.$status.'<br>';
	$n=$n+1;
}

closeDB($dbConn);
?>