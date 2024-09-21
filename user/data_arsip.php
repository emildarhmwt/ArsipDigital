<?php 
    include '../koneksi.php';
    session_start();
    if($_SESSION['status'] != "user_login"){
        header("location:../login.php?alert=belum_login");
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
    <style>
    #grup,
    #lokasi {
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
    }
    </style>
</head>

<body>
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
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)"
                                    id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle me-2">
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
                        <h5 class="card-title fw-semibold mb-4">Data Arsip</h5>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="get" action="">
                                    <div class="mb-3">
                                        <label for="grupSearch" class="form-label">Filter Kategori</label>
                                        <select class="form-select" name="kategori">
                                            <option selected disabled>Pilih Kategori</option>
                                            <?php
                                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                            while ($k = mysqli_fetch_array($kategori)) {
                                            ?>
                                            <option <?php if (isset($_GET['kategori'])) {
                                                        if ($_GET['kategori'] == $k['kategori_id']) {
                                                            echo "selected='selected'";
                                                        }
                                                    } ?> value="<?php echo $k['kategori_id']; ?>">
                                                <?php echo $k['kategori_nama']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mx-3"><i class="bi bi-search"></i>
                                            Search Data</button>
                                        <button type="button" class="btn btn-primary mx-3" onclick="fetchAllData()">All
                                            Data</button>
                                    </div>
                                </form>
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
                                    </div>
                                </div>

                                <div class="table-responsive products-table" data-simplebar>
                                    <table class="table table-bordered text-nowrap mb-0 align-middle table-hover">
                                        <thead class="fs-4">
                                            <tr>
                                                <th class="fs-3" style="width: 5%;">No</th>
                                                <th class="fs-3">Waktu Upload</th>
                                                <th class="fs-3">Arsip</th>
                                                <th class="fs-3">Kategori</th>
                                                <th class="fs-3">Petugas</th>
                                                <th class="fs-3">Keterangan</th>
                                                <th class="fs-3">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            if (isset($_GET['kategori'])) {
                                                $kategori = $_GET['kategori'];
                                                $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_kategori='$kategori' ORDER BY arsip_id DESC");
                                            } else {
                                                $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id ORDER BY arsip_id DESC");
                                            }
                                            while ($p = mysqli_fetch_array($arsip)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date('H:i:s  d-m-Y', strtotime($p['arsip_waktu_upload'])) ?>
                                                </td>
                                                <td>
                                                    <b>KODE</b> : <?php echo $p['arsip_kode'] ?><br>
                                                    <b>Nama</b> : <?php echo $p['arsip_nama'] ?><br>
                                                    <b>Jenis</b> : <?php echo $p['arsip_jenis'] ?><br>
                                                </td>
                                                <td><?php echo $p['kategori_nama'] ?></td>
                                                <td><?php echo $p['petugas_nama'] ?></td>
                                                <td><?php echo $p['arsip_keterangan'] ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <!-- <a target="_blank" class="btn btn-default" href="../arsip/<?php echo $p['arsip_file']; ?>"><i class="fa fa-download"></i></a> -->
                                                        <a target="_blank" class="btn btn-default"
                                                            href="arsip_download.php?id=<?php echo $p['arsip_id']; ?>"><i
                                                                class="ti ti-download fs-7"></i></a>
                                                        <a target="_blank"
                                                            href="arsip_preview.php?id=<?php echo $p['arsip_id']; ?>"
                                                            class="btn btn-default text-center d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-eye fs-7 me-1"></i>
                                                            <span>Preview</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-3" id="paginationContainer">
                                        <!-- Pagination items will be added here by JavaScript -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
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

    function fetchAllData() {
        document.querySelector('select[name="kategori"]').value = '';
        window.location.href = window.location.pathname;
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