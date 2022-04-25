<?php
include 'pegawai_ctrl.php';
if (!isset($_GET['act'])) {
?>
    <div class="container pt-1">
        <a href="?modul=mod_pegawai&act=add" class="btn btn-primary mb-2">Tambah Data</a>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Id Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM mst_pegawai");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d["id_pegawai"]; ?></td>
                    <td><?= $d["nama_pegawai"]; ?></td>
                    <td><?= $d["alamat"]; ?></td>
                    <td><?= $d["jenis_kelamin"]; ?></td>
                    <td><?= $d["tgl_lahir"]; ?></td>
                    <td>
                        <a href="?modul=mod_pegawai&act=edit&id=<?= $d["id_pegawai"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_pegawai&act=delete&id=<?= $d["id_pegawai"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
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
                <form action="mod_pegawai/pegawai_ctrl.php?modul=mod_pegawai&act=save" method="POST">
                    <div class="mb-3 row">
                        <label for="namapegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namapegawai" name="namapegawai">
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
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
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
                            <a href="?modul=mod_pegawai" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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
    $qry_edit = mysqli_query($koneksi, "SELECT * FROM mst_pegawai WHERE id_pegawai='$id'");
    foreach ($qry_edit as $q) :
    ?>
        <div class="container mt-3">
            <h3 class="mb-4"><?= $judul1; ?></h3>
            <div class="row">
                <div class="col">
                    <form action="mod_pegawai/pegawai_ctrl.php?modul=mod_pegawai&act=update" method="POST">
                        <div class="mb-3 row">
                            <label for="namapegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id_pegawai" value="<?= $q['id_pegawai']; ?>">
                                <input type="text" class="form-control" id="namapegawai" name="namapegawai" value="<?= $q['nama_pegawai']; ?>">
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
                                <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= $q['jenis_kelamin']; ?>">
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
                                <a href="?modul=mod_pegawai" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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