<?php
if (isset($_GET['act']) && ($_GET['act'] == "update" || $_GET['act'] == "save")) {
    require_once "../../config/koneksi_db.php";
    require_once "../../config/config.php";
} else {
    require_once "../config/koneksi_db.php";
    require_once "../config/config.php";
}

if (isset($_GET['act']) && ($_GET['act'] == "add")) {
    $judul = "Form Input Data";
} else if (isset($_GET['act']) && ($_GET['act'] == "edit")) {
    $judul1 = "Form Edit Data";
} else if (isset($_GET['act']) && ($_GET['act'] == "save")) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($_POST['isactive'])) {
        $aktif = 1;
    } else {
        $aktif = 0;
    }
    // $isactive = $_POST['isactive'];
    mysqli_query($koneksi, "INSERT INTO mst_login (nama,username,password,isactive) VALUES ('$nama','$username','$password','$aktif')");
    header("Location: ../home.php?modul=mod_userlogin");
    // echo $nama . "," . $link;
} else if (isset($_GET['act']) && ($_GET['act'] == "update")) {
    $id = $_POST['id_login'];
    $up_nama = $_POST['nama'];
    $up_username = $_POST['username'];
    $up_password = $_POST['password'];
    if (isset($_POST['isactive'])) {
        $aktif = 1;
    } else {
        $aktif = 0;
    }
    mysqli_query($koneksi, "UPDATE mst_login SET nama='$up_nama',username='$up_username',password='$up_password',isactive='$aktif' WHERE id_login='$id'");

    header("Location: ../home.php?modul=mod_userlogin");
} else if (isset($_GET['act']) && ($_GET['act'] == "delete")) {
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM mst_login WHERE id_login='$id'");

    header("Location: home.php?modul=mod_userlogin");
}
