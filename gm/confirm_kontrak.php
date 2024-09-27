<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Ambil doc2_doc1_id berdasarkan id yang diberikan
$result = mysqli_query($koneksi, "SELECT doc3_doc2_id FROM doc3 WHERE doc3_id='$id'");
$row = mysqli_fetch_assoc($result);
$doc2_id = $row['doc3_doc2_id'];

// Update status untuk semua dokumen dengan doc2_doc1_id yang sama
mysqli_query($koneksi, "UPDATE doc3 SET doc3_waktu_upload=NOW(), doc3_petugas='".$_SESSION['id']."', doc3_status='Done' WHERE doc3_doc2_id='$doc2_id'");

header("Location: data_kontrak.php");
exit;
?>