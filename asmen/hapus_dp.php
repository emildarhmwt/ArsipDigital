<?php
include '../koneksi.php';
session_start();

if (isset($_GET['id'])) {
    $doc2_id = intval($_GET['id']); // Mengambil id dari parameter GET dan memastikan itu adalah integer

    // Query untuk menghapus data
    $deleteQuery = "DELETE FROM doc2 WHERE doc2_id = '$doc2_id'";

    if (mysqli_query($koneksi, $deleteQuery)) {
        header("location:data_kak_hps.php?alert=delete_success");
    } else {
        // Log error jika gagal
        error_log("Delete error: " . mysqli_error($koneksi));
        header("location:data_kak_hps.php?alert=delete_failed");
    }
} else {
    header("location:data_kak_hps.php?alert=id_missing");
}
?>