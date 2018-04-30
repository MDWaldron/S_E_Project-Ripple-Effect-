<?php
	
    /* 
        Will be used to call to establish a connection to the database
    */

   $server = "localhost";
   $database = "Ripple_Effect";
   $db = new mysqli($server,"root", "", $database);
   if (!$db) {
    die("Connection failed: " . mysqli_error($db));
	} 
   $dbconnect = mysqli_select_db($db, $database);
   if(!$dbconnect)
   {
   	die("database selection failed" . mysql_error($db));
   }
  
?>