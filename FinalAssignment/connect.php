<?php
//this file sets up the connection


//set database host
$dbhost = "localhost";

//set database user 
$dbuser= "root";

//set database password
$dbpass = "cs3319";

//set database name
$dbname = "sahme339assign2db";

//set database connection to be utilized elsewhere 
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);

//if connection fails 
if (mysqli_connect_errno()) {
 die("Database connection failed :" .
 mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
 } 
?>