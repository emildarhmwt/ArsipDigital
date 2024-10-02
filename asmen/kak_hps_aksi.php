<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$result = mysqli_query($koneksi, "SELECT pks_id FROM user_pks WHERE pks_level = 'ASMEN' LIMIT 1");
$row = mysqli_fetch_assoc($result);
$petugas = $row['pks_id'] ?? null; 
$dockh_dock_id = $_POST['dock_id'] ?? null;  // Retrieve dock_id from POST data

if ($dockh_dock_id) {
    // Debugging output
    error_log("Received dock_id: " . $dockh_dock_id); // Log the received ID for debugging

    // Ensure the ID is an integer to prevent SQL injection
    $dockh_dock_id = intval($dockh_dock_id);
    $checkDoc1 = mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_id = '$dockh_dock_id'");
    if (mysqli_num_rows($checkDoc1) == 0) {
        header("location:data_kak_hps.php?alert=dock_id_not_found");
        exit; // Exit if dock_id does not exist
    }

    $result2 = mysqli_query($koneksi, "SELECT dock_nama, dock_desk, dock_jenis, dock_kategori, dock_aspek, dock_tanggal, dock_lokasi FROM dockajian WHERE dock_id = '$dockh_dock_id'");
    $row2 = mysqli_fetch_assoc($result2);
    $nama =$row2['dock_nama'] ?? null;
    $desk =$row2['dock_desk'] ?? null;
    $jenis2 =$row2['dock_jenis'] ?? null;
    $kategori =$row2['dock_kategori'] ?? null;
    $aspek =$row2['dock_aspek'] ?? null;
    $tanggal =$row2['dock_tanggal'] ?? null;
    $lokasi =$row2['dock_lokasi'] ?? null;
} else {
    header("location:data_kak_hps.php?alert=dock_id_missing");
    exit; // Exit if dock_id is missing
}
$cost = $_POST['cost'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$harga_total = $harga * $jumlah;
$comment = $_POST['comment'];
$files_kak = $_FILES['file_kak'] ?? null;
$files_hps = $_FILES['file_hps'] ?? null;

error_log("Files KAK: " . print_r($files_kak, true));
error_log("Files HPS: " . print_r($files_hps, true));

// Check if file KAK is uploaded
if ($files_kak && $files_kak['error'] == 0) {
    $rand = rand();
    $jenis = pathinfo($files_kak['name'], PATHINFO_EXTENSION);

    if ($jenis == "php") {
        header("location:data_kak_hps.php?alert=gagal");
        exit; // Exit to prevent further processing
    } else {
        move_uploaded_file($files_kak['tmp_name'], '../berkas_pks/'.$rand.'_'.$files_kak['name']);
        $nama_file_kak = $rand.'_'.$files_kak['name'];
    }
} else {
    header("location:data_kak_hps.php?alert=files_not_uploaded");
    exit; // Exit if no files were uploaded
}

// Check for HPS file
if ($files_hps && $files_hps['error'] == 0) {
    $rand = rand();
    $jenis = pathinfo($files_hps['name'], PATHINFO_EXTENSION);

    if ($jenis == "php") {
        header("location:data_kak_hps.php?alert=gagal");
        exit; // Exit to prevent further processing
    } else {
        move_uploaded_file($files_hps['tmp_name'], '../berkas_pks/'.$rand.'_'.$files_hps['name']);
        $nama_file_hps = $rand.'_'.$files_hps['name'];

        // Insert into doc_kak_hps for both files
        $insertKakHpsQuery = "INSERT INTO doc_kak_hps (dockh_dock_id, dockh_petugas,dockh_waktu_asmen,dockh_nama,dockh_desk,dockh_jenis,dockh_kategori, dockh_aspek, dockh_tanggal, dockh_lokasi, dockh_cost, dockh_satuan, dockh_harga, dockh_jumlah, dockh_harga_total, dockh_file_kak, dockh_file_hps, dockh_comment, dockh_status_asmen) 
        VALUES ('$dockh_dock_id', '$petugas', '$waktu' ,'$nama','$desk','$jenis2','$kategori','$aspek','$tanggal','$lokasi','$cost','$satuan','$harga','$jumlah','$harga_total', '$nama_file_kak', '$nama_file_hps', '$comment', 'Uploaded (Asmen)')";
        
        if (!mysqli_query($koneksi, $insertKakHpsQuery)) {
            error_log("Insert error: " . mysqli_error($koneksi));
            header("location:data_kak_hps.php?alert=insert_failed");
            exit; // Exit if insert fails
        }
    }
} else {
    header("location:data_kak_hps.php?alert=files_not_uploaded");
    exit; // Exit if no files were uploaded
}

header("location:data_kak_hps.php?alert=sukses"); 
?>