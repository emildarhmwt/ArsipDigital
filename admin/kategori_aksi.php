<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];

mysqli_query($koneksi, "insert into kategori values (NULL,'$nama')");
header("location:data_kategori.php");