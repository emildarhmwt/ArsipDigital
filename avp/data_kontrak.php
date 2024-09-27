<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "avp_login") {
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
                        <h5 class="card-title fw-semibold mb-4">Data Arsip</h5>
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

                                <center>
                                    <?php
                                    if (isset($_GET['alert'])) {
                                        if ($_GET['alert'] == "gagal") {
                                    ?>
                                    <div class="alert alert-danger">File arsip gagal diupload. Krena demi keamanan file
                                        .php tidak diperbolehkan.</div>
                                    <?php
                                        } elseif ($_GET['alert'] == "doc1_id_missing") {
                                        ?>
                                    <div class="alert alert-danger">ID dokumen 1 tidak ditemukan. Silakan periksa
                                        kembali.</div>
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
                                                <th class="fs-3">No</th>
                                                <th class="fs-3">Waktu Upload</th>
                                                <th class="fs-3">Nama Berkas</th>
                                                <th class="fs-3">Petugas</th>
                                                <th class="fs-3">Keterangan</th>
                                                <th class="fs-3">Status</th>
                                                <th class="fs-3">File</th>
                                                <th class="fs-3">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $arsip = mysqli_query($koneksi, "SELECT  doc2.*, doc3.*, user_pks.* 
                                            FROM doc3 
                                            JOIN doc2 ON doc2.doc2_id = doc3.doc3_doc2_id 
                                            JOIN user_pks ON doc3.doc3_petugas = user_pks.pks_id
                                            ORDER BY doc3.doc3_id DESC");

                                            $previous_doc1_id = null; // Menyimpan ID dokumen sebelumnya

                                            while ($p = mysqli_fetch_array($arsip)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date('H:i:s  d-m-Y', strtotime($p['doc3_waktu_upload'])) ?>
                                                </td>
                                                <td>
                                                    <b>KODE</b> : <?php echo $p['doc3_kode'] ?><br>
                                                    <b>Nama Doc Pendukung </b> : <?php echo $p['doc2_nama'] ?><br>
                                                    <b>Nama Doc Kontrak </b> : <?php echo $p['doc3_nama'] ?><br>
                                                    <b>Jenis</b> : <?php echo $p['doc3_jenis'] ?><br>
                                                </td>
                                                <td><?php echo $p['pks_nama'] ?></td>
                                                <td><?php echo $p['doc3_ket'] ?></td>
                                                <td>
                                                    <?php echo $p['doc3_status']; ?>
                                                    <?php if (in_array($p['doc3_status'], ['Rejected(AVP)', 'Rejected(VP)', 'Rejected(GM)'])): ?>
                                                    <span>(<?php echo $p['doc3_alasan_reject']; ?>)</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a target="_blank" class="btn btn-default btn-sm"
                                                        href="#?id=<?php echo $p['doc2_file']; ?>">
                                                        <i class="ti ti-download fs-7"></i>
                                                    </a>
                                                    <a href="hapus_dp.php?id=<?php echo $p['doc2_id']; ?>"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                                                </td>
                                                <td>
                                                    <?php if ($p['doc3_doc2_id'] != $previous_doc1_id) { // Cek jika ID dokumen berbeda 
                                                        ?>
                                                    <?php if ($p['doc3_status'] != 'Approve(VP)' && $p['doc3_status'] != 'Rejected(AVP)' && $p['doc3_status'] != 'Rejected(VP)' && $p['doc3_status'] != 'Rejected(GM)' && $p['doc3_status'] != 'Done') { ?>
                                                    <a href="confirm_kontrak.php?id=<?php echo $p['doc3_id']; ?>"
                                                        class="btn btn-success">Approve</a>
                                                    <button class="btn btn-danger"
                                                        onclick="openRejectModal(<?php echo $p['doc3_id']; ?>)">Reject</button>
                                                    <?php } else { ?>
                                                    <button class="btn btn-success" disabled>Approved</button>
                                                    <button class="btn btn-danger" disabled>Rejected</button>
                                                    <?php } ?>
                                                    <?php $previous_doc1_id = $p['doc3_doc2_id']; // Simpan ID dokumen saat ini 
                                                            ?>
                                                    <?php } else { ?>
                                                    <!-- Kosongkan opsi jika ID dokumen sama -->
                                                    <?php } ?>
                                                </td>
                                            </tr><!-- Modal Reject -->
                                            <div class="modal" id="rejectModal<?php echo $p['doc3_id']; ?>"
                                                style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 500px;">
                                                <div class="modal-content" style="padding: 10px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Alasan Penolakan</h5>
                                                        <button type="button" class="close"
                                                            onclick="closeRejectModal(<?php echo $p['doc3_id']; ?>)">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="reject_kontrak.php?id=<?php echo $p['doc3_id']; ?>">
                                                            <div class="mb-3">
                                                                <label for="alasan" class="form-label">Masukkan
                                                                    Alasan</label>
                                                                <textarea name="alasan" class="form-control" required
                                                                    style="height: 80px;"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="closeRejectModal(<?php echo $p['doc3_id']; ?>)">Batal</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Reject -->
                                            <div class="modal" id="rejectModal<?php echo $p['doc3_id']; ?>"
                                                style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 500px;">
                                                <div class="modal-content" style="padding: 10px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Alasan Penolakan</h5>
                                                        <button type="button" class="close"
                                                            onclick="closeRejectModal(<?php echo $p['doc3_id']; ?>)">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="reject_kontrak.php?id=<?php echo $p['doc3_id']; ?>">
                                                            <div class="mb-3">
                                                                <label for="alasan" class="form-label">Masukkan
                                                                    Alasan</label>
                                                                <textarea name="alasan" class="form-control" required
                                                                    style="height: 80px;"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="closeRejectModal(<?php echo $p['doc3_id']; ?>)">Batal</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

    function openRejectModal(id) {
        document.getElementById('rejectModal' + id).style.display = 'block';
    }

    function closeRejectModal(id) {
        document.getElementById('rejectModal' + id).style.display = 'none';
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