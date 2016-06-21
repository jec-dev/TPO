

<?php

session_start();

include('config.php') ;

if(!isset($_SESSION['tname']))
{
	//die("<a href='http://tpo.jec-jabalpur.org/home.php'>Login Required</a>") ;
	die("<a href='admin.php'>Login Required</a>") ;
	exit;
}


?>

<html>

<head>

</head>

<body>

<table>

<form action="" method='POST'>

<th><h2><center>Search Student By Name</center></h2></th>

	<tr>
	<td>First Name</td><td><input type="text" name='Fname' /></td>
	<td>Middle Name</td><td><input type="text" name='Mname' /></td>
	<td>Last Name</td><td><input type="text" name='Lname' /></td>
	<tr><td><input type="Submit" value='Search' /></td></tr>
	</tr>


</form>
</table>
<br />
<a href="dashboard.php" >Return</a>
<!--<a href="http://tpo.jec-jabalpur.org/tposervices.php" >Return</a>-->

<!--<a href="http://tpo.jec-jabalpur.org/signout.php">SIGNOUT</a> -->
<a href="signout.php">SIGNOUT</a>

<hr />

<?php

if(count($_POST)>0)

	{
		$fname = $_POST['Fname'] ;
		$mname = $_POST['Mname'] ;
		$lname = $_POST['Lname'] ;
		
				
		$query = "Select * from student where FName = '$fname' AND MName = '$mname' AND LName = '$lname'" ;
		
		$result = mysql_query($query) ;
		
		$num = mysql_num_rows($result) ;
		
		if($num == 0)
		
		{
			//echo "<br /> No Data Found .. <a href='http://tpo.jec-jabalpur.org/ssn.php'>Enter Again.. </a>";
			echo "<br /> No Data Found .. <a href='namesearch.php'>Enter Again.. </a>";		
		}
		
		else
		
		{
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
	}



?>


</body>

</html>