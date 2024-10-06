<?php
include '../koneksi.php';
session_start();

if ($_SESSION['status'] != "asmen_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit();
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM dockajian WHERE dock_id='$id'");

if ($query) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}