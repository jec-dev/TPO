<?php
error_reporting(E_ALL ^ E_DEPRECATED);
 mysql_connect("localhost","enginee1_ewpu","harami123");
 //mysql_select_db("enginee1_tpo"); 
 $batch=2016;
 
 

 if(isset($_POST['batch'])){
 	$batch=$_POST['batch'];
 	$_SESSION['batch']=$batch;
 }
 
 
 
 

 if($batch==2013){
	mysql_select_db("enginee1_tpo") or die(mysql_error());
	// echo '2013 db selected';
	$r=mysql_query("select DATABASE()");
	$_SESSION['db']=mysql_result($r,0);

 }
 elseif($batch==2014){
 	mysql_select_db("enginee1_tpo14") or die(mysql_error());;
	// echo '2014 db selected';
	$r=mysql_query("select DATABASE()");
	$_SESSION['db']=mysql_result($r,0);
 }  
 
 elseif($batch==2015){
 	mysql_select_db("enginee1_tpo15") or die(mysql_error());;
	//echo '2015 db selected';
	$r=mysql_query("select DATABASE()");
	$_SESSION['db']=mysql_result($r,0);
 }  
 
 elseif($batch==2016){
 	//mysql_select_db("enginee1_tpo16") or die(mysql_error());;
 	mysql_select_db("enginee1_tpo16") or die(mysql_error());;
	//echo '2016 db selected';
	$r=mysql_query("select DATABASE()");
	$_SESSION['db']=mysql_result($r,0);
 }  
 

  $_SESSION['batch']=$batch;

  
?>