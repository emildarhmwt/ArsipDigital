<?php 
include '../koneksi.php';
$judul  = $_POST['header_judul'];
$nomor  = $_POST['header_nomor'];
$kategori  = $_POST['header_kategori'];
$ket  = $_POST['header_ket'];

mysqli_query($koneksi, "insert into header_kontrak (header_judul, header_nomor, header_kategori, header_ket) values ('$judul', '$nomor', '$kategori', '$ket')");
$last_id = mysqli_insert_id($koneksi);
header("Location: tambah_kontrak.php?kontrak_header_id=$last_id");
exit;