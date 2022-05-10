<?php
include 'mahasiswa_ctrl.php';
if (!isset($_GET['act'])) {
?>
    <div class="container pt-1">
        <a href="?modul=mod_mahasiswa&act=add" class="btn btn-outline-dark mb-2 text"><i class="bi bi-plus-square-fill"></i> Tambah Data</a>
        <table class="table table-bordered">
            <thead class="text-white " style="background-color: #007da5;">
                <tr>
                    <th>Id Mahasiswa</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM mst_mahasiswa");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d["id_mhs"]; ?></td>
                    <td><?= $d["nim_mhs"]; ?></td>
                    <td><?= $d["nama_mhs"]; ?></td>
                    <td><?= $d["alamat_mhs"]; ?></td>
                    <td><?= $d["ttl_mhs"]; ?></td>
                    <td><?= $d["jk_mhs"]; ?></td>
                    <td><?= $d["jurusan_mhs"]; ?></td>
                    <td>
                        <a href="?modul=mod_mahasiswa&act=edit&id=<?= $d["id_mhs"]; ?>" class="btn btn-xs btn-primary mb-2"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_mahasiswa&act=delete&id=<?= $d["id_mhs"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>
<?php
} else if (isset($_GET['act']) && ($_GET['act'] == "add")) {
?>
    <div class="container mt-3">
        <h3 class="mb-4"><?= $judul; ?></h3>
        <div class="row">
            <div class="col">
                <form action="mod_mahasiswa/mahasiswa_ctrl.php?modul=mod_mahasiswa&act=save" method="POST">
                    <div class="mb-3 row">
                        <label for="nimmahasiswa" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nimmahasiswa" name="nimmahasiswa">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="namamahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namamahasiswa" name="namamahasiswa">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"> -->
                        </div>
                    </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="jurusan" name="jurusan">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <a href="?modul=mod_mahasiswa" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
                    <button type="cancel" class="btn btn-danger"><i class="bi bi-x-square"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <?php
} else if (isset($_GET['act']) && ($_GET['act'] == "edit")) {
    $id = $_GET['id'];
    $qry_edit = mysqli_query($koneksi, "SELECT * FROM mst_mahasiswa WHERE id_mhs='$id'");
    foreach ($qry_edit as $q) :
    ?>
        <div class="container mt-3">
            <h3 class="mb-4"><?= $judul1; ?></h3>
            <div class="row">
                <div class="col">
                    <form action="mod_mahasiswa/mahasiswa_ctrl.php?modul=mod_mahasiswa&act=update" method="POST">
                        <div class="mb-3 row">
                            <label for="nimmahasiswa" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id_mhs" value="<?= $q['id_mhs']; ?>">
                                <input type="text" class="form-control" id="nimmahasiswa" name="nimmahasiswa" value="<?= $q['nim_mhs']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namamahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="namamahasiswa" name="namamahasiswa" value="<?= $q['nama_mhs']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $q['alamat_mhs']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                    <!-- <option selected disabled>Jenis Kelamin</option> -->
                                    <option value="Laki Laki" <?= $q['jk_mhs'] == "Laki Laki" ? "selected" : "" ?>>Laki Laki</option>
                                    <option value="Perempuan" <?= $q['jk_mhs'] == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="jeniskelamin" name="jenis_kelamin" value="<?= $q['jenis_kelamin']; ?>"> -->
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $q['ttl_mhs']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $q['jurusan_mhs']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <a href="?modul=mod_mahasiswa" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
                                <button type="cancel" class="btn btn-danger"><i class="bi bi-x-square"></i>Reset </button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>Simpan </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    endforeach;
}
?>