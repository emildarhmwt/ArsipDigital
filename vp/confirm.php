<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "vp_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
}

$id = $_GET['id']; // Ambil ID dokumen dari parameter GET
$user_id = $_SESSION['id']; // Ambil ID pengguna dari sesi
$kode_gm = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_kode FROM user_pks WHERE pks_id = '$user_id'"))['pks_kode'] ?? null;

// Update tujuan_vp berdasarkan kode_avp
if (in_array($kode_gm, ['AD-VP-A-1','AD-VP-B-1','AD-VP-C-1','AD-VP-D-1','AD-VP-E-1','AD-VP-F-1','AD-VP-G-1','AD-VP-H-1','AD-VP-I-1','AD-VP-J-1' ])) {
    $result_gm = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-GM-A-1'"));
    $tujuan_gm = $result_gm['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-A-1
} elseif (in_array($kode_gm, ['AD-VP-A-2','AD-VP-B-2','AD-VP-C-2','AD-VP-D-2','AD-VP-E-2','AD-VP-F-2','AD-VP-G-2','AD-VP-H-2','AD-VP-I-2','AD-VP-J-2' ])) {
    $result_gm = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-GM-B-1'"));
    $tujuan_gm = $result_vp['pks_id'] ?? null; // Set tujuan_vp to the pks_id of AD-VP-B-1
} 

// Update the document status to 'Approved (AVP)' and change the upload time and petugas
mysqli_query($koneksi, "UPDATE dockajian SET dock_waktu_vp=NOW(),dock_tujuan_gm='$tujuan_gm',dock_vp='$user_id', dock_status_vp='Approved (VP)' WHERE dock_id='$id'");

header("Location: preview_kajian.php?id=$id"); // Redirect ke preview_kajian dengan ID dokumen
exit;
?>