<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$result = mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_level = 'ASMEN' LIMIT 1");
$row = mysqli_fetch_assoc($result);
$petugas = $row['pks_id'] ?? null;
$nama  = $_POST['nama'];
$deskripsi  = $_POST['deskripsi'];
$jenis  = $_POST['jenis'];
$kategori  = $_POST['kategori'];
$aspek  = $_POST['aspek'];
$tanggal  = $_POST['tanggal'];
$lokasi  = $_POST['lokasi'];
$tujuan_avp = $_POST['tujuan_avp'];

$rand = rand();
$filename = $_FILES['file']['name'];
$comment  = $_POST['comment'];

if ($jenis == "php") {
    header("location:data_pks.php?alert=gagal");
} else {
    move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/' . $rand . '_' . $filename);
    $nama_file = $rand . '_' . $filename;

    // Insert into doc1 for AVP confirmation with status 'uploaded'
    mysqli_query($koneksi, 
    "INSERT into dockajian (dock_petugas, dock_waktu_asmen, dock_tujuan_avp, dock_nama, dock_desk, dock_jenis, dock_kategori, dock_aspek, dock_tanggal, dock_lokasi, dock_file, dock_comment, dock_status_asmen) 
    VALUES ('$petugas', '$waktu','$tujuan_avp','$nama', '$deskripsi', '$jenis', '$kategori', '$aspek', '$tanggal', '$lokasi', '$nama_file', '$comment', 'Uploaded (Asmen)')") or die(mysqli_error($koneksi));

    header("location:data_pks.php?alert=sukses");
}