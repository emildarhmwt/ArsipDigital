<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsip Digital</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logo.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Coiny&family=Concert+One&family=Outfit:wght@100..900&family=Pacifico&family=Playpen+Sans:wght@100..800&family=Playwrite+DE+Grund:wght@100..400&family=Righteous&family=Sacramento&family=Varela+Round&family=Yatra+One&display=swap"
        rel="stylesheet">
    <style>
    .concert-one-regular {
        font-family: "Concert One", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .playpen-sans {
        font-family: "Playpen Sans", cursive;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
    }

    .outfit {
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    .judul-sidebar {
        font-family: "Outfit", sans-serif;
        font-size: 18px;
        color: black;
    }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-simplebar>
                <div class="d-flex mb-4 align-items-center justify-content-between">
                    <a href="dashboard_user.php" class="text-nowrap logo-img ms-0 ms-md-1">
                        <img src="../assets/images/logoweb.png" width="200" height="auto">
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="mb-4 pb-2">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu judul-sidebar">HOME</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link primary-hover-bg" href="dashboard_vp.php"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-primary rounded-3">
                                    <i class="ti ti-layout-dashboard fs-7 text-primary"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1 judul-sidebar">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu judul-sidebar">MENU</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link warning-hover-bg" href="data_pks.php"
                                aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#pksDropdown"
                                aria-controls="pksDropdown">
                                <span class="aside-icon p-2 bg-light-warning rounded-3">
                                    <i class="ti ti-file-analytics fs-7 text-warning"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1 judul-sidebar">Pengajuan Kontrak PKS</span>
                            </a>
                            <div class="collapse" id="pksDropdown">
                                <ul class="nav flex-column ms-3">
                                    <li class="nav-item">
                                        <a class="nav-link judul-sidebar" href="data_pks.php"><i
                                                class="ti ti-corner-down-right fs-6"></i> Doc Kajian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link judul-sidebar" href="data_pendukung.php"> <i
                                                class="ti ti-corner-down-right fs-6"></i> Doc Pendukung</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link judul-sidebar" href="data_kontrak.php"> <i
                                                class="ti ti-corner-down-right fs-6"></i>Doc Kontrak
                                            PKS</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link primary-hover-bg" href="data_arsip.php"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-primary rounded-3">
                                    <i class="ti ti-archive fs-7 text-primary"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1 judul-sidebar">Data Arsip</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu judul-sidebar">PROFIL</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link warning-hover-bg" href="ganti_password.php"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-warning rounded-3">
                                    <i class="ti ti-key fs-7 text-warning"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1 judul-sidebar">Ganti Password</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link danger-hover-bg" href="../login/logout.php"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-danger rounded-3">
                                    <i class="ti ti-logout fs-7 text-danger"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1 judul-sidebar">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
    </div>
    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.body.classList.toggle('sidebar-collapsed');
        const icon = this.querySelector('i');
        icon.classList.toggle('ti-chevrons-left');
        icon.classList.toggle('ti-chevrons-right');
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