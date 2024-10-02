<?php
include '../koneksi.php';
session_start();

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi

// Cek jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alasan = $_POST['alasan']; // Ambil alasan dari form

    // Update status dan alasan penolakan
    mysqli_query($koneksi, "UPDATE doc_kak_hps SET dockh_waktu_avp=NOW(),dockh_avp='$user_id', dockh_status_avp='Rejected (AVP)', dockh_alasan_reject='$alasan' WHERE dockh_dock_id='$id'");
    
    header("Location: preview_dp.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
    exit;
}
?>