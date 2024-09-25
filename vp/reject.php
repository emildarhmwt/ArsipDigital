<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Update the document status to 'rejected'
mysqli_query($koneksi, "UPDATE doc1 SET status='Rejected(VP)' WHERE doc1_id='$id'");

// Optionally, you can set the doc1_petugas back to the 'asmen' level if needed
// mysqli_query($koneksi, "UPDATE doc1 SET doc1_petugas=(SELECT pks_id FROM user_pks WHERE pks_level='ASMEN') WHERE doc1_id='$id'");

header("Location: data_pks.php");
exit;
?>