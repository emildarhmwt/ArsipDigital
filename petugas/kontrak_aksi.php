<?php 
include '../koneksi.php';
$kontrak_header_id  = $_POST['kontrak_header_id'];
$kontrak_desk  = $_POST['kontrak_desk'];
$kontrak_jumlah  = $_POST['kontrak_jumlah'];
$kontrak_tahun  = $_POST['kontrak_tahun'];
$kontrak_masa  = $_POST['kontrak_masa'];
$kontrak_awal  = $_POST['kontrak_awal'];
$kontrak_akhir  = $_POST['kontrak_akhir'];
$kontrak_minhm  = $_POST['kontrak_minhm'];
$kontrak_maxhm  = $_POST['kontrak_maxhm'];
$kontrak_tarif  = $_POST['kontrak_tarif'];
$kontrak_total  = $_POST['kontrak_total'];

mysqli_query($koneksi, "INSERT INTO kontrak (kontrak_header_id, kontrak_desk, kontrak_jumlah, kontrak_tahun, kontrak_masa, kontrak_awal, kontrak_akhir, kontrak_minhm, kontrak_maxhm, kontrak_tarif, kontrak_total) VALUES ('$kontrak_header_id', '$kontrak_desk', '$kontrak_jumlah', '$kontrak_tahun', '$kontrak_masa', '$kontrak_awal', '$kontrak_akhir', '$kontrak_minhm', '$kontrak_maxhm', '$kontrak_tarif', '$kontrak_total')");
header("Location: tambah_kontrak.php?kontrak_header_id=$kontrak_header_id");
exit;