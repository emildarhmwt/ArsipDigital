<?php
include '../koneksi.php';
$id = $_GET['id']; 

mysqli_query($koneksi, "UPDATE agenda_header SET agendaheader_status='Approved' WHERE agendaheader_id='$id'");

header("Location: agenda.php");
exit;
?>