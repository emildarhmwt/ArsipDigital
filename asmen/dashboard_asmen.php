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
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Coiny&family=Concert+One&family=Pacifico&family=Playpen+Sans:wght@100..800&family=Playwrite+DE+Grund:wght@100..400&family=Righteous&family=Sacramento&family=Varela+Round&family=Yatra+One&display=swap"
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
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class=" page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span
                                        class="me-2 rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; line-height: 50px; color: #4e6a7d;">
                                        <i class="ti ti-file-analytics fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Total Doc Kajian</h5>
                                        <?php
                                        $jumlah_kajian = mysqli_query($koneksi, "select * from dockajian");
                                        ?>

                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kajian); ?></span>
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
                                        <i class="ti ti-file-analytics fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Total Doc KAK & HPS</h5>
                                        <?php
                                        $jumlah_kak_hps = mysqli_query($koneksi, "select * from doc_kak_hps");
                                        ?>

                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kak_hps); ?></span>
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
                                        <i class="ti ti-file-analytics fs-8"></i>
                                    </span>
                                    <div class="ms-2">
                                        <h5 class="card-title mb-2 fw-semibold fs-4">Total Doc Kontrak</h5>
                                        <?php
                                        $jumlah_kontrak = mysqli_query($koneksi, "select * from doc_kontrak");
                                        ?>
                                        <h5 class="card-title mb-0 fw-semibold fs-3"><span
                                                class="counter"><?php echo mysqli_num_rows($jumlah_kontrak); ?></span>
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
                </div>
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card overflow-hidden w-100">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <div class="col-lg-8">
                                            <h5 class="card-title mb-10 fw-semibold mt-3 fs-7">Jumlah Arsip :
                                            </h5>
                                        </div>
                                        <div class="col-lg-4 justify-content-end">
                                            <?php
                                            $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                            ?>
                                            <h5 class="card-title mb-10 fw-semibold mt-3 fs-7 justify-content-end">
                                                <span
                                                    class="counter justify-content-end"><?php echo mysqli_num_rows($jumlah_arsip); ?>
                                            </h5>
                                        </div>
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
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100 h-500">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 mb-4">
                                        <div class="d-flex justify-content-center">
                                            <canvas id="statusBarChart" width="400px" height="200px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    // Data for bar chart
    const barChartData = {
        labels: ['Asmen', 'AVP', 'VP', 'GM'],
        datasets: [{
                label: 'Dockajian',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_asmen = 'uploaded'")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_avp IN ('rejected (avp)', 'approve (avp)')")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_vp IN ('rejected (vp)', 'approve (vp)')")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dockajian WHERE dock_status_gm IN ('rejected (gm)', 'approve (done)')")); ?>
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Doc KAK & HPS',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_asmen = 'uploaded'")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_avp IN ('rejected (avp)', 'approve (avp)')")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_vp IN ('rejected (vp)', 'approve (vp)')")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kak_hps WHERE dockh_status_gm IN ('rejected (gm)', 'approve (done)')")); ?>
                ],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Doc Kontrak',
                data: [
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_asmen = 'uploaded'")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_avp = 'rejected (avp)'")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_vp IN ('rejected (vp)', 'approve (vp)')")); ?>,
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM doc_kontrak WHERE dockt_status_gm IN ('rejected (gm)', 'approve (done)')")); ?>
                ],
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }
        ]
    };

    // Create bar chart
    const ctxBar = document.getElementById('statusBarChart').getContext('2d');
    const statusBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
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