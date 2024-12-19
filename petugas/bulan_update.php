<?php 
include '../koneksi.php';
$bulan_id  = $_POST['bulan_id'];
$bulan_header_id  = $_POST['bulan_header_id'];
$bulan_invoice  = $_POST['bulan_invoice'];
$bulan_denda  = $_POST['bulan_denda'];
$bulan_realisasi  = $_POST['bulan_realisasi'];
$bulan_rk = $_POST['bulan_rk'];

mysqli_query($koneksi, "UPDATE bulan_kontrak SET 
    bulan_header_id = '$bulan_header_id',
    bulan_invoice = '$bulan_invoice', 
    bulan_denda = '$bulan_denda', 
    bulan_realisasi = '$bulan_realisasi', 
    bulan_rk = '$bulan_rk'
WHERE bulan_id = '$bulan_id'");
header("Location: monitoring.php");
exit;