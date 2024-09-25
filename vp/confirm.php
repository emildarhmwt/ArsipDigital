<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Update the document status to 'done'
mysqli_query($koneksi, "UPDATE doc1 SET status='Done' WHERE doc1_id='$id'");

header("Location: data_pks.php");
exit;
?>