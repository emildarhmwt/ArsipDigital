<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Update the document status to 'Confirm(AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE doc2 SET doc2_waktu_upload=NOW(), doc2_petugas='".$_SESSION['id']."', doc2_status='Uploaded' WHERE doc2_id='$id'");

// // Optionally delete from AVP
// mysqli_query($koneksi, "DELETE FROM doc1 WHERE doc1_id='$id'");

header("Location: data_kak_hps.php");
exit;
?>