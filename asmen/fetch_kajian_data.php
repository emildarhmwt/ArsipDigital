<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../koneksi.php');

// Mendapatkan tahun dari parameter GET, atau menggunakan tahun sekarang secara default
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
error_log("Year: " . $year);

// Inisialisasi array data untuk setiap status
$data = [
    'uploaded_asmen' => array_fill(0, 12, 0),
    'approved_avp' => array_fill(0, 12, 0),
    'rejected_avp' => array_fill(0, 12, 0),
    'approved_vp' => array_fill(0, 12, 0),
    'rejected_vp' => array_fill(0, 12, 0),
    'done' => array_fill(0, 12, 0),
    'rejected_gm' => array_fill(0, 12, 0),
];

// Query hanya untuk tahun tertentu
$query = "
    SELECT MONTH(dock_waktu_gm) as month, COUNT(*) as count, dock_status_gm FROM dockajian 
    WHERE YEAR(dock_waktu_gm) = '$year' 
    GROUP BY MONTH(dock_waktu_gm), dock_status_gm
    UNION ALL
    SELECT MONTH(dock_waktu_vp) as month, COUNT(*) as count, dock_status_vp FROM dockajian 
    WHERE YEAR(dock_waktu_vp) = '$year' 
    GROUP BY MONTH(dock_waktu_vp), dock_status_vp
    UNION ALL
    SELECT MONTH(dock_waktu_avp) as month, COUNT(*) as count, dock_status_avp FROM dockajian 
    WHERE YEAR(dock_waktu_avp) = '$year' 
    GROUP BY MONTH(dock_waktu_avp), dock_status_avp
    UNION ALL
    SELECT MONTH(dock_waktu_asmen) as month, COUNT(*) as count, dock_status_asmen FROM dockajian 
    WHERE YEAR(dock_waktu_asmen) = '$year' 
    GROUP BY MONTH(dock_waktu_asmen), dock_status_asmen
";

$result = mysqli_query($koneksi, $query);

// Jika ada kesalahan pada query
if (!$result) {
    echo json_encode(['error' => 'Query Error: ' . mysqli_error($koneksi)]); // Keluarkan error dalam format JSON
    exit;
}

// Mengisi array data berdasarkan hasil query
while ($row = mysqli_fetch_assoc($result)) {
    $monthIndex = $row['month'] - 1; // Mengubah indeks bulan menjadi berbasis 0
    switch ($row['dock_status_asmen'] ?? $row['dock_status_avp'] ?? $row['dock_status_vp'] ?? $row['dock_status_gm']) {
        case 'Uploaded (Asmen)':
            $data['uploaded_asmen'][$monthIndex] += $row['count'];
            break;
        case 'Approved (AVP)':
            $data['approved_avp'][$monthIndex] += $row['count'];
            break;
        case 'Rejected (AVP)':
            $data['rejected_avp'][$monthIndex] += $row['count'];
            break;
        case 'Approved (VP)':
            $data['approved_vp'][$monthIndex] += $row['count'];
            break;
        case 'Rejected (VP)':
            $data['rejected_vp'][$monthIndex] += $row['count'];
            break;
        case 'Done':
            $data['done'][$monthIndex] += $row['count'];
            break;
        case 'Rejected (GM)':
            $data['rejected_gm'][$monthIndex] += $row['count'];
            break;
    }
}

echo json_encode($data);
?>