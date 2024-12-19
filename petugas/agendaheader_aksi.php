<?php
include '../koneksi.php';
session_start();

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

$rand = rand();
$nama_file = NULL; // Default value to NULL

// Check if file is uploaded
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $filename = $_FILES['file']['name'];
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);

    // Check if the file type is invalid
    if ($jenis == "php") {
        header("location:agenda.php?alert=gagal");
        exit();
    }

    // Generate unique file name and move file to target directory
    $nama_file = $rand . '_' . $filename;
    if (!move_uploaded_file($_FILES['file']['tmp_name'], '../agenda/' . $nama_file)) {
        $nama_file = NULL; // Set to NULL if the upload fails
    }
}

// Prepare SQL query
$query = "INSERT INTO agenda_header (
    agendaheader_ticket,
    agendaheader_nopeg,
    agendaheader_kegiatan,
    agendaheader_nomor,
    agendaheader_lokasi,
    agendaheader_fasilitas,
    agendaheader_jumlah,
    agendaheader_tanggal,
    agendaheader_tanggalawal,
    agendaheader_tanggalakhir,
    agendaheader_kebutuhan,
    agendaheader_status,
    agendaheader_layout
) VALUES (
    '$agendaheader_ticket',
    '$agendaheader_nopeg',
    '$agendaheader_kegiatan',
    '$agendaheader_nomor',
    '$agendaheader_lokasi',
    '$agendaheader_fasilitas',
    '$agendaheader_jumlah',
    '$agendaheader_tanggal',
    '$agendaheader_tanggalawal',
    '$agendaheader_tanggalakhir',
    '$agendaheader_kebutuhan',
    NULL,
    " . ($nama_file ? "'$nama_file'" : "NULL") . "
)";

// Execute query and handle errors
mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

// Redirect after successful insertion
header("location:agenda.php");
?>