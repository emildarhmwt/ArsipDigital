<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$orderme_id  = $_POST['orderme_id'];
$orderme_kategori  = $_POST['orderme_kategori'];
$orderme_tanggal  = $_POST['orderme_tanggal'];
$orderme_request  = $_POST['orderme_request'];
$orderme_desk  = $_POST['orderme_desk'];
$orderme_lokasi  = $_POST['orderme_lokasi'];
$orderme_pj  = $_POST['orderme_pj'] ? $_POST['orderme_pj'] : NULL;
$orderme_penerima  = $_POST['orderme_penerima'];
$orderme_status  = $_POST['orderme_status'];
$orderme_tglselesai  = $_POST['orderme_tglselesai'];

$rand = rand();

$filename = $_FILES['file']['name'];

if($filename == ""){
    mysqli_query($koneksi, "UPDATE order_me SET orderme_kategori='$orderme_kategori', orderme_tanggal='$orderme_tanggal', orderme_request='$orderme_request', orderme_desk='$orderme_desk', orderme_lokasi='$orderme_lokasi',  orderme_pj=" . ($orderme_pj ? "'$orderme_pj'" : "NULL") . ", orderme_penerima='$orderme_penerima', orderme_status='$orderme_status', orderme_tglselesai='$orderme_tglselesai' WHERE orderme_id='$orderme_id'") or die(mysqli_error($koneksi));
    header("location:order_me.php");
} else {
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);

    if($jenis == "php") {
        header("location:order_me.php?alert=gagal");
    } else {
        // Cek apakah dokumen lama ada
        $lama = mysqli_query($koneksi,"SELECT orderme_dokumen FROM order_me WHERE orderme_id='$orderme_id'");
        $l = mysqli_fetch_assoc($lama);
        $nama_file_lama = $l['orderme_dokumen'];

        if ($nama_file_lama != NULL) {
            // Hapus file lama jika ada
            unlink("../orderme/".$nama_file_lama);
        }

        // Upload file baru
        move_uploaded_file($_FILES['file']['tmp_name'], '../orderme/'.$rand.'_'.$filename);
        $nama_file = $rand.'_'.$filename;

        // Update data termasuk dokumen baru
        mysqli_query($koneksi, "UPDATE order_me SET orderme_kategori='$orderme_kategori', orderme_tanggal='$orderme_tanggal', orderme_request='$orderme_request', orderme_desk='$orderme_desk', orderme_lokasi='$orderme_lokasi',  orderme_pj=" . ($orderme_pj ? "'$orderme_pj'" : "NULL") . ", orderme_penerima='$orderme_penerima', orderme_status='$orderme_status', orderme_tglselesai='$orderme_tglselesai', orderme_dokumen='$nama_file' WHERE orderme_id='$orderme_id'") or die(mysqli_error($koneksi));
        header("location:order_me.php");
    }
}