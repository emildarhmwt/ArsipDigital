<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Ambil doc2_doc1_id berdasarkan id yang diberikan
$result = mysqli_query($koneksi, "SELECT doc2_doc1_id FROM doc2 WHERE doc2_id='$id'");
$row = mysqli_fetch_assoc($result);
$doc1_id = $row['doc2_doc1_id'];

// Update status untuk semua dokumen dengan doc2_doc1_id yang sama
mysqli_query($koneksi, "UPDATE doc2 SET doc2_waktu_upload=NOW(), doc2_petugas='".$_SESSION['id']."', doc2_status='Approve(VP)' WHERE doc2_doc1_id='$doc1_id'");

header("Location: data_pendukung.php");
exit;
?>