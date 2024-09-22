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
         font-size: 20px;
         font-weight: bold;
         margin-left: 20px;
         font-family: "Playwrite DE Grund", cursive;
         display: flex;
         align-items: center;
         margin-top: 17px;
         color: #4e6a7d;
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
                             <p class="navbar-judul"> Sistem Informasi Arsip Digital</p>
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
                 <!--  Row 1 -->
                 <div class="row">
                     <div class="col-lg-8 d-flex align-items-strech">
                         <div class="card w-100">
                             <div class="card-body">
                                 <div class="d-flex align-items-center justify-content-between mb-10">
                                     <div class="">
                                         <h5 class="card-title fw-semibold">Profit & Expenses</h5>
                                     </div>
                                     <div class="dropdown">
                                         <button id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                             aria-expanded="false"
                                             class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                             <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                         </button>
                                         <ul class="dropdown-menu dropdown-menu-end"
                                             aria-labelledby="dropdownMenuButton1">
                                             <li><a class="dropdown-item" href="#">Action</a></li>
                                             <li>
                                                 <a class="dropdown-item" href="#">Another action</a>
                                             </li>
                                             <li>
                                                 <a class="dropdown-item" href="#">Something else here</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div id="profit"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="row">
                             <div class="col-lg-12 col-sm-6">
                                 <!-- Yearly Breakup -->
                                 <div class="card overflow-hidden">
                                     <div class="card-body p-4">
                                         <h5 class="card-title mb-10 fw-semibold">Traffic Distribution</h5>
                                         <div class="row align-items-center">
                                             <div class="col-7">
                                                 <h4 class="fw-semibold mb-3">$36,358</h4>
                                                 <div class="d-flex align-items-center mb-2">
                                                     <span
                                                         class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                         <i class="ti ti-arrow-up-left text-success"></i>
                                                     </span>
                                                     <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                     <p class="fs-3 mb-0">last year</p>
                                                 </div>
                                                 <div class="d-flex align-items-center">
                                                     <div class="me-3">
                                                         <span
                                                             class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                         <span class="fs-2">Oragnic</span>
                                                     </div>
                                                     <div>
                                                         <span
                                                             class="round-8 bg-danger rounded-circle me-2 d-inline-block"></span>
                                                         <span class="fs-2">Refferal</span>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-5">
                                                 <div class="d-flex justify-content-center">
                                                     <div id="grade"></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12 col-sm-6">
                                 <!-- Monthly Earnings -->
                                 <div class="card">
                                     <div class="card-body">
                                         <div class="row alig n-items-start">
                                             <div class="col-8">
                                                 <h5 class="card-title mb-10 fw-semibold"> Product Sales</h5>
                                                 <h4 class="fw-semibold mb-3">$6,820</h4>
                                                 <div class="d-flex align-items-center pb-1">
                                                     <span
                                                         class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                         <i class="ti ti-arrow-down-right text-danger"></i>
                                                     </span>
                                                     <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                     <p class="fs-3 mb-0">last year</p>
                                                 </div>
                                             </div>
                                             <div class="col-4">
                                                 <div class="d-flex justify-content-end">
                                                     <div
                                                         class="text-white bg-danger rounded-circle p-7 d-flex align-items-center justify-content-center">
                                                         <i class="ti ti-currency-dollar fs-6"></i>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div id="earning"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-4 d-flex align-items-stretch">
                         <div class="card w-100">
                             <div class="card-body p-4">
                                 <div class="mb-4">
                                     <h5 class="card-title fw-semibold">Upcoming Schedules</h5>
                                 </div>
                                 <ul class="timeline-widget mb-0 position-relative mb-n5">
                                     <li class="timeline-item d-flex position-relative overflow-hidden">
                                         <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                                         <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                             <span
                                                 class="timeline-badge border-2 border border-primary flex-shrink-0 my-2"></span>
                                             <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                         </div>
                                         <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe
                                             of $385.90</div>
                                     </li>
                                     <li class="timeline-item d-flex position-relative overflow-hidden">
                                         <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                                         <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                             <span
                                                 class="timeline-badge border-2 border border-info flex-shrink-0 my-2"></span>
                                             <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                         </div>
                                         <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded
                                             <a href="javascript:void(0)"
                                                 class="text-primary d-block fw-normal">#ML-3467</a>
                                         </div>
                                     </li>
                                     <li class="timeline-item d-flex position-relative overflow-hidden">
                                         <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                         <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                             <span
                                                 class="timeline-badge border-2 border border-success flex-shrink-0 my-2"></span>
                                             <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                         </div>
                                         <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to
                                             Michael</div>
                                     </li>
                                     <li class="timeline-item d-flex position-relative overflow-hidden">
                                         <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                         <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                             <span
                                                 class="timeline-badge border-2 border border-warning flex-shrink-0 my-2"></span>
                                             <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                         </div>
                                         <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded
                                             <a href="javascript:void(0)"
                                                 class="text-primary d-block fw-normal">#ML-3467</a>
                                         </div>
                                     </li>
                                     <li class="timeline-item d-flex position-relative overflow-hidden">
                                         <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                         <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                             <span
                                                 class="timeline-badge border-2 border border-danger flex-shrink-0 my-2"></span>
                                             <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                         </div>
                                         <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival
                                             recorded
                                         </div>
                                     </li>
                                     <li class="timeline-item d-flex position-relative overflow-hidden">
                                         <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                         <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                             <span
                                                 class="timeline-badge border-2 border border-success flex-shrink-0 my-2"></span>
                                         </div>
                                         <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-8 d-flex align-items-stretch">
                         <div class="card w-100">
                             <div class="card-body p-4">
                                 <div class="d-flex mb-4 justify-content-between align-items-center">
                                     <h5 class="mb-0 fw-bold">Top Paying Clients</h5>

                                     <div class="dropdown">
                                         <button id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                             aria-expanded="false"
                                             class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                             <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                         </button>
                                         <ul class="dropdown-menu dropdown-menu-end"
                                             aria-labelledby="dropdownMenuButton1">
                                             <li><a class="dropdown-item" href="#">Action</a></li>
                                             <li>
                                                 <a class="dropdown-item" href="#">Another action</a>
                                             </li>
                                             <li>
                                                 <a class="dropdown-item" href="#">Something else here</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <div class="table-responsive" data-simplebar>
                                     <table class="table table-borderless align-middle text-nowrap">
                                         <thead>
                                             <tr>
                                                 <th scope="col">Profile</th>
                                                 <th scope="col">Hour Rate</th>
                                                 <th scope="col">Extra classes</th>
                                                 <th scope="col">Status</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>
                                                     <div class="d-flex align-items-center">
                                                         <div class="me-4">
                                                             <img src="../assets/images/profile/user1.jpg" width="50"
                                                                 class="rounded-circle" alt="" />
                                                         </div>

                                                         <div>
                                                             <h6 class="mb-1 fw-bolder">Mark J. Freeman</h6>
                                                             <p class="fs-3 mb-0">Prof. English</p>
                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0">$150/hour</p>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0 text-success">
                                                         +53
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <span
                                                         class="badge bg-light-success rounded-pill text-success px-3 py-2 fs-3">Available</span>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="d-flex align-items-center">
                                                         <div class="me-4">
                                                             <img src="../assets/images/profile/user2.jpg" width="50"
                                                                 class="rounded-circle" alt="" />
                                                         </div>

                                                         <div>
                                                             <h6 class="mb-1 fw-bolder">Nina R. Oldman</h6>
                                                             <p class="fs-3 mb-0">Prof. History</p>
                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0">$150/hour</p>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0 text-success">
                                                         +68
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <span
                                                         class="badge bg-light-primary rounded-pill text-primary px-3 py-2 fs-3">In
                                                         Class</span>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="d-flex align-items-center">
                                                         <div class="me-4">
                                                             <img src="../assets/images/profile/user3.jpg" width="50"
                                                                 class="rounded-circle" alt="" />
                                                         </div>

                                                         <div>
                                                             <h6 class="mb-1 fw-bolder">Arya H. Shah</h6>
                                                             <p class="fs-3 mb-0">Prof. Maths</p>
                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0">$150/hour</p>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0 text-success">
                                                         +94
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <span
                                                         class="badge bg-light-danger rounded-pill text-danger px-3 py-2 fs-3">Absent</span>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="d-flex align-items-center">
                                                         <div class="me-4">
                                                             <img src="../assets/images/profile/user4.jpg" width="50"
                                                                 class="rounded-circle" alt="" />
                                                         </div>

                                                         <div>
                                                             <h6 class="mb-1 fw-bolder">June R. Smith</h6>
                                                             <p class="fs-3 mb-0">Prof. Arts</p>
                                                         </div>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0">$150/hour</p>
                                                 </td>
                                                 <td>
                                                     <p class="fs-3 fw-normal mb-0 text-success">
                                                         +27
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <span
                                                         class="badge bg-light-warning rounded-pill text-warning px-3 py-2 fs-3">On
                                                         Leave</span>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
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