<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$agenda_id  = $_POST['agenda_id'];
$agenda_kategori  = $_POST['agenda_kategori'];
$agenda_deskripsi  = $_POST['agenda_deskripsi'];
$agenda_pj  = $_POST['agenda_pj'];
$agenda_status  = $_POST['agenda_status'];

$rand = rand();

$filename = $_FILES['file']['name'];

if($filename == ""){

	mysqli_query($koneksi, "UPDATE agenda set agenda_kategori='$agenda_kategori', agenda_deskripsi='$agenda_deskripsi', agenda_pj='$agenda_pj',agenda_status='$agenda_status' where agenda_id='$agenda_id'")or die(mysqli_error($koneksi));
	header("location:agenda_semua.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:agenda_semua.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"SELECT * from agenda where agenda_id='$agenda_id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['agenda_dokumen'];
		unlink("../agenda/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../agenda/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE agenda set agenda_kategori='$agenda_kategori', agenda_deskripsi='$agenda_deskripsi', agenda_pj='$agenda_pj',agenda_status='$agenda_status', agenda_dokumen='$nama_file' where agenda_id='$agenda_id'")or die(mysqli_error($koneksi));
		header("location:agenda_semua.php?alert=sukses");
	}
}