<?php
include('../koneksi.php');

// Ensure the year parameter is set and is a valid number
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y'); // Default to current year if not set

// Fetch data based on the year and month
$kajian = mysqli_query($koneksi, "SELECT MONTH(dock_waktu_gm) as month, COUNT(*) as count FROM dockajian WHERE YEAR(dock_waktu_gm) = '$year' GROUP BY MONTH(dock_waktu_gm)");
$kak_hps = mysqli_query($koneksi, "SELECT MONTH(dockh_waktu_gm) as month, COUNT(*) as count FROM doc_kak_hps WHERE YEAR(dockh_waktu_gm) = '$year' GROUP BY MONTH(dockh_waktu_gm)");
$kontrak = mysqli_query($koneksi, "SELECT MONTH(dockt_waktu_gm) as month, COUNT(*) as count FROM doc_kontrak WHERE YEAR(dockt_waktu_gm) = '$year' GROUP BY MONTH(dockt_waktu_gm)");

// Initialize data arrays for each document type
$data = [
    'kajian' => array_fill(0, 12, 0), // Initialize with 0 for each month
    'kak_hps' => array_fill(0, 12, 0),
    'kontrak' => array_fill(0, 12, 0),
];

// Populate the data arrays with counts from the queries
while ($row = mysqli_fetch_assoc($kajian)) {
    $data['kajian'][$row['month'] - 1] = $row['count']; // Month is 1-indexed, adjust for 0-indexed array
}
while ($row = mysqli_fetch_assoc($kak_hps)) {
    $data['kak_hps'][$row['month'] - 1] = $row['count'];
}
while ($row = mysqli_fetch_assoc($kontrak)) {
    $data['kontrak'][$row['month'] - 1] = $row['count'];
}

// Return the data as a JSON response
header('Content-Type: application/json'); // Set the content type to JSON
echo json_encode($data);
?>