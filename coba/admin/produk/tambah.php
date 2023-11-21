<?php 
require "../../function.php";

if(isset($_POST["tambah"])){
    tambahProduk($_POST);
    echo "<script>
    alert('Data berhasil diupload');
    window.location.href='index.php';
    </script>";
    exit();
}
$data=selectData("SELECT * FROM suplaier");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="kategori">Kategori : </label>
    <select name="kategori" id="kategori">
        <option value="1">Chiken</option>
        <option value="2">Wagyu</option>
        <option value="3">Local Cow</option>
        <option value="4">Goat</option>
    </select>
    <br><br>

    <label for="suplai">Pensuplai : </label>
        <select name="suplai" id="suplai">
            <?php for($i=0;$i<count($data);$i++){?>
                <option value="<?= $data[$i]['kodeSuplaier']?>"><?= $data[$i]['namaSuplaier'] ?></option>
            <?php }?>
        </select>
        <br><br>

        <label for="namaProduk">Nama Produk : </label>
        <input type="text" name="namaProduk" id="namaProduk">
        <br><br>

        <label for="gambar">Masukkan gambar : </label>
        <input type="file" name="gambar" id="gambar">
        <br><br>

        <label for="harga">Harga Produk : </label>
        <input type="text" name="harga" id="harga">
        <br><br>

        <label for="stok">Stok Produk : </label>
        <input type="text" name="stok" id="stok">
        <br><br>

        <label for="deskripsi">Deskripsi Produk : </label>
        <br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
        <br><br>

        <input type="submit" value="Tambah" name="tambah">
        <a href="index.php">back</a>
    </form>
</body>
</html>