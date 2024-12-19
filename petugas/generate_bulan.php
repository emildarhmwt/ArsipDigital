<?php
include '../koneksi.php';
session_start();

if ($_SESSION['status'] != "admin_login") {
    header("location:../login/loginadmin.php?alert=belum_login");
}

if (isset($_GET['id'])) {
    $header_id = $_GET['id'];

    // Function to generate months based on start and end dates
    function generateMonths($koneksi, $header_id, $startDate, $endDate) {
        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);
        $endDate->modify('first day of this month');
        $endDate->modify('-1 month'); // Adjust end date to one month before

        // Loop through each month from start to end
        while ($startDate <= $endDate) {
            $bulan = $startDate->format('Y-m-d'); // Format to YYYY-MM-DD
            
            // Check if the month already exists
            $checkQuery = "SELECT * FROM bulan_kontrak WHERE bulan_header_id='$header_id' AND bulan_bulan='$bulan'";
            $checkResult = mysqli_query($koneksi, $checkQuery);
            
            if (mysqli_num_rows($checkResult) == 0) {
                // Insert only if it doesn't exist
                $insertQuery = "INSERT INTO bulan_kontrak (bulan_header_id, bulan_bulan) VALUES ('$header_id', '$bulan')";
                mysqli_query($koneksi, $insertQuery);
            }
            
            $startDate->modify('first day of next month');
        }
    }

    // Clear existing months for the header_id
    $deleteQuery = "DELETE FROM bulan_kontrak WHERE bulan_header_id='$header_id'";
    mysqli_query($koneksi, $deleteQuery);

    // Get the kontrak_awal and kontrak_akhir for the given header_id
    $query = "SELECT kontrak_awal, kontrak_akhir FROM kontrak WHERE kontrak_header_id='$header_id'";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Generate months for each contract
            generateMonths($koneksi, $header_id, $row['kontrak_awal'], $row['kontrak_akhir']);
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No kontrak found.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>