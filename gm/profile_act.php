<?php 
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$username  = $_POST['username'];
$nama  = $_POST['nama'];

$rand = rand();

$allowed =  array('gif','png','jpg','jpeg');

$filename = $_FILES['foto']['name'];

if($filename == ""){

	mysqli_query($koneksi, "UPDATE user_pks set pks_nama='$nama', pks_username='$username' where pks_id='$id'")or die(mysqli_error($koneksi));
	header("location:profile.php?alert=sukses");

}else{

	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from user_pks where pks_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['pks_foto'];
		unlink("../gambar/asmen/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/asmen/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE user_pks set pks_nama='$nama', pks_username='$username', pks_foto='$nama_file' where pks_id='$id'")or die(mysqli_error($koneksi));
		header("location:profile.php?alert=sukses");

	}else{

		header("location:profile.php?alert=gagal");
	}

}