<?php 
include '../koneksi.php';
$kode = $_POST['kode'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$level = $_POST['level'];

if($filename == ""){
	mysqli_query($koneksi, "insert into user_pks values (NULL,'$kode','$nama','$username','$password','','$level')");
	header("location:data_userpks.php");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:data_userpks.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/asmen/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into user_pks values (NULL,'$kode','$nama','$username','$password','$file_gambar','$level')");
		header("location:data_userpks.php");
	}
}