<?php

$connect=mysqli_connect("localhost","root","","interaction");
if($connect){
    echo"connect";
}else{
die("not connect");
}
$sql = "SELECT like_count FROM likes ORDER BY like_count";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)> 0){
    while($row = mysqli_fetch_assoc($result)){
        echo " ".$row["like_count"]." ";
    }};
$result = $connect->query($sql);
$row = $result->fetch_assoc();


// if(isset($row)){
//     $update="UPDATE likes SET like_count=like_count+1 WHERE id=1 ";
//     $resUp=$connect->query($update);


//     echo"change";
    
// }    

echo $row['like_count'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hadikbb-profile</title>
    <link rel="icon"
        href="img/hadikabbani_logo_cartoon_character_beautiful4k_have_color_red_b_d97df318-54a8-4a4e-b36b-84391f8d630f.png">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>

<body >
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
                <a href="https://www.facebook.com/hadi.kabbani.505"><i class="fa-brands fa-facebook" style="color: #0084ff;"></i></a>
                <a href="https://www.youtube.com/channel/UCYkmANScI3EtamdQ_iLZJGQ"><i class="fa-brands fa-youtube" style="color: #ff0000;"></i></a>
                <a href="https://www.instagram.com/hadi_kabany/"><i class="fa-brands fa-instagram" style="color: #ff00ff;"></i></a>
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
                <div class="like"name="like"  onclick="save()"  >
                    <i class="fa-solid fa-heart"></i>
                    <div class="text-like" name="txt-like">0</div>
                </div>
                <div class="fa-solid fa-close"></div>
                <div class="comment">
                    <form action="" mathod="post">
                    <input type="text" class="inputmsm">
                    <input type="submit" name="sub"class="submit">
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
</body>

</html>