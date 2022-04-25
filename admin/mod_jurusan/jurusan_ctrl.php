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
    $nama = $_POST['namajurusan'];
    mysqli_query($koneksi, "INSERT INTO mst_jurusan (nm_jurusan) VALUES ('$nama')");
    header("Location: ../home.php?modul=mod_jurusan");
} else if (isset($_GET['act']) && ($_GET['act'] == "update")) {
    $id = $_POST['id_jurusan'];
    $up_nama = $_POST['namajurusan'];
    mysqli_query($koneksi, "UPDATE mst_jurusan SET nm_jurusan='$up_nama' WHERE id_jurusan='$id'");

    header("Location: ../home.php?modul=mod_jurusan");
} else if (isset($_GET['act']) && ($_GET['act'] == "delete")) {
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM mst_jurusan WHERE id_jurusan='$id'");

    header("Location: home.php?modul=mod_jurusan");
}
