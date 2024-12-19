<?php 
include '../koneksi.php';
$kontrak_id  = $_POST['kontrak_id'];
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

mysqli_query($koneksi, "UPDATE kontrak SET 
    kontrak_header_id = '$kontrak_header_id',
    kontrak_desk = '$kontrak_desk', 
    kontrak_jumlah = '$kontrak_jumlah', 
    kontrak_tahun = '$kontrak_tahun', 
    kontrak_masa = '$kontrak_masa', 
    kontrak_awal = '$kontrak_awal', 
    kontrak_akhir = '$kontrak_akhir', 
    kontrak_minhm = '$kontrak_minhm', 
    kontrak_maxhm = '$kontrak_maxhm', 
    kontrak_tarif = '$kontrak_tarif', 
    kontrak_total = '$kontrak_total' 
WHERE kontrak_id = '$kontrak_id'");
header("Location: monitoring.php");
exit;