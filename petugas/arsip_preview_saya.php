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

     .btn-custom2 {
         background-color: #ede0a0 !important;
         color: black !important;
         cursor: pointer;
     }

     .btn-custom2:hover {
         background-color: #bdb57b !important;
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
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title fw-semibold mb-4">Preview Arsip</h5>

                         <a href="arsip_saya.php" class="btn btn-custom2 mb-3">
                             <i class="bi bi-arrow-left"></i> Back
                         </a>
                         <div class="card mb-4">
                             <div class="card-body">
                                 <?php
                                $id = $_GET['id'];
                                $data = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_id='$id'");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                 <div class="row">
                                     <div class="col-lg-4">
                                         <table class="table">
                                             <tr>
                                                 <th>Kode Arsip</th>
                                                 <td><?php echo $d['arsip_kode']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Waktu Upload</th>
                                                 <td><?php echo date('H:i:s  d-m-Y', strtotime($d['arsip_waktu_upload'])) ?>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <th>Nama File</th>
                                                 <td><?php echo $d['arsip_nama']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Kategori</th>
                                                 <td><?php echo $d['kategori_nama']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Jenis File</th>
                                                 <td><?php echo $d['arsip_jenis']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Petugas Pengupload</th>
                                                 <td><?php echo $d['petugas_nama']; ?></td>
                                             </tr>
                                             <tr>
                                                 <th>Keterangan</th>
                                                 <td><?php echo $d['arsip_keterangan']; ?></td>
                                             </tr>
                                         </table>
                                     </div>
                                     <div class="col-lg-8">
                                         <?php
                                                if ($d['arsip_jenis'] == "png" || $d['arsip_jenis'] == "jpg" || $d['arsip_jenis'] == "gif" || $d['arsip_jenis'] == "jpeg") {
                                                ?>
                                         <img src="../arsip/<?php echo $d['arsip_file']; ?>" class="img-fluid"
                                             alt="<?php echo $d['arsip_nama']; ?>">
                                         <?php
                                                } elseif ($d['arsip_jenis'] == "pdf") {
                                                ?>
                                         <embed src="../arsip/<?php echo $d['arsip_file']; ?>" type="application/pdf"
                                             width="100%" height="600px" />
                                         <?php
                                                } elseif ($d['arsip_jenis'] == "xlsx" || $d['arsip_jenis'] == "xls") {
                                                ?>
                                         <div id="excel-preview"></div>
                                         <script>
                                         fetch('../arsip/<?php echo $d['arsip_file']; ?>')
                                             .then(response => response.arrayBuffer())
                                             .then(data => {
                                                 const workbook = XLSX.read(data, {
                                                     type: 'array'
                                                 });
                                                 const sheetName = workbook.SheetNames[0];
                                                 const worksheet = workbook.Sheets[sheetName];
                                                 const html = XLSX.utils.sheet_to_html(worksheet);
                                                 document.getElementById('excel-preview').innerHTML = html;
                                             });
                                         </script>
                                         <?php
                                                } else {
                                                ?>
                                         <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue"
                                                 href="../arsip/<?php echo $d['arsip_file']; ?>">Download di sini.</a>
                                         </p>
                                         <?php
                                                }
                                                ?>
                                     </div>
                                 </div>
                                 <?php
                                }
                                ?>
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
     <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
 </body>

 </html>