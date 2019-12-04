




<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Lucifer Morningstar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/tooplate-style.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
<?php
  $tematik = $_GET['tematik'];
  $kelas = $_GET['kelas'];
  include "koneksi.php";
?>
    <section class="first-gallery-section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="text-content">
                <h2>Latihan Soal Kelas <?=$kelas?> Tematik <?=$tematik?></h2>
                </div>
              </div>
            </div>
          </div>
        </section>

        <?php
        $data_kelas = mysqli_query($koneksi,"SELECT * FROM tb_soalkelas where kelas=".$kelas." && tematik=".$tematik."");
         ?>
        <div class="content-wrapper">
          <form method="POST" action="simpan_jawaban.php" enctype="multipart/form-data">
          <div class="container">
          <div class="row">
            <div class="col-lg-6">
            <div class="form-group text-left">
                <label>Nama</label>
                <input type="text" name="nama_siswa" class="form-control" placeholder="masukan nama" required>
                <input type="hidden" name="kelas" class="form-control" value="<?=$kelas?>" required>
                <input type="hidden" name="tematik" class="form-control" value="<?=$tematik?>" required>
            </div>
          </div>
          </div>
          <div class="row" >
              <?php
              $no = 0;
              foreach ($data_kelas as $d_k){ $no++;?>
              <div class="col-md-6 text-left">
                <h4><?=$no?>. <?=$d_k['pertanyaan']?></h4>
                    <ol type='A'>
                        <li><input type="radio" name="id_soal[<?=$d_k['id_soal']?>]" value="a" required> <?=$d_k['a']?></li>
                        <li><input type="radio" name="id_soal[<?=$d_k['id_soal']?>]" value="b" required> <?=$d_k['b']?></li>
                        <li><input type="radio" name="id_soal[<?=$d_k['id_soal']?>]" value="c" required> <?=$d_k['c']?></li>
                        <li><input type="radio" name="id_soal[<?=$d_k['id_soal']?>]" value="d" required> <?=$d_k['d']?></li>
                    </ol>
              </div>
            <?php } ?>
            <div class="col-md-12 text-left">
            <button style="margin-top:60px" type="submit" name="simpansoal" value="Upload" class="btn btn-default">Kirim</button>
          </div>
          </div>
        </div>
      </form>
        </div>

        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
                <p>Copyright &copy; 2019 JOKI KALFIN  A.K.A  Lucifer MorningStrar</p>
              </div>
            </div>
          </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
