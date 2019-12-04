<link href="//vjs.zencdn.net/7.0/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/7.0/video.min.js"></script>

 <head>

 <script type="text/javascript" src="//cdn.jsdelivr.net/afterglow/latest/afterglow.min.js"></script>
 </head>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Edukasi</title>
  

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    


</head>
<body>

<section class="first-gallery-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="text-content">
                <h2>Video Edukasi</h2>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php

include "koneksi.php";

$query = mysqli_query($koneksi,"SELECT * FROM tb_videoedukasi");
$row = mysqli_num_rows($query);

$buku = query("SELECT * FROM tb_videoedukasi ");




?>

<div class="container-fluid">
<h4>Koleksi dari <?php echo $row; ?> Video yang tersedia. </h4>  
</div>
<br>
<br>

<div class="container">


<div class="row mb-5">
<?php foreach($buku as $books) : ?>
   
        <div class="col-md-6 text-center">
          <div class="card">

          <video

            width="538px"
            id="my-player"
            class="video-js"
            controls
            preload="auto"
            poster="<?=$books["cover"];?>"
            data-setup=’{}’>
            <source src="<?=$books["video"];?>" type="video/mp4"></source>
            <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="<?=$books["video"];?>" target="_blank">
            supports HTML5 video
            </a>
            </p>
            </video>
            <h3 class="card-title"><?php echo $books["judulvideo"]; ?></h3>

          </div>
        </div>
        <br>
        <?php endforeach; ?>
    </div>

    
</body>
</html>

