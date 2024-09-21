<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "petugas_login") {
    header("location:../login.php?alert=belum_login");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report Application</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <style>
    .textinfo {
        font-size: 12px;
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
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)"
                                    id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle me-2">
                                    <p class="nama-profile mb-0"><?php echo $_SESSION['nama']; ?> [Petugas]</p>
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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Edit Arsip</h5>
                            <div class="card">
                                <div class="card-body"><?php
                                                        $id = $_GET['id'];
                                                        $data = mysqli_query($koneksi, "select * from arsip where arsip_id='$id'");
                                                        while ($d = mysqli_fetch_array($data)) {
                                                        ?>

                                    <form method="post" action="arsip_update.php" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="shift" class="form-label">Kode Arsip</label>
                                            <input type="hidden" name="id" value="<?php echo $d['arsip_id']; ?>">
                                            <input type="text" class="form-control" name="kode" required="required"
                                                value="<?php echo $d['arsip_kode']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="shift" class="form-label">Nama Arsip</label>
                                            <input type="text" class="form-control" name="nama" required="required"
                                                value="<?php echo $d['arsip_nama']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="shift" class="form-label">Kategori</label>
                                            <select class="form-control" name="kategori" required="required">
                                                <option value="">Pilih kategori</option>
                                                <?php
                                                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                            while ($k = mysqli_fetch_array($kategori)) {
                                                    ?>
                                                <option <?php if ($k['kategori_id'] == $d['arsip_kategori']) {
                                                                    echo "selected='selected'";
                                                                } ?> value="<?php echo $k['kategori_id']; ?>">
                                                    <?php echo $k['kategori_nama']; ?></option>
                                                <?php
                                                            }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Keterangan</label>
                                            <textarea class="form-control" name="keterangan"
                                                required="required"><?php echo $d['arsip_keterangan']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">File</label>
                                            <input class="form-control" type="file" name="file">
                                            <p class="textinfo">Kosongkan jika tidak ingin mengubah foto</p>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i>
                                            Submit</button>
                                        <button type="button" class="btn btn-primary" onclick="goBack()"><i
                                                class="bi bi-arrow-left-circle"></i>
                                            Back</button>
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
        </div>
    </div>
    <script>
    fetch('sidebar_petugas.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('sidebar').innerHTML = data;
        });

    function goBack() {
        window.location.href = 'arsip_saya.php';
    }
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>