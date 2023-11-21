<?php
require "../function.php"; 
session_start();
$produk=selectData("SELECT * FROM products WHERE kodeProduk={$_GET['id']}");
$cek=selectData("SELECT * FROM orderdetail WHERE kodePesanan={$_SESSION["kodePesanan"]} AND kodeProduk={$_GET['id']}");
var_dump($_SESSION);
if (isset($_POST['tambah'])) {
    if($_SESSION['jumlah']<$produk[0]["stokProduk"]){
        $_SESSION['jumlah'] += 1 ;
    }
} else if(isset($_POST['kurang'])){
    if($_SESSION['jumlah']>1){
        $_SESSION['jumlah'] -= 1 ;
    }
}else if(!isset($_POST['kurang']) && !isset($_POST['tambah']) && !isset($_POST['masukkan'])) {
    $_SESSION['jumlah'] = 1;
}
$_POST["jumlah"]=$_SESSION['jumlah'];
$_POST["kodeProduk"]=intval($_GET['id']);
$_POST["kodePesanan"]=$_SESSION["kodePesanan"];
$_POST["subHarga"]=$produk[0]['hargaProduk']*$_SESSION["jumlah"];
var_dump($_POST);
echo($_SESSION['jumlah']);
if($cek==[]){
    if(isset($_POST["masukkan"])){
        $tambah=addOrderDetail($_POST);
        if($tambah>0){
            echo "<script>
            alert('BARANG BERHASIL DITAMBAHKAN KE KERANJANG !!!')
            document.location.href='index.php';
            </script>";
        }
    }
    
} else{
    echo "<script>
    alert('BARANG SUDAH ADA DI KERANJANG !!!')
    document.location.href='index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>
</head>
<body>
    <h1>Order detail</h1>
    <form action="" method="post">
        <table border=1 cellpadding=10 cellspacing=0>
            <tr>
                <th>jumlah</th>
                <th>subHarga</th>
                <th>Nama Produk</th>
                <th>Gambar</th>
                <th>stok</th>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="kurang" value="Kurang">
                    <?= $_SESSION["jumlah"] ?>
                    <input type="submit" name="tambah" value="Tambah">
                </td>
                <td>
                    <?= $produk[0]['hargaProduk']*$_SESSION["jumlah"] ?>
                </td>
                <td><?= $produk[0]['namaProduk'] ?></td>
                <td><img src="../img/<?= $produk[0]['gambarProduk'] ?>"></td>
                <td><?= $produk[0]['stokProduk'] ?></td>
            </tr>
        </table>
        <br><br>
        <input type="submit" name="masukkan" value="Masukkan Order">
    </form>
</body>
</html>