<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from user_pks where pks_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['pks_foto'];
unlink("../gambar/asmen/$foto");
mysqli_query($koneksi, "DELETE from user_pks where pks_id='$id'");
header("location:data_userpks.php");