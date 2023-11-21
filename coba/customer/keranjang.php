<?php 
require "../function.php";
session_start();

var_dump($_SESSION);

$data=selectData("SELECT * FROM orders o
JOIN orderdetail od ON (o.kodePesanan=od.kodePesanan)
JOIN products p ON (od.kodeProduk=p.kodeProduk)
WHERE o.kodePelanggan={$_SESSION['kodePelanggan']}
");
var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pembelian Barang</h1>
    <form action="" method="post">
        <table border="1" cellpadding=10 cellspacing=0>
            <tr>
                <th>Action</th>
                <th>Jumlah barang</th>
                <th>Sub Harga</th>
                <th>Nama Produk</th>
                <th>Gambar Produk</th>
                <th>Stok</th>
            </tr>
        <?php foreach($data as $ch){?>
            <tr>
                <td><a href="hapusOrderDetil.php?idPesanan=<?= $ch["kodePesanan"] ?>&idProduk=<?= $ch['kodeProduk'] ?>">Hapus</a></td>
                <td><?= $ch["qty"] ?></td>
                <td><?= $ch["subHarga"] ?></td>
                <td><?= $ch["namaProduk"] ?></td>
                <td><img src="../img/<?= $ch["gambarProduk"] ?>"></td>
                <td><?= $ch["stokProduk"] ?></td>
            </tr>
        <?php }?>
        </table>
    </form>
</body>
</html>