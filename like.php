<?php
$host = "localhost";
$user = "root";
$password = '';
$database = "interaction";
$connect = new mysqli($host, $user, $password, $database);

// Check the connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$countLike = 0;
$countUnlike=0;
$result = $connect->query("SELECT * FROM likes");
while ($row = $result->fetch_assoc()) {
    $countLike += $row['like_count'];
    
}
?>
