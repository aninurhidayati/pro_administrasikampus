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
    $nama = $_POST['namamahasiswa'];
    $nim = $_POST['nimmahasiswa'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    if(isset($_POST['jeniskelamin'])){
		$jk = "laki-laki";
	}
	else{
		$jk = "perempuan";
	}
    $jurusan = $_POST['jurusan'];
    mysqli_query($koneksi, "INSERT INTO mst_mahasiswa (nim_mhs,nama_mhs,ttl_mhs,alamat_mhs,jk_mhs,jurusan_mhs) VALUES ('$nim','$nama','$tgl_lahir','$alamat','$jk','$jurusan')");
    header("Location: ../home.php?modul=mod_mahasiswa");
} else if (isset($_GET['act']) && ($_GET['act'] == "update")) {
    $id = $_POST['id_mhs'];
    $up_nim = $_POST['nimmahasiswa'];
    $up_nama = $_POST['namamahasiswa'];
    $up_alamat = $_POST['alamat'];
    $up_tgl_lahir = $_POST['tgl_lahir'];
    if(isset($_POST['jeniskelamin'])){
		$jk = "laki-laki";
	}
	else{
		$jk = "perempuan";
	}
    $up_jurusan = $_POST['jurusan'];
    mysqli_query($koneksi, "UPDATE mst_mahasiswa SET nim_mhs='$up_nim',nama_mhs='$up_nama',alamat_mhs='$up_alamat',jk_mhs='$up_jk',ttl_mhs='$up_tgl_lahir',jurusan_mhs='$up_jurusan' WHERE id_mhs='$id'");

    header("Location: ../home.php?modul=mod_mahasiswa");
} else if (isset($_GET['act']) && ($_GET['act'] == "delete")) {
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM mst_mahasiswa WHERE id_mhs='$id'");

    header("Location: home.php?modul=mod_mhs");
}
