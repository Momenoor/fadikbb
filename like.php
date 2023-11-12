<?php

$dbuser = "root";
$dbpass = '';
$db = "hadi_project";
$conn = new mysqli('localhost', $dbuser, $dbpass,$dbname) or die("Connect failed!");
echo"great work!";
?>