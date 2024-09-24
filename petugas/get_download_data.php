<?php
include '../koneksi.php';

session_start();
$saya = $_SESSION['id'];

// Get start and end dates from query parameters
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

// Modify query to include date filtering if dates are provided
$query = "SELECT DATE(riwayat_waktu) as date, COUNT(*) as count FROM riwayat, arsip WHERE riwayat_arsip=arsip_id AND arsip_petugas='$saya'";
if ($startDate && $endDate) {
     $query .= " AND riwayat_waktu BETWEEN '$startDate 00:00:00' AND '$endDate 23:59:59'";
}
$query .= " GROUP BY DATE(riwayat_waktu)";

$result = mysqli_query($koneksi, $query);

$labels = [];
$values = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['date'];
    $values[] = $row['count'];
}

echo json_encode(['labels' => $labels, 'values' => $values]);
?>