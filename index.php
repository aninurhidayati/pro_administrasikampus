<?php
require_once("config/koneksi_db.php");
require_once("config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/bootstrap/style.css" />
</head>

<body style="background-image: url('assets/img_bg/1.jpg'); background-size: 1366px 768px;" >
    <div class="container d-flex justify-content-center mt-5 pt-5 ">
        <form class="bg-dark p-5" style="border-radius: 15px;" method="POST" action="ceklogin.php">
            <div class="alert alert-danger" role="alert" id="alert" style="display: none"></div>
            <div class="alert alert-success" role="alert" id="alertok" style="display: none"></div>
            <div id="judul" class="text-center text-white"><h3>LOGIN PAGE</h3></div>
            <hr/>
            <div class="mb-4">
                <label for="username" class="form-label text-warning">Username</label>
                <input type="text" name="username" class="form-control" id="username" />
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-warning">Password</label>
                <input type="password" name="password" class="form-control" id="password" />
            </div>
            <button type="submit" class="btn btn-primary" name="btnlogin">Login</button>
        </form>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/javascript/main.js" type="text/javascript"></script>
</body>

</html>