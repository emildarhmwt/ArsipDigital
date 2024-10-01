<?php
include '../koneksi.php';
session_start();

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi

// Cek jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alasan = $_POST['alasan']; // Ambil alasan dari form

    // Update status dan alasan penolakan
    mysqli_query($koneksi, "UPDATE dockajian SET dock_waktu_vp=NOW(),dock_vp='$user_id', dock_status_vp='Rejected (VP)', dock_alasan_reject='$alasan' WHERE dock_id='$id'");
    
    header("Location: preview_kajian.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
    exit;
}
?>