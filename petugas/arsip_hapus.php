<?php
include '../koneksi.php';
session_start();

if ($_SESSION['status'] != "petugas_login") {
    header("location:../login/login.php?alert=belum_login");
    exit();
}


$id = $_GET['id'];

// Lakukan penghapusan arsip
$query = mysqli_query($koneksi, "DELETE FROM arsip WHERE arsip_id='$id'");

if ($query) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}