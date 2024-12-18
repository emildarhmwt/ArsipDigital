<?php
include '../koneksi.php';
$id = $_GET['id']; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alasan = $_POST['alasan'];

    mysqli_query($koneksi, "UPDATE agenda_header SET agendaheader_status='Rejected', agendaheader_alasan='$alasan' WHERE agendaheader_id='$id'");
    
    header("Location: agenda.php");
    exit;
}
exit;
?>