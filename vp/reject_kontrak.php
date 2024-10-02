<?php
include '../koneksi.php';
session_start();

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi

// Cek jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alasan = $_POST['alasan']; // Ambil alasan dari form

    // Update status dan alasan penolakan
    mysqli_query($koneksi, "UPDATE doc_kontrak SET dockt_waktu_vp=NOW(),dockt_vp='$user_id', dockt_status_vp='Rejected (VP)', dockt_alasan_reject='$alasan' WHERE dockt_dock_id='$id'");
    
    header("Location: preview_kontrak.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
    exit;
}
?>