<?php
include 'matkul_ctrl.php';
if (!isset($_GET['act'])) {
?>
    <div class="container pt-1">
        <a href="?modul=mod_matkul&act=add" class="btn btn-primary mb-2">Tambah Data</a>
        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Id Matkul</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Total SKS Mata Kuliah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM mst_matkul");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d["id_matkul"]; ?></td>
                    <td><?= $d["nm_matkul"]; ?></td>
                    <td><?= $d["sks_matkul"]; ?></td>
                    <td>
                        <a href="?modul=mod_matkul&act=edit&id=<?= $d["id_matkul"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_matkul&act=delete&id=<?= $d["id_matkul"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
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
                <form action="mod_matkul/matkul_ctrl.php?modul=mod_matkul&act=save" method="POST">
                    <div class="mb-3 row">
                        <label for="namamatkul" class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namamatkul" name="namamatkul">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sksmatkul" class="col-sm-2 col-form-label">Total SKS Mata Kuliah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="sksmatkul" name="sksmatkul">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <a href="?modul=mod_matkul" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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
    $qry_edit = mysqli_query($koneksi, "SELECT * FROM mst_matkul WHERE id_matkul='$id'");
    foreach ($qry_edit as $q) :
    ?>
        <div class="container mt-3">
            <h3 class="mb-4"><?= $judul1; ?></h3>
            <div class="row">
                <div class="col">
                    <form action="mod_matkul/matkul_ctrl.php?modul=mod_matkul&act=update" method="POST">
                        <div class="mb-3 row">
                            <label for="namamatkul" class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id_dosen" value="<?= $q['id_matkul']; ?>">
                                <input type="text" class="form-control" id="namamatkul" name="namamatkul" value="<?= $q['nm_matkul']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="sksmatkul" class="col-sm-2 col-form-label">Total SKS Mata Kuliah</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sksmatkul" name="sksmatkul" value="<?= $q['sks_matkul']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <a href="?modul=mod_matkul" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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