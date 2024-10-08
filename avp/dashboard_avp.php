<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "avp_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsip Digital</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logo.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Coiny&family=Concert+One&family=Pacifico&family=Playpen+Sans:wght@100..800&family=Playwrite+DE+Grund:wght@100..400&family=Righteous&family=Sacramento&family=Varela+Round&family=Yatra+One&display=swap"
        rel="stylesheet">
    <style>
    .notification-dropdown {
        width: 280px;
        right: 0;
        left: auto;
        max-height: 400px;
        overflow-y: auto;
        z-index: 1050;
        /* Tambahkan z-index yang lebih tinggi */
    }

    .notification-dropdown .message-body {
        padding: 10px;
    }

    .notification-dropdown .message-title {
        font-size: 14px;
    }

    .notification-dropdown .dropdown-item {
        padding: 8px 10px;
    }

    .notification-dropdown .notification-content h6 {
        font-size: 12px;
        margin-bottom: 2px;
    }

    .notification-dropdown .notification-content p {
        font-size: 11px;
        margin-bottom: 2px;
    }

    .notification-dropdown .notification-content small {
        font-size: 10px;
    }

    .notification-dropdown .btn-sm {
        font-size: 12px;
        padding: 4px 8px;
    }

    .navbar-nav .nav-item.dropdown {
        position: relative;
    }

    .navbar-judul {
        font-size: 25px;
        font-weight: bold;
        margin-left: 20px;
        font-family: "Varela Round", sans-serif;
        display: flex;
        align-items: center;
        margin-top: 17px;
        color: #912005;
    }

    .nama-profile {
        color: #912005;
        font-family: "Varela Round", sans-serif;
        font-size: 20px;
    }

    .pacifico-regular {
        font-family: "Pacifico", cursive;
        font-weight: 400;
        font-style: normal;
    }

    .varela-round-regular {
        font-family: "Varela Round", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .playwrite-de-grund {
        font-family: "Playwrite DE Grund", cursive;
        font-optical-sizing: auto;
        font-style: normal;
        font-weight: 400;
    }

    .bg-custom-circle {
        --bs-bg-opacity: 1;
        background-color: rgb(23 60 81) !important;
        color: white !important;
    }

    .btn-custom-search {
        color: white !important;
        background-color: #11475e !important;
    }

    .haikiri {
        width: 200px;
        height: auto;
        float: left;
        margin-top: -65px;
        margin-left: -50px;
    }

    .haikanan {
        width: 200px;
        height: auto;
        float: right;
        margin-top: -40px;
        margin-right: -37px;
    }

    .welcome {
        margin-top: -170px;
        font-family: "Varela Round", sans-serif;
        color: white;
        font-size: 30px;
    }

    .nama {
        font-family: "Varela Round", sans-serif;
        font-size: 18px;
        color: white;
    }

    .gm {
        font-family: "Varela Round", sans-serif;
        margin-top: 30px;
        font-size: 10px;
        color: white;
    }

    .wave {
        width: 120px;
        height: auto;
        margin-top: -25px;
        margin-left: auto;
        margin-right: 0;
    }

    .wave2 {
        width: 120px;
        height: auto;
        margin-top: -25px;
        margin-left: auto;
        margin-right: 0;
    }

    .wave3 {
        width: 120px;
        height: auto;
        margin-top: -25px;
        margin-left: auto;
        margin-right: 0;
    }

    .doc-pks {
        color: #062949 !important;
    }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class=" page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <div id="sidebar"></div>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li>
                            <p class="navbar-judul"> Sistem Informasi Arsip Digital</p>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)"
                                    id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    include('../koneksi.php');
                                    $id_pks = $_SESSION['id'];
                                    $profil = mysqli_query($koneksi, "SELECT * FROM user_pks WHERE pks_id='$id_pks'");
                                    $profil = mysqli_fetch_assoc($profil);
                                    if ($profil['pks_foto'] == "") {
                                    ?>
                                    <img src="../gambar/sistem/user.png" class="rounded-circle"
                                        style="width: 50px;height: 50px; object-fit: cover;">
                                    <?php
                                    } else {
                                    ?>
                                    <img src="../gambar/asmen/<?php echo $profil['pks_foto'] ?>" class="rounded-circle"
                                        style="width: 50px;height: 50px; object-fit: cover;">
                                    <?php
                                    }
                                    ?>
                                    <p class="nama-profile mb-0"><?php echo htmlspecialchars($_SESSION['nama']); ?>
                                        [AVP] </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="profile.php" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profil Saya</p>
                                        </a>
                                        <a href="ganti_password.php"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-key fs-6"></i>
                                            <p class="mb-0 fs-3">Ganti Password</p>
                                        </a>
                                        <a href="../login/logout.php"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block shadow-none">Logout</a>
                                    </div>
                                </div>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-bell-ringing"></i>
                                    <div class="notification bg-primary rounded-circle"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <div class="message-list">
                                            <?php
                                            // Update the query to ensure notifications are shown only for specific conditions
                                            $arsip = mysqli_query($koneksi, "
                                                 SELECT 
                                                     dockajian.dock_nama, 
                                                     doc_kak_hps.dockh_nama, 
                                                     doc_kontrak.dockt_nama, 
                                                     user_pks.pks_nama  
                                                 FROM dockajian 
                                                 LEFT JOIN doc_kak_hps ON doc_kak_hps.dockh_status_vp = 'Approved (VP)' 
                                                 LEFT JOIN doc_kontrak ON doc_kontrak.dockt_status_vp = 'Approved (VP)' 
                                                 JOIN user_pks ON user_pks.pks_id = dockajian.dock_gm
                                                 WHERE 
                                                     (dockajian.dock_status_vp = 'Approved (VP)' AND dockajian.dock_status_gm IS NULL) OR
                                                     (doc_kak_hps.dockh_status_vp = 'Approved (VP)' AND doc_kak_hps.dockh_status_gm IS NULL) OR
                                                     (doc_kontrak.dockt_status_vp = 'Approved (VP)' AND doc_kontrak.dockt_status_gm IS NULL)  
                                                 ORDER BY dockajian.dock_id DESC
                                             ");
                                            while ($p = mysqli_fetch_array($arsip)) {
                                                // Check if all statuses are NULL before displaying the notification
                                                if (is_null($p['dock_nama']) && is_null($p['dockh_nama']) && is_null($p['dockt_nama'])) {
                                                    continue; // Skip if all are NULL
                                                }
                                            ?>
                                            <a href="data_pks.php" class="dropdown-item py-2 border-bottom">
                                                <div class="notification-content">
                                                    <p class="mb-0 fs-3 text-truncate" style="max-width: 200px;">
                                                        <?php echo $p['dock_nama'] . ', ' . $p['dockh_nama'] . ', ' . $p['dockt_nama']; ?>
                                                    </p>
                                                    <p>perlu ditinjau oleh</p>
                                                    <h6 class="mb-0 fs-3"><?php echo $p['pks_nama'] ?></h6>
                                                </div>
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card overflow-hidden" style="height: 170px; background-color: #0d3254;">
                            <div class="card-body p-4">
                                <div class="row align-items-center text-center">
                                    <div class="col-4 text-start">
                                        <img src="../assets/images/haikiri.png" class="haikiri">
                                    </div>
                                    <div class="col-4 text-center">
                                        <!-- Added a div for centering text -->
                                        <h5 class="welcome">Welcome</h5>
                                        <h5 class="nama"><?php echo htmlspecialchars($_SESSION['nama']); ?></h5>
                                        <h5 class="gm">Asisten Vice President</h5>
                                    </div>
                                    <div class="col-4 text-end">
                                        <img src="../assets/images/haikanan.png" class="haikanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card overflow-hidden" style="height: 170px; background-color:#e47c10;">
                            <div class=" card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white"></i>
                                    </span>
                                    <div class=" ms-2">
                                        <img src="../assets/images/2.png" class="wave">
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <h5 class="doc-pks mb-2 fw-semibold fs-2">Doc Kajian</h5>
                                    <?php
                                    // Update the query to exclude certain statuses
                                    // $jumlah_kajian = mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen != 'Uploaded (Asmen)' OR dock_status_avp NOT IN ('Approved (AVP)', 'Rejected (AVP)') OR dock_status_vp != 'Rejected (VP)'");
                                    $jumlah_kajian = mysqli_query($koneksi, "SELECT * FROM dockajian");
                                    ?>
                                    <h5 class="doc-pks mb-0 fw-semibold fs-3"><span
                                            class="counter"><?php echo mysqli_num_rows($jumlah_kajian); ?></span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card overflow-hidden" style="height: 170px; background-color:#e47c10;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white"></i>
                                    </span>
                                    <div class="ms-2">
                                        <img src="../assets/images/2.png" class="wave2">
                                    </div>
                                </div>
                                <div class="mt-2 doc-pks">
                                    <h5 class="doc-pks mb-2 fw-semibold fs-1">Doc KAK & HPS</h5>
                                    <?php
                                    // $jumlah_kak_hps = mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen != 'Uploaded (Asmen)' OR dockh_status_avp NOT IN ('Approved (AVP)', 'Rejected (AVP)') OR dockh_status_vp != 'Rejected (VP)'");
                                    $jumlah_kak_hps = mysqli_query($koneksi, "SELECT * FROM doc_kak_hps");
                                    ?>
                                    <h5 class="doc-pks mb-0 fw-semibold fs-3"><span
                                            class="counter"><?php echo mysqli_num_rows($jumlah_kak_hps); ?></span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card overflow-hidden" style="height: 170px; background-color:#e47c10;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white"></i>
                                    </span>
                                    <div class="ms-2">
                                        <img src="../assets/images/2.png" class="wave3">
                                    </div>
                                </div>
                                <div class="mt-2 doc-pks">
                                    <h5 class="doc-pks mb-2 fw-semibold fs-1">Doc Kontrak</h5>
                                    <?php
                                    // $jumlah_kontrak = mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen != 'Uploaded (Asmen)' OR dockt_status_avp NOT IN ('Approved (AVP)', 'Rejected (AVP)') OR dockt_status_vp != 'Rejected (VP)'");
                                    $jumlah_kontrak = mysqli_query($koneksi, "SELECT * FROM doc_kontrak");
                                    ?>
                                    <h5 class="doc-pks mb-0 fw-semibold fs-3"><span
                                            class="counter"><?php echo mysqli_num_rows($jumlah_kontrak); ?></span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-custom-circle d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-file-analytics fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-2">Total Doc Kajian</h5>
                                        <?php
                                        // Update the query to exclude certain statuses
                                        // $jumlah_kajian = mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen != 'Uploaded (Asmen)' OR dock_status_avp NOT IN ('Approved (AVP)', 'Rejected (AVP)') OR dock_status_vp != 'Rejected (VP)'");
                                        $jumlah_kajian = mysqli_query($koneksi, "SELECT * FROM dockajian");
                                        ?>
                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kajian); ?></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-custom-circle d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-file-analytics fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-2">Total Doc KAK & HPS</h5>
                                        <?php
                                        // $jumlah_kak_hps = mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen != 'Uploaded (Asmen)' OR dockh_status_avp NOT IN ('Approved (AVP)', 'Rejected (AVP)') OR dockh_status_vp != 'Rejected (VP)'");
                                        $jumlah_kak_hps = mysqli_query($koneksi, "SELECT * FROM doc_kak_hps");
                                        ?>

                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kak_hps); ?></span>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-custom-circle d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-file-analytics fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-2">Total Doc Kontrak</h5>
                                        <?php
                                        // $jumlah_kontrak = mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen != 'Uploaded (Asmen)' OR dockt_status_avp NOT IN ('Approved (AVP)', 'Rejected (AVP)') OR dockt_status_vp != 'Rejected (VP)'");
                                        $jumlah_kontrak = mysqli_query($koneksi, "SELECT * FROM doc_kontrak");
                                        ?>
                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kontrak); ?></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-custom-circle d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-category fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-2">Jumlah Kategori</h5>
                                        <?php
                                        $jumlah_kategori = mysqli_query($koneksi, "select * from kategori");
                                        ?>

                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kategori); ?></span>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card overflow-hidden w-100">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <div class="col-lg-8">
                                            <h5 class="card-title mb-10 fw-semibold mt-3 fs-7">Jumlah Arsip :
                                            </h5>
                                        </div>
                                        <div class="col-lg-4 justify-content-end">
                                            <?php
                                            $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                            ?>
                                            <h5 class="card-title mb-10 fw-semibold mt-3 fs-7 justify-content-end">
                                                <span
                                                    class="counter justify-content-end"><?php echo mysqli_num_rows($jumlah_arsip); ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-12 mb-4">
                                    <div class="d-flex justify-content-center">
                                        <canvas id="categoryPieChart" width="200px" height="200px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100 h-500">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 mb-4">
                                        <div class="d-flex align-items-center justify-content-between mb-10">
                                            <div class="">
                                                <h5 class="card-title fw-semibold">Grafik Semua Dokumen PKS
                                                </h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex align-items-center">
                                                    <span
                                                        class="rounded-circle btn-custom-search btn-sm px-1 btn shadow-none"
                                                        id="yearText" style="width:50px; height:30px;"></span>
                                                    <div class="dropdown mx-2">
                                                        <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            class="rounded-circle btn-custom-search btn-sm px-1 btn shadow-none">
                                                            <i class="ti ti-search fs-6 d-block"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                            aria-labelledby="dropdownMenuButton2">
                                                            <div class="message-body">
                                                                <form id="yearFilterForm">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-1">
                                                                            <label for="startYear"
                                                                                class="form-label">Tahun
                                                                                :</label>
                                                                            <input type="number" class="form-control"
                                                                                id="startYear" name="startYear"
                                                                                placeholder="Masukkan Tahun" min="2000"
                                                                                max="2100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-center mt-3">
                                                                        <button type="submit"
                                                                            class="btn btn-custom-search mx-3"><i
                                                                                class="bi bi-search"></i> Search
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <canvas id="statusBarChart" width="200px" height="350px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 mb-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="card-title fw-semibold">Grafik Dokumen Kajian</h5>
                                            <div class="d-flex">
                                                <span
                                                    class="rounded-circle btn-custom-search btn-sm px-1 btn shadow-none"
                                                    id="yearTextKajian" style="width:50px; height:30px;"></span>
                                                <div class="dropdown mx-2">
                                                    <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                        class="rounded-circle btn-custom-search rounded-circle btn-sm px-1 btn shadow-none">
                                                        <i class="ti ti-search fs-6 d-block"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                        aria-labelledby="dropdownMenuButton2">
                                                        <div class="message-body">
                                                            <form id="kajianYearFilterForm">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-1">
                                                                        <label for="kajianStartYear"
                                                                            class="form-label">Tahun :</label>
                                                                        <input type="number" class="form-control"
                                                                            id="kajianStartYear" name="kajianStartYear"
                                                                            placeholder="Masukkan Tahun" min="2000"
                                                                            max="2100">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-3">
                                                                    <button type="submit"
                                                                        class="btn btn-custom-search mx-3"><i
                                                                            class="bi bi-search"></i>
                                                                        Search</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <canvas id="statusDocChart" width="200px" height="250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 mb-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="card-title fw-semibold">Grafik Dokumen KAK & HPS</h5>
                                            <div class="d-flex">
                                                <span
                                                    class="rounded-circle btn-custom-search btn-sm px-1 btn shadow-none"
                                                    id="yearTextKH" style="width:50px; height:30px;"></span>
                                                <div class="dropdown mx-2">
                                                    <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                        class="rounded-circle btn-custom-search rounded-circle btn-sm px-1 btn shadow-none">
                                                        <i class="ti ti-search fs-6 d-block"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                        aria-labelledby="dropdownMenuButton2">
                                                        <div class="message-body">
                                                            <form id="kakHpsYearFilterForm">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-1">
                                                                        <label for="kakHpsStartYear"
                                                                            class="form-label">Tahun :</label>
                                                                        <input type="number" class="form-control"
                                                                            id="kakHpsStartYear" name="kakHpsStartYear"
                                                                            placeholder="Masukkan Tahun" min="2000"
                                                                            max="2100">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-3">
                                                                    <button type="submit"
                                                                        class="btn btn-custom-search mx-3"><i
                                                                            class="bi bi-search"></i>
                                                                        Search</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <canvas id="statusDocKHChart" width="200px" height="250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 mb-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="card-title fw-semibold">Grafik Dokumen Kontrak</h5>
                                            <div class="d-flex">
                                                <span
                                                    class="rounded-circle btn-custom-search btn-sm px-1 btn shadow-none"
                                                    id="yearTextKontrak" style="width:50px; height:30px;"></span>
                                                <div class="dropdown mx-2">
                                                    <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                        class="rounded-circle btn-custom-search rounded-circle btn-sm px-1 btn shadow-none">
                                                        <i class="ti ti-search fs-6 d-block"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                        aria-labelledby="dropdownMenuButton2">
                                                        <div class="message-body">
                                                            <form id="kontrakYearFilterForm">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-1">
                                                                        <label for="kontrakStartYear"
                                                                            class="form-label">Tahun :</label>
                                                                        <input type="number" class="form-control"
                                                                            id="kontrakStartYear"
                                                                            name="kontrakStartYear"
                                                                            placeholder="Masukkan Tahun" min="2000"
                                                                            max="2100">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center mt-3">
                                                                    <button type="submit"
                                                                        class="btn btn-custom-search mx-3"><i
                                                                            class="bi bi-search"></i>
                                                                        Search</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <canvas id="statusDocKontrakChart" width="200px" height="250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    fetch('sidebar_avp.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('sidebar').innerHTML = data;
        });

    //Grafik Semua Data
    function fetchCurrentMonthData() {
        const now = new Date();
        const currentYear = now.getFullYear();
        const currentMonth = now.getMonth() + 1;
        fetchDataByYear(currentYear, currentMonth);
    }

    function fetchDataByYear(year, month) {
        fetch(`fetch_data.php?year=${year}&month=${month}`)
            .then(response => response.json())
            .then(data => {
                updateChart(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function updateChart(data) {
        statusBarChart.data.datasets[0].data = data.kajian;
        statusBarChart.data.datasets[1].data = data.kak_hps;
        statusBarChart.data.datasets[2].data = data.kontrak;
        statusBarChart.update();
    }

    const now = new Date();
    const currentYear = now.getFullYear();
    document.getElementById('yearText').textContent = currentYear;
    fetchDataByYear(currentYear);

    document.querySelector('#yearFilterForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const startYear = document.getElementById('startYear').value;
        document.getElementById('yearText').textContent = startYear;
        fetchDataByYear(startYear); // Call the function to fetch data by year
    });

    //Grafik Dokumen Kajian
    function fetchCurrentYearData() {
        const nowKajian = new Date();
        const currentYearKajian = now.getFullYear(); // Mendapatkan tahun saat ini
        const currentMonthKajian = now.getMonth() + 1;
        document.getElementById('kajianStartYear').value = currentYearKajian; // Menetapkan input ke tahun saat ini
        document.getElementById('yearTextKajian').textContent = currentYearKajian; // Tampilkan tahun saat ini di UI
        fetchKajianData(currentYearKajian, currentMonthKajian); // Ambil data untuk tahun saat ini
    }

    function fetchKajianData(year) {
        fetch(`fetch_kajian_data.php?year=${year}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Log data untuk memeriksa strukturnya
                updateKajianChart(data); // Perbarui grafik dengan data baru
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Existing updateKajianChart function
    function updateKajianChart(data) {
        // Assuming you have a chart instance named statusDocChart
        statusDocChart.data.datasets[0].data = data.uploaded_asmen; // Update with the correct data
        statusDocChart.data.datasets[1].data = data.approved_avp; // Update with the correct data
        statusDocChart.data.datasets[2].data = data.rejected_avp; // Update with the correct data
        statusDocChart.data.datasets[3].data = data.approved_vp; // Update with the correct data
        statusDocChart.data.datasets[4].data = data.rejected_vp; // Update with the correct data
        statusDocChart.data.datasets[5].data = data.done; // Update with the correct data
        statusDocChart.data.datasets[6].data = data.rejected_gm; // Update with the correct data
        statusDocChart.update(); // Refresh the chart
    }

    const nowKajian = new Date();
    const currentYearKajian = new Date().getFullYear();
    document.getElementById('yearTextKajian').textContent = currentYearKajian;
    fetchDataByYear(currentYearKajian);

    document.querySelector('#kajianYearFilterForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const year = document.getElementById('kajianStartYear').value;
        document.getElementById('yearTextKajian').textContent = year;
        if (year) {
            document.getElementById('yearTextKajian').textContent = year; // Update displayed year
            fetchKajianData(year); // Fetch data for the specified year
        } else {
            alert('Please enter a valid year.'); // Alert if the year is not valid
        }
    });

    // Call this function when the page loads
    window.onload = function() {
        displayCurrentDate(); // Display current date
        fetchCurrentYearData();
    };

    // Grafik Dokumen KAK & HPS
    function fetchCurrentYearDataKH() {
        const nowKH = new Date();
        const currentYearKH = nowKH.getFullYear(); // Mendapatkan tahun saat ini
        const currentMonthKH = now.getMonth() + 1;
        document.getElementById('kakHpsStartYear').value = currentYearKH; // Menetapkan input ke tahun saat ini
        document.getElementById('yearTextKH').textContent = currentYearKH; // Tampilkan tahun saat ini di UI
        fetchKHData(currentYearKH, currentMonthKH); // Ambil data untuk tahun saat ini
    }

    function fetchKHData(year) {
        fetch(`fetch_kak_hps_data.php?year=${year}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Log data untuk memeriksa strukturnya
                updateKHChart(data); // Perbarui grafik dengan data baru
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function updateKHChart(data) {
        // Update the chart data with the fetched data
        statusDocKHChart.data.datasets[0].data = data.uploaded_asmen; // Update with the correct data
        statusDocKHChart.data.datasets[1].data = data.approved_avp; // Update with the correct data
        statusDocKHChart.data.datasets[2].data = data.rejected_avp; // Update with the correct data
        statusDocKHChart.data.datasets[3].data = data.approved_vp; // Update with the correct data
        statusDocKHChart.data.datasets[4].data = data.rejected_vp; // Update with the correct data
        statusDocKHChart.data.datasets[5].data = data.done; // Update with the correct data
        statusDocKHChart.data.datasets[6].data = data.rejected_gm; // Update with the correct data
        statusDocKHChart.update(); // Refresh the chart
    }

    const nowKH = new Date();
    const currentYearKH = now.getFullYear();
    document.getElementById('yearTextKH').textContent = currentYearKH;
    fetchDataByYear(currentYearKH);

    document.querySelector('#kakHpsYearFilterForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const year = document.getElementById('kakHpsStartYear').value;
        document.getElementById('yearTextKH').textContent = year;
        if (year) {
            fetchKHData(year); // Fetch data for the specified year
        } else {
            alert('Please enter a valid year.'); // Alert if the year is not valid
        }
    });

    window.onload = function() {
        displayCurrentDate(); // Display current date
        fetchCurrentYearDataKH(); // Fetch data for the current year for KAK & HPS
    };

    //Grafik Dokumen Kontrak
    function fetchCurrentYearDataKontrak() {
        const nowKontrak = new Date();
        const currentYearKontrak = nowKontrak.getFullYear(); // Mendapatkan tahun saat ini
        const currentMonthKontrak = now.getMonth() + 1;
        document.getElementById('kontrakStartYear').value = currentYearKontrak; // Menetapkan input ke tahun saat ini
        document.getElementById('yearTextKontrak').textContent = currentYearKontrak; // Tampilkan tahun saat ini di UI
        fetchKontrakData(currentYearKontrak, currentMonthKontrak); // Ambil data untuk tahun saat ini
    }

    function fetchKontrakData(year) {
        fetch(`fetch_kontrak_data.php?year=${year}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Log data untuk memeriksa strukturnya
                updateKontrakChart(data); // Perbarui grafik dengan data baru
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Existing updateKajianChart function
    function updateKontrakChart(data) {
        // Update the chart data with the fetched data
        statusDocKontrakChart.data.datasets[0].data = data.uploaded_asmen; // Update with the correct data
        statusDocKontrakChart.data.datasets[1].data = data.approved_avp; // Update with the correct data
        statusDocKontrakChart.data.datasets[2].data = data.rejected_avp; // Update with the correct data
        statusDocKontrakChart.data.datasets[3].data = data.approved_vp; // Update with the correct data
        statusDocKontrakChart.data.datasets[4].data = data.rejected_vp; // Update with the correct data
        statusDocKontrakChart.data.datasets[5].data = data.done; // Update with the correct data
        statusDocKontrakChart.data.datasets[6].data = data.rejected_gm; // Update with the correct data
        statusDocKontrakChart.update(); // Refresh the chart
    }

    const nowKontrak = new Date();
    const currentYearKontrak = now.getFullYear();
    document.getElementById('yearTextKontrak').textContent = currentYearKontrak;
    fetchDataByYear(currentYearKontrak);

    document.querySelector('#kontrakYearFilterForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const year = document.getElementById('kontrakStartYear').value;
        document.getElementById('yearTextKontrak').textContent = year;
        if (year) {
            fetchKontrakData(year); // Fetch data for the specified year
        } else {
            alert('Please enter a valid year.'); // Alert if the year is not valid
        }
    });

    // Call this function when the page loads to fetch the current year data
    window.onload = function() {
        displayCurrentDate(); // Display current date
        fetchCurrentYearDataKontrak(); // Fetch data for the current year for KAK & HPS
    };

    const categoryData =
        <?php
            $category_query = mysqli_query($koneksi, "SELECT kategori_nama, COUNT(*) as count FROM arsip, kategori WHERE arsip_kategori=kategori_id GROUP BY kategori_nama");
            $categories = [];
            while ($row = mysqli_fetch_assoc($category_query)) {
                $categories[] = $row;
            }
            echo json_encode($categories);
            ?>;

    const labels = categoryData.map(item => item.kategori_nama);
    const data = categoryData.map(item => item.count);

    const ctx = document.getElementById('categoryPieChart').getContext('2d');
    const categoryPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Arsip per Kategori',
                data: data,
                backgroundColor: [
                    'rgba(7, 28, 49, 1)',
                    'rgba(10, 39, 68, 1)',
                    'rgba(11, 54, 95, 1)',
                    'rgba(22, 71, 117, 1)',
                    'rgba(25, 86, 144, 1)',
                    'rgba(34, 105, 173, 1)',
                    'rgba(45, 119, 190, 1)',
                    'rgba(61, 140, 215, 1)',
                    'rgba(51, 146, 237, 1)',
                    'rgba(101, 170, 237, 1)',
                    'rgba(121, 181, 239, 1)',
                    'rgba(147, 194, 240, 1)',
                    'rgba(180, 214, 247, 1)',
                    'rgba(215, 235, 255, 1)'
                ],
                borderColor: [
                    'rgba(7, 28, 49, 1)',
                    'rgba(10, 39, 68, 1)',
                    'rgba(11, 54, 95, 1)',
                    'rgba(22, 71, 117, 1)',
                    'rgba(25, 86, 144, 1)',
                    'rgba(34, 105, 173, 1)',
                    'rgba(45, 119, 190, 1)',
                    'rgba(61, 140, 215, 1)',
                    'rgba(51, 146, 237, 1)',
                    'rgba(101, 170, 237, 1)',
                    'rgba(121, 181, 239, 1)',
                    'rgba(147, 194, 240, 1)',
                    'rgba(180, 214, 247, 1)',
                    'rgba(215, 235, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    bottom: 20
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        boxWidth: 10, // Lebar kotak legend
                        padding: 15, // Jarak antar label
                        font: {
                            size: 12, // Ukuran font label
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const label = tooltipItem.label || '';
                                    const value = tooltipItem.raw || 0;
                                    return `${label} : ${value}`; // Menampilkan nama kategori dan jumlah saat hover
                                }
                            }
                        }
                    }
                }
            }
        }
    });

    document.getElementById('categoryPieChart').parentNode.style.height =
        '350px'; // Mengatur tinggi chart container
    document.getElementById('categoryPieChart').parentNode.style.overflowY =
        'auto'; // Mengaktifkan scroll pada y-axis
    categoryPieChart.update();

    // Data for bar chart
    const barChartData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Doc Kajian',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(17, 63, 108, 1)',
                borderColor: 'rgba(17, 63, 108, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Doc KAK & HPS',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(234, 139, 0, 1)',
                borderColor: 'rgba(234, 139, 0, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Doc Kontrak',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            }
        ]
    };

    // Create bar chart
    const ctxBar = document.getElementById('statusBarChart').getContext('2d');
    const statusBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });

    // Data for the second bar chart
    const statusDocData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Uploaded (Asmen)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'Uploaded (Asmen)' AND MONTH(dock_waktu_asmen) = 12")); ?>
                ],
                backgroundColor: 'rgba(12, 70, 125, 1)',
                borderColor: 'rgba(12, 70, 125, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Approved (AVP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Approved (AVP)' AND MONTH(dock_waktu_avp) = 12")); ?>
                ],
                backgroundColor: 'rgba(244, 149, 11, 1)',
                borderColor: 'rgba(244, 149, 11, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (AVP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp = 'Rejected (AVP)' AND MONTH(dock_waktu_avp) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Approved (VP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Approved (VP)' AND MONTH(dock_waktu_vp) = 12")); ?>
                ],
                backgroundColor: 'rgba(250, 176, 69, 1)',
                borderColor: 'rgba(250, 176, 69, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (VP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp = 'Rejected (VP)' AND MONTH(dock_waktu_vp) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Done',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Done' AND MONTH(dock_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(81, 132, 181, 1)',
                borderColor: 'rgba(81, 132, 181, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (GM)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm = 'Rejected (GM)' AND MONTH(dock_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            }
        ]
    };

    const ctxStatusDoc = document.getElementById('statusDocChart').getContext('2d');
    const statusDocChart = new Chart(ctxStatusDoc, {
        type: 'bar',
        data: statusDocData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });

    // Data for the third bar chart
    const statusDoc2Data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Uploaded (Asmen)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockh_waktu_asmen) = 12")); ?>
                ],
                backgroundColor: 'rgba(12, 70, 125, 1)',
                borderColor: 'rgba(12, 70, 125, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Approved (AVP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Approved (AVP)' AND MONTH(dockh_waktu_avp) = 12")); ?>
                ],
                backgroundColor: 'rgba(244, 149, 11, 1)',
                borderColor: 'rgba(244, 149, 11, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (AVP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp = 'Rejected (AVP)' AND MONTH(dockh_waktu_avp) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Approved (VP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Approved (VP)' AND MONTH(dockh_waktu_vp) = 12")); ?>
                ],
                backgroundColor: 'rgba(250, 176, 69, 1)',
                borderColor: 'rgba(250, 176, 69, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (VP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp = 'Rejected (VP)' AND MONTH(dockh_waktu_vp) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Done',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Done' AND MONTH(dockh_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(81, 132, 181, 1)',
                borderColor: 'rgba(81, 132, 181, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (GM)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm = 'Rejected (GM)' AND MONTH(dockh_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            }
        ]
    };

    const ctxStatusDoc2 = document.getElementById('statusDocKHChart').getContext('2d');
    const statusDocKHChart = new Chart(ctxStatusDoc2, {
        type: 'bar',
        data: statusDoc2Data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });

    // Data for the forth bar chart
    const statusDoc3Data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Uploaded (Asmen)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'Uploaded (Asmen)' AND MONTH(dockt_waktu_asmen) = 12")); ?>
                ],
                backgroundColor: 'rgba(12, 70, 125, 1)',
                borderColor: 'rgba(12, 70, 125, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Approved (AVP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Approved (AVP)' AND MONTH(dockt_waktu_avp) = 12")); ?>
                ],
                backgroundColor: 'rgba(244, 149, 11, 1)',
                borderColor: 'rgba(244, 149, 11, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (AVP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'Rejected (AVP)' AND MONTH(dockt_waktu_avp) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Approved (VP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Approved (VP)' AND MONTH(dockt_waktu_vp) = 12")); ?>
                ],
                backgroundColor: 'rgba(250, 176, 69, 1)',
                borderColor: 'rgba(250, 176, 69, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (VP)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp = 'Rejected (VP)' AND MONTH(dockt_waktu_vp) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Done',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Done' AND MONTH(dockt_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(81, 132, 181, 1)',
                borderColor: 'rgba(81, 132, 181, 1)',
                borderRadius: 5,
                borderWidth: 1
            },
            {
                label: 'Rejected (GM)',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 1")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 2")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 3")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 4")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 5")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 6")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 7")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 8")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 9")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 10")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 11")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm = 'Rejected (GM)' AND MONTH(dockt_waktu_gm) = 12")); ?>
                ],
                backgroundColor: 'rgba(158, 6, 6, 1)',
                borderColor: 'rgba(158, 6, 6, 1)',
                borderRadius: 5,
                borderWidth: 1
            }
        ]
    };

    const ctxStatusDoc3 = document.getElementById('statusDocKontrakChart').getContext('2d');
    const statusDocKontrakChart = new Chart(ctxStatusDoc3, {
        type: 'bar',
        data: statusDoc3Data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });

    window.onload = function() {
        // displayCurrentDate(); // Display current date
        fetchCurrentMonthData(); // Fetch data for the current month
        fetchCurrentYearData(); // Fetch data for Dokumen Kajian
        fetchCurrentYearDataKH(); // Fetch data for Dokumen KAK & HPS
        fetchCurrentYearDataKontrak(); // Fetch data for Dokumen Kontrak
    };
    </script>
    <script src=" ../assets/libs/jquery/dist/jquery.min.js">
    </script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>