<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$petugas = NULL;
$admin = $_SESSION['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

$rand = rand();

$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];

if($jenis == "php") {
	header("location:data_arsip.php?alert=gagal");
}else{
	move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/'.$rand.'_'.$filename);
	$nama_file = $rand.'_'.$filename;
	mysqli_query($koneksi, "insert into arsip values (NULL,'$waktu','$petugas','$admin','$kode','$nama','$jenis','$kategori','$status','$keterangan','$nama_file')")or die(mysqli_error($koneksi));
	header("location:data_arsip.php?alert=sukses");
}