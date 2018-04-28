<?php


$user = 'root';
$pass = '';
$db = 'Ripple_Effect';
$db_Host = 'localhost';

$db = new mysqli($db_Host, $user, $pass, $db) or die("Error.");

echo "hello";

?>