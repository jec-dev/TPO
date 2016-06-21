
<link href="css/bootstrap.min.css" rel="stylesheet">
<?php

session_start();

include('config.php') ;

if(!isset($_SESSION['tname']))
{
	die("<a href='index.php'>Login Required</a>") ;
	exit;
}


?>

<html>

<head>

</head>

<body>

<table>

<form action="" method='POST'>

<th><h4><strong><center>Search Student By Roll Number:</center></strong></h4></th>

	<tr>
	<td>Enter Roll Number</td><td><input type="text" name='rollno' /></td>

	<tr><td><br><input type="Submit" value='Search' /></td></tr>
	
	</tr>


</form>
</table>
<br />
<!--<a href="http://tpo.jec-jabalpur.org/tposervices.php" >Return</a> -->
<a href="dashboard.php" >Return</a>

<!--<a href="http://tpo.jec-jabalpur.org/signout.php">SIGNOUT</a> -->
<a href="signout.php">SIGNOUT</a>

<hr />

<?php

if(count($_POST)>0)

	{
		$rno = $_POST['rollno'] ;
		
		$query = "Select * from student where rollNo = '$rno'" ;
		
		$result = mysql_query($query) ;
		
		$row = mysql_fetch_assoc($result) ;
		
		echo "<table><th>Details</th>" ;
		
		foreach($row as $fn => $value)
		
		{ 
			echo "<tr>" ;
			echo "<td>".$fn."</td>" . "<td>" . $value."</td>  " ;
			echo"</tr>" ;
		}
		echo "</table>" ;
		
		echo "<hr />" ;
	
	
	
	}



?>


</body>

</html>