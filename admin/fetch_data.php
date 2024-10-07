<?php
include('../koneksi.php');

$year = $_GET['year'];

// Fetch data based on the year
$kajian = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM dockajian WHERE YEAR(dock_waktu_gm) = '$year'");
$kak_hps = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM doc_kak_hps WHERE YEAR(dockh_waktu_gm) = '$year'");
$kontrak = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM doc_kontrak WHERE YEAR(dockt_waktu_gm) = '$year'");

$data = [
    'kajian' => mysqli_fetch_assoc($kajian)['count'],
    'kak_hps' => mysqli_fetch_assoc($kak_hps)['count'],
    'kontrak' => mysqli_fetch_assoc($kontrak)['count'],
];

echo json_encode($data);
?>