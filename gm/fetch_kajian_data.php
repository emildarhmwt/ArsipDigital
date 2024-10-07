<?php
include('../koneksi.php');

$year = $_GET['year'];

// Fetch data for Dokumen Kajian from multiple date fields
$query = "
    SELECT MONTH(dock_waktu_gm) as month, COUNT(*) as count FROM dockajian WHERE YEAR(dock_waktu_gm) = '$year' GROUP BY MONTH(dock_waktu_gm)
    UNION ALL
    SELECT MONTH(dock_waktu_asmen) as month, COUNT(*) as count FROM dockajian WHERE YEAR(dock_waktu_asmen) = '$year' GROUP BY MONTH(dock_waktu_asmen)
    UNION ALL
    SELECT MONTH(dock_waktu_avp) as month, COUNT(*) as count FROM dockajian WHERE YEAR(dock_waktu_avp) = '$year' GROUP BY MONTH(dock_waktu_avp)
    UNION ALL
    SELECT MONTH(dock_waktu_vp) as month, COUNT(*) as count FROM dockajian WHERE YEAR(dock_waktu_vp) = '$year' GROUP BY MONTH(dock_waktu_vp)
";

$result = mysqli_query($koneksi, $query);

// Check for SQL errors
if (!$result) {
    die('Query Error: ' . mysqli_error($koneksi));
}

$data = array_fill(0, 12, 0);

// Populate the data array
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['month'] - 1] += $row['count']; // Sum counts for the same month
}

echo json_encode($data);
?>