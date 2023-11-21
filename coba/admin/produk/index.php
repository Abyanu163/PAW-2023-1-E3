<?php 
require "../../function.php";
$data=selectData("SELECT * FROM products p 
JOIN suplaier s ON (p.kodeSuplaier=s.kodesuplaier)
JOIN categories c ON (c.kodeKategori=p.kodeKategori)");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
</head>
<body>
    <h1>List Produk :</h1>
    <a href="tambah.php">Tambah Produk</a>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Action</th>
            <th>Nama Barang</th>
            <th>Kategori barang</th>
            <th>Gambar Barang</th>
            <th>Harga Barang</th>
            <th>Stok Barang</th>
            <th>Deskripsi Produk</th>
            <th>Suplaier</th>

        </tr>
        <?php foreach($data as $ch){ ?>
            <tr>
                <td>
                    <a href="edit.php?id=<?= $ch["kodeProduk"] ?>">Edit</a> | <a href="hapus.php?id=<?= $ch["kodeProduk"];?>" onclick="return confirm('DATA INGIN DIHAPUS ?')">Delete</a>
                </td>
                <td><?= $ch["namaProduk"] ?></td>
                <td><?= $ch["namaKategori"] ?></td>
                <td><img src="../../img/<?= $ch['gambarProduk'] ?>"></td>
                <td><?= $ch["hargaProduk"] ?></td>
                <td><?= $ch["stokProduk"] ?></td>
                <td><?= $ch["deskripsiProduk"] ?></td>
                <td><?= $ch["namaSuplaier"] ?></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>