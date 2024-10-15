<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "asmen_login") {
    header("location:../login/loginuser.php?alert=belum_login");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playwrite+DE+Grund:wght@100..400&family=Rowdies:wght@300;400;700&family=Varela+Round&display=swap"
        rel="stylesheet">
    <style>
    .textinfo {
        font-size: 12px;
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

    .card-preview {
        background-color: #0e45515c !important;
        color: white !important;
    }

    .btn-custom-eye {
        background-color: #11475e !important;
        color: white !important;
    }

    .btn-custom-eye:hover {
        background-color: #609fb2 !important;
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

                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card card-preview" style="border-radius: 10px 10px 10px 10px;">
                    <div class=" card-header" style="background-color: #0e4551; width: 100%; font-size: 25px;">
                        Profil
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                <?php
                                    $id = $_SESSION['id'];
                                    $saya = mysqli_query($koneksi, "select * from user_pks where pks_id='$id'");
                                    $s = mysqli_fetch_assoc($saya);
                                    ?>
                                <div class="card card-preview">
                                    <div class="card-body">
                                        <center class="m-t-30">
                                            <?php
                                                if ($s['pks_foto'] == "") {
                                                ?>
                                            <img class="img-user" src="../gambar/sistem/user.png" width="150"
                                                height="150">
                                            <?php
                                                } else {
                                                ?>
                                            <img class="img-user" src="../gambar/asmen/<?php echo $s['pks_foto']; ?>"
                                                width="150" height="150">
                                            <?php
                                                }
                                                ?>
                                            <h4 class="card-title m-t-10"><?php echo $s['pks_nama']; ?></h4>
                                            <h6 class="card-subtitle">Asisten Manajer</h6>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <?php
                                    if (isset($_GET['alert'])) {
                                        if ($_GET['alert'] == "sukses") {
                                            echo "<div class='alert alert-success'>Profile anda berhasil diganti!</div>";
                                        }
                                    }
                                    ?>
                                <div class="card card-preview">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material mx-2" action="profile_act.php"
                                            method="post" enctype="multipart/form-data">
                                            <div class="form-group mb-3">
                                                <label class="col-md-12">Nama</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control text-white"
                                                        placeholder="Masukkan Nama .." name="nama" required="required"
                                                        value="<?php echo $s['pks_nama'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="example-email" class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control text-white"
                                                        placeholder="Masukkan Username .." name="username"
                                                        required="required" value="<?php echo $s['pks_username'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Foto</label>
                                                    <input class="form-control text-white" type="file" name="foto">
                                                    <p class="textinfo">Kosongkan jika tidak ingin mengubah foto</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-custom-eye"><i
                                                            class="bi bi-send"></i>
                                                        Submit</button>
                                                </div>
                                            </div>
                                        </form>
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