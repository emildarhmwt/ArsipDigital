<?php
// download.php

// Start the session
session_start();

// Check if the 'file' parameter is set
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = '../berkas_pks/' . $file; // Adjust the path as necessary

    if (file_exists($filePath)) {
        // Set headers to download the file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $file);
        header('Content-Length: ' . filesize($filePath));
        
        // Read the file and send it to the output
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "No file specified for download.";
}
?>