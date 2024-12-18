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

    input::placeholder {
        color: white !important;
    }

    textarea::placeholder {
        color: white !important;
    }

    .wajib_isi {
        color: red;
    }

    select option:disabled {
        color: gray !important;
        background-color: #f5f5f5;
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

        .col-44 {
            flex: 0 0 100% !important;
            max-width: 100% !important;
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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-5 text-center fs-7 judul-tabel">FORM EDIT PEMINJAMAN
                                RUANGAN / GEDUNG </h5>
                            <?php
                            // Fetch existing bookings for the location
                            $id = $_GET['id'];
                            $jadwal_query = "SELECT agendaheader_lokasi, agendaheader_tanggal, agendaheader_tanggalawal, agendaheader_tanggalakhir FROM agenda_header WHERE agendaheader_id != '$id'";
                            $jadwal_result = mysqli_query($koneksi, $jadwal_query);

                            $jadwal_terpakai = [];
                            while ($row = mysqli_fetch_assoc($jadwal_result)) {
                                $jadwal_terpakai[] = [
                                    'lokasi' => $row['agendaheader_lokasi'],
                                    'tanggal' => $row['agendaheader_tanggal'],
                                    'tanggalawal' => $row['agendaheader_tanggalawal'],
                                    'tanggalakhir' => $row['agendaheader_tanggalakhir']
                                ];
                            }
                            ?>
                            <?php
                            $id = $_GET['id'];
                            $data = mysqli_query($koneksi, "SELECT * from agenda_header where agendaheader_id='$id'");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <form method="post" action="agendaheader_update.php" enctype="multipart/form-data">
                                <div class="banyak-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">
                                                    No Ticket
                                                </label>
                                                <input type="text" class="form-control text-white"
                                                    name="agendaheader_ticket"
                                                    value="<?php echo $d['agendaheader_ticket']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">
                                                    <span class="wajib_isi">*</span> Nopeg/Nama Peminta</label>
                                                <input type="text" class="form-control text-white"
                                                    name="agendaheader_nopeg" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_nopeg']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Kegiatan</label>
                                                <input type="text" class="form-control text-white"
                                                    name="agendaheader_kegiatan" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_kegiatan']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="shift" class="form-label"> <span class="wajib_isi">*</span>
                                                    Nomor HP</label>
                                                <input type="text" class="form-control text-white"
                                                    name="agendaheader_nomor" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_nomor']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label"> <span
                                                        class="wajib_isi">*</span> Tanggal
                                                </label>
                                                <input type="date" class="form-control text-white"
                                                    name="agendaheader_tanggal" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_tanggal']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label"> <span
                                                        class="wajib_isi">*</span> Waktu Mulai
                                                </label>
                                                <input type="time" class="form-control text-white"
                                                    name="agendaheader_tanggalawal" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_tanggalawal']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">
                                                    <span class="wajib_isi">*</span> Waktu Akhir</label>
                                                <input type="time" class="form-control text-white"
                                                    name="agendaheader_tanggalakhir" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_tanggalakhir']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">
                                                    <span class="wajib_isi">*</span> Lokasi Fasilitas
                                                </label>
                                                <select class="form-select text-white"
                                                    aria-label="Default select example" name="agendaheader_lokasi"
                                                    required>
                                                    <option selected disabled style="color: black;">Lokasi Fasilitas
                                                    </option>
                                                    <option value="Ruang Rapat Klawas-Blok Timur" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat Klawas-Blok Timur') ? 'selected' : ''; ?>>
                                                        Ruang Rapat Klawas-Blok Timur
                                                    </option>
                                                    <option value="Ruang Rapat Klawas-Blok Barat" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat Klawas-Blok Barat') ? 'selected' : ''; ?>>
                                                        Ruang Rapat Klawas-Blok Barat
                                                    </option>
                                                    <option value="Ruang Rapat Klawas-Utama" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat Klawas-Utama') ? 'selected' : ''; ?>>
                                                        Ruang Rapat Klawas-Utama
                                                    </option>
                                                    <option value="Ruang Rapat Klawas-Milenial" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat Klawas-Milenial') ? 'selected' : ''; ?>>
                                                        Ruang Rapat Klawas-Milenial
                                                    </option>
                                                    <option value="Ruang Rapat MSF Lantai 2" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat MSF Lantai 2') ? 'selected' : ''; ?>>
                                                        Ruang Rapat MSF Lantai 2
                                                    </option>
                                                    <option value="Ruang Rapat MCC" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat MCC') ? 'selected' : ''; ?>>
                                                        Ruang Rapat MCC
                                                    </option>
                                                    <option value="Ruang Rapat KOHP" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Ruang Rapat KOHP') ? 'selected' : ''; ?>>
                                                        Ruang Rapat KOHP
                                                    </option>
                                                    <option value="Rapat Online" style="color: black;"
                                                        <?php echo ($d['agendaheader_lokasi'] == 'Rapat Online') ? 'selected' : ''; ?>>
                                                        Rapat Online
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">
                                                    <span class="wajib_isi">*</span> Fasilitas </label>
                                                <input type="text" class="form-control text-white"
                                                    name="agendaheader_fasilitas" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_fasilitas']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">
                                                    <span class="wajib_isi">*</span> Jumlah Orang</label>
                                                <input type="number" class="form-control text-white"
                                                    name="agendaheader_jumlah" placeholder="Input Data" required
                                                    value="<?php echo $d['agendaheader_jumlah']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">
                                                    <span class="wajib_isi">*</span> Kebutuhan tambahan (Sound, Jml
                                                    Kursi, dll)</label>
                                                <textarea class="form-control text-white" name="agendaheader_kebutuhan"
                                                    rows="5"><?php echo $d['agendaheader_kebutuhan']; ?></textarea>
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-6 col-44">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Layout Ruangan</label>
                                                <input class="form-control text-white" type="file" name="file">
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control text-white" name="agendaheader_status"
                                            value="<?php echo $d['agendaheader_status']; ?>" readonly>
                                        <input type="hidden" class="form-control text-white" name="agendaheader_id"
                                            value="<?php echo $d['agendaheader_id']; ?>" readonly>
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
                            <?php
                            }
                            ?>
                        </div>
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

    function goBack() {
        window.location.href = 'agenda.php';
    }

    const jadwalTerpakai = <?php echo json_encode($jadwal_terpakai); ?>;

    function checkAvailability() {
        const tanggalInput = document.querySelector('[name="agendaheader_tanggal"]');
        const tanggalAwalInput = document.querySelector('[name="agendaheader_tanggalawal"]');
        const tanggalAkhirInput = document.querySelector('[name="agendaheader_tanggalakhir"]');
        const lokasiSelect = document.querySelector('[name="agendaheader_lokasi"]');
        const options = lokasiSelect.querySelectorAll('option');

        const tanggal = tanggalInput.value;
        const waktuAwal = tanggalAwalInput.value;
        const waktuAkhir = tanggalAkhirInput.value;

        if (!tanggal || !waktuAwal || !waktuAkhir) {
            return;
        }

        options.forEach(option => {
            option.disabled = false;

            if (option.value !== "" && option.value !== "Lokasi Fasilitas") {

                if (option.value === "Rapat Online") {
                    return;
                }

                jadwalTerpakai.forEach(jadwal => {
                    const jadwalTanggal = jadwal.tanggal;
                    const jadwalAwal = jadwal.tanggalawal;
                    const jadwalAkhir = jadwal.tanggalakhir;
                    if (
                        jadwal.lokasi === option.value &&
                        jadwalTanggal === tanggal && // Tanggal harus sama
                        (
                            (waktuAwal >= jadwalAwal && waktuAwal < jadwalAkhir) ||
                            // Awal input dalam rentang jadwal
                            (waktuAkhir > jadwalAwal && waktuAkhir <= jadwalAkhir) ||
                            // Akhir input dalam rentang jadwal
                            (waktuAwal <= jadwalAwal && waktuAkhir >=
                                jadwalAkhir) // Input mencakup jadwal
                        )
                    ) {
                        option.disabled = true; // Disable lokasi jika ada konflik
                    }
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const tanggalInput = document.querySelector('[name="agendaheader_tanggal"]');
        const tanggalAwalInput = document.querySelector('[name="agendaheader_tanggalawal"]');
        const tanggalAkhirInput = document.querySelector('[name="agendaheader_tanggalakhir"]');

        tanggalInput.addEventListener('change', checkAvailability);
        tanggalAwalInput.addEventListener('change', checkAvailability);
        tanggalAkhirInput.addEventListener('change', checkAvailability);
    });
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>