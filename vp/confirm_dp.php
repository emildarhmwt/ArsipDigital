<?php
include '../koneksi.php';
session_start();

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi

// Update the document status to 'Approved (AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE doc_kak_hps SET dockh_vp='$user_id', dockh_status_vp='Approved (VP)' WHERE dockh_dock_id='$id'");

header("Location: preview_dp.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
exit;
?>