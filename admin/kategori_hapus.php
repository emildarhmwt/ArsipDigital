<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from kategori where kategori_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "delete from kategori where kategori_id='$id'");
    if ($delete) {
        echo json_encode(['success' => true, 'message' => 'Kategori berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus kategori']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Kategori tidak ditemukan']);
}
?>