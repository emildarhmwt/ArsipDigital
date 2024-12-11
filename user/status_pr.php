<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "user_login") {
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


    .btn-custom-upload {
        background-color: #eb9009 !important;
        color: white !important;
    }

    .btn-custom-upload:hover {
        background-color: #eb900970 !important;
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
                                    include('../koneksi.php');
                                    $id_user = $_SESSION['id'];
                                    $profil = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id_user'");
                                    $profil = mysqli_fetch_assoc($profil);
                                    if ($profil['user_foto'] == "") {
                                    ?>
                                    <img src="../gambar/sistem/user.png" class="rounded-circle"
                                        style="width: 50px;height: 50px; object-fit: cover;">
                                    <?php
                                    } else {
                                    ?>
                                    <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="rounded-circle"
                                        style="width: 50px;height: 50px; object-fit: cover;">
                                    <?php
                                    }
                                    ?>
                                    <p class="nama-profile mb-0"><?php echo $_SESSION['nama']; ?> [User]</p>
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-5 mt-2 text-center fs-7 judul-tabel">STATUS PR
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
                                <a class="btn btn-custom-edit btn-sm d-flex justify-content-end align-items-center mx-2"
                                    href="export_statuspr.php">
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
                                        <th class="fs-3 text-center" style="padding: 0 17px;">Tanggal <br> Pengajuan
                                        </th>
                                        <th class="fs-3 text-center" style="padding: 0 10px;">Kode Pengadaan</th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">Nama Barang/Jasa</th>
                                        <th class="fs-3 text-center" style="padding: 0 10px;">Jumlah</th>
                                        <th class="fs-3 text-center" style="padding: 0 15px;">Satuan</th>
                                        <th class="fs-3 text-center" style="padding: 0 40px;">Vendor </th>
                                        <th class="fs-3 text-center" style="padding: 0 15px;">Tanggal <br> Tahap Proses
                                        </th>
                                        <th class="fs-3 text-center" style="padding: 0 25px;">Tahap Proses</th>
                                        <th class="fs-3 text-center" style="padding: 0 10px;">Lama Proses</th>
                                        <th class="fs-3 text-center" style="padding: 0 15px;">Estimasi <br> Penyelesaian
                                        </th>
                                        <th class="fs-3 text-center" style="padding: 0 20px;">Status</th>
                                        <th class="fs-3 text-center" style="padding: 0 50px;">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $kategori = mysqli_query($koneksi, "SELECT * FROM status_pr");
                                    while ($p = mysqli_fetch_array($kategori)) {
                                    ?>
                                    <tr class="fs-2">
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td class="text-center">
                                            <?php echo date('d/m/Y', strtotime($p['statuspr_tanggal_pengajuan'])); ?>
                                        </td>
                                        <td class="text-center"><?php echo $p['statuspr_kode'] ?></td>
                                        <td class="text-center"><?php echo $p['statuspr_nama'] ?></td>
                                        <td class="text-center"><?php echo $p['statuspr_jumlah'] ?></td>
                                        <td class="text-center"><?php echo $p['statuspr_satuan'] ?></td>
                                        <td><?php echo $p['statuspr_vendor'] ?></td>
                                        <td class="text-center">
                                            <?php 
                                            echo ($p['statuspr_tanggal_proses'] == '0000-00-00') ? '-' : date('d/m/Y', strtotime($p['statuspr_tanggal_proses'])); 
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $p['statuspr_tahap'] !== NULL ? $p['statuspr_tahap'] : '-'; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $p['statuspr_lama'] != 0 ? $p['statuspr_lama'] . ' Hari' : '-'; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo date('d/m/Y', strtotime($p['statuspr_estimasi'])); ?>
                                        </td>
                                        <td class="text-center"><?php echo $p['statuspr_status'] ?></td>
                                        <td>
                                            <?php echo $p['statuspr_catatan'] !== NULL ? $p['statuspr_catatan'] : '-'; ?>
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
    fetch('sidebar_user.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('sidebar').innerHTML = data;
        });

    function tambahKategori() {
        window.location.href = 'tambah_status_pr.php';
    }

    function hapusAgenda(id) {
        if (confirm(
                'Apakah anda yakin ingin menghapus data ini? File dan semua yang berhubungan akan dihapus secara permanen.'
            )) {
            fetch(`statuspr_hapus.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Status PR berhasil dihapus');
                        location.reload();
                    } else {
                        alert('Gagal menghapus status PR');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus status PR');
                });
        }
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