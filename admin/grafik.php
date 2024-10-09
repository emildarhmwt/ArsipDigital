<?php
include '../koneksi.php';

// Get the start and end dates from the request
$currentMonth = date('m');
$currentYear = date('Y');

// Prepare the SQL query to fetch data for the current month
$query = "SELECT COUNT(*) as count, DATE(riwayat_waktu) as date 
          FROM riwayat 
          WHERE MONTH(riwayat_waktu) = '$currentMonth' AND YEAR(riwayat_waktu) = '$currentYear' 
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