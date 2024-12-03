<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($koneksi, "update status_arsip set status_nama='$nama' where status_id='$id'");
header("location:data_status.php");