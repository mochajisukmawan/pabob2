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
        $judulbuku    = $_POST['judulbuku'];
        $ekstensi_diperbolehkan    = array('pdf','docx');
        $nama    = $_FILES['buku']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['buku']['size'];
        $file_tmp    = $_FILES['buku']['tmp_name']; 

        $insert_kelas = $_POST['kelas'];
        $tematik = $_POST['tematik'];
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file,"gambar/$cover");
                move_uploaded_file($file_tmp, 'buku/kelas1/'.$nama);
                $cek= mysqli_query($koneksi,"INSERT INTO tb_kelas1 (judulbuku,buku,cover,kelas,tematik) VALUES('$judulbuku', '$nama','$cover','$insert_kelas','$tematik')");

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

        header("Location: formkelas1.php?kelas=".$insert_kelas."&tematik=".$tematik."&pesan=".$pesan."");
    }
    ?> 
    <br/>
    <br/>
    <a href="./">Kembali</a>
    <br/>
    <br/> 
    <table>
        <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM tb_kelas1");
            while($row = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><a href="buku/kelas1/<?php echo $row['buku'];?>">Lihat File</a></td> 
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>