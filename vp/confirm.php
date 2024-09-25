<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Update the document status to 'Confirm(AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE doc1 SET doc1_waktu_upload=NOW(), doc1_petugas='".$_SESSION['id']."', status='Confirm(VP)' WHERE doc1_id='$id'");

// // Optionally delete from AVP
// mysqli_query($koneksi, "DELETE FROM doc1 WHERE doc1_id='$id'");

header("Location: data_pks.php");
exit;
?>