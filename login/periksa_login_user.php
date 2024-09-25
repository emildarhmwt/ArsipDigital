<?php 
// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$akses = $_POST['akses'];

if($akses == "user"){
	$login = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['user_id'];
		$_SESSION['nama'] = $data['user_nama'];
		$_SESSION['username'] = $data['user_username'];
		$_SESSION['status'] = "user_login";
	
	header("location:../user/dashboard_user.php");
	}else{
		header("location:loginuser.php?alert=gagal");
	}
	
} else if ($akses === "asmen"){
	$login = mysqli_query($koneksi, "SELECT * FROM user_pks WHERE pks_username='$username' AND pks_password='$password' AND pks_level='ASMEN'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['pks_id'];
		$_SESSION['nama'] = $data['pks_nama'];
		$_SESSION['username'] = $data['pks_username'];
		$_SESSION['status'] = "asmen_login";

		header("location:../asmen/dashboard_asmen.php");
	}else{
		header("location:loginuser.php?alert=gagal");
}

} else if($akses === "avp") {
	$login = mysqli_query($koneksi, "SELECT * FROM user_pks WHERE pks_username='$username' AND pks_password='$password' AND pks_level='AVP'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['pks_id'];
		$_SESSION['nama'] = $data['pks_nama'];
		$_SESSION['username'] = $data['pks_username'];
		$_SESSION['status'] = "avp_login";

		header("location:../avp/dashboard_avp.php");
	}else{
		header("location:loginuser.php?alert=gagal");
}

} else if($akses === "vp"){
	$login = mysqli_query($koneksi, "SELECT * FROM user_pks WHERE pks_username='$username' AND pks_password='$password' AND pks_level='VP'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['pks_id'];
		$_SESSION['nama'] = $data['pks_nama'];
		$_SESSION['username'] = $data['pks_username'];
		$_SESSION['status'] = "vp_login";

		header("location:../vp/dashboard_vp.php");
	}else{
		header("location:loginuser.php?alert=gagal");
	}
} else {
	$login = mysqli_query($koneksi, "SELECT * FROM user_pks WHERE pks_username='$username' AND pks_password='$password' AND pks_level='GM'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['pks_id'];
		$_SESSION['nama'] = $data['pks_nama'];
		$_SESSION['username'] = $data['pks_username'];
		$_SESSION['status'] = "gm_login";

		header("location:../gm/dashboard_gm.php");
	}else{
		header("location:logingm.php?alert=gagal");
	}
}