<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "asmen_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
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

    .pilihan-doc a.selected {
        color: black;
        text-decoration: underline;
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Data Arsip</h5>
                        <div class="row text-center justify-content-center pilihan-doc">
                            <div class="col-lg-2">
                                <a href="#"> Semua Doc </a>
                            </div>
                            <div class="col-lg-2">
                                <a href="data_pks.php"> Doc Kajian</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="data_kak_hps.php">Doc KAK & HPS</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="data_kontrak.php"> Doc Kontrak</a>
                            </div>
                            <div class="col-lg-2">
                                <a> Approve </a>
                            </div>
                            <div class="col-lg-2">
                                <a> Reject </a>
                            </div>
                        </div>
                        <!-- table -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="rowsPerPageSelect" class="form-label">Tampilkan:</label>
                                        <select id="rowsPerPageSelect" class="form-select"
                                            style="width: auto; display: inline-block;">
                                            <option value="5">5</option>
                                            <option value="10" selected>10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                        <span> data per halaman</span>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                                        <input type="text" class="form-control me-2" id="searchInput"
                                            placeholder="Cari..."
                                            style="max-width: 200px; height: 40px; font-size: .95rem;">
                                        <button type="button" class="btn btn-custom"
                                            style="height: 40px; padding: 0 .5rem; font-size: .95rem;"
                                            onclick="tambahArsip()">
                                            <i class="ti ti-book-upload fs-5"></i> Create Doc Kajian
                                        </button>
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
                                        <thead class="fs-4">
                                            <tr>
                                                <th class="fs-3" style="width: 5%;">No</th>
                                                <th class="fs-3">Nama Permintaan</th>
                                                <th class="fs-3">Petugas</th>
                                                <th class="fs-3">Prioritas</th>
                                                <th class="fs-3">Tanggal Dibutuhkan</th>
                                                <th class="fs-3">Status</th>
                                                <th class="fs-3">Opsi</th>
                                                <th class="fs-3">Doc KAK & HPS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            include '../koneksi.php';
                                            // Perbaiki query untuk menggunakan alias yang benar
                                            $arsip = mysqli_query($koneksi, "SELECT * FROM doc_kajian JOIN user_pks ON dock_petugas=pks_id ORDER BY dock_id DESC");
                                            while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $p['dock_nama'] ?></td>
                                                <td><?php echo $p['pks_nama'] ?></td>
                                                <td><?php echo $p['dock_kategori'] ?></td>
                                                <td><?php echo date('d M Y', strtotime($p['dock_tanggal'])); ?>
                                                </td>
                                                <td>
                                                    <?php echo $p['dock_status']; ?>
                                                    <?php if (in_array($p['dock_status'], ['Rejected(AVP)', 'Rejected(VP)', 'Rejected(GM)'])): ?>
                                                    <span>(<?php echo $p['doc1_alasan_reject']; ?>)</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a target="_blank" class="btn btn-default btn-sm"
                                                            href="preview_kajian.php?id=<?php echo $p['dock_id']; ?>"><i
                                                                class="ti ti-eye fs-5"></i></a>
                                                        <?php if (in_array($p['dock_status'], ['Rejected(AVP)', 'Rejected(VP)', 'Rejected(GM)'])): ?>
                                                        <a href="edit_dk.php?id=<?php echo $p['dock_id']; ?>"
                                                            class="btn btn-warning btn-sm text-center d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-pencil fs-5"></i>
                                                        </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group-vertical">
                                                        <!-- <a target="_blank" class="btn btn-default" href="../arsip/<?php echo $p['dock_file']; ?>"><i class="fa fa-download"></i></a> -->
                                                        <?php if ($p['dock_status'] === 'Done(Doc1)'): ?>
                                                        <a target="_blank" class="btn btn-primary btn-sm"
                                                            href="tambah_kak_hps.php?doc1_id=<?php echo $p['dock_id']; ?>"><i
                                                                class="ti ti-book-upload fs-5"></i>
                                                            Doc Pendukung
                                                        </a>
                                                        <?php else: ?>
                                                        <span class="btn btn-default btn-sm" disabled> <i
                                                                class="ti ti-book-upload fs-5"></i> Doc
                                                            Pendukung
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            div
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
                        </>
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

        function tambahArsip() {
            window.location.href = 'tambah_dokumen_kajian.php';
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

        const items = document.querySelectorAll('.pilihan-doc a');

        items.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah reload halaman

                // Remove 'selected' class from all items
                items.forEach(el => el.classList.remove('selected'));

                // Add 'selected' class to the clicked item
                this.classList.add('selected');
            });
        });
        </script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>