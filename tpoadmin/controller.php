<?php

session_start();

include('config.php') ;

if(!isset($_POST['tpouname']) && !isset($_POST['tpopwd']))
//die("<a href='http://tpo.jec-jabalpur.org/home.php'> Login Reqired ..</a>") ;
die("<a href='index.php'> Login Reqired ..</a>") ;

$errmsg = array();
$errflag=false;

if($_POST['tpouname'] == '' )
{
	$errmsg[] = "Enter Your Username ";
	$errflag = true ;
	
}

if( $_POST['tpopwd']=='')
{
	$errmsg[] = "Enter Your Password ";
	$errflag = true ;

}


if($errflag)
{
	echo "<ul>" ;
	foreach($errmsg as $fn=> $value)
	{
		
		echo "<li>" . $value . "</li>" ;
	}
	
	echo "</ul>";
	
	//die("<br /> <a href='http://tpo.jec-jabalpur.org/home.php'>Login Here .</a>") ;
	die("<br /> <a href='http://tpo.jec-jabalpur.org/tpoadmin'>Login Here .</a>") ;

}

	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$tpouname = clean($_POST['tpouname']);
	$tpopwd = clean($_POST['tpopwd']);

$query = "Select * from `admin` where username = '$tpouname' and password = '$tpopwd'" ;

$result = mysql_query($query) ;  echo mysql_error();

$rows = mysql_num_rows($result) ;
//print_r($rows);
if($rows == 1) 
{
	
	$_SESSION['tname'] = mysql_result($result,0,'username') ;
	//header("Location: http://tpo.jec-jabalpur.org/tposervices.php") ;
	header("Location: dashboard.php") ;
	exit;

}

else 

//echo "<center><h2>Username and Password do Not match .. <a href='http://tpo.jec-jabalpur.org/home.php'> Login Again</a></h2></center>" ;

	echo "<center><h2>Username and Password do Not match .. <a href='index.php'> Login Again</a></h2></center>" ;


?>