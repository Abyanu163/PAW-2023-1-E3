<?php 
require "../../function.php";
$id=$_GET['id'];
$data = selectData("SELECT * FROM suplaier WHERE kodeSuplaier = $id");
if(isset($_POST["edit"])){
    if(editSuplaier($_POST)>0){
        echo "<script>
        alert('suplaier Berhasil Diedit !!!');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('suplaier Gagal Diedit !!!');
        </script>
        ";
    }
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
    <h1>Edit suplaier : </h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="nama">Nama Suplaier : </label>
        <input type="text" id="nama" name="nama" value="<?= $data[0]['namaSuplaier'] ?>">
        <br><br>

        <label for="nomor">no Telpon Suplaier : </label>
        <input type="text" id="nomor" name="nomor" value="<?= $data[0]['telpSuplaier'] ?>">
        <br><br>

        <label for="alamat">alamat Suplaier : </label>
        <input type="text" id="alamat" name="alamat" value="<?= $data[0]['alamatSuplaier'] ?>">
        <br><br>
        <input type="submit" name="edit" value="Edit">
        <a href="index.php">Back</a>
    </form>
</body>
</html>