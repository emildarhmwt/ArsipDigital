<?php 
include '../koneksi.php';
session_start();

if(!isset($_SESSION['id']) || !isset($_POST['password']) || !isset($_POST['confirm_password'])) {
    header("location:ganti_password.php?alert=error");
    exit();
}

$id = $_SESSION['id'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password !== $confirm_password) {
    header("location:ganti_password.php?alert=password_mismatch");
    exit();
}

if(strlen($password) < 8) {
    header("location:ganti_password.php?alert=password_too_short");
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $koneksi->prepare("UPDATE user SET user_password=? WHERE user_id=?");
$stmt->bind_param("si", $hashed_password, $id);

if($stmt->execute()) {
    header("location:ganti_password.php?alert=sukses");
} else {
    header("location:ganti_password.php?alert=gagal");
}

$stmt->close();
$koneksi->close();