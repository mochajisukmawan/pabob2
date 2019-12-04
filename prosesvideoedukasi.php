<html>
<head>
    <title>Tutorial Cara Membuat Upload File Dengan PHP MySQL</title>
</head>
<body>
    <h1>Form Upload File Dengan PHP</h1>
    <?php 
    include "koneksi.php";
    if($_POST['upload']){
        $cover = $_FILES['cover']['name'];
        $file = $_FILES['cover']['tmp_name'];
        $judulvideo    = $_POST['judulvideo'];
        $ekstensi_diperbolehkan    = array('mp4','pdf','docx');
        $nama    = $_FILES['video']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['video']['size'];
        $file_tmp    = $_FILES['video']['tmp_name']; 

        $insert_kelas = $_POST['kelas'];
        $tematik = $_POST['tematik'];
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 100000000000000000000){ 
                move_uploaded_file($file,"gambar/$cover");
                move_uploaded_file($file_tmp, 'video/kelas1/'.$nama);
                $cek= mysqli_query($koneksi,"INSERT INTO tb_videoedukasi (judulvideo,video,cover) VALUES('$judulvideo', '$nama','$cover')");

                if($cek){
                    $pesan =  'FILE BERHASIL DI UPLOAD!';
                }
                else{
                    $pesan =  'FILE GAGAL DI UPLOAD!';
                }
            }
            else{
                $pesan =  'UKURAN FILE TERLALU BESAR!';
            }
        }
        else{
            $pesan =  'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
        }

        header("Location: formvideoedukasi.php?pesan=".$pesan."");
    }
    ?> 
    <br/>
    <br/>
    <a href="./">Kembali</a>
    <br/>
    <br/> 
    <table>
        <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM tb_videoedukasi");
            while($row = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><a href="video/kelas1/<?php echo $row['video'];?>">Lihat File</a></td> 
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>