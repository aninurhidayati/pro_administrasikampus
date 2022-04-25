<?php
require_once("config/koneksi_db.php");
require_once("config/config.php");

if (isset($_POST['btnlogin'])) {
    $txt_user = $_POST['username'];
    $txt_pass = md5($_POST['password']);
    $result = mysqli_query(
        $koneksi,
        "SELECT * FROM mst_login WHERE username = '" . $txt_user . "' AND password = '" . $txt_pass . "' AND isactive = 1"
    );
    if (mysqli_num_rows($result)) {
        echo "Hasil = " . mysqli_num_rows($result);
        header("Location: " . URL . "admin/home.php");
    } else {
        header("Location: " . URL . "");
    }
}
