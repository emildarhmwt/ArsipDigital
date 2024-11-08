<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "asmen_login") {
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
        background-color: #7c1919 !important;
        color: white !important;
    }

    .btn-custom-back:hover {
        background-color: #b27373 !important;
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
                        <?php
                        $no = 1;
                        include '../koneksi.php';
                        // Perbaiki query untuk menggunakan alias yang benar
                        $arsip = mysqli_query($koneksi, "
                            SELECT doc_kontrak.*, doc_kak_hps.* 
                            FROM doc_kontrak 
                            JOIN user_pks ON dockt_petugas=pks_id 
                            LEFT JOIN doc_kak_hps ON doc_kontrak.dockt_dock_id = doc_kak_hps.dockh_dock_id 
                            WHERE dockt_dock_id = '$id' 
                            ORDER BY dockt_dock_id DESC
                        ");
                        while ($p = mysqli_fetch_assoc($arsip)) { 
                        ?>
                        <!-- <div class="row"> -->
                        <div class="card card-preview" style="border-radius: 10px 10px 10px 10px;">
                            <div class="card-header" style="background-color: #0e4551; width: 100%;">
                                Header
                            </div>
                            <div class="card-body">
                                <form method="get" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Nama Permintaan :</label>
                                            <p>
                                                <td><?php echo $p['dockt_nama'] ?></td>
                                            </p>

                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Deskripsi Permintaan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dockt_desk'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Jenis Permintaan :</label>
                                            <p>
                                                <td><?php echo $p['dockt_jenis'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Kategori Permintaan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dockt_kategori'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Aspek K3/Lingkungan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dockt_aspek'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Lokasi Penyerahan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dockt_lokasi'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Tanggal Dibutuhkan
                                                :</span>
                                            </label>
                                            <p>
                                                <td><?php echo date('d M Y', strtotime($p['dockt_tanggal'])); ?>
                                                </td>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card card-preview">
                            <div class="card-header" style="background-color: #0e4551; width: 100%;">
                                Requisition Item
                            </div>
                            <div class="card-body">
                                <form method="get" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Cost Center :</label>
                                            <p>
                                                <td><?php echo $p['dockh_cost'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Satuan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dockh_satuan'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Harga Satuan :</label>
                                            <p>
                                                <td><?php echo $p['dockh_harga'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Jumlah (qty) :</label>
                                            <p>
                                                <td><?php echo $p['dockh_jumlah'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <label for="shift" class="form-label">Harga Total :</label>
                                            <p>
                                                <td><?php echo $p['dockh_harga_total'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card card-preview">
                            <div class="card-header" style="background-color: #0e4551; width: 100%;">
                                Komentar
                            </div>
                            <div class="card-body">
                                <form method="get" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label for="shift" class="form-label">Komentar :</label>
                                            <p style="text-align: justify;">
                                                <td><?php echo $p['dockt_comment'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        }
                            ?>
                        <!-- </div> -->

                        <div class="row text-center justify-content-center d-flex align-items-center"
                            style="border-radius: 10px; height: 50px;">
                            <?php
                                $no = 1;
                                include '../koneksi.php';
                                // Perbaiki query untuk menggunakan alias yang benar
                                $arsip = mysqli_query($koneksi, "SELECT dockajian.*, doc_kak_hps.dockh_dock_id, doc_kontrak.dockt_dock_id FROM dockajian LEFT JOIN doc_kak_hps ON dockajian.dock_id = doc_kak_hps.dockh_dock_id LEFT JOIN doc_kontrak ON dockajian.dock_id = doc_kontrak.dockt_dock_id WHERE dockajian.dock_id = '$id' ORDER BY dockajian.dock_id DESC");
                                while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                ?>
                            <div class="col-lg-4 border d-flex justify-content-center align-items-center"
                                style="border-radius: 10px; height: 48px; width:31%; margin-right:10px;">
                                <a href="preview_kajian.php?id=<?php echo $id; ?>" style="color:white;"> Doc Kajian
                                </a>
                            </div>
                            <div class=" col-lg-4 border d-flex justify-content-center
                                align-items-center"
                                style="border-radius: 10px; height: 48px; width:31%; margin-right:10px;">
                                <?php
                                        // Pastikan dockh_id ada di array $p
                                        $id_dockh = isset($p['dockh_dock_id']) ? $p['dockh_dock_id'] : null; // Menggunakan null jika tidak ada
                                        if ($id_dockh) {
                                        ?>
                                <a href="preview_dp.php?id=<?php echo $id_dockh; ?>" style="color:white;"> Doc KAK &
                                    HPS
                                </a>
                                <?php
                                        } else {
                                        ?>
                                <span>Doc KAK & HPS tidak tersedia</span>
                                <?php
                                        }
                                        ?>
                            </div>
                            <div class=" col-lg-4 d-flex justify-content-center border
                                align-items-center"
                                style="border-radius: 10px; height: 48px; width:31%; margin-right:10px; background-color: #0e4551;">
                                <a href="preview_kontrak.php?id=<?php echo $id; ?>" style="color:white;"> Doc
                                    Kontrak
                                </a>
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
                                        $arsip = mysqli_query($koneksi, "SELECT doc_kontrak.*  FROM doc_kontrak WHERE dockt_dock_id = '$id' ORDER BY dockt_dock_id DESC");
                                        while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                        ?>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dockt_status_asmen'] == 'Uploaded (Asmen)') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dockt_status_avp'] == 'Approved (AVP)') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dockt_status_vp'] == 'Approved (VP)') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div
                                            class="timeline-dot <?php echo ($p['dockt_status_gm'] == 'Done') ? 'bg-blue' : 'bg-gray'; ?>">
                                        </div>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-center">
                                        <p>Uploaded (Asmen)</p>
                                    </div>
                                    <div class="text-center">
                                        <p>Approve(AVP)</p>
                                    </div>
                                    <div class="text-center">
                                        <p>Approve(VP)</p>
                                    </div>
                                    <div class="text-center">
                                        <p>Done </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            $no = 1;
                            include '../koneksi.php';
                            // Perbaiki query untuk menggunakan alias yang benar
                            $arsip = mysqli_query($koneksi, "SELECT * FROM doc_kontrak JOIN user_pks ON dockt_petugas=pks_id WHERE dockt_dock_id = '$id' ORDER BY dockt_dock_id DESC");
                            while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                            ?>
                        <div class="row mb-4 mt-4">
                            <div class="col-md-12 d-flex justify-content-end align-items-center">
                                <a target="_blank"
                                    class="btn btn-custom-review btn-sm d-flex justify-content-end align-items-center""
                                            href=" ../berkas_pks/<?php echo $p['dockt_file']; ?>">
                                    <i class="ti ti-eye fs-7 mx-1"></i> Review Dokumen
                                </a>
                                <a class="btn btn-custom-back btn-sm d-flex justify-content-end align-items-center mx-2"
                                    href="data_kontrak.php">
                                    <i class="ti ti-arrow-narrow-left fs-7"></i></i> Kembali
                                </a>
                            </div>
                            <?php
                            }
                                ?>
                        </div>
                        <div class="table-responsive products-table border-bottom" data-simplebar>
                            <?php
                                    $no = 1;
                                    include '../koneksi.php';
                                    // Perbaiki query untuk menggunakan alias yang benar
                                    $arsip = mysqli_query($koneksi, "
                                            SELECT doc_kontrak.*, user_pks.pks_nama AS petugas_nama, user_pks2.pks_nama AS avp_nama, user_pks3.pks_nama AS vp_nama, user_pks4.pks_nama AS gm_nama
                                            FROM doc_kontrak
                                            JOIN user_pks ON doc_kontrak.dockt_petugas = user_pks.pks_id 
                                            LEFT JOIN user_pks AS user_pks2 ON doc_kontrak.dockt_avp = user_pks2.pks_id 
                                            LEFT JOIN user_pks AS user_pks3 ON doc_kontrak.dockt_vp = user_pks3.pks_id 
                                            LEFT JOIN user_pks AS user_pks4 ON doc_kontrak.dockt_gm = user_pks4.pks_id
                                            WHERE dockt_dock_id = '$id' 
                                            ORDER BY dockt_dock_id DESC
                                        ");
                                    while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                                    ?>
                            <table class="table table-bordered text-nowrap mb-0 align-middle table-hover">
                                <thead class="fs-4">
                                    <tr>
                                        <th class="fs-3" style="width: 5%;">No</th>
                                        <th class="fs-3">Nama Permintaan</th>
                                        <th class="fs-3">Updated</th>
                                        <th class="fs-3">Pelaku saat ini</th>
                                        <th class="fs-3">Proses</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p['dockt_nama'] ?></td>
                                        <td><?php echo date('d M Y H:i:s', strtotime($p['dockt_waktu_asmen'])) ?>
                                        </td>
                                        <td><?php echo $p['petugas_nama'] ?></td>
                                        <td> <?php echo $p['dockt_status_asmen']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p['dockt_nama'] ?></td>
                                        <td><?php echo ($p['dockt_waktu_avp']) ? date('d M Y H:i:s', strtotime($p['dockt_waktu_avp'])) : '-' ?>
                                        </td>
                                        <td><?php echo !empty($p['avp_nama']) ? $p['avp_nama'] : '-'; ?>
                                        </td>
                                        <td>
                                            <?php echo !empty($p['dockt_status_avp']) ? $p['dockt_status_avp'] : '-'; ?>
                                            <?php if ($p['dockt_status_avp'] == 'Rejected (AVP)'): ?>
                                            <span>(<?php echo $p['dockt_alasan_reject']; ?>)</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p['dockt_nama'] ?></td>
                                        <td><?php echo ($p['dockt_waktu_vp']) ? date('d M Y H:i:s', strtotime($p['dockt_waktu_vp'])) : '-' ?>
                                        </td>
                                        <td><?php echo !empty($p['vp_nama']) ? $p['vp_nama'] : '-'; ?></td>
                                        <td>
                                            <?php echo !empty($p['dockt_status_vp']) ? $p['dockt_status_vp'] : '-'; ?>
                                            <?php if ($p['dockt_status_vp'] == 'Rejected (VP)'): ?>
                                            <span>(<?php echo $p['dockt_alasan_reject']; ?>)</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $p['dockt_nama'] ?></td>
                                        <td><?php echo ($p['dockt_waktu_gm']) ? date('d M Y H:i:s', strtotime($p['dockt_waktu_gm'])) : '-' ?>
                                        </td>
                                        <td><?php echo !empty($p['gm_nama']) ? $p['gm_nama'] : '-'; ?></td>
                                        <td>
                                            <?php echo !empty($p['dockt_status_gm']) ? $p['dockt_status_gm'] : '-'; ?>
                                            <?php if ($p['dockt_status_vp'] == 'Rejected (GM)'): ?>
                                            <span>(<?php echo $p['dockt_alasan_reject']; ?>)</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <?php
                                    }
                                    ?>
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
    </script>
    <script src=" ../assets/libs/jquery/dist/jquery.min.js"> </script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>