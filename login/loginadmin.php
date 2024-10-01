<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsip Digital</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rowdies:wght@300;400;700&family=Varela+Round&display=swap"
        rel="stylesheet">
    <style>
    body {
        background-color: #d2c392;
    }

    .img-login {
        width: 100px;
        height: 100px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 15px;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.8);
    }

    .btn-primary {
        background: #4d769a;
    }

    .rowdies-light {
        font-family: "Rowdies", sans-serif;
        font-weight: 300;
        font-style: normal;
    }

    .rowdies-regular {
        font-family: "Rowdies", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .rowdies-bold {
        font-family: "Rowdies", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    .varela-round-regular {
        font-family: "Varela Round", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .judul {
        font-family: 'Rowdies', sans-serif;
    }

    .sub-judul {
        font-family: 'Varela Round', sans-serif;
    }

    .sub-judul2 {
        font-family: 'Varela Round', sans-serif;
        font-weight: bold;
    }

    .page-wrapper {
        position: relative;
        min-height: 100vh;
        overflow: hidden;
    }

    .corner-image {
        position: absolute;
        bottom: 0;
        max-width: 30%;
        height: auto;
    }

    .corner-image.left {
        left: -3%;
        bottom: -5%;
    }

    .corner-image.right {
        right: -3%;
        bottom: -5%;
    }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="text-center mb-4 sub-judul2"> Login Admin / Petugas </h3>
                                <img src="../assets/images/login.png" alt="Logo" class="img-login">
                                <p class="text-center sub-judul2">Sistem Informasi Arsip Digital</p>
                                <?php 
                                // pesan notifikasi

                                if(isset($_GET['alert'])){
                                    if($_GET['alert'] == "gagal"){
                                        echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
                                    }else if($_GET['alert'] == "logout"){
                                        echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
                                    }else if($_GET['alert'] == "belum_login"){
                                        echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
                                    }
                                }
                                ?>
                                <form action="periksa_login_admin.php" method="post" id="loginForm">
                                    <div class="mb-3">
                                        <label for="username" class="form-label sub-judul">Username</label>
                                        <input type="text" placeholder="Username" required="required" autocomplete="off"
                                            name="username" id="username" class="form-control">
                                    </div>
                                    <div class="mb-1">
                                        <label for="password" class="form-label sub-judul">Password</label>
                                        <input type="password" placeholder="Password" required="required"
                                            autocomplete="off" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="showPassword">
                                            <label class="form-check-label text-dark sub-judul" for="showPassword">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="hak" class="form-label sub-judul">Hak Akses</label>
                                        <select class="form-select" name="akses" id="akses">
                                            <option selected disabled>Hak Akses</option>
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <input type="submit" value="Login"
                                            class="btn btn-primary fs-4 mb-4 rounded-2 flex-grow-1 me-2 sub-judul">
                                        <a href="../index.php"
                                            class="btn btn-secondary fs-4 mb-4 rounded-2 flex-grow-1 sub-judul">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="../assets/images/loginkiri.png" alt="Left Image" class="corner-image left">
        <img src="../assets/images/loginkanan.png" alt="Right Image" class="corner-image right">
    </div>
    <script>
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('password');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>