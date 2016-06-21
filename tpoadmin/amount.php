<?php 

include('config.php');
echo '<hr>';
echo "Total Students:";
$result = mysql_query("SELECT count(*) FROM `student` where verified = 1");


//if (!$result) echo mysql_error();

$row = mysql_fetch_row($result);
print_r($row);  

echo '<hr>';  


// IT

echo "IT branch:";

$result1 = mysql_query("SELECT count(*) FROM `student` where verified = 1 and branch = 'IT'");


//if (!$result) echo mysql_error();

$row1 = mysql_fetch_row($result1);
print_r($row1);  

echo '<hr>'; 


//CSE

echo "CS Branch:";

$result2 = mysql_query("SELECT count(*) FROM `student` where verified = 1 and branch = 'CSE'");


//if (!$result) echo mysql_error();

$row2 = mysql_fetch_row($result2);
print_r($row2);  

echo '<hr>'; 

//MECH

echo "MECHANICAL Branch:";

$result3 = mysql_query("SELECT count(*) FROM `student` where verified = 1 and branch = 'MECHANICAL'");


//if (!$result) echo mysql_error();

$row3 = mysql_fetch_row($result3);
print_r($row3);  

echo '<hr>'; 


//IP

echo "INDUSRTIAL PRODUCTION Branch:";

$result4 = mysql_query("SELECT count(*) FROM `student` where verified = 1 and branch = 'IP'");


//if (!$result) echo mysql_error();

$row4 = mysql_fetch_row($result4);
print_r($row4);  

echo '<hr>'; 


//EC

echo "Electronics and Communications Branch:";

$result5 = mysql_query("SELECT count(*) FROM `student` where verified = 1 and branch = 'E&TC'");


//if (!$result) echo mysql_error();

$row5 = mysql_fetch_row($result5);
print_r($row5);  

echo '<hr>'; 


//MCA

echo "MCA:";

$result6 = mysql_query("SELECT count(*) FROM `student` where verified = 1 and branch = 'MCA'");


//if (!$result) echo mysql_error();

$row6 = mysql_fetch_row($result6);
print_r($row6);  

echo '<hr>'; 

?>