<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "interaction";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentLikeCount = 0;
$result = $conn->query("SELECT like_count FROM likes WHERE id = 1");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentLikeCount = $row['like_count'];
}

if (isset($_GET["color"]) && ($_GET["color"] == "red" || $_GET["color"] == "black")) {
    $likeChange = ($_GET["color"] == "red") ? 1 : -1;
    $stmt = $conn->prepare("UPDATE likes SET like_count = like_count + ? WHERE id = 1");
    $stmt->bind_param("i", $likeChange);
    if ($stmt->execute()) {

        $result = $conn->query("SELECT like_count FROM likes WHERE id = 1");
        if ($result) {
            $row = $result->fetch_assoc();
            echo $row['like_count'];
        } else {
            echo "Error fetching updated count: " . $conn->error;
        }
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hadikbb-profile</title>
    <link rel="icon"
          href="img/hadikabbani_logo_cartoon_character_beautiful4k_have_color_red_b_d97df318-54a8-4a4e-b36b-84391f8d630f.png">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="container">
    <div class="content">
        <div class="image">
            <img src="img/hadikabbani_logo_cartoon_character_beautiful4k_have_color_red_b_d97df318-54a8-4a4e-b36b-84391f8d630f.png"
                 class="logo" alt="">
        </div>
        <div class="about-me">
            <h2>hadi Kabbani</h2>
            <p>social media</p>
        </div>
        <div class="icon">
            <a href="https://www.facebook.com/hadi.kabbani.505"><i class="fa-brands fa-facebook"
                                                                   style="color: #0084ff;"></i></a>
            <a href="https://www.youtube.com/channel/UCYkmANScI3EtamdQ_iLZJGQ"><i class="fa-brands fa-youtube"
                                                                                  style="color: #ff0000;"></i></a>
            <a href="https://www.instagram.com/hadi_kabany/"><i class="fa-brands fa-instagram"
                                                                style="color: #ff00ff;"></i></a>
            <a href="https://www.tiktok.com/@hadi_kabbany?is_from_webapp=1&sender_device=pc">
                <div class="tiktok">
                    <i class="fa-brands fa-tiktok tiktok1" data-text="tiktok"></i>
                    <i class="fa-brands fa-tiktok tiktok2" data-text="tiktok"></i>
                    <i class="fa-brands fa-tiktok tiktok3" data-text="tiktok"></i>
                </div>
            </a>
        </div>
        <div class="links">
            <a href="mailto:fadikbb2004@gmail.com">Email</a>
            <a href="#">WhatsApp</a>
        </div>

        <div class="interaction">
            <a class="like" style="color: inherit ; text-decoration: none" id="like" href="javascript:">
                <i class="fa-solid fa-heart"></i>
                <div class="text-like" name="txt-like"><?php echo $currentLikeCount; ?></div>
            </a>
            <div class="fa-solid fa-close"></div>
            <div class="comment">
                <form action="" method="post">
                    <input type="text" class="inputmsm">
                    <input type="submit" name="sub" class="submit">
                </form>
                <i class="fa-solid fa-comment"></i>
                <div class="text-comment">0</div>
            </div>
            <div class="share" id="shareButton" name="share_clicked">
                <i class="fa-solid fa-share"></i>
                <div class="text-share" id="shareCount">0</div>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>
<script>
    let likeIcon = document.querySelector(".fa-heart");

    likeIcon.addEventListener("click", () => {
        let color = (likeIcon.style.color === "red") ? "black" : "red";
        likeIcon.style.color = color;
        updateLikeCount(color);
    });

    function updateLikeCount(color) {
        $.ajax({
            url: 'index.php',
            type: 'GET',
            data: {color: color},
            success: function (response) {
                console.log(response);
                document.querySelector('.text-like').textContent = response;
            },
            error: function (xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    }
</script>
</body>
</html>
