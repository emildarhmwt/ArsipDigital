<?php
session_start();
include('../koneksi.php');

if (!isset($_SESSION['status']) || $_SESSION['status'] != "asmen_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dock_id = $_POST['dock_id'];
    $action = $_POST['action'];
    $petugas = $_SESSION['id'];
    $status = ($action == 'approve') ? 'Approve(AVP)' : 'Reject';

    // Update record yang ada
    $query = "UPDATE doc_kajian SET dock_petugas='$petugas', dock_status='$status' WHERE dock_id='$dock_id'";
    
    if (mysqli_query($koneksi, $query)) {
        header("location:preview_kajian.php?id=$dock_id&alert=success");
    } else {
        header("location:preview_kajian.php?id=$dock_id&alert=error");
    }
}
?>