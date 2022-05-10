<?php
include 'jurusan_ctrl.php';
if (!isset($_GET['act'])) {
?>
    <div class="container pt-1">
        <a href="?modul=mod_jurusan&act=add" class="btn btn-outline-dark mb-2 text"><i class="bi bi-plus-square-fill"></i> Tambah Data</a>
        <table class="table table-bordered">
            <thead class="text-white" style="background-color: #007da5;">
                
                <tr>
                    <th>Id Jurusan</th>
                    <th>Nama Jurusan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM mst_jurusan");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d["id_jurusan"]; ?></td>
                    <td><?= $d["nm_jurusan"]; ?></td>
                    <td>
                        <a href="?modul=mod_jurusan&act=edit&id=<?= $d["id_jurusan"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_jurusan&act=delete&id=<?= $d["id_jurusan"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
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
                <form action="mod_jurusan/jurusan_ctrl.php?modul=mod_jurusan&act=save" method="POST">
                    <div class="mb-3 row">
                        <label for="namajurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namajurusan" name="namajurusan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <a href="?modul=mod_jurusan" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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
    $qry_edit = mysqli_query($koneksi, "SELECT * FROM mst_jurusan WHERE id_jurusan='$id'");
    foreach ($qry_edit as $q) :
    ?>
        <div class="container mt-3">
            <h3 class="mb-4"><?= $judul1; ?></h3>
            <div class="row">
                <div class="col">
                    <form action="mod_jurusan/jurusan_ctrl.php?modul=mod_jurusan&act=update" method="POST">
                        <div class="mb-3 row">
                            <label for="namajurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" name="id_jurusan" value="<?= $q['id_jurusan']; ?>">
                                <input type="text" class="form-control" id="namajurusan" name="namajurusan" value="<?= $q['nm_jurusan']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <a href="?modul=mod_jurusan" type="cancel" class="btn btn-secondary"><i class="bi bi-box-arrow-left"></i> Kembali</a>
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