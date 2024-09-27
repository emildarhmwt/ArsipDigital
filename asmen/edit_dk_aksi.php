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

	mysqli_query($koneksi, "UPDATE doc1 set doc1_waktu_upload=NOW(), doc1_petugas='".$_SESSION['id']."', doc1_kode='$kode', doc1_nama='$nama', doc1_ket='$keterangan', status='Uploaded'  where doc1_id='$id'")or die(mysqli_error($koneksi));
	header("location:data_pks.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:data_pks.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"SELECT * from doc1 where doc1_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['doc1_file'];
        
		 if (file_exists("../berkas_pks/".$nama_file_lama)) {
            unlink("../berkas_pks/".$nama_file_lama);
        }

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../berkas_pks/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE doc1 set doc1_waktu_upload=NOW(), doc1_petugas='".$_SESSION['id']."',doc1_kode='$kode', doc1_nama='$nama', doc1_jenis='$jenis', doc1_ket='$keterangan', doc1_file='$nama_file' ,status='Uploaded' where doc1_id='$id'")or die(mysqli_error($koneksi));
		header("location:data_pks.php?alert=sukses");
	}
}