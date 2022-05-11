<?php
require_once("../config/koneksi_db.php");
require_once("../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Home</title>
</head>

<body>
    <style>
        .links:hover {
            background-color: gray;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #007da5;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administrasi Kampus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-door-fill"></i> Home</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../"><i class="bi bi-power"></i> Log Out</a>
                    </li>
                </ul>
      </div>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group">
                    <?php
                    include_once("menu.php");
                    ?>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
                if (isset($_GET['modul'])) {
                    include "" . $_GET['modul'] . "/index.php";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>