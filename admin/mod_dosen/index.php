<?php
include 'dosen_ctrl.php';
if (!isset($_GET['act'])) {
?>
    <div class="container pt-1">
        <a href="?modul=mod_dosen&act=add" class="btn btn-primary mb-2">Tambah Data</a>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Id Dosen</th>
                    <th>Nama Dosen</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM mst_dosen");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d["id_dosen"]; ?></td>
                    <td><?= $d["nama_dosen"]; ?></td>
                    <td><?= $d["alamat"]; ?></td>
                    <td><?= $d["jenis_kelamin"]; ?></td>
                    <td><?= $d["tgl_lahir"]; ?></td>
                    <td>
                        <a href="?modul=mod_dosen&act=edit&id=<?= $d["id_dosen"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_dosen&act=delete&id=<?= $d["id_dosen"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
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
                <form action="mod_dosen/dosen_ctrl.php?modul=mod_dosen&act=save" method="POST">
                    <div class="mb-3 row">
                        <label for="namadosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namadosen" name="namadosen">
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
                    <div class="mb-3 row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <a href="?modul=mod_dosen" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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
    $qry_edit = mysqli_query($koneksi, "SELECT * FROM mst_dosen WHERE id_dosen='$id'");
    foreach ($qry_edit as $q) :
    ?>
        <div class="container mt-3">
            <h3 class="mb-4"><?= $judul1; ?></h3>
            <div class="row">
                <div class="col">
                    <form action="mod_dosen/dosen_ctrl.php?modul=mod_dosen&act=update" method="POST">
                        <div class="mb-3 row">
                            <label for="namadosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id_dosen" value="<?= $q['id_dosen']; ?>">
                                <input type="text" class="form-control" id="namadosen" name="namadosen" value="<?= $q['nama_dosen']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $q['alamat']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                    <!-- <option selected disabled>Jenis Kelamin</option> -->
                                    <option value="Laki Laki" <?= $q['jenis_kelamin'] == "Laki Laki" ? "selected" : "" ?>>Laki Laki</option>
                                    <option value="Perempuan" <?= $q['jenis_kelamin'] == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $q['tgl_lahir']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <a href="?modul=mod_dosen" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
                                <button type="cancel" class="btn btn-danger"><i class="bi bi-x-square"></i> Reset</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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