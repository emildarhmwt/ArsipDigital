<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from status_pr where statuspr_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "DELETE from status_pr where statuspr_id='$id'");
    if ($delete) {
        echo json_encode(['success' => true, 'message' => 'Status PR berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus status PR']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Status PR tidak ditemukan']);
}
?>