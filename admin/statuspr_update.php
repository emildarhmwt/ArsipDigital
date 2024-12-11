<?php 
include '../koneksi.php';
$statuspr_id  = $_POST['statuspr_id'];
$statuspr_tanggal_pengajuan  = $_POST['statuspr_tanggal_pengajuan'];
$statuspr_kode  = $_POST['statuspr_kode'];
$statuspr_nama  = $_POST['statuspr_nama'];
$statuspr_jumlah  = $_POST['statuspr_jumlah'];
$statuspr_satuan  = $_POST['statuspr_satuan'];
$statuspr_vendor  = $_POST['statuspr_vendor'];
$statuspr_tanggal_proses  = $_POST['statuspr_tanggal_proses'];
$statuspr_tahap  = $_POST['statuspr_tahap'];
$statuspr_lama  = $_POST['statuspr_lama'];
$statuspr_estimasi  = $_POST['statuspr_estimasi'];
$statuspr_status  = $_POST['statuspr_status'];
$statuspr_catatan  = $_POST['statuspr_catatan'];

mysqli_query($koneksi, "UPDATE status_pr set statuspr_tanggal_pengajuan='$statuspr_tanggal_pengajuan', statuspr_kode='$statuspr_kode', statuspr_nama='$statuspr_nama', statuspr_jumlah='$statuspr_jumlah', statuspr_satuan='$statuspr_satuan', statuspr_vendor='$statuspr_vendor', statuspr_tanggal_proses='$statuspr_tanggal_proses', statuspr_tahap='$statuspr_tahap', statuspr_lama='$statuspr_lama', statuspr_estimasi='$statuspr_estimasi', statuspr_status='$statuspr_status', statuspr_catatan='$statuspr_catatan' where statuspr_id='$statuspr_id'");
header("location:status_pr.php");