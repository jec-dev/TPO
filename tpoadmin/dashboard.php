  <link href="css/bootstrap.min.css" rel="stylesheet">
<?php

session_start();
if(!isset($_SESSION['tname']))
{
//die("<a href='http://tpo.jec-jabalpur.org/admin.php'> Login required </a>") ;
	die("<a href='index.php'> Login required </a>") ;
exit;
}

	include_once 'config.php';

	unset($_POST['batch']);


echo "<center><h4>Welcome  " . $_SESSION['tname'] ."</h4></center>" ;

?>

<html>

<?php //include 'http://tpo.jec-jabalpur.org/includes/head.php'; ?>
<head>
<title></title>
<style>

#side{
	float:left;
	width: 20%;
	clear:left;
	border-right: 1px solid #ccc;
}
#f{
	width: 75%;
	float: right;
	clear: right;
	border-left: 0px solid #ccc;
	border-right: 0px solid #ccc;
}
iframe{
	width: 100%;
	border: 0px solid #333;
	height: 450px;
}
</style>
</head>
<body>
<form id="loginform" name="loginform" action="" onsubmit="return confirmBatch()" method="POST">
	batch :
	<select name="batch" onchange="">
		<option value="2016">2016</option>
		<option value="2015">2017</option>
	</select>
	<input type="submit" value="submit"/>
</form>

	<span style="font-size: 15px;">Batch Selected :</span>&nbsp;
	<span style="font-size: 15px; color: #f00;"><?=$_SESSION['batch']?></span>
	<span style="font-size: 15px;">Database Selected :</span>&nbsp;
	<span style="font-size: 15px; color: #f00;"><?=$_SESSION['db']?></span>

<div id="dbselect" style="">
<!-- <a href="http://tpo.jec-jabalpur.org/signout1.php">SIGNOUT</a> -->
<a href="signout.php">SIGNOUT</a>
</div>
<hr /><br />


<div id="side">
<ul class="list-group">
	<!--<li><a href="http://tpo.jec-jabalpur.org/ssr.php" target="rframe">Search Student by Roll no.</a></li> -->
	<li><a href="amount.php" target="rframe">Count no. of verified students</a></li> <hr>
	<li><a href="rnosearch.php" target="rframe">Search Student by Roll no.</a></li> <hr>

	<!--<li><a href="http://tpo.jec-jabalpur.org/ssn.php" target="rframe">Search Student by Name</a></li> -->
	<li><a href="namesearch.php" target="rframe">Search Student by Name</a></li> <hr>
	<li><a href="verification.php" target="rframe">View/Update Student Data</a></li> <hr>
	
	<!--
	<li><a href="">Print All Student Passwords</a></li>
	<li><a href="">Print Passwords by Roll no.</a></li>
	<li><a href="">Add New Student User</a></li> 
	<li><a href="">Delete SCo</a></li>
	<li><a href="">Check Zero Data</a></li>
	<li><a href="">Add Branch</a></li>
	<li><a href="">Add Selected Student Details</a></li>
	<li><a href="">Find Selected Students Data</a></li>
	<li><a href="">Willing Status</a></li>-->
</ul>
</div><!---#side----->
<div id="f">
<iframe src="rnosearch.php" name="rframe"></iframe>
</div><!----rframe---->


</body>

</html>