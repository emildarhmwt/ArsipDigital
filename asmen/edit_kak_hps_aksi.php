<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$id  = $_POST['id'];
$comment = $_POST['comment']; // Tambahkan ini
$rand = rand();
$filename_kak = $_FILES['file_kak']['name']; // Tambahkan ini
$filename_hps = $_FILES['file_hps']['name']; // Tambahkan ini

if($filename_kak == "" && $filename_hps == ""){
    mysqli_query($koneksi, "UPDATE doc_kak_hps set dockh_petugas='".$_SESSION['id']."', dockh_avp=NULL, dockh_vp=NULL, dockh_gm=NULL, dockh_comment='$comment', dockh_status_asmen='Uploaded', dockh_status_avp=NULL, dockh_status_vp=NULL, dockh_status_gm=NULL, dockh_alasan_reject=NULL where dockh_dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
    header("location:data_kak_hps.php");
}else{
    if($filename_kak != ""){
        $jenis_kak = pathinfo($filename_kak, PATHINFO_EXTENSION);
        if($jenis_kak == "php") {
            header("location:data_kak_hps.php?alert=gagal");
            exit();
        }else{
            // hapus file lama
            $lama = mysqli_query($koneksi,"SELECT * from doc_kak_hps where dockh_dock_id='$id'");
            $l = mysqli_fetch_assoc($lama);
            $nama_file_lama_kak = $l['dockh_file_kak'];
            if (file_exists("../berkas_pks/".$nama_file_lama_kak)) {
                unlink("../berkas_pks/".$nama_file_lama_kak);
            }
            // upload file baru
            move_uploaded_file($_FILES['file_kak']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename_kak);
            $nama_file_kak = $rand.'_'.$filename_kak;
            mysqli_query($koneksi, "UPDATE doc_kak_hps set dockh_file_kak='$nama_file_kak' where dockh_dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
        }
    }
    
    if($filename_hps != ""){
        $jenis_hps = pathinfo($filename_hps, PATHINFO_EXTENSION);
        if($jenis_hps == "php") {
            header("location:data_kak_hps.php?alert=gagal");
            exit();
        }else{
            // hapus file lama
            $lama = mysqli_query($koneksi,"SELECT * from doc_kak_hps where dockh_dock_id='$id'");
            $l = mysqli_fetch_assoc($lama);
            $nama_file_lama_hps = $l['dockh_file_hps'];
            if (file_exists("../berkas_pks/".$nama_file_lama_hps)) {
                unlink("../berkas_pks/".$nama_file_lama_hps);
            }
            // upload file baru
            move_uploaded_file($_FILES['file_hps']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename_hps);
            $nama_file_hps = $rand.'_'.$filename_hps;
            mysqli_query($koneksi, "UPDATE doc_kak_hps set dockh_file_hps='$nama_file_hps' where dockh_dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
        }
    }
    
    // Update comment and status
    mysqli_query($koneksi, "UPDATE doc_kak_hps set dockh_petugas='".$_SESSION['id']."',dockh_avp=NULL, dockh_vp=NULL, dockh_gm=NULL, dockh_comment='$comment', dockh_status_asmen='Uploaded', dockh_status_avp=NULL, dockh_status_vp=NULL, dockh_status_gm=NULL, dockh_alasan_reject=NULL where dockh_dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
    header("location:data_kak_hps.php?alert=sukses");
}
?>