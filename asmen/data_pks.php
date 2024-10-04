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
        href="https://fonts.googleapis.com/css2?family=Acme&family=Coiny&family=Concert+One&family=Outfit:wght@100..900&family=Pacifico&family=Playpen+Sans:wght@100..800&family=Playwrite+DE+Grund:wght@100..400&family=Righteous&family=Sacramento&family=Varela+Round&family=Yatra+One&display=swap"
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
        background-color: #eb9009 !important;

        color: white !important;
        cursor: pointer;
    }

    .btn-custom:hover {
        background-color: #eb900970 !important;
        color: white !important;
    }

    .pilihan-doc a {
        cursor: pointer;
        color: grey;
        font-weight: bold;
        text-decoration: none;
        font-family: "Varela Round", sans-serif;
        font-size: 15px;
    }

    .pilihan-doc-kajian a {
        color: white;
        text-decoration: underline;
        font-family: "Varela Round", sans-serif;
        font-size: 15px;
    }

    .outfit {
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    .judul-sidebar {
        font-family: "Outfit", sans-serif;
        font-size: 25px;
        color: white;
    }

    .varela-round-regular {
        font-family: "Varela Round", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .nama-profile {
        color: #912005;
        font-family: "Varela Round", sans-serif;
        font-size: 20px;
    }

    .judul-tabel {
        font-family: "Varela Round", sans-serif;
    }

    .pilihan_dokumen {
        font-family: "Varela Round", sans-serif;
        color: white;
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

    /* .nama-profile2 {
        color: #912005;
        font-family: "Varela Round", sans-serif;
        font-size: 15px;
    } */
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
                                    <div>
                                        <p class="nama-profile mb-0"><?php echo htmlspecialchars($_SESSION['nama']); ?>
                                            [ASMEN]
                                        </p>
                                        <!-- <span class="nama-profile2" style=" margin-top: -50px; display:
                                            block;">[ASMEN]</span> -->
                                    </div>
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
                        <h5 class="card-title fw-semibold mb-5 mt-2 text-center fs-7 judul-tabel">DOKUMEN KONTRAK PKS
                        </h5>
                        <div class="row text-center justify-content-center pilihan-doc mb-5">
                            <div class="col-lg-4 border-end pilihan-doc-kajian pilihan_dokumen">
                                <a href="data_pks.php"> Doc Kajian</a>
                            </div>
                            <div class="col-lg-4 border-end">
                                <a href="data_kak_hps.php">Doc KAK & HPS</a>
                            </div>
                            <div class="col-lg-4">
                                <a href="data_kontrak.php"> Doc Kontrak</a>
                            </div>
                        </div>
                        <!-- table -->
                        <div class="row mb-3">
                            <div class="col-md-6 banyak-data">
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
                                <input type="text" class="form-control text-white me-2" id="searchInput"
                                    placeholder="Cari..." style="max-width: 200px; height: 40px; font-size: .95rem;">
                                <button type="button" class="btn btn-custom"
                                    style="height: 40px; padding: 0 .5rem; font-size: .95rem;" onclick="tambahArsip()">
                                    <i class="ti ti-plus fs-5"></i>Create
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
                                <thead class="fs-4 text-center align-middle">
                                    <tr>
                                        <th class="fs-3" style="width: 5%;">No</th>
                                        <th class="fs-3" style="width: 10%;">Nama Permintaan</th>
                                        <th class="fs-3" style="width: 10%;">Pelaku saat ini</th>
                                        <th class="fs-3" style="width: 10%;">&nbsp&nbsp&nbsp Prioritas
                                            &nbsp&nbsp&nbsp
                                        </th>
                                        <th class="fs-3 text-center" style="width: 15%;">&nbsp&nbsp&nbsp Tanggal
                                            &nbsp&nbsp&nbsp
                                            <br>
                                            &nbsp&nbsp&nbsp Dibutuhkan &nbsp&nbsp&nbsp
                                        <th class="fs-3 text-center" style="width: 10%;">&nbsp&nbsp Last Update
                                            &nbsp &nbsp
                                        </th>
                                        <th class="fs-3 text-center" style="width: 10%;">Proses <br> Doc Kajian
                                        </th>
                                        <th class="fs-3 text-center" style="width: 10%;">Proses <br> Doc KAK&HPS
                                        </th>
                                        <th class="fs-3 text-center" style="width: 15%;">Proses <br> Doc Kontrak
                                        </th>
                                        <th class="fs-3">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $no = 1;
                                    include '../koneksi.php';
                                    // Perbaiki query untuk menghindari status "Rejected (AVP)"
                                    $arsip = mysqli_query($koneksi, "
                                            SELECT dockajian.*, 
                                            user_pks.pks_nama AS petugas_nama, user_pks2.pks_nama AS avp_nama, user_pks3.pks_nama AS vp_nama, user_pks4.pks_nama AS gm_nama, 
                                            doc_kak_hps.dockh_status_gm AS status_gm, 
                                            doc_kak_hps.dockh_status_vp AS status_vp, 
                                            doc_kak_hps.dockh_status_avp AS status_avp, 
                                            doc_kak_hps.dockh_status_asmen AS status_asmen,
                                            doc_kontrak.dockt_status_gm AS kontrak_status_gm, 
                                            doc_kontrak.dockt_status_vp AS kontrak_status_vp, 
                                            doc_kontrak.dockt_status_avp AS kontrak_status_avp, 
                                            doc_kontrak.dockt_status_asmen AS kontrak_status_asmen
                                            FROM dockajian 
                                            JOIN user_pks ON dockajian.dock_petugas = user_pks.pks_id 
                                            LEFT JOIN user_pks AS user_pks2 ON dockajian.dock_avp = user_pks2.pks_id 
                                            LEFT JOIN user_pks AS user_pks3 ON dockajian.dock_vp = user_pks3.pks_id 
                                            LEFT JOIN user_pks AS user_pks4 ON dockajian.dock_gm = user_pks4.pks_id
                                            LEFT JOIN doc_kak_hps ON dockajian.dock_id = doc_kak_hps.dockh_dock_id
                                            LEFT JOIN doc_kontrak ON dockajian.dock_id = doc_kontrak.dockt_dock_id
                                            ORDER BY dockajian.dock_tanggal DESC
                                            ");

                                    if (!$arsip) {
                                        die("Query Error: " . mysqli_error($koneksi));
                                    }
                                    while ($p = mysqli_fetch_assoc($arsip)) {

                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p['dock_nama'] ?></td>
                                        <td><?php
                                                if (!empty($p['gm_nama'])) {
                                                    echo $p['gm_nama'];
                                                } elseif (!empty($p['vp_nama'])) {
                                                    echo $p['vp_nama'];
                                                } elseif (!empty($p['avp_nama'])) {
                                                    echo $p['avp_nama'];
                                                } else {
                                                    echo $p['petugas_nama'];
                                                }
                                                ?></td>
                                        <td><?php echo $p['dock_kategori'] ?></td>
                                        <td><?php echo date('d M Y', strtotime($p['dock_tanggal'])); ?>
                                        <td>
                                            <?php
                                                if (!empty($p['dock_waktu_gm'])) {
                                                    $dock_waktu = date('H:i:s', strtotime($p['dock_waktu_gm']));
                                                    $tanggal = date('d M Y', strtotime($p['dock_waktu_gm']));
                                                    echo $dock_waktu . '<br>' . $tanggal;
                                                } elseif (!empty($p['dock_waktu_vp'])) {
                                                    $dock_waktu = date('H:i:s', strtotime($p['dock_waktu_vp']));
                                                    $tanggal = date('d M Y', strtotime($p['dock_waktu_vp']));
                                                    echo $dock_waktu . '<br>' . $tanggal;
                                                } elseif (!empty($p['dock_waktu_avp'])) {
                                                    $dock_waktu = date('H:i:s', strtotime($p['dock_waktu_avp']));
                                                    $tanggal = date('d M Y', strtotime($p['dock_waktu_avp']));
                                                    echo $dock_waktu . '<br>' . $tanggal;
                                                } elseif (!empty($p['dock_waktu_asmen'])) {
                                                    $dock_waktu_asmen = date('H:i:s', strtotime($p['dock_waktu_asmen']));
                                                    $tanggal_asmen = date('d M Y', strtotime($p['dock_waktu_asmen']));
                                                    echo $dock_waktu_asmen . '<br>' . $tanggal_asmen;
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                        </td>
                                        <td>
                                            <?php
                                                if (!empty($p['dock_status_gm'])) {
                                                    echo $p['dock_status_gm'];
                                                } elseif (!empty($p['dock_status_vp'])) {
                                                    echo $p['dock_status_vp'];
                                                } elseif (!empty($p['dock_status_avp'])) {
                                                    echo $p['dock_status_avp'];
                                                } else {
                                                    echo $p['dock_status_asmen'];
                                                }
                                                ?>
                                        </td>
                                        <td>
                                            <?php
                                                if (!empty($p['status_gm'])) {
                                                    echo $p['status_gm'];
                                                } elseif (!empty($p['status_vp'])) {
                                                    echo $p['status_vp'];
                                                } elseif (!empty($p['status_avp'])) {
                                                    echo $p['status_avp'];
                                                } elseif (!empty($p['status_asmen'])) {
                                                    echo $p['status_asmen'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                        </td>
                                        <td>
                                            <?php
                                                if (!empty($p['kontrak_status_gm'])) {
                                                    echo $p['kontrak_status_gm'];
                                                } elseif (!empty($p['kontrak_status_vp'])) {
                                                    echo $p['kontrak_status_vp'];
                                                } elseif (!empty($p['kontrak_status_avp'])) {
                                                    echo $p['kontrak_status_avp'];
                                                } elseif (!empty($p['kontrak_status_asmen'])) {
                                                    echo $p['kontrak_status_asmen'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a target="_blank" class="btn btn-custom-eye btn-sm"
                                                    href="preview_kajian.php?id=<?php echo $p['dock_id']; ?>"><i
                                                        class="ti ti-eye fs-5"></i></a>
                                                <?php if (($p['dock_status_avp'] == 'Rejected (AVP)' or $p['dock_status_vp'] == 'Rejected (VP)' or $p['dock_status_gm'] === 'Rejected (GM)')): ?>
                                                <a href="edit_dk.php?id=<?php echo $p['dock_id']; ?>"
                                                    class="btn btn-custom-edit btn-sm text-center d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-pencil fs-5"></i>
                                                </a>
                                                <?php endif; ?>
                                                <?php if (in_array($p['dock_status_gm'], ['Done'])): ?>
                                                <a href="tambah_kak_hps.php?id=<?php echo $p['dock_id']; ?>"
                                                    class="btn btn-custom-upload btn-sm text-center d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-upload fs-5"></i>
                                                </a>
                                                <?php endif; ?>
                                            </div>
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
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>