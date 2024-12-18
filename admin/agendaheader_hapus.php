<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from agenda_header where agendaheader_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "DELETE from agenda_header where agendaheader_id='$id'");
    if ($delete) {
        echo json_encode(['success' => true, 'message' => 'Agenda berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus agenda']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Agenda tidak ditemukan']);
}
?>