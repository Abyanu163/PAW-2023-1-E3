<?php 
session_start();
require "../function.php";
$_SESSION["kodePelanggan"]=1;

$data=selectData("SELECT * FROM products p
                    JOIN categories c ON (p.kodeKategori = c.kodeKategori)");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <style>
        .soldOut{
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>List Produk :</h1>

    <a href="keranjang.php">Lihat Keranjang</a>
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Action</th>
            <th>Nama Barang</th>
            <th>Kategori barang</th>
            <th>Gambar Barang</th>
            <th>Harga Barang</th>
            <th>Stok Barang</th>
            <th>Deskripsi Barang</th>

        </tr>
        <?php foreach($data as $ch){ ?>
            <tr>
                <td>
                    <?php if($ch["stokProduk"]>0){?>
                        <a href="tambahKeranjang.php?id=<?= $ch["kodeProduk"] ?>">Masukkan Keranjang</a>
                    <?php } else{?>
                        <span" class="soldOut">Sold Out</span>
                    <?php }?>
                </td>
                <td><?= $ch["namaProduk"] ?></td>
                <td><?= $ch["namaKategori"] ?></td>
                <td><img src="../img/<?= $ch['gambarProduk'] ?>"></td>
                <td><?= $ch["hargaProduk"] ?></td>
                <td><?= $ch["stokProduk"] ?></td>
                <td><?= $ch["deskripsiProduk"] ?></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>