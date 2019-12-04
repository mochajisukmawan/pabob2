


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog Kelas 1</title>
  

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

<?php
  $tematik = $_GET['tematik'];
  $kelas = $_GET['kelas'];
?>

<section class="first-gallery-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="text-content">
                <h2>Buku Siswa   Kelas <?=$kelas?> Tematik <?=$tematik?></h2>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php

include "koneksi.php";

$query = mysqli_query($koneksi,"SELECT * FROM tb_kelas1 where kelas=".$kelas." && tematik=".$tematik."");
$row = mysqli_num_rows($query);

$buku = query("SELECT * FROM tb_kelas1 where kelas=".$kelas." && tematik=".$tematik."");




?>

<div class="container-fluid">
<h4>Koleksi dari <?php echo $row; ?> buku yang tersedia. </h4>  
</div>
<br>
<br>

<div class="container">


<div class="row mb-5">
<?php foreach($buku as $books) : ?>
   
        <div class="col-md-3">
          <div class="card">
            <img src="gambar/<?php echo $books["cover"]; ?>" width="100px" height="300px" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title"><?php echo $books["judulbuku"]; ?></h3>
              
              <a href="buku/kelas1/<?php echo $books["buku"]; ?>" class="btn btn-sm-3 btn-secondary">Baca Buku</a>
            </div>
          </div>
        </div>
        <br>
        <?php endforeach; ?>
    </div>
   
</div>
    
</body>
</html>
