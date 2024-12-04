<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "avp_login") {
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

    .judul-tabel {
        font-family: "Varela Round", sans-serif;
    }

    .card-preview {
        background-color: #0e45515c !important;
        color: white !important;
    }

    .form-select option {
        color: black;
    }

    .banyak-data {
        font-family: "Varela Round", sans-serif;
        color: white;
    }

    #searchInput::placeholder {
        color: white;
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
                        <li>
                            <p class="navbar-judul">Administrasi & Pelaporan Penambangan </p>
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-3 text-center fs-7 judul-tabel">DATA ARSIP
                        </h5>
                        <div class="card mb-5 card-preview" style="border-radius: 10px 10px 10px 10px;">
                            <div class=" card-body">
                                <form method="get" action="">
                                    <div class="mb-3">
                                        <label for="grupSearch" class="form-label">Filter Kategori :</label>
                                        <select class="form-select text-white" name="kategori">
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
                                        <button type="submit"
                                            class="btn btn-custom-eye mx-3 text-center justify-content-center"><i
                                                class="ti ti-file-search fs-5"></i>
                                            Cari Data</button>
                                        <button type="button"
                                            class="btn btn-custom-upload mx-3 text-center justify-content-center"
                                            onclick="fetchAllData()">
                                            <i class="ti ti-clear-all fs-5 justify-content-center"></i>Semua
                                            Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- table -->
                        <div class="row mb-3">
                            <div class="col-md-6 banyak-data">
                                <label for="rowsPerPageSelect" class="form-label">Tampilkan:</label>
                                <select id="rowsPerPageSelect" class="form-select text-white"
                                    style="width: auto; display: inline-block;">
                                    <option value="5" style="color: black;">5</option>
                                    <option value="10" selected style="color: black;">10</option>
                                    <option value="15" style="color: black;">15</option>
                                    <option value="20" style="color: black;">20</option>
                                </select>
                                <span> data per halaman</span>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <input type="text" class="form-control text-white me-2" id="searchInput"
                                    placeholder="Cari..." style="max-width: 200px; height: 40px; font-size: .95rem;">
                            </div>
                        </div>

                        <div class="table-responsive products-table" data-simplebar>
                            <table class="table table-bordered text-nowrap mb-0 align-middle table-hover">
                                <thead class="fs-4">
                                    <tr class="text-center">
                                        <th class="fs-3" style="width: 5%;">No</th>
                                        <th class="fs-3" style="width: 10%;">Waktu Upload</th>
                                        <th class="fs-3" style="width: 25%;">Arsip</th>
                                        <th class="fs-3" style="width: 15%;">Kategori</th>
                                        <th class="fs-3" style="width: 15%;">Status</th>
                                        <th class="fs-3" style="width: 15%;">Petugas</th>
                                        <th class="fs-3" style="width: 25%;">Keterangan</th>
                                        <th class="fs-3" style="width: 5%;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (isset($_GET['kategori'])) {
                                        $kategori = $_GET['kategori'];
                                        $arsip = mysqli_query($koneksi, "SELECT arsip.*, kategori.kategori_nama, status_arsip.status_nama, admin.admin_nama, petugas.petugas_nama 
                                            FROM arsip 
                                            LEFT JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id 
                                            LEFT JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                            LEFT JOIN admin ON arsip.arsip_admin = admin.admin_id 
                                            LEFT JOIN petugas ON arsip.arsip_petugas = petugas.petugas_id 
                                            WHERE arsip_kategori='$kategori'
                                            ORDER BY arsip.arsip_id DESC");
                                    } else {
                                        $arsip = mysqli_query($koneksi, "SELECT arsip.*, kategori.kategori_nama, status_arsip.status_nama, admin.admin_nama, petugas.petugas_nama 
                                            FROM arsip 
                                            LEFT JOIN kategori ON arsip.arsip_kategori = kategori.kategori_id 
                                            LEFT JOIN status_arsip ON arsip.arsip_status = status_arsip.status_id 
                                            LEFT JOIN admin ON arsip.arsip_admin = admin.admin_id 
                                            LEFT JOIN petugas ON arsip.arsip_petugas = petugas.petugas_id 
                                            ORDER BY arsip.arsip_id DESC");
                                    }
                                    while ($p = mysqli_fetch_array($arsip)) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td class="text-center">
                                            <div><?php echo date('d M Y', strtotime($p['arsip_waktu_upload'])); ?></div>
                                            <div><?php echo date('H:i:s', strtotime($p['arsip_waktu_upload'])); ?></div>
                                        </td>
                                        <td>
                                            <b>KODE</b> : <?php echo $p['arsip_kode'] ?><br>
                                            <b>Nama</b> : <?php echo $p['arsip_nama'] ?><br>
                                            <b>Jenis</b> : <?php echo $p['arsip_jenis'] ?><br>
                                        </td>
                                        <td class="text-center"><?php echo $p['kategori_nama'] ?></td>
                                        <td class="text-center"><?php echo $p['status_nama'] ?></td>
                                        <td class="text-center">
                                            <?php
                                                if ($p['arsip_petugas'] != 0) {
                                                    echo $p['petugas_nama'];
                                                } else {
                                                    echo $p['admin_nama'];
                                                }
                                                ?>
                                        </td>
                                        <td class="text-center"><?php echo $p['arsip_keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <!-- <a target="_blank" class="btn btn-default" href="../arsip/<?php echo $p['arsip_file']; ?>"><i class="fa fa-download"></i></a> -->
                                                <a target="_blank" class="btn btn-custom-edit btn-sm"
                                                    href="arsip_download.php?id=<?php echo $p['arsip_id']; ?>"
                                                    download><i class="ti ti-download fs-7"></i></a>
                                                <a target="_blank"
                                                    href="arsip_preview.php?id=<?php echo $p['arsip_id']; ?>"
                                                    class="btn btn-custom-eye btn-sm text-center d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-eye fs-7 me-1"></i>
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
    fetch('sidebar_avp.php')
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