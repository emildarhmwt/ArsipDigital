<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$id  = $_POST['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];

$rand = rand();
$filename = $_FILES['file']['name'];
$keterangan = $_POST['keterangan'];

if($filename == ""){

	mysqli_query($koneksi, "UPDATE doc2 set doc2_waktu_upload=NOW(), doc2_petugas='".$_SESSION['id']."', doc2_kode='$kode', doc2_nama='$nama', doc2_ket='$keterangan', doc2_status='Uploaded'  where doc2_id='$id'")or die(mysqli_error($koneksi));
	header("location:data_kak_hps.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:data_kak_hps.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"SELECT * from doc2 where doc2_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['doc2_file'];
        
		 if (file_exists("../berkas_pks/".$nama_file_lama)) {
            unlink("../berkas_pks/".$nama_file_lama);
        }

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE doc2 set doc2_waktu_upload=NOW(), doc2_petugas='".$_SESSION['id']."',doc2_kode='$kode', doc2_nama='$nama', doc2_jenis='$jenis', doc2_ket='$keterangan', doc2_file='$nama_file' ,doc2_status='Uploaded' where doc2_id='$id'")or die(mysqli_error($koneksi));
		header("location:data_kak_hps.php?alert=sukses");
	}
}