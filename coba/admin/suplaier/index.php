<?php 
require "../../function.php";
$query="SELECT namaSuplaier, namaProduk FROM suplaier s
        JOIN products p ON (s.kodeSuplaier=p.kodeSuplaier)";
$data = selectData("SELECT * FROM suplaier");
$produk=selectData($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suplaier</title>
</head>
<body>
    <h1>List Suplaier :</h1>
    <a href="tambah.php">Tambah Suplaier</a>
    <table border="1" cellspacing=0 cellpadding=10>
        <th>No</th>
        <th>Nama Suplaier</th>
        <th>Mensuplai</th>
        <th>No Telpon</th>
        <th>Alamat</th>
        <th>action</th>
        <?php 
        $no=1;
        foreach($data as $ch){?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $ch["namaSuplaier"] ?></td>
            <td>
            <?php 
            $count=0;
            foreach($produk as $p){
                if($p["namaSuplaier"]==$ch["namaSuplaier"]){?>
                    <li><?= $p["namaProduk"] ?></li>
                <?php $count++;}?>
            <?php }
            if($count==0){?>
                <b>Tidak Mensuplai</b>
            <?php }?>
            <td><?= $ch["telpSuplaier"] ?></td>
            <td><?= $ch["alamatSuplaier"] ?></td>
            <td>
                <a href="edit.php?id=<?= $ch["kodeSuplaier"] ?>">EDIT</a> | <a href="hapus.php?id=<?= $ch["kodeSuplaier"] ?>" onclick="return confirm('SUPLAIER INGIN DIHAPUS ?')">DELETE</a>
            </td>
        </tr>
        <?php 
        $no++;
        }?>
    </table>
</body>
</html>