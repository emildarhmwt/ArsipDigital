<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "avp_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
}

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi
$kode_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_kode FROM user_pks WHERE pks_id = '$user_id'"))['pks_kode'] ?? null;

// Update tujuan_vp berdasarkan kode_avp
if (in_array($kode_avp, ['AD-AVP-A-1', 'AD-AVP-A-2', 'AD-AVP-A-3', 'AD-AVP-A-4', 'AD-AVP-A-5', 'AD-AVP-A-6', 'AD-AVP-A-7', 'AD-AVP-A-8', 'AD-AVP-A-9', 'AD-AVP-A-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-A-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-A-1
} elseif (in_array($kode_avp, ['AD-AVP-B-1', 'AD-AVP-B-2', 'AD-AVP-B-3', 'AD-AVP-B-4', 'AD-AVP-B-5', 'AD-AVP-B-6', 'AD-AVP-B-7', 'AD-AVP-B-8', 'AD-AVP-B-9', 'AD-AVP-B-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-B-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-B-1
} elseif (in_array($kode_avp, ['AD-AVP-C-1', 'AD-AVP-C-2', 'AD-AVP-C-3', 'AD-AVP-C-4', 'AD-AVP-C-5', 'AD-AVP-C-6', 'AD-AVP-C-7', 'AD-AVP-C-8', 'AD-AVP-C-9', 'AD-AVP-C-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-C-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-C-1
} elseif (in_array($kode_avp, ['AD-AVP-D-1', 'AD-AVP-D-2', 'AD-AVP-D-3', 'AD-AVP-D-4', 'AD-AVP-D-5', 'AD-AVP-D-6', 'AD-AVP-D-7', 'AD-AVP-D-8', 'AD-AVP-D-9', 'AD-AVP-D-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-D-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-D-1
} elseif (in_array($kode_avp, ['AD-AVP-E-1', 'AD-AVP-E-2', 'AD-AVP-E-3', 'AD-AVP-E-4', 'AD-AVP-E-5', 'AD-AVP-E-6', 'AD-AVP-E-7', 'AD-AVP-E-8', 'AD-AVP-E-9', 'AD-AVP-E-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-E-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-E-1
} elseif (in_array($kode_avp, ['AD-AVP-F-1', 'AD-AVP-F-2', 'AD-AVP-F-3', 'AD-AVP-F-4', 'AD-AVP-F-5', 'AD-AVP-F-6', 'AD-AVP-F-7', 'AD-AVP-F-8', 'AD-AVP-F-9', 'AD-AVP-F-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-F-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-F-1
} elseif (in_array($kode_avp, ['AD-AVP-G-1', 'AD-AVP-G-2', 'AD-AVP-G-3', 'AD-AVP-G-4', 'AD-AVP-G-5', 'AD-AVP-G-6', 'AD-AVP-G-7', 'AD-AVP-G-8', 'AD-AVP-G-9', 'AD-AVP-G-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-G-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-G-1
} elseif (in_array($kode_avp, ['AD-AVP-H-1', 'AD-AVP-H-2', 'AD-AVP-H-3', 'AD-AVP-H-4', 'AD-AVP-H-5', 'AD-AVP-H-6', 'AD-AVP-H-7', 'AD-AVP-H-8', 'AD-AVP-H-9', 'AD-AVP-H-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-H-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-H-1
} elseif (in_array($kode_avp, ['AD-AVP-I-1', 'AD-AVP-I-2', 'AD-AVP-I-3', 'AD-AVP-I-4', 'AD-AVP-I-5', 'AD-AVP-I-6', 'AD-AVP-I-7', 'AD-AVP-I-8', 'AD-AVP-I-9', 'AD-AVP-I-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-I-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-I-1
} elseif (in_array($kode_avp, ['AD-AVP-J-1', 'AD-AVP-J-2', 'AD-AVP-J-3', 'AD-AVP-J-4', 'AD-AVP-J-5', 'AD-AVP-J-6', 'AD-AVP-J-7', 'AD-AVP-J-8', 'AD-AVP-J-9', 'AD-AVP-J-10'])) {
    $result_vp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-VP-J-1'"));
    $tujuan_vp = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-J-1
}

// Update the document status to 'Approved (AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE dockajian SET dock_waktu_avp=NOW(), dock_tujuan_vp='$tujuan_vp', dock_avp='$user_id', dock_status_avp='Approved (AVP)' WHERE dock_id='$id'");

header("Location: preview_kajian.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
exit;
?>