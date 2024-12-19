<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * from header_kontrak where header_id='$id'");
if (mysqli_num_rows($data) > 0) {
    $delete = mysqli_query($koneksi, "DELETE from header_kontrak where header_id='$id'");
    if ($delete) {
        $delete_kontrak = mysqli_query($koneksi, "DELETE from kontrak where kontrak_header_id='$id'");
        $delete_bulan_kontrak = mysqli_query($koneksi, "DELETE from bulan_kontrak where bulan_header_id='$id'");

        echo json_encode(['success' => true, 'message' => 'Kontrak berhasil dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus kontrak']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Kontrak tidak ditemukan']);
}
?>