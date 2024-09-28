<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "UPDATE user_pks SET pks_password='$password' WHERE pks_id='$id'")or die(mysqli_errno($koneksi));

header("location:ganti_password.php?alert=sukses");