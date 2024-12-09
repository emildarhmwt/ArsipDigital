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

    .btn-custom2 {
        background-color: #ede0a0 !important;
        color: black !important;
        cursor: pointer;
    }

    .btn-custom2:hover {
        background-color: #bdb57b !important;
        color: white !important;
    }

    .timeline {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        margin-top: 20px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #ccc;
        z-index: 1;
    }

    .timeline-item {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .timeline-dot {
        width: 10px;
        height: 10px;
        background-color: #00bfff;
        border-radius: 50%;
        margin: 0 auto;
    }

    .timeline-item p {
        margin: 0;
        font-size: 14px;
        color: #00bfff;
    }

    .bg-blue {
        background-color: #0e4551;
        ;
    }

    .bg-gray {
        background-color: #ccc;
    }

    .card-preview {
        background-color: #0e45515c !important;
        color: white !important;
    }

    .btn-custom-review {
        background-color: #11475e !important;
        color: white !important;
    }

    .btn-custom-review:hover {
        background-color: #609fb2 !important;
        color: white !important;
    }

    .btn-custom-back {
        background-color: #4474a2 !important;
        color: white !important;
    }

    .btn-custom-back:hover {
        background-color: #4474a287 !important;
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

    .table td {
        word-break: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .banyak-data {
        font-family: "Varela Round", sans-serif;
        color: white;
    }

    #secondSearchInput::placeholder {
        color: white;
    }

    .btn-custom-upload {
        background-color: #eb9009 !important;
        color: white !important;
    }

    .btn-custom-upload:hover {
        background-color: #eb900970 !important;
        color: white !important;
    }

    .btn-custom-hapus {
        background-color: #7c1919 !important;
        color: white !important;
    }

    .btn-custom-hapus:hover {
        background-color: #b27373 !important;
        color: white !important;
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

    }
    </style>
</head>

<f>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <div id="sidebar"></div>
        </aside>
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

                <?php
                $no = 1;
                include '../koneksi.php';
                $id = $_GET['id'];
                $arsip = mysqli_query($koneksi, "SELECT * FROM header_kontrak  WHERE header_id='$id'");
                while ($p = mysqli_fetch_assoc($arsip)) {
                ?>
                <div class="card card-preview" style="border-radius: 10px 10px 10px 10px;">
                    <div class="card-header" style="background-color: #0e4551; width: 100%;">
                        Header
                    </div>
                    <div class="card-body">
                        <form method="get" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-2 col-3">
                                            <label for="shift" class="form-label">JUDUL KONTRAK</label>
                                        </div>
                                        <div class="col-lg-1 col-1">
                                            :
                                        </div>
                                        <div class="col-lg-9 col-8">
                                            <td><?php echo $p['header_judul'] ?></td>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-2 col-3">
                                            <label for="shift" class="form-label">NO SPPH</label>
                                        </div>
                                        <div class="col-lg-1 col-1">
                                            :
                                        </div>
                                        <div class="col-lg-9 col-8">
                                            <td><?php echo $p['header_nomor'] ?></td>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-2 col-3">
                                            <label for="shift" class="form-label">KATEGORI KONTRAK</label>
                                        </div>
                                        <div class="col-lg-1 col-1">
                                            :
                                        </div>
                                        <div class="col-lg-9 col-8">
                                            <td><?php echo $p['header_kategori'] ?></td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                }
                ?>

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6 col-6 d-flex justify-content-start align-items-center">
                                <a class="btn btn-custom-review btn-sm d-flex justify-content-end align-items-center mx-2"
                                    href="export_excel_kontrak.php?kontrak_header_id=<?php echo $id; ?>"">
                                    <i class=" bi bi-file-spreadsheet fs-4 me-1"></i> Export
                                </a>
                            </div>
                            <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">
                                <a class="btn btn-custom-back btn-sm d-flex justify-content-end align-items-center mx-2"
                                    href="monitoring.php">
                                    <i class="ti ti-arrow-narrow-left fs-7 me-1"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive products-table" data-simplebar>
                            <table class="table table-bordered text-nowrap mb-0 align-middle table-hover">
                                <thead class="fs-4">
                                    <tr class="text-center align-middle">
                                        <th class="fs-3 text-center" style="padding: 0 10px;">No</th>
                                        <th class="fs-3 text-center" style="padding: 0 50px;">Deskripsi</th>
                                        <th class="fs-3 text-center" style="padding: 0 10px;">Jumlah</th>
                                        <th class="fs-3 text-center" style="padding: 0 10px;">Tahun <br> Pembuatan</th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">Masa <br> Sewa</th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">Start Date</th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">End Date</th>
                                        <th class="fs-3 text-center" style="padding: 0 13px;">Min HM</th>
                                        <th class="fs-3 text-center" style="padding: 0 13px;">Max HM</th>
                                        <th class="fs-3 text-center" style="padding: 0 70px;">Tarif</th>
                                        <th class="fs-3 text-center" style="padding: 0 90px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $id = $_GET['id'];
                                    $kategori = mysqli_query($koneksi, "SELECT * FROM kontrak WHERE kontrak_header_id='$id'");
                                    $subtotal = 0;
                                    while ($p = mysqli_fetch_array($kategori)) {
                                    ?>
                                    <tr>
                                        <td class="text-center fs-2"><?php echo $no++; ?></td>
                                        <td class="text-start fs-2"><?php echo $p['kontrak_desk'] ?></td>
                                        <td class="text-center fs-2"><?php echo $p['kontrak_jumlah'] ?></td>
                                        <td class="text-center fs-2"><?php echo $p['kontrak_tahun'] ?></td>
                                        <td class="text-center fs-2"><?php echo $p['kontrak_masa'] ?></td>
                                        <td class="text-center fs-2">
                                            <?php echo date('d/m/Y', strtotime($p['kontrak_awal'])) ?>
                                        </td>
                                        <td class="text-center fs-2">
                                            <?php echo date('d/m/Y', strtotime($p['kontrak_akhir'])) ?>
                                        </td>
                                        <td class="text-center fs-2"><?php echo $p['kontrak_minhm'] ?></td>
                                        <td class="text-center fs-2"><?php echo $p['kontrak_maxhm'] ?></td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['kontrak_tarif'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['kontrak_total'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                        $subtotal += $p['kontrak_total'];
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="10" class="text-end fw-bold fs-2">Subtotal:</td>
                                        <td class="fs-2 text-start fw-bold">
                                            <span>Rp</span>
                                            <span class=" float-end">
                                                <?php echo number_format($subtotal, 2, ',', '.'); ?>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="10" class="text-end fw-bold fs-2">PPN 10%:</td>
                                        <td class="fs-2 text-start fw-bold">
                                            <span>Rp</span>
                                            <span class=" float-end">
                                                <?php echo number_format($subtotal * 0.10, 2, ',', '.'); ?>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="10" class="text-end fw-bold fs-2">Total:</td>
                                        <td class="fs-2 text-start fw-bold">
                                            <span>Rp</span>
                                            <span class=" float-end">
                                                <?php echo number_format($subtotal + ($subtotal * 0.10), 2, ',', '.'); ?>
                                            </span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6 col-6 banyak-data">
                                <label for="secondRowsPerPageSelect" class="form-label tampil">Tampilkan:</label>
                                <select id="secondRowsPerPageSelect" class="form-select text-white"
                                    style="width: auto; display: inline-block;">
                                    <option value="10" selected style="color: black;">10</option>
                                    <option value="20" style="color: black;">20</option>
                                    <option value="30" style="color: black;">30</option>
                                </select>
                                <span class="tampil"> data per halaman</span>
                            </div>
                            <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">
                                <input type="text" class="form-control me-2 text-white" id="secondSearchInput"
                                    placeholder="Cari..." style="max-width: 200px; height: 40px; font-size: .95rem;">
                            </div>
                        </div>

                        <div class="table-responsive products-table" data-simplebar>
                            <table class="table table-bordered text-nowrap mb-0 align-middle table-hover"
                                id="secondTable">
                                <thead class="fs-4 align-middle">
                                    <tr class="text-center">
                                        <th class="fs-3" style="width: 5%;">No</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">Bulan</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">Nilai Invoice</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">Nilai Denda</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">Realisasi</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">Realisasi <br> Kumulatif
                                    </tr>
                                </thead>
                                <tbody id="secondTableBody">
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $id = $_GET['id'];
                                    $kategori = mysqli_query($koneksi, "SELECT * FROM bulan_kontrak WHERE bulan_header_id='$id'");
                                    $total_invoice = 0;
                                    $total_denda = 0;
                                    $total_realisasi = 0;
                                    while ($p = mysqli_fetch_array($kategori)) {
                                    ?>
                                    <tr class="text-center fs-2">
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo date('F Y', strtotime($p['bulan_bulan'])); ?></td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['bulan_invoice'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['bulan_denda'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['bulan_realisasi'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['bulan_rk'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                        $total_invoice += $p['bulan_invoice'];
                                        $total_denda += $p['bulan_denda'];
                                        $total_realisasi += $p['bulan_realisasi'];
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="2" class="text-end fw-bold">Total:</td>
                                        <td class="fs-2 text-start fw-bold">
                                            <span>Rp</span>
                                            <span class="float-end ">
                                                <?php echo number_format($total_invoice, 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start fw-bold">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($total_denda, 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start fw-bold">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($total_realisasi, 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-3" id="secondPaginationContainer">
                                <!-- Pagination items will be added here by JavaScript -->
                            </ul>
                        </nav>
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

    document.addEventListener('DOMContentLoaded', function() {
        // Elemen untuk tabel kedua
        const table = document.querySelector('#secondTable');
        const tbody = document.querySelector('#secondTableBody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const rowsPerPageSelect = document.getElementById('secondRowsPerPageSelect');
        const searchInput = document.getElementById('secondSearchInput');
        const paginationContainer = document.getElementById('secondPaginationContainer');

        let currentPage = 1;
        let rowsPerPage = parseInt(rowsPerPageSelect.value);

        function displayTable(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedRows = rows.slice(start, end);

            tbody.innerHTML = '';
            paginatedRows.forEach(row => tbody.appendChild(row));

            updatePagination();
        }

        function updatePagination() {
            const pageCount = Math.ceil(rows.length / rowsPerPage);
            paginationContainer.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                if (i === currentPage) li.classList.add('active');

                const a = document.createElement('a');
                a.classList.add('page-link');
                a.href = '#';
                a.textContent = i;

                a.addEventListener('click', (e) => {
                    e.preventDefault();
                    currentPage = i;
                    displayTable(currentPage);
                });

                li.appendChild(a);
                paginationContainer.appendChild(li);
            }
        }

        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredRows = rows.filter(row => {
                return Array.from(row.cells).some(cell =>
                    cell.textContent.toLowerCase().includes(searchTerm)
                );
            });

            tbody.innerHTML = '';
            filteredRows.forEach(row => tbody.appendChild(row));

            currentPage = 1;
            updatePagination();
        }

        rowsPerPageSelect.addEventListener('change', () => {
            rowsPerPage = parseInt(rowsPerPageSelect.value);
            currentPage = 1;
            displayTable(currentPage);
        });

        searchInput.addEventListener('input', filterTable);

        // Inisialisasi tampilan tabel
        displayTable(currentPage);
    });
    </script>
    <script src=" ../assets/libs/jquery/dist/jquery.min.js">
    </script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    </body>

</html>