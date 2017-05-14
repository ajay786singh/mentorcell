<?php $base_url = 'http://ec2-35-154-102-247.ap-south-1.compute.amazonaws.com/';
$username = "root";
$password = "rootroot";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("mentor_cell", $dbhandle)
  or die("Could not select examples");
  
  ?>