<?php 
include '../koneksi.php';
$orderme_kategori  = $_POST['orderme_kategori'];
$orderme_tanggal  = $_POST['orderme_tanggal'];
$orderme_request  = $_POST['orderme_request'];
$orderme_desk  = $_POST['orderme_desk'];
$orderme_lokasi  = $_POST['orderme_lokasi'];
$orderme_pj = !empty($_POST['orderme_pj']) ? $_POST['orderme_pj'] : NULL;
$orderme_penerima  = $_POST['orderme_penerima'];
$orderme_status  = $_POST['orderme_status'];
$orderme_tglselesai  = $_POST['orderme_tglselesai'];
$orderme_dokumen = !empty($_POST['orderme_dokumen']) ? $_POST['orderme_dokumen'] : NULL;

$query = "INSERT INTO order_me (orderme_kategori, orderme_tanggal, orderme_request, orderme_desk, orderme_lokasi, orderme_pj, orderme_penerima, orderme_status, orderme_tglselesai, orderme_dokumen) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "ssssssssss", $orderme_kategori, $orderme_tanggal, $orderme_request, $orderme_desk, $orderme_lokasi, $orderme_pj, $orderme_penerima,  $orderme_status, $orderme_tglselesai, $orderme_dokumen);

// Execute query
mysqli_stmt_execute($stmt);
$last_id = mysqli_insert_id($koneksi);

header("Location: order_me.php");
exit;
?>