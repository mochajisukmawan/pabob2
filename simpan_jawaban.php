<?php

date_default_timezone_set("Asia/Bangkok");
echo date_default_timezone_get();
include "koneksi.php";
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$tematik = $_POST['tematik'];
$tgl_input = date('Y-m-d h:i:sa');
$jawaban_siswa = json_encode($_POST['id_soal']);

$data = $_POST['id_soal'];

print_r($nama_siswa);echo '<br>';
print_r($kelas);echo '<br>';
print_r($tematik);echo '<br>';
print_r($tgl_input);echo '<br>';
print_r($jawaban_siswa);echo '<br>';


$insert_soal = mysqli_query($koneksi,"INSERT INTO tb_nilai_siswa (nama_siswa,kelas,tematik,jawaban_siswa,tgl_input) VALUES ('$nama_siswa','$kelas','$tematik','$jawaban_siswa','$tgl_input')");
if($insert_soal){
  header("Location: http://localhost/pabob/page1.php");
}

 ?>
