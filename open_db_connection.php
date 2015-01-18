<?php
$username = "challengeWebCERN";
$password = "pwd";
$hostname = "localhost";
$db_name = "db_challengeWebCERN";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");

$selected = mysql_select_db($db_name,$dbhandle)
or die("Could not select " + $db_name);

echo "Connected to MySQL database " . $db_name;
?>