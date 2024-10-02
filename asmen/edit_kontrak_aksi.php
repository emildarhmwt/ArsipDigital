<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$id  = $_POST['id'];
$comment = $_POST['comment']; // Tambahkan ini
$rand = rand();
$filename = $_FILES['file']['name'];

if($filename == ""){
    mysqli_query($koneksi, "UPDATE doc_kontrak set dockt_petugas='".$_SESSION['id']."', dockt_waktu_asmen=NOW(), dockt_waktu_avp=NULL, dockt_waktu_vp=NULL, dockt_waktu_gm=NULL, dockt_avp=NULL, dockt_vp=NULL, dockt_gm=NULL, dockt_comment='$comment', dockt_status_asmen='Uploaded (Asmen)', dockt_status_avp=NULL, dockt_status_vp=NULL, dockt_status_gm=NULL where dockt_dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
    header("location:data_kontrak.php");
}else{
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);
    if($jenis == "php") {
        header("location:data_kontrak.php?alert=gagal");
    }else{
        // hapus file lama
        $lama = mysqli_query($koneksi,"SELECT * from doc_kontrak where dockt_dock_id='$id'");
        $l = mysqli_fetch_assoc($lama);
        $nama_file_lama = $l['dockt_file'];
        if (file_exists("../berkas_pks/".$nama_file_lama)) {
            unlink("../berkas_pks/".$nama_file_lama);
        }
        // upload file baru
        move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename);
        $nama_file = $rand.'_'.$filename;
        mysqli_query($koneksi, "UPDATE doc_kontrak set dockt_petugas='".$_SESSION['id']."',dockt_waktu_asmen=NOW(), dockt_waktu_avp=NULL, dockt_waktu_vp=NULL, dockt_waktu_gm=NULL,  dockt_avp=NULL, dockt_vp=NULL, dockt_gm=NULL, dockt_file='$nama_file', dockt_comment='$comment', dockt_status_asmen='Uploaded (Asmen)', dockt_status_avp=NULL, dockt_status_vp=NULL, dockt_status_gm=NULL where dockt_dock_id='$id'")or die(mysqli_error($koneksi)); // Perbarui query
        header("location:data_kontrak.php?alert=sukses");
    }
}
?>