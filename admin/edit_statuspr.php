<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "admin_login") {
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

    .judul-tabel {
        font-family: "Varela Round", sans-serif;
    }

    .banyak-data {
        font-family: "Varela Round", sans-serif;
        color: white;
    }

    .btn-custom-eye {
        background-color: #11475e !important;
        color: white !important;
    }

    .btn-custom-eye:hover {
        background-color: #609fb2 !important;
        color: white !important;
    }

    .btn-custom-upload {
        background-color: #eb9009 !important;
        color: white !important;
    }

    .btn-custom-upload:hover {
        background-color: #eb900970 !important;
        color: white !important;
    }

    .btn-custom-edit {
        background-color: #7c1919 !important;
        color: white !important;
    }

    .btn-custom-edit:hover {
        background-color: #b27373 !important;
        color: white !important;
    }

    input::placeholder {
        color: white !important;
    }

    textarea::placeholder {
        color: white !important;
    }

    .wajib_isi {
        color: red;
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

    @media (max-width: 425px) {
        .navbar-judul {
            font-size: 5px;
            margin-top: 11%;
            margin-left: -5%;
        }

        .navbar-collapse {
            flex-basis: 0% !important;
        }

        .nama-profile {
            color: #912005;
            font-family: "Varela Round", sans-serif;
            font-size: 10px;
            line-height: 2;
        }

        .tampil {
            display: none;
        }

        .col-44 {
            flex: 0 0 100% !important;
            max-width: 100% !important;
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
                            <p class="navbar-judul"> Administrasi & Pelaporan Penambangan</p>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)"
                                    id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    $id_admin = $_SESSION['id'];
                                    $profil = mysqli_query($koneksi, "select * from admin where admin_id='$id_admin'");
                                    $profil = mysqli_fetch_assoc($profil);
                                    if ($profil['admin_foto'] == "") {
                                    ?>
                                    <img src="../gambar/sistem/user.png" style="width: 40px;height: 40px">
                                    <?php } else { ?>
                                    <img src="../gambar/admin/<?php echo $profil['admin_foto'] ?>"
                                        style="width: 40px;height: 40px">
                                    <?php } ?>
                                    <p class="nama-profile mb-0"><?php echo $_SESSION['nama']; ?> [Admin]</p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="profile_admin.php"
                                            class="d-flex align-items-center gap-2 dropdown-item">
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
                                            $arsip = mysqli_query($koneksi, "SELECT * FROM riwayat,arsip,user WHERE riwayat_arsip=arsip_id and riwayat_user=user_id ORDER BY riwayat_id DESC");
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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-5 text-center fs-7 judul-tabel">EDIT STATUS PR </h5>
                            <?php
                                $id = $_GET['id'];
                                $data = mysqli_query($koneksi, "SELECT * from status_pr where statuspr_id='$id'");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                            <form method="post" action="statuspr_update.php" enctype="multipart/form-data">
                                <div class="banyak-data">
                                    <input type="hidden" name="statuspr_id" value="<?php echo $d['statuspr_id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Tanggal Pengajuan</label>
                                                <input type="date" class="form-control text-white"
                                                    name="statuspr_tanggal_pengajuan" placeholder="Input Data"
                                                    id="tanggalPengajuan" onchange="calculateLamaProses()"
                                                    value="<?php echo $d['statuspr_tanggal_pengajuan']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label">Tanggal Tahap Proses</label>
                                                <input type="date" class="form-control text-white"
                                                    name="statuspr_tanggal_proses" placeholder="Input Data"
                                                    id="tanggalTahapProses" onchange="calculateLamaProses()"
                                                    value="<?php echo $d['statuspr_tanggal_proses']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Estimasi Penyelesaian</label>
                                                <input type="date" class="form-control text-white"
                                                    name="statuspr_estimasi" placeholder="Input Data"
                                                    value="<?php echo $d['statuspr_estimasi']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Kode Pengadaan</label>
                                                <input type="text" class="form-control text-white" name="statuspr_kode"
                                                    placeholder="Input Data" value="<?php echo $d['statuspr_kode']; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Nama Barang / Jasa</label>
                                                <input type="text" class="form-control text-white" name="statuspr_nama"
                                                    placeholder="Input Data" value="<?php echo $d['statuspr_nama']; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Vendor</label>
                                                <input type="text" class="form-control text-white"
                                                    name="statuspr_vendor" placeholder="Input Data"
                                                    value="<?php echo $d['statuspr_vendor']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label"> <span class="wajib_isi">*</span>
                                                    Jumlah</label>
                                                <input type="number" class="form-control text-white"
                                                    name="statuspr_jumlah" placeholder="Input Data"
                                                    value="<?php echo $d['statuspr_jumlah']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">
                                                    <span class="wajib_isi">*</span> Satuan
                                                </label>
                                                <input type="text" class="form-control text-white"
                                                    name="statuspr_satuan" placeholder="Input Data"
                                                    value="<?php echo $d['statuspr_satuan']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label">Tahap Proses</label>
                                                <input type="text" class="form-control text-white" name="statuspr_tahap"
                                                    placeholder="Input Data"
                                                    value="<?php echo $d['statuspr_tahap']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label">Lama Proses</label>
                                                <input type="number" class="form-control text-white"
                                                    name="statuspr_lama" placeholder="Input Data" id="lamaProses"
                                                    value="<?php echo $d['statuspr_lama']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-4 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Status</label>
                                                <select class="form-select text-white"
                                                    aria-label="Default select example" name="statuspr_status" required>
                                                    <option selected disabled>Status</option>
                                                    <option value="Open" style="color: black;"
                                                        <?php echo ($d['statuspr_status'] == 'Open') ? 'selected' : ''; ?>>
                                                        Open</option>
                                                    <option value="On Progress" style="color: black;"
                                                        <?php echo ($d['statuspr_status'] == 'On Progress') ? 'selected' : ''; ?>>
                                                        On Progress</option>
                                                    <option value="Close" style="color: black;"
                                                        <?php echo ($d['statuspr_status'] == 'Close') ? 'selected' : ''; ?>>
                                                        Close</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Catatan</label>
                                        <input type="text" class="form-control text-white" name="statuspr_catatan"
                                            placeholder="Input Data" value="<?php echo $d['statuspr_catatan']; ?>">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-custom-eye"><i class="bi bi-send"></i>
                                        Submit</button>
                                    <button type="button" class="btn btn-custom-edit mx-3" onclick="goBack()"><i
                                            class="bi bi-arrow-left-circle"></i>
                                        Kembali</button>
                                </div>
                            </form>
                            <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    fetch('sidebar_admin.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('sidebar').innerHTML = data;
        });

    function goBack() {
        window.location.href = 'status_pr.php';
    }

    function calculateLamaProses() {
        const tanggalPengajuan = document.getElementById('tanggalPengajuan').value;
        const tanggalTahapProses = document.getElementById('tanggalTahapProses').value;

        if (tanggalPengajuan && tanggalTahapProses) {
            const date1 = new Date(tanggalPengajuan);
            const date2 = new Date(tanggalTahapProses);
            const timeDiff = date2 - date1; // Difference in milliseconds
            const dayDiff = timeDiff / (1000 * 3600 * 24); // Convert to days
            document.getElementById('lamaProses').value = dayDiff;
        }
    }
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>