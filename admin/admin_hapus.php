<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from admin where admin_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['admin_foto'];
unlink("../gambar/admin/$foto");
mysqli_query($koneksi, "DELETE from admin where admin_id='$id'");
header("location:data_admin.php");