<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "avp_login") {
    header("location:../login/loginuser.php?alert=belum_login");
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : 0;
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
                        <h5 class="card-title fw-semibold mb-4">Preview Dokumen Kajian</h5>
                        <?php
                        $no = 1;
                        include '../koneksi.php';
                        // Perbaiki query untuk menggunakan alias yang benar
                        $arsip = mysqli_query($koneksi, "
                        SELECT dockajian.*, user_pks.pks_nama AS petugas_nama, user_pks2.pks_nama AS avp_nama 
                        FROM dockajian 
                        JOIN user_pks ON dockajian.dock_petugas = user_pks.pks_id 
                        LEFT JOIN user_pks AS user_pks2 ON dockajian.dock_avp = user_pks2.pks_id 
                        WHERE dock_id = '$id' 
                        ORDER BY dock_id DESC
                    ");
                        while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                        ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form method="get" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Nama Permintaan :</label>
                                                <p>
                                                    <td><?php echo $p['dock_nama'] ?></td>
                                                </p>

                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Deskripsi Permintaan
                                                    :</label>
                                                <p>
                                                    <td><?php echo $p['dock_desk'] ?></td>
                                                </p>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Jenis Permintaan :</label>
                                                <p>
                                                    <td><?php echo $p['dock_jenis'] ?></td>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Kategori Permintaan
                                                    :</label>
                                                <p>
                                                    <td><?php echo $p['dock_kategori'] ?></td>
                                                </p>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Aspek K3/Lingkungan
                                                    :</label>
                                                <p>
                                                    <td><?php echo $p['dock_aspek'] ?></td>
                                                </p>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Lokasi Penyerahan
                                                    :</label>
                                                <p>
                                                    <td><?php echo $p['dock_lokasi'] ?></td>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <label for="shift" class="form-label">Tanggal Dibutuhkan
                                                    :</span>
                                                </label>
                                                <p>
                                                    <td><?php echo date('d M Y', strtotime($p['dock_tanggal'])); ?>
                                                    </td>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <form method="get" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="shift" class="form-label">Komentar :</label>
                                                <p>
                                                    <td><?php echo $p['dock_comment'] ?></td>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                            ?>
                        </div>

                        <div class="row text-center justify-content-center border d-flex border-dark align-items-center"
                            style="border-radius: 10px; height: 50px;">
                            <?php
                                $no = 1;
                                include '../koneksi.php';
                                // Perbaiki query untuk menggunakan alias yang benar
                                 $arsip = mysqli_query($koneksi, "SELECT dockajian.*, doc_kak_hps.dockh_dock_id FROM dockajian LEFT JOIN doc_kak_hps ON dockajian.dock_id = doc_kak_hps.dockh_dock_id WHERE dockajian.dock_id = '$id' ORDER BY dockajian.dock_id DESC");
                                while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                ?>
                            <div class="col-lg-4 border-end d-flex justify-content-center align-items-center <?php echo ($p['dock_status_gm'] == 'Done') ? 'bg-blue' : 'bg-gray'; ?>"
                                style="border-radius: 10px; height: 48px; color:black;">
                                <a href="preview_kajian.php"> Doc Kajian </a>
                            </div>
                            <div class=" col-lg-4 border-end d-flex justify-content-center
                                align-items-center">
                                <?php
                                // Pastikan dockh_id ada di array $p
                                $id_dockh = isset($p['dockh_dock_id']) ? $p['dockh_dock_id'] : null; // Menggunakan null jika tidak ada
                                if ($id_dockh) {
                                ?>
                                <a href="preview_dp.php?id=<?php echo $id_dockh; ?>"> Doc KAK & HPS </a>
                                <?php
                                } else {
                                ?>
                                <span>Doc KAK & HPS tidak tersedia</span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class=" col-lg-4 d-flex justify-content-center
                                align-items-center">
                                Doc Kontrak
                            </div>
                            <?php
                                }
                                ?>
                        </div>

                        <div class="row text-center justify-content-center align-items-center mt-4">
                            <div class="col-lg-12">

                                <div class="timeline">
                                    <?php
                                        $no = 1;
                                        include '../koneksi.php';
                                        // Perbaiki query untuk menggunakan alias yang benar
                                        $arsip = mysqli_query($koneksi, "SELECT dockajian.*  FROM dockajian WHERE dock_id = '$id' ORDER BY dock_id DESC");
                                        while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                        ?>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dock_status_asmen'] == 'Uploaded') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dock_status_avp'] == 'Approved (AVP)') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dock_status_vp'] == 'Approved (VP)') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dock_status_gm'] == 'Done') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <p>Uploaded</p>
                                    </div>
                                    <div class="text-center">
                                        <p>Approve(AVP)</p>
                                    </div>
                                    <div class="text-center">
                                        <p>Approve(VP)</p>
                                    </div>
                                    <div class="text-center">
                                        <p>Done</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $no = 1;
                                    include '../koneksi.php';
                                    // Perbaiki query untuk menggunakan alias yang benar
                                    $arsip = mysqli_query($koneksi, "SELECT * FROM dockajian JOIN user_pks ON dock_petugas=pks_id WHERE dock_id = '$id' ORDER BY dock_id DESC");
                                    while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                    ?>
                                <div class="row mb-3">
                                    <div class="col-md-12 d-flex justify-content-end align-items-center">
                                        <a target="_blank"
                                            class="btn btn-default btn-sm d-flex justify-content-end align-items-center""
                                            href=" ../berkas_pks/<?php echo $p['dock_file']; ?>">
                                            <i class="ti ti-eye fs-7 mx-1"></i> Review Dokumen
                                        </a>
                                        <a class="btn btn-default btn-sm d-flex justify-content-end align-items-center mx-2"
                                            href=" ./data_pks.php">
                                            <i class="ti ti-arrow-narrow-left fs-7"></i></i> Kembali
                                        </a>

                                    </div>
                                    <?php
                                    }
                                        ?>
                                </div>
                                <div class="table-responsive products-table" data-simplebar>
                                    <?php
                                            $no = 1;
                                            include '../koneksi.php';
                                            // Perbaiki query untuk menggunakan alias yang benar
                                            $arsip = mysqli_query($koneksi, "
                                            SELECT dockajian.*, user_pks.pks_nama AS petugas_nama, user_pks2.pks_nama AS avp_nama, user_pks3.pks_nama AS vp_nama, user_pks4.pks_nama AS gm_nama
                                            FROM dockajian 
                                            JOIN user_pks ON dockajian.dock_petugas = user_pks.pks_id 
                                            LEFT JOIN user_pks AS user_pks2 ON dockajian.dock_avp = user_pks2.pks_id 
                                            LEFT JOIN user_pks AS user_pks3 ON dockajian.dock_vp = user_pks3.pks_id 
                                            LEFT JOIN user_pks AS user_pks4 ON dockajian.dock_gm = user_pks4.pks_id
                                            WHERE dock_id = '$id' 
                                            ORDER BY dock_id DESC
                                        ");
                                            while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                            ?>
                                    <table class="table table-bordered text-nowrap mb-0 align-middle table-hover">
                                        <thead class="fs-4">
                                            <tr>
                                                <th class="fs-3" style="width: 5%;">No</th>
                                                <th class="fs-3">Nama Permintaan</th>
                                                <th class="fs-3">Petugas</th>
                                                <th class="fs-3">Status</th>
                                                <!-- <th class="fs-3">Opsi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $p['dock_nama'] ?></td>
                                                <td><?php echo $p['petugas_nama'] ?></td>
                                                <td>
                                                    <?php echo $p['dock_status_asmen']; ?>
                                                    <!-- <?php if (in_array($p['dock_status'], ['Rejected(AVP)', 'Rejected(VP)', 'Rejected(GM)'])): ?>
                                                    <span>(<?php echo $p['doc1_alasan_reject']; ?>)</span>
                                                    <?php endif; ?> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $p['dock_nama'] ?></td>
                                                <td><?php echo !empty($p['avp_nama']) ? $p['avp_nama'] : '-'; ?></td>
                                                <td>
                                                    <?php echo !empty($p['dock_status_avp']) ? $p['dock_status_avp'] : '-'; ?>
                                                    <?php if ($p['dock_status_avp'] == 'Rejected (AVP)'): ?>
                                                    <span>(<?php echo $p['dock_alasan_reject']; ?>)</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $p['dock_nama'] ?></td>
                                                <td><?php echo !empty($p['vp_nama']) ? $p['vp_nama'] : '-'; ?></td>
                                                <td>
                                                    <?php echo !empty($p['dock_status_vp']) ? $p['dock_status_vp'] : '-'; ?>
                                                    <?php if ($p['dock_status_vp'] == 'Rejected (VP)'): ?>
                                                    <span>(<?php echo $p['dock_alasan_reject']; ?>)</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $p['dock_nama'] ?></td>
                                                <td><?php echo !empty($p['gm_nama']) ? $p['gm_nama'] : '-'; ?></td>
                                                <td>
                                                    <?php echo !empty($p['dock_status_gm']) ? $p['dock_status_gm'] : '-'; ?>
                                                    <?php if ($p['dock_status_vp'] == 'Rejected (GM)'): ?>
                                                    <span>(<?php echo $p['dock_alasan_reject']; ?>)</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                            }
                                            ?>
                                </div>
                                <div class="row d-inline-flex mt-3 text-center justify-content-center">
                                    <a class="btn btn-primary d-inline-flex justify-content-center align-items-center mx-2"
                                        href="confirm.php?id=<?php echo $id; ?>"
                                        style="width: auto; padding: 5px 10px;">Approve
                                    </a>
                                    <button
                                        class="btn btn-danger d-inline-flex justify-content-center align-items-center mx-2"
                                        onclick="openRejectModal(<?php echo $id; ?>)"
                                        style="width: auto; padding: 5px 10px;">
                                        Reject
                                    </button>

                                    <div class="modal" id="rejectModal<?php echo $id; ?>"
                                        style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 500px;">
                                        <div class="modal-content" style="padding: 10px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Alasan Penolakan</h5>
                                                <!-- <button type="button" class="close"
                                                    onclick="closeRejectModal(<?php echo $id; ?>)">&times;</button> -->
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="reject.php?id=<?php echo $id; ?>">
                                                    <div class="mb-3">
                                                        <label for="alasan" class="form-label">Masukkan Alasan</label>
                                                        <textarea name="alasan" class="form-control" required
                                                            style="height: 80px;"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="closeRejectModal(<?php echo $id; ?>)">Batal</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </script>
    <script src=" ../assets/libs/jquery/dist/jquery.min.js">
    </script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>