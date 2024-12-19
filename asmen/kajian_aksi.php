<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['status']) || $_SESSION['status'] != "asmen_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
}

$waktu = date('Y-m-d H:i:s'); 
$id_pks = $_SESSION['id'];
$petugas = $id_pks;
$result = mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_level = 'ASMEN' LIMIT 1");
$row = mysqli_fetch_assoc($result);
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

$kode_petugas = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_kode FROM user_pks WHERE pks_id = '$petugas'"))['pks_kode'] ?? null;

// Update the logic for setting tujuan_avp based on pks_kode
if (in_array($kode_petugas, ['AD-AM-AA-1', 'AD-AM-AA-2', 'AD-AM-AA-3', 'AD-AM-AA-4', 'AD-AM-AA-5', 'AD-AM-AA-6', 'AD-AM-AA-7', 'AD-AM-AA-8', 'AD-AM-AA-9', 'AD-AM-AA-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-1'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-1
} elseif (in_array($kode_petugas, ['AD-AM-AB-1', 'AD-AM-AB-2', 'AD-AM-AB-3', 'AD-AM-AB-4', 'AD-AM-AB-5', 'AD-AM-AB-6', 'AD-AM-AB-7', 'AD-AM-AB-8', 'AD-AM-AB-9', 'AD-AM-AB-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-2'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-2
} elseif (in_array($kode_petugas, ['AD-AM-AC-1', 'AD-AM-AC-2', 'AD-AM-AC-3', 'AD-AM-AC-4', 'AD-AM-AC-5','AD-AM-AC-6', 'AD-AM-AC-7', 'AD-AM-AC-8', 'AD-AM-AC-9', 'AD-AM-AC-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-3'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
} elseif (in_array($kode_petugas, ['AD-AM-AD-1', 'AD-AM-AD-2', 'AD-AM-AD-3', 'AD-AM-AD-4', 'AD-AM-AD-5','AD-AM-AD-6', 'AD-AM-AD-7', 'AD-AM-AD-8', 'AD-AM-AD-9', 'AD-AM-AD-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-4'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
} elseif (in_array($kode_petugas, ['AD-AM-AE-1', 'AD-AM-AE-2', 'AD-AM-AE-3', 'AD-AM-AE-4', 'AD-AM-AE-5','AD-AM-AE-6', 'AD-AM-AE-7', 'AD-AM-AE-8', 'AD-AM-AE-9', 'AD-AM-AE-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-5'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
} elseif (in_array($kode_petugas, ['AD-AM-AF-1', 'AD-AM-AF-2', 'AD-AM-AF-3', 'AD-AM-AF-4', 'AD-AM-AF-5','AD-AM-AF-6', 'AD-AM-AF-7', 'AD-AM-AF-8', 'AD-AM-AF-9', 'AD-AM-AF-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-6'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
} elseif (in_array($kode_petugas, ['AD-AM-AG-1', 'AD-AM-AG-2', 'AD-AM-AG-3', 'AD-AM-AG-4', 'AD-AM-AG-5','AD-AM-AG-6', 'AD-AM-AG-7', 'AD-AM-AG-8', 'AD-AM-AG-9', 'AD-AM-AG-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-7'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
} elseif (in_array($kode_petugas, ['AD-AM-AH-1', 'AD-AM-AH-2', 'AD-AM-AH-3', 'AD-AM-AH-4', 'AD-AM-AH-5','AD-AM-AH-6', 'AD-AM-AH-7', 'AD-AM-AH-8', 'AD-AM-AH-9', 'AD-AM-AH-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-8'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
}elseif (in_array($kode_petugas, ['AD-AM-AI-1', 'AD-AM-AI-2', 'AD-AM-AI-3', 'AD-AM-AI-4', 'AD-AM-AI-5','AD-AM-AI-6', 'AD-AM-AI-7', 'AD-AM-AI-8', 'AD-AM-AI-9', 'AD-AM-AI-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-9'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
}elseif (in_array($kode_petugas, ['AD-AM-AJ-1', 'AD-AM-AJ-2', 'AD-AM-AJ-3', 'AD-AM-AJ-4', 'AD-AM-AJ-5','AD-AM-AJ-6', 'AD-AM-AJ-7', 'AD-AM-AJ-8', 'AD-AM-AJ-9', 'AD-AM-AJ-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-A-10'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-3
} elseif (in_array($kode_petugas, ['AD-AM-BA-1', 'AD-AM-BA-2', 'AD-AM-BA-3','AD-AM-BA-4', 'AD-AM-BA-5','AD-AM-BA-6','AD-AM-BA-7','AD-AM-BA-8','AD-AM-BA-9','AD-AM-BA-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-1'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-4
} elseif (in_array($kode_petugas, ['AD-AM-BB-1', 'AD-AM-BB-2', 'AD-AM-BB-3','AD-AM-BB-4','AD-AM-BB-5','AD-AM-BB-6','AD-AM-BB-7','AD-AM-BB-8','AD-AM-BB-9','AD-AM-BB-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-2'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-5
} elseif (in_array($kode_petugas, ['AD-AM-BC-1', 'AD-AM-BC-2', 'AD-AM-BC-3','AD-AM-BC-4','AD-AM-BC-5','AD-AM-BC-6','AD-AM-BC-7','AD-AM-BC-8','AD-AM-BC-9','AD-AM-BC-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-3'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
} elseif (in_array($kode_petugas, ['AD-AM-BD-1', 'AD-AM-BD-2', 'AD-AM-BD-3','AD-AM-BD-4','AD-AM-BD-5','AD-AM-BD-6','AD-AM-BD-7','AD-AM-BD-8','AD-AM-BD-9','AD-AM-BD-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-4'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
} elseif (in_array($kode_petugas, ['AD-AM-BE-1', 'AD-AM-BE-2', 'AD-AM-BE-3','AD-AM-BE-4','AD-AM-BE-5','AD-AM-BE-6','AD-AM-BE-7','AD-AM-BE-8','AD-AM-BE-9','AD-AM-BE-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-5'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
}elseif (in_array($kode_petugas, ['AD-AM-BF-1', 'AD-AM-BF-2', 'AD-AM-BF-3','AD-AM-BF-4','AD-AM-BF-5','AD-AM-BF-6','AD-AM-BF-7','AD-AM-BF-8','AD-AM-BF-9','AD-AM-BF-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-6'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
}elseif (in_array($kode_petugas, ['AD-AM-BG-1', 'AD-AM-BG-2', 'AD-AM-BG-3','AD-AM-BG-4','AD-AM-BG-5','AD-AM-BG-6','AD-AM-BG-7','AD-AM-BG-8','AD-AM-BG-9','AD-AM-BG-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-7'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
}elseif (in_array($kode_petugas, ['AD-AM-BH-1', 'AD-AM-BH-2', 'AD-AM-BH-3','AD-AM-BH-4','AD-AM-BH-5','AD-AM-BH-6','AD-AM-BH-7','AD-AM-BH-8','AD-AM-BH-9','AD-AM-BH-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-8'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
}elseif (in_array($kode_petugas, ['AD-AM-BI-1', 'AD-AM-BI-2', 'AD-AM-BI-3','AD-AM-BI-4','AD-AM-BI-5','AD-AM-BI-6','AD-AM-BI-7','AD-AM-BI-8','AD-AM-BI-9','AD-AM-BI-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-9'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
}elseif (in_array($kode_petugas, ['AD-AM-BJ-1', 'AD-AM-BJ-2', 'AD-AM-BJ-3','AD-AM-BJ-4','AD-AM-BJ-5','AD-AM-BJ-6','AD-AM-BJ-7','AD-AM-BJ-8','AD-AM-BJ-9','AD-AM-BJ-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-B-10'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-6
} elseif (in_array($kode_petugas, ['AD-AM-CA-1', 'AD-AM-CA-2', 'AD-AM-CA-3','AD-AM-CA-4','AD-AM-CA-5','AD-AM-CA-6','AD-AM-CA-7','AD-AM-CA-8','AD-AM-CA-9','AD-AM-CA-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-1'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-7
} elseif (in_array($kode_petugas, ['AD-AM-CB-1', 'AD-AM-CB-2', 'AD-AM-CB-3', 'AD-AM-CB-4', 'AD-AM-CB-5', 'AD-AM-CB-6', 'AD-AM-CB-7', 'AD-AM-CB-8', 'AD-AM-CB-9', 'AD-AM-CB-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-2'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-8
} elseif (in_array($kode_petugas, ['AD-AM-CC-1', 'AD-AM-CC-2', 'AD-AM-CC-3','AD-AM-CC-4','AD-AM-CC-5','AD-AM-CC-6','AD-AM-CC-7','AD-AM-CC-8','AD-AM-CC-9','AD-AM-CC-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-3'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CD-1', 'AD-AM-CD-2', 'AD-AM-CD-3','AD-AM-CD-4','AD-AM-CD-5','AD-AM-CD-6','AD-AM-CD-7','AD-AM-CD-8','AD-AM-CD-9','AD-AM-CD-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-4'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CE-1', 'AD-AM-CE-2', 'AD-AM-CE-3','AD-AM-CE-4','AD-AM-CE-5','AD-AM-CE-6','AD-AM-CE-7','AD-AM-CE-8','AD-AM-CE-9','AD-AM-CE-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-5'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CF-1', 'AD-AM-CF-2', 'AD-AM-CF-3','AD-AM-CF-4','AD-AM-CF-5','AD-AM-CF-6','AD-AM-CF-7','AD-AM-CF-8','AD-AM-CF-9','AD-AM-CF-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-6'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CG-1', 'AD-AM-CG-2', 'AD-AM-CG-3','AD-AM-CG-4','AD-AM-CG-5','AD-AM-CG-6','AD-AM-CG-7','AD-AM-CG-8','AD-AM-CG-9','AD-AM-CG-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-7'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CH-1', 'AD-AM-CH-2', 'AD-AM-CH-3','AD-AM-CH-4','AD-AM-CH-5','AD-AM-CH-6','AD-AM-CH-7','AD-AM-CH-8','AD-AM-CH-9','AD-AM-CH-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-8'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CI-1', 'AD-AM-CI-2', 'AD-AM-CI-3','AD-AM-CI-4','AD-AM-CI-5','AD-AM-CI-6','AD-AM-CI-7','AD-AM-CI-8','AD-AM-CI-9','AD-AM-CI-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-9'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
}elseif (in_array($kode_petugas, ['AD-AM-CJ-1', 'AD-AM-CJ-2', 'AD-AM-CJ-3','AD-AM-CJ-4','AD-AM-CJ-5','AD-AM-CJ-6','AD-AM-CJ-7','AD-AM-CJ-8','AD-AM-CJ-9','AD-AM-CJ-10'])) {
    $result_avp = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_kode = 'AD-AVP-C-10'"));
    $tujuan_avp = $result_avp['pks_id'] ?? null; // Set tujuan_avp to the pks_id of AD-AVP-9
} else {
    $tujuan_avp = $_POST['tujuan_avp']; // Use the posted value if not in the specified codes
}

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