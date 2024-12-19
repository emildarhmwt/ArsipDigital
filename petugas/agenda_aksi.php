<?php
include '../koneksi.php';
session_start();

$agenda_header_id = $_POST['agenda_header_id'];
$agenda_kategori  = $_POST['agenda_kategori'];
$agenda_deskripsi = $_POST['agenda_deskripsi'];
$agenda_pj        = $_POST['agenda_pj'];
$agenda_status    = $_POST['agenda_status'];

$rand = rand();
$filename = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
$nama_file = NULL;

if (!empty($filename)) {
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);

    if ($jenis == "php") {
        header("location:agenda.php?alert=gagal");
        exit();
    }

    $nama_file = $rand . '_' . $filename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], '../agenda/' . $nama_file)) {
       
    } else {
        $nama_file = NULL; 
    }
}


$header_query = "SELECT agendaheader_tanggal, agendaheader_tanggalawal, agendaheader_tanggalakhir, agendaheader_lokasi, agendaheader_kegiatan, agendaheader_id 
                 FROM agenda_header 
                 WHERE agendaheader_id = '$agenda_header_id'";
$header_result = mysqli_query($koneksi, $header_query);

if ($header = mysqli_fetch_assoc($header_result)) {
    $agendaheader_id = $header['agendaheader_id'];
    $agenda_tanggal = $header['agendaheader_tanggal'];
    $agenda_tanggalawal = $header['agendaheader_tanggalawal'];
    $agenda_tanggalakhir = $header['agendaheader_tanggalakhir'];
    $agenda_lokasi = $header['agendaheader_lokasi'];
    $agenda_kegiatan = $header['agendaheader_kegiatan'];


    $query = "INSERT INTO agenda (agenda_id, agenda_header_id, agenda_kategori,  agenda_tanggal, agenda_tanggalawal, agenda_tanggalakhir, agenda_kegiatan, agenda_deskripsi, agenda_lokasi, agenda_pj, agenda_status, agenda_dokumen) 
              VALUES (NULL,'$agendaheader_id', '$agenda_kategori', '$agenda_tanggal', '$agenda_tanggalawal', '$agenda_tanggalakhir', '$agenda_kegiatan', '$agenda_deskripsi', '$agenda_lokasi', '$agenda_pj', '$agenda_status', " . ($nama_file ? "'$nama_file'" : "NULL") . ")";
    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    header("location:agenda.php?alert=sukses");
} else {
    header("location:agenda.php?alert=gagal");
}
?>