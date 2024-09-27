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
$doc3_doc2_id = $_POST['doc2_id'] ?? null;  

if ($doc3_doc2_id) {
    $doc3_doc2_id = intval($doc3_doc2_id); // Cast to an integer to prevent SQL injection
    
    // Check if the doc2_id exists in the doc2 table
    $checkDoc2 = mysqli_query($koneksi, "SELECT * FROM doc2 WHERE doc2_id = '$doc3_doc2_id'");
    
    if (mysqli_num_rows($checkDoc2) == 0) {
        header("location:data_kontrak.php?alert=doc2_not_found");
        exit;
    }
} else {
    header("location:data_kontrak.php?alert=doc2_id_missing");
    exit;
}

$keterangan = $_POST['keterangan'];
$files = $_FILES['file'] ?? null; // Get the file array

if ($files && isset($files['name']) && is_array($files['name']) && count(array_filter($files['name']))) {
    // Loop through each uploaded file
    for ($i = 0; $i < count($files['name']); $i++) {
        $rand = rand();
        $filename = $files['name'][$i];
        $jenis = pathinfo($filename, PATHINFO_EXTENSION);

        if ($jenis == "php") {
            header("location:data_kontrak.php?alert=gagal");
            exit; // Exit to prevent further processing
        } else {
            move_uploaded_file($files['tmp_name'][$i], '../berkas_pks/'.$rand.'_'.$filename);
            $nama_file = $rand.'_'.$filename;

            // Insert into doc2 with reference to doc1_id for each file
            $insertQuery = "INSERT INTO doc3 
                            (doc3_waktu_upload, doc3_petugas, doc3_kode, doc3_nama, doc3_jenis, doc3_ket, doc3_file, doc3_status, doc3_doc2_id) 
                            VALUES 
                            ('$waktu', '$petugas', '$kode', '$nama', '$jenis', '$keterangan', '$nama_file', 'Uploaded', '$doc3_doc2_id')";
            
            if (!mysqli_query($koneksi, $insertQuery)) {
                // Log the error for debugging
                $error = mysqli_error($koneksi);
                error_log("Insert error: " . mysqli_error($koneksi));
                header("location:data_kontrak.php?alert=insert_failed");
                echo "Error inserting data: " . $error;
                exit; // Exit if insert fails
            }
        }
    }
} else {
    header("location:data_kontrak.php?alert=files_not_uploaded");
    exit; // Exit if no files were uploaded
}

header("location:data_kontrak.php?alert=sukses");