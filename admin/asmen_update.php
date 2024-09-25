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
	mysqli_query($koneksi, "update asmen set asmen_nama='$nama', asmen_asmenname='$asmenname' where asmen_id='$id'");
	header("location:data_asmen.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:data_asmen.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/asmen/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update asmen set asmen_nama='$nama', asmen_asmenname='$asmenname', asmen_foto='$x' where asmen_id='$id'");		
		header("location:data_asmen.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update asmen set asmen_nama='$nama', asmen_asmenname='$asmenname', asmen_password='$password' where asmen_id='$id'");
	header("location:data_asmen.php");
}