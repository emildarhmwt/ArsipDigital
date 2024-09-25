<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from asmen where asmen_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['asmen_foto'];
unlink("../gambar/asmen/$foto");
mysqli_query($koneksi, "DELETE from asmen where asmen_id='$id'");
header("location:data_asmen.php");