<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$result = mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_level = 'ASMEN' LIMIT 1");
$row = mysqli_fetch_assoc($result);
$petugas = $row['pks_id'] ?? null; 
$dockt_dock_id = $_POST['dock_id'] ?? null;  // Retrieve dock_id from POST data

if ($dockt_dock_id) {
    // Debugging output
    error_log("Received dock_id: " . $dockt_dock_id); // Log the received ID for debugging

    // Ensure the ID is an integer to prevent SQL injection
    $dockt_dock_id = intval($dockt_dock_id);
    $checkDoc1 = mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_id = '$dockt_dock_id'");
    if (mysqli_num_rows($checkDoc1) == 0) {
        header("location:data_kontrak.php?alert=dock_id_not_found");
        exit; // Exit if dock_id does not exist
    }

    $result2 = mysqli_query($koneksi, "SELECT dock_nama, dock_desk, dock_jenis, dock_kategori, dock_aspek, dock_tanggal, dock_lokasi FROM dockajian WHERE dock_id = '$dockt_dock_id'");
    $row2 = mysqli_fetch_assoc($result2);
    $nama =$row2['dock_nama'] ?? null;
    $desk =$row2['dock_desk'] ?? null;
    $jenis2 =$row2['dock_jenis'] ?? null;
    $kategori =$row2['dock_kategori'] ?? null;
    $aspek =$row2['dock_aspek'] ?? null;
    $tanggal =$row2['dock_tanggal'] ?? null;
    $lokasi =$row2['dock_lokasi'] ?? null;
} else {
    header("location:data_kontrak.php?alert=dock_id_missing");
    exit; // Exit if dock_id is missing
}

$rand = rand();
$filename = $_FILES['file']['name'];
$comment  = $_POST['comment'];


    move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/' . $rand . '_' . $filename);
    $nama_file = $rand . '_' . $filename;

    // Insert into doc1 for AVP confirmation with status 'uploaded'
    mysqli_query($koneksi, 
    "INSERT into doc_kontrak (dockt_dock_id, dockt_petugas, dockt_nama, dockt_desk, dockt_jenis, dockt_kategori, dockt_aspek, dockt_tanggal, dockt_lokasi, dockt_file, dockt_comment, dockt_status_asmen) 
    VALUES ('$dockt_dock_id','$petugas', '$nama', '$desk', '$jenis2', '$kategori', '$aspek', '$tanggal', '$lokasi', '$nama_file', '$comment', 'Uploaded')") or die(mysqli_error($koneksi));

    header("location:data_kontrak.php?alert=sukses");