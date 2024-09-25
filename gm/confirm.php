<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Fetch the document
$result = mysqli_query($koneksi, "SELECT * FROM doc1 WHERE doc1_id='$id'");
$doc = mysqli_fetch_assoc($result);

// Update the document status to 'confirm(avp)'
mysqli_query($koneksi, "UPDATE doc1 SET status='Confirm(AVP)' WHERE doc1_id='$id'");

// Insert into doc1 for VP confirmation
$stmt = $koneksi->prepare("INSERT INTO doc1 (doc1_waktu_upload, doc1_petugas, doc1_kode, doc1_nama, doc1_jenis, doc1_ket, doc1_file, status) VALUES (NOW(), ?, ?, ?, ?, ?, ?, 'Confirm(AVP)')");
$stmt->bind_param("isssss", $_SESSION['id'], $doc['doc1_kode'], $doc['doc1_nama'], $doc['doc1_jenis'], $doc['doc1_ket'], $doc['doc1_file']);
$stmt->execute();
$stmt->close();

// // Optionally delete from AVP
// mysqli_query($koneksi, "DELETE FROM doc1 WHERE doc1_id='$id'");

header("Location: data_pks.php");
exit;
?>