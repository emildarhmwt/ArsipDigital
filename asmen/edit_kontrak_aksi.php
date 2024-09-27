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

	mysqli_query($koneksi, "UPDATE doc3 set doc3_waktu_upload=NOW(), doc3_petugas='".$_SESSION['id']."', doc3_kode='$kode', doc3_nama='$nama', doc3_ket='$keterangan', doc3_status='Uploaded'  where doc3_id='$id'")or die(mysqli_error($koneksi));
	header("location:data_kontrak.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:data_kontrak.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"SELECT * from doc3 where doc3_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['doc3_file'];
        
		 if (file_exists("../berkas_pks/".$nama_file_lama)) {
            unlink("../berkas_pks/".$nama_file_lama);
        }

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE doc3 set doc3_waktu_upload=NOW(), doc3_petugas='".$_SESSION['id']."',doc3_kode='$kode', doc3_nama='$nama', doc3_jenis='$jenis', doc3_ket='$keterangan', doc3_file='$nama_file' ,doc3_status='Uploaded' where doc3_id='$id'")or die(mysqli_error($koneksi));
		header("location:data_kontrak.php?alert=sukses");
	}
}