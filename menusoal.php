
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
      header("Location: menusoal.php?kelas=".$kelas."&tematik=".$tematik."");
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
        header("Location: menusoal.php?kelas=".$insert_kelas."&tematik=".$tematik."");
      }
  }

  if(isset($_POST['simpansoalupdate'])){
      $insert_pertanyaan = $_POST['pertanyaan'];
      $id_soal = $_POST['id_soal'];
      $insert_kelas = $_POST['kelas'];
      $tematik = $_POST['tematik'];
      $insert_a = $_POST['a'];
      $insert_b = $_POST['b'];
      $insert_c = $_POST['c'];
      $insert_d = $_POST['d'];
      $insert_jawaban = $_POST['jawaban'];
      $upload_soal = mysqli_query($koneksi,"UPDATE tb_soalkelas SET kelas='$insert_kelas',tematik='$tematik',pertanyaan='$insert_pertanyaan',a='$insert_a',b='$insert_b',c='$insert_c',d='$insert_d',jawaban='$insert_jawaban' WHERE id_soal = '$id_soal'");
      if($upload_soal){
        header("Location: menusoal.php?kelas=".$insert_kelas."&tematik=".$tematik."");
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
                        <a href="menusoal.php?kelas=1"><i class="fa fa-fw fa-file"></i>Kelas 1</a>
                    </li>
                    <li>
                        <a href="menusoal.php?kelas=2"><i class="fa fa-desktop"></i>Kelas 2</a>
                    </li>
                    <li>
                        <a href="menusoal.php?kelas=3"><i class="fa fa-fw fa-file"></i>Kelas 3</a>
                    </li>
                    <li>
                        <a href="menusoal.php?kelas=4"><i class="fa fa-desktop"></i>Kelas 4</a>
                    </li>
                    <li>
                        <a href="menusoal.php?kelas=5"><i class="fa fa-desktop"></i>Kelas 5</a>
                    </li>
                    <li>
                        <a href="menusoal.php?kelas=6"><i class="fa fa-desktop"></i>Kelas 6</a>
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
                <li><a href="menusoal.php?kelas=<?=$kelas?>&tematik=<?=$i?>">Tematik <?=$i?></a></li>
             <?php
              }
              ?>
           </ul>
         </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Soal Kelas <?=$kelas?> Tematik <?=$tematik?>
                        </h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah Soal</button>
                                <div id="myModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <form method="POST" action="menusoal.php" enctype="multipart/form-data">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Form Soal Kelas <?=$kelas?></h4>
                                      </div>
                                      <div class="modal-body">
                                            <div class="form-group">
                                                <label>Pertanyaan?</label>
                                                <textarea type="text" name="pertanyaan" class="form-control" placeholder="Masukan Pertanyaan Soal" required></textarea>
                                            </div>
                                            <input type="hidden" name="kelas" value="<?=$kelas?>">
                                            <input type="hidden" name="tematik" value="<?=$tematik?>">
                                            <div class="form-group">
                                                <label>Jawaban A</label>
                                                <input type="text" name="a" class="form-control" placeholder="Masukan Jawaban A" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban B</label>
                                                <input type="text" name="b" class="form-control" placeholder="Masukan Jawaban B" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban C</label>
                                                <input type="text" name="c" class="form-control" placeholder="Masukan Jawaban C" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban D</label>
                                                <input type="text" name="d" class="form-control" placeholder="Masukan Jawaban D" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban Yang Benar</label>
                                                <select name="jawaban" class="form-control" required>
                                                  <option disabled selected>Pilih Jawaban</option>
                                                  <option value="a">A</option>
                                                  <option value="b">B</option>
                                                  <option value="c">C</option>
                                                  <option value="d">D</option>
                                                </select>
                                            </div>

                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" name="simpansoal" value="Upload" class="btn btn-default">Submit </button>
                                        <button type="reset" class="btn btn-default">Reset </button>
                                      </div>
                                    </form>
                                    </div>

                                  </div>
                                </div>
                                <!-- /. PAGE INNER  -->

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Pertanyaan</th>
                                      <th>Jawaban A</th>
                                      <th>Jawaban B</th>
                                      <th>Jawaban C</th>
                                      <th>Jawaban D</th>
                                      <th>Jawaban</th>
                                      <th>action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $data_kelas = mysqli_query($koneksi,"SELECT * FROM tb_soalkelas where kelas=".$kelas." && tematik=".$tematik."");
                                      $no = 0;
                                      foreach($data_kelas as $d_k){?>
                                      <tr>
                                        <td><?=$no+1?></td>
                                        <td><?=$d_k['pertanyaan']?></td>
                                        <td><?=$d_k['a']?></td>
                                        <td><?=$d_k['b']?></td>
                                        <td><?=$d_k['c']?></td>
                                        <td><?=$d_k['d']?></td>
                                        <td><?=$d_k['jawaban']?></td>
                                        <td>
                                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal_<?=$d_k['id_soal']?>">Edit</button>
                                          <a href="menusoal.php?kelas=<?=$kelas?>&tematik=<?=$tematik?>&id_soal=<?=$d_k['id_soal']?>"><button type="button" class="btn btn-danger" >Hapus</button></a></td>
                                      </tr>
                                      <div id="editmodal_<?=$d_k['id_soal']?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <form method="POST" action="menusoal.php" enctype="multipart/form-data">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Form Soal Kelas <?=$kelas?></h4>
                                            </div>
                                            <div class="modal-body">
                                                  <div class="form-group">
                                                      <label>Pertanyaan?</label>
                                                      <textarea type="text" name="pertanyaan" class="form-control" placeholder="Masukan Pertanyaan Soal" required><?=$d_k['pertanyaan']?></textarea>
                                                  </div>
                                                  <input type="hidden" name="kelas" value="<?=$kelas?>">
                                                  <input type="hidden" name="id_soal" value="<?=$d_k['id_soal']?>">
                                                  <input type="hidden" name="tematik" value="<?=$tematik?>">
                                                  <div class="form-group">
                                                      <label>Jawaban A</label>
                                                      <input type="text" name="a" class="form-control" value="<?=$d_k['a']?>" placeholder="Masukan Jawaban A" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Jawaban B</label>
                                                      <input type="text" name="b" class="form-control" value="<?=$d_k['b']?>" placeholder="Masukan Jawaban B" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Jawaban C</label>
                                                      <input type="text" name="c" class="form-control" value="<?=$d_k['c']?>" placeholder="Masukan Jawaban C" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Jawaban D</label>
                                                      <input type="text" name="d" class="form-control" value="<?=$d_k['d']?>" placeholder="Masukan Jawaban D" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Jawaban Yang Benar</label>
                                                      <select name="jawaban" id="jawaban_<?=$d_k['id_soal']?>" class="form-control" required>
                                                        <?php
                                                        if($d_k['jawaban'] == 'a'){?>
                                                          <option value="a" selected>A</option>
                                                        <?php
                                                        }else{?>
                                                          <option value="a">A</option>
                                                        <?php }
                                                        if($d_k['jawaban'] == 'b'){?>
                                                          <option value="b" selected>B</option>
                                                        <?php
                                                        }else{?>
                                                          <option value="b">B</option>
                                                        <?php }
                                                        if($d_k['jawaban'] == 'c'){?>
                                                          <option value="c" selected>C</option>
                                                        <?php
                                                        }else{?>
                                                          <option value="c">C</option>
                                                        <?php }
                                                        if($d_k['jawaban'] == 'd'){?>
                                                          <option value="d" selected>D</option>
                                                        <?php
                                                        }else{?>
                                                          <option value="d">D</option>
                                                        <?php }
                                                        ?>



                                                      </select>
                                                  </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" name="simpansoalupdate" value="Upload" class="btn btn-default">Submit </button>
                                            </div>
                                          </form>
                                          </div>

                                        </div>
                                      </div>
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
