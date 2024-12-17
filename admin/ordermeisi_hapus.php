<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from orderme_isi where ordermeisi_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "DELETE from orderme_isi where ordermeisi_id='$id'");
    if ($delete) {
        echo json_encode(['success' => true, 'message' => 'Order me berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus order me']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Order me tidak ditemukan']);
}
?>