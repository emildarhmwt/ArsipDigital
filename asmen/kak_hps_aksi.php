<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$result = mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_level = 'ASMEN' LIMIT 1");
$row = mysqli_fetch_assoc($result);
$petugas = $row['pks_id'] ?? null; 
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$doc1_id = $_POST['doc1_id'] ?? null;  // Retrieve doc1_id from POST data
if ($doc1_id) {
    $checkDoc1 = mysqli_query($koneksi, "SELECT * FROM doc1 WHERE doc1_id = '$doc1_id'");
    if (mysqli_num_rows($checkDoc1) == 0) {
        header("location:data_kak_hps.php?alert=doc1_not_found");
        exit; // Exit if doc1_id does not exist
    }
}

$keterangan = $_POST['keterangan'];
$files = $_FILES['file'] ?? null; // Get the files array

if ($files && isset($files['name']) && is_array($files['name']) && count(array_filter($files['name']))) {
    // Loop through each uploaded file
    for ($i = 0; $i < count($files['name']); $i++) {
    $rand = rand();
    $filename = $files['name'][$i];
    $jenis = pathinfo($filename, PATHINFO_EXTENSION);

    if ($jenis == "php") {
        header("location:data_kak_hps.php?alert=gagal");
        exit; // Exit to prevent further processing
    } else {
        move_uploaded_file($files['tmp_name'][$i], '../berkas_pks/'.$rand.'_'.$filename);
        $nama_file = $rand.'_'.$filename;

        // Insert into doc2 with reference to doc1_id for each file
        mysqli_query($koneksi, "INSERT into doc2 (doc2_doc1_id, doc2_waktu_upload, doc2_petugas, doc2_kode, doc2_nama, doc2_jenis, doc2_ket, doc2_file, doc2_status) VALUES ('$doc1_id', '$waktu', '$petugas', '$kode', '$nama', '$jenis', '$keterangan', '$nama_file', 'Uploaded')") or die(mysqli_error($koneksi));
    }
}
} else {
    header("location:data_kak_hps.php?alert=files_not_uploaded");
    exit; // Exit if no files were uploaded
}


header("location:data_kak_hps.php?alert=sukses"); 
?>