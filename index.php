<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsip Digital</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Varela+Round&display=swap" rel="stylesheet">
    <style>
    body {
        background-color: #d2c392;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    input[type="radio"]:checked+label {
        border: 2px solid #0b1f5f !important;
        box-shadow: 0 0 0 2px rgba(127, 86, 217, 0.2) !important;
    }

    .login-container {
        background-color: #e4e0c2;
    }

    .login-text {
        color: #4d3d0d;
        font-family: 'Varela Round', sans-serif;
    }

    .judul {
        font-family: 'Pacifico', cursive;
    }

    .sub-judul {
        font-family: 'Varela Round', sans-serif;
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-lg-5 d-flex align-items-center justify-content-center">
                <div class="p-4 p-md-5">
                    <h2 class="judul mb-3">Sistem Informasi Arsip Digital</h2>
                    <p class="sub-judul mb-5"> Manajemen file arsip dengan mudah dan cepat</p>
                    <form id="loginForm">
                        <div class="mb-4">
                            <input type="radio" name="loginType" id="userLogin" value="user" class="d-none">
                            <label for="userLogin"
                                class="login-container card mb-3 border-0 shadow-sm w-100 cursor-pointer">
                                <div class=" card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21"
                                                    stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z"
                                                    stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13"
                                                    stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88"
                                                    stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="login-text mb-0">Login User</h5>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="mb-4">
                            <input type="radio" name="loginType" id="adminLogin" value="admin" class="d-none">
                            <label for="adminLogin" class="login-container card mb-4 border-0 w-100 cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                                    stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M20 21C20 18.8783 19.1571 16.8434 17.6569 15.3431C16.1566 13.8429 14.1217 13 12 13C9.87827 13 7.84344 13.8429 6.34315 15.3431C4.84285 16.8434 4 18.8783 4 21"
                                                    stroke="#667085" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="login-text mb-0">Login Admin / Petugas</h5>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3"
                            style="background: linear-gradient(to right, #4d769a, #b0cce5); color:rgb(245, 232, 224); font-family: 'Varela Round', sans-serif; font-size: 18px;">Submit</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-flex align-items-center justify-content-center">
                <img src="assets/images/depan2.png" class="img-fluid" alt="Arsip Digital">
            </div>
        </div>
    </div>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var loginType = document.querySelector('input[name="loginType"]:checked').value;
        if (loginType === 'user') {
            window.location.href = './login/loginuser.php';
        } else if (loginType === 'admin') {
            window.location.href = './login/loginadmin.php';
        }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>