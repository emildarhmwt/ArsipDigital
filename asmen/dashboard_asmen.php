<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "asmen_login") {
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

    .kajian {
        background-image: url("../assets/images/bg-card.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .kontrak {
        margin-top: 20px;
    }

    .nota-dinas {
        background-image: url("../assets/images/bgnd.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .bgnd {
        position: absolute;
        top: 22%;
        left: 0;
        width: 100%;
        height: 75%;
        z-index: 1;
    }

    .surat-masuk {
        font-family: "Varela Round", sans-serif;
        font-size: 20px;
        margin-bottom: 5px;
        margin-top: -10px;
        color: #08203f;
        font-weight: bold;
    }

    .sm-ooc {
        font-family: "Varela Round", sans-serif;
        font-size: 15px;
        color: #08203f;
        font-weight: bold;
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
                                        [ASMEN] </p>
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
                                        <h5 class="gm">Asisten Manager</h5>
                                    </div>
                                    <div class="col-4 text-end">
                                        <img src="../assets/images/haikanan.png" class="haikanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card overflow-hidden kajian" style="height: 170px;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white kontrak"></i>
                                    </span>
                                </div>

                                <div class="mt-4">
                                    <h5 class="doc-pks mb-2 fw-semibold fs-2">Doc Kajian</h5>
                                    <?php
                                    $jumlah_kajian = mysqli_query($koneksi, "SELECT * FROM dockajian");
                                    $total_kajian = mysqli_num_rows($jumlah_kajian);
                                    ?>
                                    <h5 class="doc-pks mb-0 fw-semibold fs-3">
                                        <span class="counter" id="kajianCounter">0</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card overflow-hidden kajian" style="height: 170px;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white kontrak"></i>
                                    </span>
                                </div>

                                <div class="mt-4">
                                    <h5 class="doc-pks mb-2 fw-semibold fs-2">Doc KAK & HPS</h5>
                                    <?php
                                    $jumlah_kak_hps = mysqli_query($koneksi, "SELECT * FROM doc_kak_hps");
                                    $total_kak_hps = mysqli_num_rows($jumlah_kak_hps);
                                    ?>
                                    <h5 class="doc-pks mb-0 fw-semibold fs-3">
                                        <span class="counter" id="KHCounter">0</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="card overflow-hidden kajian" style="height: 170px;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white kontrak"></i>
                                    </span>
                                </div>

                                <div class="mt-4">
                                    <h5 class="doc-pks mb-2 fw-semibold fs-2">Doc Kontrak</h5>
                                    <?php
                                    $jumlah_kontrak = mysqli_query($koneksi, "SELECT * FROM doc_kontrak");
                                    $total_kontrak = mysqli_num_rows($jumlah_kontrak);
                                    ?>
                                    <h5 class="doc-pks mb-0 fw-semibold fs-3">
                                        <span class="counter" id="kontrakCounter">0</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card nota-dinas">
                                <div class="card-body">
                                    <img src="../assets/images/bgnd2.png" class="bgnd">
                                    <?php
                                    $jumlah_open = mysqli_query($koneksi, "SELECT COUNT(*) as total_open 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Open' AND kategori.kategori_nama = 'Nota Dinas Masuk'
                                    ");
                                    $total_open = mysqli_fetch_assoc($jumlah_open)['total_open'];

                                    $jumlah_onprogress = mysqli_query($koneksi, "SELECT COUNT(*) as total_onprogress 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'On Progress' AND kategori.kategori_nama = 'Nota Dinas Masuk'
                                    ");
                                    $total_onprogress = mysqli_fetch_assoc($jumlah_onprogress)['total_onprogress'];

                                    $jumlah_close = mysqli_query($koneksi, "SELECT COUNT(*) as total_close
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Close' AND kategori.kategori_nama = 'Nota Dinas Masuk'
                                    ");
                                    $total_close = mysqli_fetch_assoc($jumlah_close)['total_close'];
                                    ?>
                                    <h5 class="surat-masuk text-center"> Nota Dinas Masuk</h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc mt-3">
                                                Open
                                            </div>
                                            <div class="col-lg-4 sm-ooc mt-3">
                                                <span class="counter" id="openCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                On Progress
                                            </div>
                                            <div class="col-lg-4 sm-ooc">
                                                <span class="counter" id="onprogressCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                Close
                                            </div>
                                            <div class="col-lg-4 sm-ooc"> <span class="counter"
                                                    id="closeCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card  nota-dinas">
                                <div class="card-body">
                                    <img src="../assets/images/bgnd2.png" class="bgnd">
                                    <?php
                                    $jumlah_openk = mysqli_query($koneksi, "SELECT COUNT(*) as total_openk 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Open' AND kategori.kategori_nama = 'Nota Dinas Keluar'
                                    ");
                                    $total_openk = mysqli_fetch_assoc($jumlah_openk)['total_openk'];

                                    $jumlah_onprogressk = mysqli_query($koneksi, "SELECT COUNT(*) as total_onprogressk 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'On Progress' AND kategori.kategori_nama = 'Nota Dinas Keluar'
                                    ");
                                    $total_onprogressk = mysqli_fetch_assoc($jumlah_onprogressk)['total_onprogressk'];

                                    $jumlah_closek = mysqli_query($koneksi, "SELECT COUNT(*) as total_closek
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Close' AND kategori.kategori_nama = 'Nota Dinas Keluar'
                                    ");
                                    $total_closek = mysqli_fetch_assoc($jumlah_closek)['total_closek'];
                                    ?>
                                    <h5 class="surat-masuk text-center"> Nota Dinas Keluar</h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc mt-3">
                                                Open
                                            </div>
                                            <div class="col-lg-4 sm-ooc mt-3">
                                                <span class="counter" id="openkCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                On Progress
                                            </div>
                                            <div class="col-lg-4 sm-ooc"> <span class="counter"
                                                    id="onprogresskCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                Close
                                            </div>
                                            <div class="col-lg-4 sm-ooc">
                                                <span class="counter" id="closekCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card nota-dinas">
                                <div class="card-body">
                                    <img src="../assets/images/bgnd2.png" class="bgnd">
                                    <?php
                                    $jumlah_opensm = mysqli_query($koneksi, "SELECT COUNT(*) as total_opensm 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Open' AND kategori.kategori_nama = 'Surat Masuk'
                                    ");
                                    $total_opensm = mysqli_fetch_assoc($jumlah_opensm)['total_opensm'];

                                    $jumlah_onprogresssm = mysqli_query($koneksi, "SELECT COUNT(*) as total_onprogresssm 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'On Progress' AND kategori.kategori_nama = 'Surat Masuk'
                                    ");
                                    $total_onprogresssm = mysqli_fetch_assoc($jumlah_onprogresssm)['total_onprogresssm'];

                                    $jumlah_closesm = mysqli_query($koneksi, "SELECT COUNT(*) as total_closesm
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Close' AND kategori.kategori_nama = 'Nota Dinas Masuk'
                                    ");
                                    $total_closesm = mysqli_fetch_assoc($jumlah_closesm)['total_closesm'];
                                    ?>
                                    <h5 class="surat-masuk text-center"> Surat Masuk</h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc mt-3">
                                                Open
                                            </div>
                                            <div class="col-lg-4 sm-ooc mt-3">
                                                <span class="counter" id="opensmCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                On Progress
                                            </div>
                                            <div class="col-lg-4 sm-ooc">
                                                <span class="counter" id="onprogresssmCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                Close
                                            </div>
                                            <div class="col-lg-4 sm-ooc">
                                                <span class="counter" id="closesmCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card nota-dinas">
                                <div class="card-body">
                                    <img src="../assets/images/bgnd2.png" class="bgnd">
                                    <?php
                                    $jumlah_opensk = mysqli_query($koneksi, "SELECT COUNT(*) as total_opensk 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Open' AND kategori.kategori_nama = 'Surat Keluar'
                                    ");
                                    $total_opensk = mysqli_fetch_assoc($jumlah_opensk)['total_opensk'];

                                    $jumlah_onprogresssk = mysqli_query($koneksi, "SELECT COUNT(*) as total_onprogresssk 
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'On Progress' AND kategori.kategori_nama = 'Surat Keluar'
                                    ");
                                    $total_onprogresssk = mysqli_fetch_assoc($jumlah_onprogresssk)['total_onprogresssk'];

                                    $jumlah_closesk = mysqli_query($koneksi, "SELECT COUNT(*) as total_closesk
                                        FROM arsip 
                                        JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                        JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id
                                        WHERE status_arsip.status_nama = 'Close' AND kategori.kategori_nama = 'Surat Keluar'
                                    ");
                                    $total_closesk = mysqli_fetch_assoc($jumlah_closesk)['total_closesk'];
                                    ?>
                                    <h5 class="surat-masuk text-center"> Surat Keluar</h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc mt-3">
                                                Open
                                            </div>
                                            <div class="col-lg-4 sm-ooc mt-3">
                                                <span class="counter" id="openskCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                On Progress
                                            </div>
                                            <div class="col-lg-4 sm-ooc"> <span class="counter"
                                                    id="onprogressskCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="row">
                                            <div class="col-lg-8 sm-ooc">
                                                Close
                                            </div>
                                            <div class="col-lg-4 sm-ooc"> <span class="counter"
                                                    id="closeskCounter">0</span>
                                            </div>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Row 1 -->
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card overflow-hidden w-100" style="background-color: #790707;">
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
                                                                                <input type="number"
                                                                                    class="form-control" id="startYear"
                                                                                    name="startYear"
                                                                                    placeholder="Masukkan Tahun"
                                                                                    min="2000" max="2100">
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
                        <div class="col-lg-6">
                            <div class="card" style="height: 400px;">
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
                                                                                id="kajianStartYear"
                                                                                name="kajianStartYear" <div
                                                                                class="d-flex justify-content-center mt-3">
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
                                                <canvas id="statusDocChart" width="200px" height="300px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card" style="height: 400px;">
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
                                                                                id="kakHpsStartYear"
                                                                                name="kakHpsStartYear"
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
                                                <canvas id="statusDocKHChart" width="200px" height="300px"></canvas>
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
                                                <canvas id="statusDocKontrakChart" width="200px"
                                                    height="250px"></canvas>
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
        fetch('sidebar_asmen.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('sidebar').innerHTML = data;
            });

        function animateCounter(element, start, end, duration) {
            let startTime = null;
            const step = (timestamp) => {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                element.textContent = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    element.textContent = end; // Ensure it ends at the final value
                }
            };
            requestAnimationFrame(step);
        }

        // Get the total counts from PHP
        const totalKajian = <?php echo $total_kajian; ?>;
        const totalKakHps = <?php echo $total_kak_hps; ?>;
        const totalKontrak = <?php echo $total_kontrak; ?>;
        const totalOpen = <?php echo $total_open; ?>;
        const totalOnProgress = <?php echo $total_onprogress; ?>;
        const totalClose = <?php echo $total_close; ?>;
        const totalOpenk = <?php echo $total_openk; ?>;
        const totalOnProgressk = <?php echo $total_onprogressk; ?>;
        const totalClosek = <?php echo $total_closek; ?>;
        const totalOpensm = <?php echo $total_opensm; ?>;
        const totalOnProgresssm = <?php echo $total_onprogresssm; ?>;
        const totalClosesm = <?php echo $total_closesm; ?>;
        const totalOpensk = <?php echo $total_opensk; ?>;
        const totalOnProgresssk = <?php echo $total_onprogresssk; ?>;
        const totalClosesk = <?php echo $total_closesk; ?>;

        // Animate each counter
        animateCounter(document.getElementById('kajianCounter'), 0, totalKajian, 2000);
        animateCounter(document.getElementById('KHCounter'), 0, totalKakHps, 2000);
        animateCounter(document.getElementById('kontrakCounter'), 0, totalKontrak, 2000);
        animateCounter(document.getElementById('openCounter'), 0, totalOpen, 2000);
        animateCounter(document.getElementById('onprogressCounter'), 0, totalOnProgress, 2000);
        animateCounter(document.getElementById('closeCounter'), 0, totalClose, 2000);
        animateCounter(document.getElementById('openkCounter'), 0, totalOpenk, 2000);
        animateCounter(document.getElementById('onprogresskCounter'), 0, totalOnProgressk, 2000);
        animateCounter(document.getElementById('closekCounter'), 0, totalClosek, 2000);
        animateCounter(document.getElementById('opensmCounter'), 0, totalOpensm, 2000);
        animateCounter(document.getElementById('onprogresssmCounter'), 0, totalOnProgresssm, 2000);
        animateCounter(document.getElementById('closesmCounter'), 0, totalClosesm, 2000);
        animateCounter(document.getElementById('openskCounter'), 0, totalOpensk, 2000);
        animateCounter(document.getElementById('onprogressskCounter'), 0, totalOnProgresssk, 2000);
        animateCounter(document.getElementById('closeskCounter'), 0, totalClosesk, 2000);

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
            document.getElementById('kontrakStartYear').value =
                currentYearKontrak; // Menetapkan input ke tahun saat ini
            document.getElementById('yearTextKontrak').textContent =
                currentYearKontrak; // Tampilkan tahun saat ini di UI
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
                        'rgba(209, 96, 0, 1)',
                        'rgba(232, 106, 0, 1)',
                        'rgba(255, 117, 0, 1)',
                        'rgba(255, 128, 21, 1)',
                        'rgba(255, 144, 51, 1)',
                        'rgba(247, 155, 77, 1)',
                        'rgba(252, 178, 115, 1)',
                        'rgba(255, 197, 148, 1)',
                        'rgba(252, 213, 180, 1)',
                        'rgba(255, 231, 211, 1)'
                    ],
                    borderColor: [
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)',
                        'rgb(255, 255, 255, 0.5)'
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
                            boxWidth: 10,
                            padding: 15,
                            font: {
                                size: 12,
                            },
                            color: 'white',
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
                        position: 'bottom',
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