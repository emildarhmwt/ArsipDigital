<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Cek jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alasan = $_POST['alasan'];

    // Update status dan alasan penolakan
    mysqli_query($koneksi, "UPDATE doc1 SET status='Rejected(VP)', doc1_alasan_reject='$alasan' WHERE doc1_id='$id'");
    
    header("Location: data_pks.php");
    exit;
}
?>