<?php
$host="localhost";
$user = "root";
$password = '';
$database = "hadi_project";
$connect = new mysqli($host, $user, $password, $database);

    if($connect->error)
       die("failed to connect with database");


    echo "database connected!";
    $connect->close();

    ?>