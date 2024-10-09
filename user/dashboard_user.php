<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "user_login") {
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

    .haikiri {
        width: 200px;
        height: auto;
        float: left;
        margin-top: -65px;
        margin-left: -50px;
    }

    .haikanan {
        width: 200px;
        height: auto;
        float: right;
        margin-top: -40px;
        margin-right: -37px;
    }

    .welcome {
        margin-top: -180px;
        font-family: "Varela Round", sans-serif;
        color: white;
        font-size: 40px;
    }

    .nama {
        font-family: "Varela Round", sans-serif;
        font-size: 20px;
        color: white;
    }

    .gm {
        font-family: "Varela Round", sans-serif;
        margin-top: 30px;
        font-size: 15px;
        color: white;
    }

    .wave {
        width: 325px;
        height: auto;
        margin-top: -25px;
        margin-left: auto;
        margin-right: 0;
        float: right;
    }

    .doc-pks {
        color: #062949 !important;
    }

    .file-kategori {
        margin-top: -170px;
    }

    .kategori {
        margin-top: -160px;
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
                                    $id_user = $_SESSION['id'];
                                    $profil = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id_user'");
                                    $profil = mysqli_fetch_assoc($profil);
                                    if ($profil['user_foto'] == "") {
                                    ?>
                                    <img src="../gambar/sistem/user.png" class="rounded-circle"
                                        style="width: 50px;height: 50px; object-fit: cover;">
                                    <?php
                                    } else {
                                    ?>
                                    <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="rounded-circle"
                                        style="width: 50px;height: 50px; object-fit: cover;">
                                    <?php
                                    }
                                    ?>
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
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card overflow-hidden" style="height: 170px; background-color: #0d3254;">
                            <div class="card-body p-4">
                                <div class="row align-items-center text-center">
                                    <div class="col-4 text-start">
                                        <img src="../assets/images/haikiri.png" class="haikiri">
                                    </div>
                                    <div class="col-4 text-center">
                                        <!-- Added a div for centering text -->
                                        <h5 class="welcome">Welcome</h5>
                                        <h5 class="nama"><?php echo htmlspecialchars($_SESSION['nama']); ?></h5>
                                        <h5 class="gm">User</h5>
                                    </div>
                                    <div class="col-4 text-end">
                                        <img src="../assets/images/haikanan.png" class="haikanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card overflow-hidden" style="height: 170px; background-color:#e47c10;">
                            <div class=" card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-file-analytics fs-9 text-white file-kategori"></i>
                                    </span>
                                    <div class=" ms-2">
                                        <img src="../assets/images/2.png" class="wave">
                                    </div>
                                </div>

                                <div class="kategori">
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

                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card overflow-hidden w-100 h-600">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <div class="col-lg-11">
                                            <?php
                                            $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                            ?>
                                            <h5 class="card-title mb-10 fw-semibold mt-3 fs-7">Jumlah Arsip :
                                                <?php echo mysqli_num_rows($jumlah_arsip); ?>

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
                    'rgba(7, 28, 49, 1)',
                    'rgba(10, 39, 68, 1)',
                    'rgba(11, 54, 95, 1)',
                    'rgba(22, 71, 117, 1)',
                    'rgba(25, 86, 144, 1)',
                    'rgba(34, 105, 173, 1)',
                    'rgba(45, 119, 190, 1)',
                    'rgba(61, 140, 215, 1)',
                    'rgba(51, 146, 237, 1)',
                    'rgba(101, 170, 237, 1)',
                    'rgba(121, 181, 239, 1)',
                    'rgba(147, 194, 240, 1)',
                    'rgba(180, 214, 247, 1)',
                    'rgba(215, 235, 255, 1)'
                ],
                borderColor: [
                    'rgba(7, 28, 49, 1)',
                    'rgba(10, 39, 68, 1)',
                    'rgba(11, 54, 95, 1)',
                    'rgba(22, 71, 117, 1)',
                    'rgba(25, 86, 144, 1)',
                    'rgba(34, 105, 173, 1)',
                    'rgba(45, 119, 190, 1)',
                    'rgba(61, 140, 215, 1)',
                    'rgba(51, 146, 237, 1)',
                    'rgba(101, 170, 237, 1)',
                    'rgba(121, 181, 239, 1)',
                    'rgba(147, 194, 240, 1)',
                    'rgba(180, 214, 247, 1)',
                    'rgba(215, 235, 255, 1)'
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