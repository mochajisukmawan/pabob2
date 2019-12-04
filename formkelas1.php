

  
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ATOM</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php
include "koneksi.php";
  if(!isset($_GET['kelas'])){
    $kelas = 1;
  }else{
    $kelas = $_GET['kelas'];
  }
  if(!isset($_GET['tematik'])){
    $tematik = 1;
  }else{
    $tematik = $_GET['tematik'];
  }
  if(isset($_GET['id_soal'])){
    $delete_soal = mysqli_query($koneksi,"DELETE FROM tb_soalkelas where id_soal = ".$_GET['id_soal']."");
    if($delete_soal){
      header("Location: formkelas1.php?kelas=".$kelas."&tematik=".$tematik."");
    }
  }
  if(isset($_POST['simpansoal'])){
      $insert_pertanyaan = $_POST['pertanyaan'];
      $insert_kelas = $_POST['kelas'];
      $tematik = $_POST['tematik'];
      $insert_a = $_POST['a'];
      $insert_b = $_POST['b'];
      $insert_c = $_POST['c'];
      $insert_d = $_POST['d'];
      $insert_jawaban = $_POST['jawaban'];
      $insert_soal = mysqli_query($koneksi,"INSERT INTO tb_soalkelas (kelas,tematik,pertanyaan,a,b,c,d,jawaban) VALUES ('$insert_kelas','$tematik','$insert_pertanyaan','$insert_a','$insert_b','$insert_c','$insert_d','$insert_jawaban')");
      if($insert_soal){
        header("Location: formkelas1.php?kelas=".$insert_kelas."&tematik=".$tematik."");
      }
  }
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="login.html">ATOM</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="formkelas1.php?kelas=1"><i class="fa fa-fw fa-file"></i>Kelas 1</a>
                    </li>
                    <li>
                        <a href="formkelas1.php?kelas=2"><i class="fa fa-desktop"></i>Kelas 2</a>
                    </li>
                    <li>
                        <a href="formkelas1.php?kelas=3"><i class="fa fa-fw fa-file"></i>Kelas 3</a>
                    </li>
                    <li>
                        <a href="formkelas1.php?kelas=4"><i class="fa fa-desktop"></i>Kelas 4</a>
                    </li>
                    <li>
                        <a href="formkelas1.php?kelas=5"><i class="fa fa-desktop"></i>Kelas 5</a>
                    </li>
                    <li>
                        <a href="formkelas1.php?kelas=6"><i class="fa fa-desktop"></i>Kelas 6</a>
                    </li>
                </ul>

            </div>

        </nav>
        <div id="page-wrapper">
        <div class="dropdown">
           <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pilih Tematik
           <span class="caret"></span></button>
           <ul class="dropdown-menu">
              <?php
              if($kelas < 4){
              $k = 8;
              }else{
              $k = 9;
              }
              for($i = 1 ; $i <= $k ; $i++){?>
                <li><a href="formkelas1.php?kelas=<?=$kelas?>&tematik=<?=$i?>">Tematik <?=$i?></a></li>
             <?php
              }
              ?>
           </ul>
         </div>
            <div id="page-inner">
                <div class="row">
                
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Form Upload Kelas <?=$kelas?> Tematik <?=$tematik?>
                        </h1>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Menambah Buku Kelas <?=$kelas?> Tematik <?=$tematik?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form method="POST" action="prosesbukukelas1.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="kelas" value="<?=$kelas?>">
                                                    <input type="hidden" name="tematik" value="<?=$tematik?>">
                                                    <div class="form-group">
                                                        <label>Judul Buku</label>
                                                        <input type="text" name="judulbuku" class="form-control" placeholder="Masukan Judul Buku">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cover Buku</label>
                                                        <input type="file" name="cover" class="form-control" placeholder="Masukan Asal Poster">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File Buku</label>
                                                        <input type="file" name="buku" class="form-control" placeholder="Masukan Asal Poster">
                                                    </div>
                                                    <button type="submit" name="upload" value="Upload" class="btn btn-default">Submit </button>
                                                    <button type="reset" class="btn btn-default">Reset </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    if(isset($_GET['pesan'])){
                                        echo  $_GET['pesan'];
                                    }
                                ?>
                                </div>
                                <!-- /. PAGE INNER  -->
                            </div>
                            <!-- /. PAGE WRAPPER  -->
                        </div>

                        <!-- /. WRAPPER  -->
                        <!-- JS Scripts-->
                        <!-- jQuery Js -->
                        <script src="assets/js/jquery-1.10.2.js"></script>
                        <!-- Bootstrap Js -->
                        <script src="assets/js/bootstrap.min.js"></script>
                        <!-- Metis Menu Js -->
                        <script src="assets/js/jquery.metisMenu.js"></script>
                        <!-- Custom Js -->
                        <script src="assets/js/custom-scripts.js"></script>

</body>

</html>