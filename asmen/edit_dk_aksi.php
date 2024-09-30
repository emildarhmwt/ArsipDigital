<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$id  = $_POST['id'];
$comment = $_POST['comment']; // Tambahkan ini
$rand = rand();
$filename = $_FILES['file']['name'];

if($filename == ""){
    mysqli_query($koneksi, "UPDATE dockajian set dock_petugas='".$_SESSION['id']."', dock_avp=NULL, dock_vp=NULL, dock_gm=NULL, dock_comment='$comment', dock_status_asmen='Uploaded', dock_status_avp=NULL, dock_status_vp=NULL, dock_status_gm=NULL where dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
    header("location:data_pks.php");
}else{
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);
    if($jenis == "php") {
        header("location:data_pks.php?alert=gagal");
    }else{
        // hapus file lama
        $lama = mysqli_query($koneksi,"SELECT * from dockajian where dock_id='$id'");
        $l = mysqli_fetch_assoc($lama);
        $nama_file_lama = $l['dock_file'];
        if (file_exists("../berkas_pks/".$nama_file_lama)) {
            unlink("../berkas_pks/".$nama_file_lama);
        }
        // upload file baru
        move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename);
        $nama_file = $rand.'_'.$filename;
        mysqli_query($koneksi, "UPDATE dockajian set dock_petugas='".$_SESSION['id']."', dock_avp=NULL, dock_vp=NULL, dock_gm=NULL, dock_file='$nama_file', dock_comment='$comment', dock_status_asmen='Uploaded', dock_status_avp=NULL, dock_status_vp=NULL, dock_status_gm=NULL where dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
        header("location:data_pks.php?alert=sukses");
    }
}
?>