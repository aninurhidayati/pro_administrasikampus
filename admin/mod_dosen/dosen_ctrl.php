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
    $nama = $_POST['namadosen'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    mysqli_query($koneksi, "INSERT INTO mst_dosen (nama_dosen,alamat,tgl_lahir,jenis_kelamin) VALUES ('$nama','$alamat','$tgl_lahir','$jenis_kelamin')");
    header("Location: ../home.php?modul=mod_dosen");
} else if (isset($_GET['act']) && ($_GET['act'] == "update")) {
    $id = $_POST['id_dosen'];
    $up_nama = $_POST['namadosen'];
    $up_alamat = $_POST['alamat'];
    $up_tgl_lahir = $_POST['tgl_lahir'];
    $up_jenis_kelamin = $_POST['jenis_kelamin'];
    mysqli_query($koneksi, "UPDATE mst_dosen SET nama_dosen='$up_nama',tgl_lahir='$up_tgl_lahir',alamat='$up_alamat',jenis_kelamin='$up_jenis_kelamin' WHERE id_dosen='$id'");

    header("Location: ../home.php?modul=mod_dosen");
} else if (isset($_GET['act']) && ($_GET['act'] == "delete")) {
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM mst_dosen WHERE id_dosen='$id'");

    header("Location: home.php?modul=mod_dosen");
}
