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

    .table td {
        word-break: break-word;
        overflow-wrap: break-word;
        white-space: normal;
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

    .pilihan-doc a {
        cursor: pointer;
        color: gray;
        text-decoration: none;
    }

    .pilihan-doc-kajian a {
        color: black;
        text-decoration: underline;
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

    #searchInput::placeholder {
        color: white;
    }

    .btn-custom-hapus {
        background-color: #7c1919 !important;
        color: white !important;
    }

    .btn-custom-hapus:hover {
        background-color: #b27373 !important;
        color: white !important;
    }

    .btn-custom-edit {
        background-color: #1593a4 !important;
        color: white !important;
    }

    .btn-custom-edit:hover {
        background-color: #1593a487 !important;
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-5 mt-2 text-center fs-7 judul-tabel">MONITORING KONTRAK
                        </h5>
                        <div class="row mb-3">
                            <div class="col-md-6 col-6 banyak-data">
                                <label for="rowsPerPageSelect" class="form-label tampil">Tampilkan:</label>
                                <select id="rowsPerPageSelect" class="form-select text-white"
                                    style="width: auto; display: inline-block;">
                                    <option value="5" style="color: black;">5</option>
                                    <option value="10" selected style="color: black;">10</option>
                                    <option value="15" style="color: black;">15</option>
                                    <option value="20" style="color: black;">20</option>
                                </select>
                                <span class="tampil"> data per halaman</span>
                            </div>
                            <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">
                                <input type="text" class="form-control me-2 text-white" id="searchInput"
                                    placeholder="Cari..." style="max-width: 200px; height: 40px; font-size: .95rem;">
                                <button type="button" class="btn btn-custom-eye"
                                    style="height: 40px; padding: 0 .5rem; font-size: .95rem;"
                                    onclick="tambahKategori()">
                                    <i class="bi bi-plus-square"></i> Tambah
                                </button>
                                <a class="btn btn-custom-edit btn-sm d-flex justify-content-end align-items-center mx-2"
                                    href="export_excel.php">
                                    <i class="bi bi-file-spreadsheet fs-6 me-1"></i> Export
                                </a>
                            </div>
                        </div>

                        <center>
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "gagal") {
                            ?>
                            <div class="alert alert-danger">File arsip gagal diupload. krena demi
                                keamanan
                                file
                                .php tidak diperbolehkan.</div>
                            <?php
                                } else {
                                ?>
                            <div class="alert alert-success">Arsip berhasil tersimpan.</div>
                            <?php
                                }
                            }
                            ?>
                        </center>

                        <div class="table-responsive products-table" data-simplebar>
                            <table class="table table-bordered text-nowrap mb-0 align-middle table-hover">
                                <thead class="align-middle">
                                    <tr class="text-center">
                                        <th class="fs-3">No</th>
                                        <th class="fs-3 text-center" style="padding: 0 90px;">Judul Kontrak</th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">No SPPH</th>
                                        <th class="fs-3 text-center" style="padding: 0 40px;">Kategori </th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">Start Date</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">End Date</th>
                                        <th class="fs-3 text-center" style="padding: 0 30px;">
                                            Periode <br> Realisasi
                                        </th>
                                        <th class="fs-3 text-center" style="padding: 0 60px;">Nilai Kontrak </th>
                                        <th class="fs-3 text-center" style="padding: 0 60px;">Realisasi S.D.</th>
                                        <th class="fs-3 text-center" style="padding: 0 60px;">Nilai Sisa Kontrak</th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">% Sisa</th>
                                        <th class="fs-3 text-center" style="padding: 0 60px;">Keterangan</th>
                                        <th class="fs-3">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $kategori = mysqli_query($koneksi, "SELECT hk.*, k.kontrak_awal, k.kontrak_akhir, 
                                        (SELECT SUM(k2.kontrak_total) 
                                         FROM kontrak k2 
                                         WHERE k2.kontrak_header_id = hk.header_id) AS total_nilai, 
                                         (SELECT SUM(b2.bulan_realisasi) 
                                         FROM bulan_kontrak b2 
                                         WHERE b2.bulan_header_id = hk.header_id) AS total_realisasi 
                                        FROM header_kontrak hk 
                                        LEFT JOIN kontrak k ON hk.header_id = k.kontrak_header_id 
                                        LEFT JOIN bulan_kontrak b ON hk.header_id = b.bulan_header_id 
                                        GROUP BY hk.header_id");
                                    while ($p = mysqli_fetch_array($kategori)) {
                                    ?>
                                    <tr>
                                        <td class="text-center fs-2"><?php echo $no++; ?></td>
                                        <td class="fs-2"><?php echo $p['header_judul'] ?></td>
                                        <td class="text-center fs-2"><?php echo $p['header_nomor'] ?></td>
                                        <td class="text-center fs-2"><?php echo $p['header_kategori'] ?></td>
                                        <td class="text-center fs-2">
                                            <?php echo date('F Y', strtotime($p['kontrak_awal'])) ?></td>
                                        <td class="text-center fs-2">
                                            <?php echo date('F Y', strtotime($p['kontrak_akhir'])) ?></td>
                                        <td class="text-center fs-2">
                                            <?php echo date('F Y', strtotime($p['kontrak_awal'])) ?>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['total_nilai'], 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format($p['total_realisasi'], 2, ',', '.'); ?></span>
                                        </td>
                                        <td class="fs-2 text-start">
                                            <span>Rp</span>
                                            <span class="float-end">
                                                <?php echo number_format(($p['total_nilai'] - $p['total_realisasi']), 2, ',', '.'); ?>
                                            </span>
                                        </td>
                                        <td class="text-center fs-2">
                                            <?php
                                                $nilaiSisa = $p['total_nilai'] - $p['total_realisasi'];
                                                $persentaseSisa = ($nilaiSisa / $p['total_nilai']) * 100; // Calculate % Sisa
                                                echo number_format($persentaseSisa) . '%'; // Display % Sisa
                                                ?>
                                        </td>
                                        <td class="text-center fs-2"><?php echo $p['header_ket'] ?></td>
                                        <td class="text-center">
                                            <a target="_blank" class="btn btn-custom-eye btn-sm"
                                                href="data_monitoring_kontrak.php?id=<?php echo $p['header_id']; ?>"><i
                                                    class="ti ti-eye fs-5"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navdivtion">
                            <ul class="pagination justify-content-center mt-3" id="paginationContainer">
                                <!-- Pagination items will be added here by JavaScript -->
                            </ul>
                        </nav>
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

    function tambahKategori() {
        window.location.href = 'tambah_header.php';
    }

    // Fungsi untuk menangani paginasi dan pencarian
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.querySelector('.table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const rowsPerPageSelect = document.getElementById('rowsPerPageSelect');
        const searchInput = document.getElementById('searchInput');
        const paginationContainer = document.getElementById('paginationContainer');

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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>