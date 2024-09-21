<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "UPDATE petugas SET petugas_password='$password' WHERE petugas_id='$id'")or die(mysqli_errno($koneksi));

header("location:ganti_password.php?alert=sukses");