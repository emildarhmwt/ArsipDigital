<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];

mysqli_query($koneksi, "insert into status_arsip values (NULL,'$nama')");
header("location:data_status.php");