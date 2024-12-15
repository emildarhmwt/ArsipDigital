<?php
include '../koneksi.php';

// Get parameters
$startDate = $_GET['startDate'] ?? null;
$endDate = $_GET['endDate'] ?? null;

// Get the current month and year if no filter is applied
if (!$startDate && !$endDate) {
    $currentYear = date('Y');
    $currentMonth = date('m');
    $startDate = "$currentYear-$currentMonth-01";
    $endDate = date('Y-m-t', strtotime($startDate)); // Automatically gets the last day of the current month
}

// Debug: Log the dates
error_log('Start Date: ' . $startDate);
error_log('End Date: ' . $endDate);

// Prepare the SQL query
$query = "SELECT COUNT(*) as count, DATE(riwayat_waktu) as date 
          FROM riwayat 
          WHERE DATE(riwayat_waktu) BETWEEN '$startDate' AND '$endDate' 
          GROUP BY DATE(riwayat_waktu)";

$result = mysqli_query($koneksi, $query);

$data = [];
$labels = [];
$values = [];

// Fetch the results
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    $labels[] = $row['date'];
    $values[] = $row['count'];
}

// Return the data as JSON
echo json_encode(['labels' => $labels, 'values' => $values]);
?>