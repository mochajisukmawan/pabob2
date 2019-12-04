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
                        <a href="nilaisiswa.php?kelas=1"><i class="fa fa-fw fa-file"></i>Kelas 1</a>
                    </li>
                    <li>
                        <a href="nilaisiswa.php?kelas=2"><i class="fa fa-desktop"></i>Kelas 2</a>
                    </li>
                    <li>
                        <a href="nilaisiswa.php?kelas=3"><i class="fa fa-fw fa-file"></i>Kelas 3</a>
                    </li>
                    <li>
                        <a href="nilaisiswa.php?kelas=4"><i class="fa fa-desktop"></i>Kelas 4</a>
                    </li>
                    <li>
                        <a href="nilaisiswa.php?kelas=5"><i class="fa fa-desktop"></i>Kelas 5</a>
                    </li>
                    <li>
                        <a href="nilaisiswa.php?kelas=6"><i class="fa fa-desktop"></i>Kelas 6</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
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
                <li><a href="nilaisiswa.php?kelas=<?=$kelas?>&tematik=<?=$i?>">Tematik <?=$i?></a></li>
             <?php
              }
              ?>
           </ul>
         </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Data Nilai Kelas <?=$kelas?> Tematik <?=$tematik?> <a href="chartnilai.php?kelas=<?=$kelas?>&tematik=<?=$tematik?>"><button class="btn btn-info">chart</button></a>
                        </h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>jawaban benar</th>
                                      <th>jawaban salah</th>
                                      <th>detail</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $data_nilai = mysqli_query($koneksi,"SELECT * FROM tb_nilai_siswa where kelas=".$kelas." && tematik=".$tematik."");
                                      $data_soal = mysqli_query($koneksi,"SELECT * FROM tb_soalkelas where kelas=".$kelas." && tematik=".$tematik."");


                                      $no = 0;
                                      foreach($data_nilai as $d_n){
                                        $benar = 0;
                                        $salah = 0;
                                        $jawaban_siswa = (array)json_decode($d_n['jawaban_siswa']);
                                        foreach ($jawaban_siswa as $j_s => $value) {
                                          foreach ($data_soal as $d_s) {
                                            if( $d_s['id_soal'] == $j_s){
                                              if($d_s['jawaban'] == $value){
                                                $benar++;
                                              }else{
                                                $salah++;
                                              }

                                            }
                                          }
                                        }

                                        ?>
                                      <tr>
                                        <td><?=$no+1?></td>
                                        <td><?=$d_n['nama_siswa']?></td>
                                        <td><?=$benar?></td>
                                        <td><?=$salah?></td>
                                        <td><a href="lihatdetailnilai.php?kelas=<?=$kelas?>&tematik=<?=$tematik?>&id_nilai=<?=$d_n['id_nilai']?>"><button type="button" class="btn btn-info" >Lihat</button></a></td>
                                      </tr>
                                      <?php
                                      }
                                     ?>

                                  </tbody>
                                </table>
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
