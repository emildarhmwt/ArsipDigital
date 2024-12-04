 <?php
    include '../koneksi.php';
    session_start();
    if ($_SESSION['status'] != "petugas_login") {
        header("location:../login/loginadmin.php?alert=belum_login");
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
         href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playwrite+DE+Grund:wght@100..400&family=Rowdies:wght@300;400;700&family=Varela+Round&display=swap"
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
         width: 170px;
         height: auto;
         margin-top: -25px;
         margin-left: auto;
         margin-right: 0;
     }

     .wave2 {
         width: 170px;
         height: auto;
         margin-top: -25px;
         margin-left: auto;
         margin-right: 0;
     }

     .kategori {
         margin-top: -40px;

     }

     .kategori2 {
         margin-top: -50px;
     }

     .doc-pks {
         color: #062949 !important;
     }

     .btn-custom-search {
         color: white !important;
         background-color: #11475e !important;
     }

     .doc-pks {
         color: #062949 !important;
     }

     .kajian {
         background-image: url("../assets/images/bg-card.png");
         background-size: 100% 100%;
         background-position: center;
         background-repeat: no-repeat;
         height: 100%;
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

     @media (max-width: 768px) {
         .navbar-judul {
             font-size: 10px;
             margin-top: 10%;
         }

         .navbar-collapse {
             flex-basis: 0% !important;
         }
     }
     </style>
 </head>

 <body>
     <!--  Body Wrapper -->
     <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                             <p class="navbar-judul"> Administrasi & Pelaporan Penambangan </p>
                         </li>
                     </ul>
                     <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                         <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                             <li class="nav-item dropdown">
                                 <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)"
                                     id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                     <?php
                                        $id_petugas = $_SESSION['id'];
                                        $profil = mysqli_query($koneksi, "select * from petugas where petugas_id='$id_petugas'");
                                        $profil = mysqli_fetch_assoc($profil);
                                        if ($profil['petugas_foto'] == "") {
                                        ?>
                                     <img src="../gambar/sistem/user.png" class="rounded-circle"
                                         style="width: 40px;height: 40px; object-fit: cover;">
                                     <?php } else { ?>
                                     <img src="../gambar/petugas/<?php echo $profil['petugas_foto'] ?>"
                                         class="rounded-circle" style="width: 40px;height: 40px; object-fit: cover;">
                                     <?php } ?>
                                     <p class="nama-profile mb-0"><?php echo $_SESSION['nama']; ?> [Petugas]</p>
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

                             <li class="nav-item dropdown">
                                 <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                     data-bs-toggle="dropdown" aria-expanded="false">
                                     <i class="ti ti-bell-ringing"></i>
                                     <div class="notification bg-primary rounded-circle"></div>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                     aria-labelledby="drop2">
                                     <div class="message-body">
                                         <h5 class="message-title mb-2">Riwayat unduh arsip</h5>
                                         <div class="message-list">
                                             <?php
                                                $id_saya = $_SESSION['id'];
                                                $arsip = mysqli_query($koneksi, "SELECT * FROM riwayat,arsip,user WHERE riwayat_arsip=arsip_id and riwayat_user=user_id and arsip_petugas='$id_saya' ORDER BY riwayat_id DESC LIMIT 5");
                                                while ($p = mysqli_fetch_array($arsip)) {
                                                ?>
                                             <a href="riwayat_unduh.php" class="dropdown-item py-2 border-bottom">
                                                 <div class="notification-content">
                                                     <h6 class="mb-0 fs-3"><?php echo $p['user_nama'] ?> mengunduh</h6>
                                                     <p class="mb-0 fs-3 text-truncate" style="max-width: 200px;">
                                                         <?php echo $p['arsip_nama'] ?></p>
                                                     <small
                                                         class="text-muted fs-2"><?php echo date('H:i d-m-Y', strtotime($p['riwayat_waktu'])) ?></small>
                                                 </div>
                                             </a>
                                             <?php
                                                }
                                                ?>
                                         </div>
                                         <a href="riwayat_unduh.php"
                                             class="btn btn-outline-primary btn-sm mt-2 d-block">Lihat Semua</a>
                                     </div>
                                 </div>
                             </li>
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

                     <div class="col-lg-3 col-6">
                         <div class="card overflow-hidden kajian" style="height: 170px;">
                             <div class=" card-body p-4">
                                 <div class="d-flex align-items-center mb-2">
                                     <span class="me-2 d-flex align-items-center justify-content-center">
                                         <i class="ti ti-file-analytics fs-9 text-white kontrak"></i>
                                     </span>
                                     <!-- <div class=" ms-2">
                                         <img src="../assets/images/2.png" class="wave">
                                     </div> -->
                                 </div>

                                 <div class="mt-4 doc-pks">
                                     <h5 class="card-title mb-2 fw-semibold fs-4">Jumlah Kategori</h5>
                                     <?php
                                        $jumlah_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                        $total_kategori = mysqli_num_rows($jumlah_kategori);
                                        ?>
                                     <h5 class="card-title mb-0 fw-semibold fs-4">
                                         <span class="counter" id="kategoriCounter">0</span>
                                     </h5>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-3 col-6">
                         <div class="card overflow-hidden kajian" style="height: 170px;">
                             <div class=" card-body p-4">
                                 <div class="d-flex align-items-center mb-2">
                                     <span class="me-2 d-flex align-items-center justify-content-center">
                                         <i class="ti ti-file-analytics fs-9 text-white kontrak"></i>
                                     </span>
                                     <!-- <div class=" ms-2">
                                         <img src="../assets/images/2.png" class="wave">
                                     </div> -->
                                 </div>

                                 <div class="mt-4 doc-pks">
                                     <h5 class="card-title mb-2 fw-semibold fs-4">Jumlah User</h5>
                                     <?php
                                        $jumlah_user = mysqli_query($koneksi, "SELECT (SELECT COUNT(*) FROM user) + (SELECT COUNT(*) FROM user_pks) AS total_users");
                                        $result_user = mysqli_fetch_assoc($jumlah_user);
                                        $total_user = $result_user['total_users'];
                                        ?>
                                     <h5 class="card-title mb-0 fw-semibold fs-3">
                                         <span class="counter" id="userCounter">0</span>
                                     </h5>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-lg-3 col-6">
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
                                         <div class="col-lg-8 col-8 sm-ooc mt-3">
                                             Open
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc mt-3">
                                             <span class="counter" id="openCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             On Progress
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc">
                                             <span class="counter" id="onprogressCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             Close
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc"> <span class="counter"
                                                 id="closeCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-3 col-6">
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
                                         <div class="col-lg-8 col-8 sm-ooc mt-3">
                                             Open
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc mt-3">
                                             <span class="counter" id="openkCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             On Progress
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc"> <span class="counter"
                                                 id="onprogresskCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             Close
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc">
                                             <span class="counter" id="closekCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-3 col-6">
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
                                         <div class="col-lg-8 col-8 sm-ooc mt-3">
                                             Open
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc mt-3">
                                             <span class="counter" id="opensmCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             On Progress
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc">
                                             <span class="counter" id="onprogresssmCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             Close
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc">
                                             <span class="counter" id="closesmCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                             </div>
                         </div>
                     </div>

                     <div class="col-lg-3 col-6">
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
                                         <div class="col-lg-8 col-8 sm-ooc mt-3">
                                             Open
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc mt-3">
                                             <span class="counter" id="openskCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             On Progress
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc"> <span class="counter"
                                                 id="onprogressskCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                                 <h5>
                                     <div class="row">
                                         <div class="col-lg-8 col-8 sm-ooc">
                                             Close
                                         </div>
                                         <div class="col-lg-4 col-4 sm-ooc"> <span class="counter"
                                                 id="closeskCounter">0</span>
                                         </div>
                                     </div>
                                 </h5>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Row 1 -->
                 <div class="row">
                     <div class="col-lg-8 d-flex align-items-strech">
                         <div class="card w-100 h-300">
                             <div class="card-body">
                                 <div class="d-flex align-items-center justify-content-between mb-10">
                                     <div class="">
                                         <h5 class="card-title fw-semibold">Grafik Pengunduhan Arsip</h5>
                                     </div>
                                     <div class="row">
                                         <div class="col-lg-12 d-flex align-items-center">
                                             <button type="button" class="btn btn-custom-search btn-sm me-3"
                                                 id="fetchAllData">Semua Data</button>
                                             <div class="dropdown mx-2">
                                                 <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                     aria-expanded="false"
                                                     class="rounded-circle btn-custom-search rounded-circle btn-sm px-1 btn shadow-none">
                                                     <i class="ti ti-search fs-6 d-block"></i>
                                                 </button>
                                                 <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                     aria-labelledby="dropdownMenuButton2">
                                                     <div class="message-body">
                                                         <form id="dateFilterForm">
                                                             <div class="row">
                                                                 <div class="col-lg-6 mb-1">
                                                                     <label for="grupSearch" class="form-label">
                                                                         Tanggal
                                                                         Awal :</label>
                                                                     <input type="date" class="form-control"
                                                                         id="startDate" name="startDate">
                                                                 </div>
                                                                 <div class="col-lg-6 mb-1">
                                                                     <label for="grupSearch" class="form-label">
                                                                         Tanggal
                                                                         Akhir :</label>
                                                                     <input type="date" class="form-control"
                                                                         id="endDate" name="endDate">
                                                                 </div>
                                                             </div>
                                                             <div class="d-flex justify-content-center mt-3">
                                                                 <button type="submit"
                                                                     class="btn btn-custom-search mx-3"><i
                                                                         class="bi bi-search"></i> Search
                                                                     Data</button>
                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <canvas id="downloadChart"></canvas>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="row">
                             <div class="col-lg-12 col-12">
                                 <!-- Yearly Breakup -->
                                 <div class="card overflow-hidden">
                                     <div class="card-body p-4">
                                         <div class="row align-items-center">
                                             <div class="col-lg-12 d-flex align-items-center">
                                                 <div class="col-lg-8">
                                                     <h5 class="card-title mb-10 fw-semibold mt-3 fs-7">Jumlah Arsip
                                                         :
                                                     </h5>
                                                 </div>
                                                 <div class="col-lg-4">
                                                     <?php
                                                        $id_petugas = $_SESSION['id']; // Get the current user's ID
                                                        $jumlah_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE arsip_petugas='$id_petugas'");
                                                        ?>
                                                     <h5
                                                         class="card-title mb-10 fw-semibold mt-3 fs-7 justify-content-end">
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
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <script>
         fetch('sidebar_petugas.php')
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
         const totalKategori = <?php echo $total_kategori; ?>;
         const totalUser = <?php echo $total_user; ?>;
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
         animateCounter(document.getElementById('kategoriCounter'), 0, totalKategori, 2000);
         animateCounter(document.getElementById('userCounter'), 0, totalUser, 2000);
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

         const categoryData =
             <?php
                    $id_petugas = $_SESSION['id']; // Get the current user's ID
                    $category_query = mysqli_query($koneksi, "SELECT kategori_nama, COUNT(*) as count FROM arsip, kategori WHERE arsip_kategori=kategori_id AND arsip_petugas='$id_petugas' GROUP BY kategori_nama");
                    $categories = [];
                    while ($row = mysqli_fetch_assoc($category_query)) {
                        $categories[] = $row;
                    }
                    echo json_encode($categories);
                    ?>;

         const labels = categoryData.map(item => item.kategori_nama);
         const data = categoryData.map(item => item.count);

         // Create pie chart
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
                         bottom: 20 // Add padding at the bottom to make space for labels
                     }
                 },
                 plugins: {
                     legend: {
                         display: true, // Menyembunyikan legend
                         position: 'bottom', // Menempatkan legend di atas
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

         let downloadChart; // Declare a variable to hold the chart instance

         const getLastWeekDate = () => {
             const date = new Date();
             date.setDate(date.getDate() - 7);
             return date.toISOString().split('T')[0]; // Format: YYYY-MM-DD
         };

         const fetchData = (startDate = getLastWeekDate(), endDate = '') => {
             const url = endDate ?
                 `grafik.php?startDate=${startDate}&endDate=${endDate}` :
                 `grafik.php?startDate=${startDate}`;
             fetch(url)
                 .then(response => response.json())
                 .then(data => {
                     const ctx = document.getElementById('downloadChart').getContext('2d');

                     // Destroy the existing chart if it exists
                     if (downloadChart) {
                         downloadChart.destroy();
                     }

                     // Create a new chart instance
                     downloadChart = new Chart(ctx, {
                         type: 'line',
                         data: {
                             labels: data.labels,
                             datasets: [{
                                 label: 'Jumlah Unduhan',
                                 data: data.values,
                                 backgroundColor: '#11475e ',
                                 borderColor: '#11475e ',
                                 borderWidth: 1
                             }]
                         },
                         options: {
                             scales: {
                                 y: {
                                     beginAtZero: true,
                                     grid: {
                                         color: '#ffffff'
                                     },
                                     ticks: {
                                         color: '#ffffff'
                                     }
                                 },
                                 x: {
                                     grid: {
                                         color: '#ffffff'
                                     },
                                     ticks: {
                                         color: '#ffffff'
                                     }
                                 }
                             }
                         }
                     });
                 })
                 .catch(error => console.error('Error fetching data:', error));
         };

         document.querySelector('#dateFilterForm').addEventListener('submit', function(event) {
             event.preventDefault();
             const startDate = document.getElementById('startDate').value;
             const endDate = document.getElementById('endDate').value;
             fetchData(startDate, endDate);
         });

         // Add event listener for "Semua Data" button
         document.getElementById('fetchAllData').addEventListener('click', function() {
             // Clear the date inputs
             document.getElementById('startDate').value = '';
             document.getElementById('endDate').value = '';
             // Call fetchData without parameters to get all data
             fetchData();
         });

         // Call fetchData on page load
         fetchData(getLastWeekDate());
         </script>
         <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
         <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
         <script src="../assets/js/sidebarmenu.js"></script>
         <script src="../assets/js/app.min.js"></script>
         <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
         <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
         <script src="../assets/js/dashboard.js"></script>
 </body>

 </html>