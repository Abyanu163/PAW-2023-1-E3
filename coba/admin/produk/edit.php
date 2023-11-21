<?php 
require "../../function.php";
$data=selectData("SELECT * FROM products WHERE kodeProduk=$_GET[id]");
$suplai=selectData("SELECT * FROM suplaier");
$kategori=selectData("SELECT * FROM categories");
if(isset($_POST["edit"])){
    if (editProduk($_POST)>0){
        echo "
        <script>
            alert('Data Berhasil Diubah !!!');
            document.location.href='index.php';
        </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Diubah !!!');
            document.location.href='index.php';
        </script>
        ";
    };
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Edit Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data[0]['kodeProduk'];?>">
        <input type="hidden" name="gambarLama" value="<?= $data[0]["gambarProduk"];?>">

        <label for="kategori">Kategori : </label>
        <select name="kategori" id="kategori">
            <?php foreach($kategori as $ch){
                if($ch["kodeKategori"]==$data[0]["kodeKategori"]){?>
                    <option value="<?= $ch["kodeKategori"] ?>"><?= $ch["namaKategori"] ?></option>
                <?php }}?>
                <?php foreach($kategori as $ch){
                if($ch["kodeKategori"]!=$data[0]["kodeKategori"]){?>
                    <option value="<?= $ch["kodeKategori"] ?>"><?= $ch["namaKategori"] ?></option>
                <?php }}?>
        </select>
        <br><br>

        <label for="suplai">Pensuplai : </label>
        <select name="suplai" id="suplai">
            <?php foreach($suplai as $ch){
                if($ch["kodeSuplaier"]==$data[0]["kodeSuplaier"]){?>
                    <option value="<?= $ch["kodeSuplaier"] ?>"><?= $ch["namaSuplaier"] ?></option>
                <?php }}?>
                <?php foreach($suplai as $ch){
                if($ch["kodeSuplaier"]!=$data[0]["kodeSuplaier"]){?>
                    <option value="<?= $ch["kodeSuplaier"] ?>"><?= $ch["namaSuplaier"] ?></option>
                <?php }}?>
        </select>
        <br><br>

        <label for="namaProduk">Nama Produk : </label>
        <input type="text" name="namaProduk" id="namaProduk" value="<?= $data[0]["namaProduk"] ?>">
        <br><br>

        <label>Gambar Lama : </label><br>
        <img src="../../img/<?= $data[0]['gambarProduk'] ?>">
        <br><br>
        <label for="gambar">Masukkan gambar Baru: </label>
        <input type="file" name="gambar" id="gambar">
        <br><br>

        <label for="harga">Harga Produk : </label>
        <input type="text" name="harga" id="harga" value="<?= $data[0]["hargaProduk"] ?>">
        <br><br>

        <label for="stok">Stok Produk : </label>
        <input type="text" name="stok" id="stok" value="<?= $data[0]["stokProduk"] ?>">
        <br><br>

        <label for="deskripsi">Deskripsi Produk : </label>
        <br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $data[0]["deskripsiProduk"] ?></textarea>
        <br><br>

        <input type="submit" value="Edit" name="edit">
        <a href="index.php">back</a>
    </form>
</body>
</html>