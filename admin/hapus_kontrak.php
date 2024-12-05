<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from kontrak where kontrak_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "DELETE from kontrak where kontrak_id='$id'");
    if ($delete) {
        echo json_encode(['success' => true, 'message' => 'Kontrak berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus kontrak']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Kontrak tidak ditemukan']);
}
?>