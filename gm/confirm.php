<?php
include '../koneksi.php';
session_start();

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi

// Update the document status to 'Approved (AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE dockajian SET dock_gm='$user_id', dock_status_gm='Done' WHERE dock_id='$id'");

header("Location: preview_kajian.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
exit;
?>