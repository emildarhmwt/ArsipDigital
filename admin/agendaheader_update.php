<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$agendaheader_id  = $_POST['agendaheader_id'];
$agendaheader_ticket  = $_POST['agendaheader_ticket'];
$agendaheader_nopeg  = $_POST['agendaheader_nopeg'];
$agendaheader_kegiatan  = $_POST['agendaheader_kegiatan'];
$agendaheader_nomor  = $_POST['agendaheader_nomor'];
$agendaheader_lokasi  = $_POST['agendaheader_lokasi'];
$agendaheader_fasilitas  = $_POST['agendaheader_fasilitas'];
$agendaheader_jumlah  = $_POST['agendaheader_jumlah'];
$agendaheader_tanggal  = $_POST['agendaheader_tanggal'];
$agendaheader_tanggalawal  = $_POST['agendaheader_tanggalawal'];
$agendaheader_tanggalakhir  = $_POST['agendaheader_tanggalakhir'];
$agendaheader_kebutuhan  = $_POST['agendaheader_kebutuhan'];
$agendaheader_status  = $_POST['agendaheader_status'];
$agendaheader_alasan  = $_POST['agendaheader_alasan'];

$rand = rand();

$filename = $_FILES['file']['name'];

if($filename == ""){

	mysqli_query($koneksi, "UPDATE agenda_header SET 
    agendaheader_ticket='$agendaheader_ticket', 
    agendaheader_nopeg='$agendaheader_nopeg', 
    agendaheader_kegiatan='$agendaheader_kegiatan', 
    agendaheader_nomor='$agendaheader_nomor', 
    agendaheader_lokasi='$agendaheader_lokasi', 
    agendaheader_fasilitas='$agendaheader_fasilitas',  
    agendaheader_jumlah='$agendaheader_jumlah', 
    agendaheader_tanggal='$agendaheader_tanggal',  
    agendaheader_tanggalawal='$agendaheader_tanggalawal', 
    agendaheader_tanggalakhir='$agendaheader_tanggalakhir', 
    agendaheader_kebutuhan='$agendaheader_kebutuhan', 
    agendaheader_status=NULL, 
    agendaheader_alasan=NULL 
    WHERE agendaheader_id='$agendaheader_id'") or die(mysqli_error($koneksi));
	header("location:agenda.php");

}else{

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:agenda.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"SELECT * from agenda_header where agendaheader_id='$agendaheader_id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['agendaheader_layout'];
		unlink("../agenda/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../agenda/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE agenda_header set agendaheader_ticket='$agendaheader_ticket', agendaheader_nopeg='$agendaheader_nopeg', agendaheader_kegiatan='$agendaheader_kegiatan', agendaheader_nomor='$agendaheader_nomor', agendaheader_lokasi='$agendaheader_lokasi', agendaheader_fasilitas='$agendaheader_fasilitas',  agendaheader_jumlah='$agendaheader_jumlah', agendaheader_tanggal='$agendaheader_tanggal', agendaheader_tanggalawal='$agendaheader_tanggalawal', agendaheader_tanggalakhir='$agendaheader_tanggalakhir', agendaheader_kebutuhan='$agendaheader_kebutuhan', agendaheader_status=NULL,  agendaheader_alasan=NULL, agendaheader_layout='$nama_file' where agendaheader_id='$agendaheader_id'")or die(mysqli_error($koneksi));
		header("location:agenda.php");
	}
}