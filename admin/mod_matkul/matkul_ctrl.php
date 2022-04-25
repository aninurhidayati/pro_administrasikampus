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
    $nama = $_POST['namamatkul'];
    $sksmatkul = $_POST['sksmatkul'];
    mysqli_query($koneksi, "INSERT INTO mst_matkul (nm_matkul,sks_matkul) VALUES ('$nama','$sksmatkul')");
    header("Location: ../home.php?modul=mod_matkul");
} else if (isset($_GET['act']) && ($_GET['act'] == "update")) {
    $id = $_POST['id_matkul'];
    $up_nama = $_POST['namamatkul'];
    $up_sksmatkul = $_POST['sksmatkul'];
    mysqli_query($koneksi, "UPDATE mst_matkul SET nm_matkul='$up_nama',sks_matkul='$up_sksmatkul' WHERE id_matkul='$id'");

    header("Location: ../home.php?modul=mod_matkul");
} else if (isset($_GET['act']) && ($_GET['act'] == "delete")) {
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM mst_matkul WHERE id_matkul='$id'");

    header("Location: home.php?modul=mod_matkul");
}
