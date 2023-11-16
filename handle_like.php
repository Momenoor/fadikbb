<?php
$host = "localhost";
$user = "root";
$password = '';
$database = "interaction";
$connect = new mysqli($host, $user, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'like') {
    // Assuming you have a 'likes' table with columns 'like_count'
    $result = $connect->query("SELECT * FROM likes");

    if ($result->num_rows > 0) {
        // Assuming there is only one row for likes
        $row = $result->fetch_assoc();

        if ($row['like_count'] > 0) {
            // If like_count is greater than 0, decrease the count
            $connect->query("UPDATE likes SET like_count = like_count - 1");
        } else {
            // If like_count is 0 or less, increase the count
            $connect->query("UPDATE likes SET like_count = like_count + 1");
        }
    } else {
        // If no row exists, insert a new row with like_count as 1
        $connect->query("INSERT INTO likes (like_count) VALUES (1)");
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'share') {
    // Assuming you have a 'shares' table with a 'share_count' column
    $connect->query("UPDATE shares SET share_count = share_count + 1");
}
?>