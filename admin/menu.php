<?php
$qry_menu = mysqli_query($koneksi, "SELECT * FROM mst_menu WHERE isactive=1");
while ($row = mysqli_fetch_array($qry_menu)) {
?>
    <a href="?modul=<?= $row['link']; ?>" style="text-decoration: none;" class="links1">
        <li class="list-group-item links rounded-3 mt-1"><?= $row["nama_menu"]; ?></li>
    </a>
<?php
}
//endforeach;
?>