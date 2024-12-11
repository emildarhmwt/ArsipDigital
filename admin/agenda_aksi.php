<?php
include '../koneksi.php';
session_start();

$agenda_kategori  = $_POST['agenda_kategori'];
$agenda_tanggal  = $_POST['agenda_tanggal'];
$agenda_waktu_awal  = $_POST['agenda_waktu_awal'];
$agenda_waktu_akhir  = $_POST['agenda_waktu_akhir'];
$agenda_kegiatan  = $_POST['agenda_kegiatan'];
$agenda_deskripsi  = $_POST['agenda_deskripsi'];
$agenda_lokasi  = $_POST['agenda_lokasi'];
$agenda_pj  = $_POST['agenda_pj'];
$agenda_status  = $_POST['agenda_status'];

$rand = rand();

$filename = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
$nama_file = NULL; // Default to NULL

if (!empty($filename)) {
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);

    // Prevent PHP files from being uploaded
    if ($jenis == "php") {
        header("location:agenda.php?alert=gagal");
        exit();
    }

    $nama_file = $rand . '_' . $filename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], '../agenda/' . $nama_file)) {
        // File successfully uploaded, $nama_file already set
    } else {
        $nama_file = NULL; // Reset to NULL if upload fails
    }
}

$query = "INSERT INTO agenda VALUES (NULL, '$agenda_kategori', '$agenda_tanggal', '$agenda_waktu_awal', '$agenda_waktu_akhir', '$agenda_kegiatan', '$agenda_deskripsi', '$agenda_lokasi', '$agenda_pj', '$agenda_status', " . ($nama_file ? "'$nama_file'" : "NULL") . ")";
mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

header("location:agenda.php?alert=sukses");
?>