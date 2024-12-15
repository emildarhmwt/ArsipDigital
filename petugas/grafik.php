<?php
include '../koneksi.php';
session_start();
// Get the logged-in user ID from the session
$saya = $_SESSION['id'];

// Get the current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Prepare the base query
$query = "SELECT COUNT(*) as count, DATE(riwayat_waktu) as date 
          FROM riwayat 
          INNER JOIN arsip ON riwayat.riwayat_arsip = arsip.arsip_id 
          WHERE arsip.arsip_petugas = '$saya' ";

// Add date filters if provided
if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    $query .= "AND DATE(riwayat_waktu) BETWEEN '$startDate' AND '$endDate' ";
} else {
    $query .= "AND MONTH(riwayat_waktu) = '$currentMonth' AND YEAR(riwayat_waktu) = '$currentYear' ";
}

$query .= "GROUP BY DATE(riwayat_waktu)";

$result = mysqli_query($koneksi, $query);

$data = [];
$labels = [];
$values = [];

// Fetch the results
while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['date'];
    $values[] = (int)$row['count'];
}

// Return the data as JSON
echo json_encode(['labels' => $labels, 'values' => $values]);
?>