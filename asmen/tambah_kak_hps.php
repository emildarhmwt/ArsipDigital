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

    .judul-tabel {
        font-family: "Varela Round", sans-serif;
    }

    .card-preview {
        background-color: #0e45515c !important;
        color: white !important;
    }

    input::placeholder {
        color: white !important;
    }

    textarea::placeholder {
        color: white !important;
    }

    .btn-custom-eye {
        background-color: #11475e !important;
        color: white !important;
    }

    .btn-custom-eye:hover {
        background-color: #609fb2 !important;
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
                        <h5 class="card-title fw-semibold mb-3 text-center fs-7 judul-tabel">CREATE DOKUMEN KAK & HPS
                        </h5>
                        <?php
                        $no = 1;
                        include '../koneksi.php';
                        // Perbaiki query untuk menggunakan alias yang benar
                        $arsip = mysqli_query($koneksi, "SELECT * FROM dockajian JOIN user_pks ON dock_petugas=pks_id WHERE dock_id = '$id' ORDER BY dock_id DESC");
                        while ($p = mysqli_fetch_assoc($arsip)) { // Tambahkan loop untuk mengambil data
                        ?>
                        <div class="card card-preview" style="border-radius: 10px 10px 10px 10px;">
                            <div class=" card-header" style="background-color: #0e4551; width: 100%; ">
                                Header
                            </div>
                            <div class="card-body">
                                <form method="get" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4 col-12 mb-3">
                                            <label for="shift" class="form-label">Nama Permintaan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dock_nama'] ?></td>
                                            </p>

                                        </div>
                                        <div class="col-lg-4 col-12 mb-3">
                                            <label for="shift" class="form-label">Deskripsi Permintaan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dock_desk'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-3">
                                            <label for="shift" class="form-label">Jenis Permintaan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dock_jenis'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12 mb-3">
                                            <label for="shift" class="form-label">Kategori Permintaan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dock_kategori'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-3">
                                            <label for="shift" class="form-label">Aspek K3/Lingkungan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dock_aspek'] ?></td>
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-3">
                                            <label for="shift" class="form-label">Lokasi Penyerahan
                                                :</label>
                                            <p>
                                                <td><?php echo $p['dock_lokasi'] ?></td>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12 mb-3">
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
                        <?php
                        }
                            ?>

                        <form method="post" action="kak_hps_aksi.php" enctype="multipart/form-data">
                            <div class="card card-preview" style="border-radius: 10px 10px 10px 10px;">
                                <div class="card-header" style="background-color: #0e4551; width: 100%; ">
                                    Requisition Item
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="mb-3">
                                                <input type="hidden" name="dock_id" value="<?php echo $id; ?>">
                                                <label for="formFile" class="form-label">Cost Center :</label>
                                                <input class="form-control text-white" type="text" name="cost"
                                                    placeholder="Input Data" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Satuan :</label>
                                                <select class="form-select text-white" name="satuan" required>
                                                    <option selected disabled>Pilih</option>
                                                    <option value="Lot" class="text-black">Lot</option>
                                                    <option value="Ea" class="text-black">Ea</option>
                                                    <option value="Pcs" class="text-black">Pcs</option>
                                                    <option value="Unit" class="text-black">Unit</option>
                                                    <option value="Set" class="text-black">Set</option>
                                                    <option value="Gross" class="text-black">Gross</option>
                                                    <option value="Roll" class="text-black">Roll</option>
                                                    <option value="Pack" class="text-black">Pack</option>
                                                    <option value="Batch" class="text-black">Batch</option>
                                                    <option value="Box" class="text-black">Box</option>
                                                    <option value="Pair" class="text-black">Pair</option>
                                                    <option value="Lusin" class="text-black">Lusin</option>
                                                    <option value="Carton" class="text-black">Carton</option>
                                                    <option value="Barrel" class="text-black">Barrel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <label for="formFile" class="form-label">Harga Satuan :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control text-white" name="harga"
                                                    placeholder="Input Data" required>
                                                <span class="input-group-text">IDR</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Jumlah (qty) :</label>
                                                <input class="form-control text-white" type="text" name="jumlah"
                                                    placeholder="Input Data" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <label for="formFile" class="form-label">Harga Total :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control text-white" id="harga_total"
                                                    name="harga_total" readonly>
                                                <span class="input-group-text">IDR</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card  card-preview" style="border-radius: 10px 10px 10px 10px;">
                                <div class=" card-header" style="background-color: #0e4551; width: 100%; ">
                                    Dokumen KAK & HPS
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Komentar :</label>
                                        <input type="hidden" name="dock_id" value="<?php echo $id; ?>">
                                        <textarea class="form-control text-white" rows="10" placeholder="Input Data"
                                            name="comment" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Lampiran File KAK :</label>
                                        <input class="form-control text-white" type="file" name="file_kak" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Lampiran File HPS :</label>
                                        <input class="form-control text-white" type="file" name="file_hps" required>
                                    </div>
                                    <!-- <div class="mb-3">
                                        <label for="kategori" class="form-label">Ditujukan Kepada :</label>
                                        <select class="form-control text-white" name="tujuan_avp" required="required">
                                            <option value="" style="color: black;">Asisten Vice President</option>
                                            <?php
                                                $kategori = mysqli_query($koneksi, "SELECT * FROM user_pks WHERE pks_level='AVP'");
                                                while ($k = mysqli_fetch_array($kategori)) {
                                                ?>
                                            <option value="<?php echo $k['pks_id']; ?>" style="color: black;">
                                                <?php echo $k['pks_nama']; ?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-custom-eye"><i class="bi bi-send"></i>
                                    Submit</button>
                                <button type="button" class="btn btn-custom-edit mx-3" onclick="goBack()"><i
                                        class="bi bi-arrow-left-circle"></i>
                                    Kembali</button>
                            </div>

                        </form>
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

        function goBack() {
            window.location.href = 'data_pks.php';
        }

        const hargaInput = document.querySelector('input[name="harga"]');
        const jumlahInput = document.querySelector('input[name="jumlah"]');
        const totalInput = document.getElementById('harga_total');

        function calculateTotal() {
            const harga = parseFloat(hargaInput.value) || 0;
            const jumlah = parseFloat(jumlahInput.value) || 0;
            totalInput.value = harga * jumlah;
        }

        hargaInput.addEventListener('input', calculateTotal);
        jumlahInput.addEventListener('input', calculateTotal);
        </script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>