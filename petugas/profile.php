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
     .textinfo {
         font-size: 12px;
     }

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
                                                     <h6 class="mb-0 fs-3"><?php echo $p['user_nama'] ?> menunduh</h6>
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
                 <div class="page-breadcrumb">
                     <div class="row align-items-center">
                         <div class="col-6">
                             <h1 class="mb-5 fw-bold">Profile</h1>
                         </div>
                     </div>
                 </div>
                 <div class="container-fluid">
                     <div class="row">
                         <!-- Column -->
                         <div class="col-lg-4 col-xlg-3 col-md-5">
                             <?php
                            $id = $_SESSION['id'];
                            $saya = mysqli_query($koneksi, "select * from petugas where petugas_id='$id'");
                            $s = mysqli_fetch_assoc($saya);
                            ?>
                             <div class="card">
                                 <div class="card-body">
                                     <center class="m-t-30">
                                         <?php
                                        if ($s['petugas_foto'] == "") {
                                        ?>
                                         <img class="img-user" src="../gambar/sistem/user.png" width="150" height="150">
                                         <?php
                                        } else {
                                        ?>
                                         <img class="img-user" src="../gambar/petugas/<?php echo $s['petugas_foto']; ?>"
                                             width="150" height="150">
                                         <?php
                                        }
                                        ?>
                                         <h4 class="card-title m-t-10"> <a class="cards-hd-dn"
                                                 href="#"><?php echo $s['petugas_nama']; ?></a> </h4>
                                         <h6 class="card-subtitle">Petugas</h6>
                                     </center>
                                 </div>
                             </div>
                         </div>
                         <!-- Column -->
                         <!-- Column -->
                         <div class="col-lg-8 col-xlg-9 col-md-7">
                             <div class="card">
                                 <div class="card-body">
                                     <?php
                                    if (isset($_GET['alert'])) {
                                        if ($_GET['alert'] == "sukses") {
                                            echo "<div class='alert alert-success'>Profile anda berhasil diganti!</div>";
                                        }
                                    }
                                    ?>
                                     <form action="profil_act.php" method="post" enctype="multipart/form-data">
                                         <div class="form-group mb-3">
                                             <label class="col-md-12">Nama</label>
                                             <div class="col-md-12">
                                                 <input type="text" class="form-control" placeholder="Masukkan Nama .."
                                                     name="nama" required="required"
                                                     value="<?php echo $s['petugas_nama'] ?>">
                                             </div>
                                         </div>
                                         <div class="form-group mb-3">
                                             <label for="example-email" class="col-md-12">Username</label>
                                             <div class="col-md-12">
                                                 <input type="text" class="form-control"
                                                     placeholder="Masukkan Username .." name="username"
                                                     required="required" value="<?php echo $s['petugas_username'] ?>">
                                             </div>
                                         </div>
                                         <div class="form-group mb-3">
                                             <div class="mb-3">
                                                 <label for="foto" class="form-label">Foto</label>
                                                 <input class="form-control" type="file" name="foto">
                                                 <p class="textinfo">Kosongkan jika tidak ingin mengubah foto</p>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <div class="col-sm-12">
                                                 <button type="submit" class="btn btn-primary"><i
                                                         class="bi bi-send"></i>
                                                     Submit</button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <!-- Column -->
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