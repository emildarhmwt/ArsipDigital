<?php
include '../koneksi.php';
session_start();

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi
$tujuan_vp = $_POST['tujuan_vp'];

// Update the document status to 'Approved (AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE doc_kontrak SET dockt_waktu_avp=NOW(),dockt_tujuan_vp='$tujuan_vp',dockt_avp='$user_id', dockt_status_avp='Approved (AVP)' WHERE dockt_dock_id='$id'");

header("Location: preview_kontrak.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
exit;
?>