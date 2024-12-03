<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from status_arsip where status_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "delete from status_arsip where status_id='$id'");
    if ($delete) {
        echo json_encode(['success' => true, 'message' => 'Status berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus status']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Status tidak ditemukan']);
}
?>