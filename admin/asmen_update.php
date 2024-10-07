<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "UPDATE user_pks set pks_nama='$nama', pks_username='$username' where pks_id='$id'");
	header("location:data_userpks.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:data_userpks.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/asmen/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE user_pks set pks_nama='$nama', pks_username='$username', pks_foto='$x' where pks_id='$id'");		
		header("location:data_userpks.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "UPDATE user_pks set pks_nama='$nama', pks_username='$username', pks_password='$password' where pks_id='$id'");
	header("location:data_userpks.php");
}