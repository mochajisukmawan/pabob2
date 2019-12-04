

  
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

  
        </nav>

        <div id="page-wrapper">

            <div id="page-inner">
                <div class="row">
                
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Form Upload Video Edukasi
                        </h1>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form method="POST" action="prosesvideoedukasi.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Judul Video</label>
                                                        <input type="text" name="judulvideo" class="form-control" placeholder="Masukan Judul Buku">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cover Video</label>
                                                        <input type="file" name="cover" class="form-control" placeholder="Masukan Asal Poster">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File Video</label>
                                                        <input type="file" name="video" class="form-control" placeholder="Masukan Asal Poster">
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