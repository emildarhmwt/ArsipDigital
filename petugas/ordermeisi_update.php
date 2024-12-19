<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$ordermeisi_order_id  = $_POST['ordermeisi_order_id'];
$ordermeisi_tanggal  = $_POST['ordermeisi_tanggal'];
$ordermeisi_history  = $_POST['ordermeisi_history'];

mysqli_query($koneksi, "UPDATE orderme_isi set ordermeisi_order_id='$ordermeisi_order_id', ordermeisi_tanggal='$ordermeisi_tanggal', ordermeisi_history='$ordermeisi_history' where ordermeisi_id='$id'");
header("location:orderme_isi.php?id=$ordermeisi_order_id");