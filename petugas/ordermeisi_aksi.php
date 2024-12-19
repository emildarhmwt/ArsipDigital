<?php 
include '../koneksi.php';
$ordermeisi_order_id  = $_POST['ordermeisi_order_id'];
$ordermeisi_tanggal  = $_POST['ordermeisi_tanggal'];
$ordermeisi_history  = $_POST['ordermeisi_history'];

$query = "INSERT INTO orderme_isi (ordermeisi_order_id, ordermeisi_tanggal, ordermeisi_history) 
          VALUES (?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "iss", $ordermeisi_order_id, $ordermeisi_tanggal, $ordermeisi_history);

// Execute query
mysqli_stmt_execute($stmt);
$last_id = mysqli_insert_id($koneksi);

$query_update = "UPDATE order_me SET orderme_status = 'On Progress' WHERE orderme_id = ?";
$stmt_update = mysqli_prepare($koneksi, $query_update);
mysqli_stmt_bind_param($stmt_update, "i", $ordermeisi_order_id);
mysqli_stmt_execute($stmt_update);

header("Location: orderme_isi.php?id=" . $ordermeisi_order_id);
exit;
?>