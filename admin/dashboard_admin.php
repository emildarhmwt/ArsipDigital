<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "admin_login") {
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
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playwrite+DE+Grund:wght@100..400&family=Rowdies:wght@300;400;700&family=Varela+Round&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-thumb-up fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Data Selesai</h5>
                                        <h5 class="card-title mb-0 fw-semibold fs-3">18</h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-category fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Jumlah Kategori</h5>
                                        <?php
                                        $jumlah_kategori = mysqli_query($koneksi, "select * from kategori");
                                        ?>

                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kategori); ?></span>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-users fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Jumlah Petugas</h5>
                                        <?php
                                        $jumlah_petugas = mysqli_query($koneksi, "select * from petugas");
                                        ?>
                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_petugas); ?></span>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-users fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Jumlah User</h5>
                                        <?php
                                        $jumlah_user = mysqli_query($koneksi, "select * from user");
                                        ?>
                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_user); ?></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100 h-300">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-10">
                                    <div class="">
                                        <h5 class="card-title fw-semibold">Grafik Pengunduhan Arsip</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex align-items-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm me-3"
                                                id="fetchAllData">Semua Data</button>
                                            <div class="dropdown mx-2">
                                                <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                    aria-expanded="false"
                                                    class="rounded-circle btn-outline-secondary rounded-circle btn-sm px-1 btn shadow-none">
                                                    <i class="ti ti-search fs-6 d-block"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                    aria-labelledby="dropdownMenuButton2">
                                                    <div class="message-body">
                                                        <form id="dateFilterForm">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-1">
                                                                    <label for="grupSearch" class="form-label">
                                                                        Tanggal
                                                                        Awal :</label>
                                                                    <input type="date" class="form-control"
                                                                        id="startDate" name="startDate">
                                                                </div>
                                                                <div class="col-lg-6 mb-1">
                                                                    <label for="grupSearch" class="form-label">
                                                                        Tanggal
                                                                        Akhir :</label>
                                                                    <input type="date" class="form-control" id="endDate"
                                                                        name="endDate">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-center mt-3">
                                                                <button type="submit" class="btn btn-primary mx-3"><i
                                                                        class="bi bi-search"></i> Search
                                                                    Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <canvas id="downloadChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 d-flex align-items-center">
                                                <div class="col-lg-6">
                                                    <h5 class="card-title mb-10 fw-semibold mt-3 fs-7">Jumlah Arsip :
                                                    </h5>
                                                </div>
                                                <div class="col-lg-6">
                                                    <?php
                                                            $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                                        ?>
                                                    <h5
                                                        class="card-title mb-10 fw-semibold mt-3 fs-7 justify-content-end">
                                                        <span
                                                            class="counter justify-content-end"><?php echo mysqli_num_rows($jumlah_arsip); ?>
                                                    </h5>
                                                </div>
                                                <!-- <h5v
                                                        class="col-lg-6 d-flex align-items-center justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary btn-sm me-2">
                                                            Semua Data</button>
                                                        <div class="dropdown mx-2">
                                                            <button id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                class="rounded-circle btn-outline-secondary rounded-circle px-2 btn shadow-none">
                                                                <i class="ti ti-search fs-4 d-block"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up notification-dropdown"
                                                                aria-labelledby="dropdownMenuButton2">
                                                                <div class="message-body">
                                                                    <form method="get" action="">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 mb-1">
                                                                                <label for="grupSearch"
                                                                                    class="form-label">
                                                                                    Tanggal
                                                                                    Awal :</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="startDate" name="startDate">
                                                                            </div>
                                                                            <div class="col-lg-6 mb-1">
                                                                                <label for="grupSearch"
                                                                                    class="form-label">
                                                                                    Tanggal
                                                                                    Akhir :</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="endDate" name="endDate">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex justify-content-center mt-3">
                                                                            <button type="submit"
                                                                                class="btn btn-primary mx-3"><i
                                                                                    class="bi bi-search"></i> Search
                                                                                Data</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 mb-4">
                                            <div class="d-flex justify-content-center">
                                                <canvas id="categoryPieChart" width="200px" height="200px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 justify-content-between align-items-center">
                                        <h5 class="mb-0 fw-bold">Data </h5>
                                    </div>

                                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;"
                                        data-simplebar>
                                        <table class="table table-borderless align-middle text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama File</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-4">
                                                                <img src="../assets/images/profile/user1.jpg" width="50"
                                                                    class="rounded-circle" alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-bolder">
                                                                    Mark J. Freeman</h6>
                                                                <p class="fs-3 mb-0">Prof.
                                                                    English</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge bg-light-success rounded-pill text-success px-3 py-2 fs-3">Available</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                                                <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dropdownMenuButton1">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-4">
                                                                <img src="../assets/images/profile/user1.jpg" width="50"
                                                                    class="rounded-circle" alt="" />
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-bolder">
                                                                    Mark J. Freeman</h6>
                                                                <p class="fs-3 mb-0">Prof.
                                                                    English</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge bg-light-success rounded-pill text-success px-3 py-2 fs-3">Available</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                                                <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dropdownMenuButton1">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

        const categoryData =
            <?php
                $category_query = mysqli_query($koneksi, "SELECT kategori_nama, COUNT(*) as count FROM arsip, kategori WHERE arsip_kategori=kategori_id GROUP BY kategori_nama");
                $categories = [];
                while ($row = mysqli_fetch_assoc($category_query)) {
                    $categories[] = $row;
                }
                echo json_encode($categories);
                ?>;

        const labels = categoryData.map(item => item.kategori_nama);
        const data = categoryData.map(item => item.count);

        // Create pie chart
        const ctx = document.getElementById('categoryPieChart').getContext('2d');
        const categoryPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Arsip per Kategori',
                    data: data,
                    backgroundColor: [
                        'rgba(204, 39, 39, 0.2)',
                        'rgba(204, 180, 39, 0.2)',
                        'rgba(142, 204, 39, 0.2)',
                        'rgba(39, 204, 49, 0.2)',
                        'rgba(39, 204, 160, 0.2)',
                        'rgba(39, 125, 204, 0.2)',
                        'rgba(42, 39, 204, 0.2)',
                        'rgba(128, 39, 204, 0.2)',
                        'rgba(204, 39, 197, 0.2)',
                        'rgba(204, 39, 115, 0.2)',
                        'rgba(204, 39, 39, 0.2)'
                    ],
                    borderColor: [
                        'rgba(204, 39, 39, 1)',
                        'rgba(204, 180, 39, 1)',
                        'rgba(142, 204, 39, 1)',
                        'rgba(39, 204, 49, 1)',
                        'rgba(39, 204, 160, 1)',
                        'rgba(39, 125, 204, 1)',
                        'rgba(42, 39, 204, 1)',
                        'rgba(128, 39, 204, 1)',
                        'rgba(204, 39, 197, 1)',
                        'rgba(204, 39, 115, 1)',
                        'rgba(204, 39, 39, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        bottom: 20 // Add padding at the bottom to make space for labels
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Menyembunyikan legend
                        position: 'bottom', // Menempatkan legend di atas
                        labels: {
                            boxWidth: 10, // Lebar kotak legend
                            padding: 15, // Jarak antar label
                            font: {
                                size: 12, // Ukuran font label
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        const label = tooltipItem.label || '';
                                        const value = tooltipItem.raw || 0;
                                        return `${label} : ${value}`; // Menampilkan nama kategori dan jumlah saat hover
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

        document.getElementById('categoryPieChart').parentNode.style.height =
            '350px'; // Mengatur tinggi chart container
        document.getElementById('categoryPieChart').parentNode.style.overflowY =
            'auto'; // Mengaktifkan scroll pada y-axis
        categoryPieChart.update();

        // fetch(`get_download_data.php`)
        //     .then(response => response.json())
        //     .then(data => {
        //         const ctx = document.getElementById('downloadChart').getContext('2d');
        //         const downloadChart = new Chart(ctx, {
        //             type: 'line', // or 'line', 'pie', etc.
        //             data: {
        //                 labels: data.labels, // Dates
        //                 datasets: [{
        //                     label: 'Jumlah Unduhan',
        //                     data: data.values, // Download counts
        //                     backgroundColor: 'rgba(75, 192, 192, 0.2)',
        //                     borderColor: 'rgba(75, 192, 192, 1)',
        //                     borderWidth: 1
        //                 }]
        //             },
        //             options: {
        //                 scales: {
        //                     y: {
        //                         beginAtZero: true
        //                     }
        //                 }
        //             }
        //         });
        //     });

        let downloadChart; // Declare a variable to hold the chart instance

        const fetchData = (startDate = '', endDate = '') => {
            const url = startDate && endDate ? `get_download_data.php?startDate=${startDate}&endDate=${endDate}` :
                'get_download_data.php';
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('downloadChart').getContext('2d');

                    // Destroy the existing chart if it exists
                    if (downloadChart) {
                        downloadChart.destroy();
                    }

                    // Create a new chart instance
                    downloadChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Jumlah Unduhan',
                                data: data.values,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        };

        document.querySelector('#dateFilterForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            fetchData(startDate, endDate);
        });

        // Add event listener for "Semua Data" button
        document.getElementById('fetchAllData').addEventListener('click', function() {
            // Clear the date inputs
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
            // Call fetchData without parameters to get all data
            fetchData();
        });

        // Call fetchData on page load
        fetchData();
        </script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/dashboard.js"></script>
</body>

</html>