<?php # Script 7.2 - mysql_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL and selects the database.
// database password 6P$2Fk84c9XcHDe
date_default_timezone_set("Asia/Kuala_Lumpur");
// $dbc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("could not connect to mysql"); 

// mysqli_select_db($dbc,DB_NAME) or die ("no database"); 


DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'vaccination');

$dbc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("could not connect to mysql"); 

mysqli_select_db($dbc,DB_NAME) or die ("no database"); 

// Make the connnection.
//$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could //not connect to MySQL: ' . mysql_error() );

// Select the database.
//@mysql_select_db (DB_NAME) OR die ('Could not select the database: ' //. mysql_error() );
?>
