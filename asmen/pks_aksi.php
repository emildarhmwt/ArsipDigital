<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$result = mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_level = 'ASMEN' LIMIT 1");
$row = mysqli_fetch_assoc($result);
$petugas = $row['pks_id'] ?? null; 
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

$rand = rand();
$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);
$keterangan = $_POST['keterangan'];

if($jenis == "php") {
    header("location:data_pks.php?alert=gagal");
} else {
    move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename);
    $nama_file = $rand.'_'.$filename;

    // Insert into doc1 for AVP confirmation with status 'uploaded'
    mysqli_query($koneksi, "INSERT into doc1 (doc1_waktu_upload, doc1_petugas, doc1_kode, doc1_nama, doc1_jenis, doc1_ket, doc1_file, status) VALUES ('$waktu', '$petugas', '$kode', '$nama', '$jenis', '$keterangan', '$nama_file', 'uploaded')") or die(mysqli_error($koneksi));
    
    header("location:data_pks.php?alert=sukses"); 
}
?>