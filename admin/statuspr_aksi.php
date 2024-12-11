<?php 
include '../koneksi.php';
$statuspr_tanggal_pengajuan  = $_POST['statuspr_tanggal_pengajuan'];
$statuspr_kode  = $_POST['statuspr_kode'];
$statuspr_nama  = $_POST['statuspr_nama'];
$statuspr_jumlah  = $_POST['statuspr_jumlah'];
$statuspr_satuan  = $_POST['statuspr_satuan'];
$statuspr_vendor  = $_POST['statuspr_vendor'];
$statuspr_tanggal_proses  = $_POST['statuspr_tanggal_proses'];
$statuspr_tahap = !empty($_POST['statuspr_tahap']) ? $_POST['statuspr_tahap'] : NULL;
$statuspr_lama  = $_POST['statuspr_lama'];
$statuspr_estimasi  = $_POST['statuspr_estimasi'];
$statuspr_status  = $_POST['statuspr_status'];
$statuspr_catatan = !empty($_POST['statuspr_catatan']) ? $_POST['statuspr_catatan'] : NULL;

$query = "INSERT INTO status_pr (statuspr_tanggal_pengajuan, statuspr_kode, statuspr_nama, statuspr_jumlah, statuspr_satuan, statuspr_vendor, statuspr_tanggal_proses, statuspr_tahap, statuspr_lama, statuspr_estimasi, statuspr_status, statuspr_catatan) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "sssissssisss", $statuspr_tanggal_pengajuan, $statuspr_kode, $statuspr_nama, $statuspr_jumlah, $statuspr_satuan, $statuspr_vendor, $statuspr_tanggal_proses, $statuspr_tahap, $statuspr_lama, $statuspr_estimasi, $statuspr_status, $statuspr_catatan);

// Execute query
mysqli_stmt_execute($stmt);
$last_id = mysqli_insert_id($koneksi);

header("Location: status_pr.php");
exit;
?>