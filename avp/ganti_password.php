 <?php
    include '../koneksi.php';
    session_start();
    if ($_SESSION['status'] != "avp_login") {
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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link rel="stylesheet" href="../assets/css/styles.min.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
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

     .btn-custom {
         background-color: #bcddeb !important;
         color: black !important;
         cursor: pointer;
     }

     .btn-custom:hover {
         background-color: #266d8b !important;
         color: white !important;
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
                         </ul>
                     </div>
                 </nav>
             </header>
             <!--  Header End -->
             <div class="container-fluid">
                 <div class="container-fluid">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title fw-semibold mb-4">Ganti Password</h5>
                             <div class="card">
                                 <div class="card-body">
                                     <?php
                                    if (isset($_GET['alert'])) {
                                        if ($_GET['alert'] == "sukses") {
                                            echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
                                        }
                                    }
                                    ?>
                                     <form method="POST" action="ganti_pw_act.php">
                                         <div class="mb-3">
                                             <label for="shift" class="form-label">Masukkan Password Baru</label>
                                             <input type="password" class="form-control"
                                                 placeholder="Masukkan Password Baru .." name="password" id="password"
                                                 required="required" min="5">
                                         </div>
                                         <div class="d-flex align-items-center justify-content-between mb-4">
                                             <div class="form-check">
                                                 <input class="form-check-input primary" type="checkbox" value=""
                                                     id="showPassword">
                                                 <label class="form-check-label text-dark sub-judul" for="showPassword">
                                                     Show Password
                                                 </label>
                                             </div>
                                         </div>
                                         <button type="submit" class="btn btn-custom"><i class="bi bi-send"></i>
                                             Submit</button>
                                     </form>
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

     document.getElementById('showPassword').addEventListener('change', function() {
         var passwordInput = document.getElementById('password');
         if (this.checked) {
             passwordInput.type = 'text';
         } else {
             passwordInput.type = 'password';
         }
     });
     </script>
     <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
     <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <script src="../assets/js/sidebarmenu.js"></script>
     <script src="../assets/js/app.min.js"></script>
     <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
 </body>

 </html>