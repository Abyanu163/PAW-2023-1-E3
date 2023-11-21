<?php 
require "../../function.php";
if(isset($_POST["tambah"])){
    $tambah=tambahSuplaier($_POST);
    if($tambah>0){
        echo "<script>
        alert('suplaier berhasil ditambahkan');
        window.location.href='index.php';
        </script>";
        exit();
    } else{
        echo "<script>
        alert('suplaier gagal ditambahkan');
        </script>";
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
    <h1>Tambah Suplaier : </h1>
    <form action="" method="post">
        <label for="nama">Nama Suplaier : </label>
        <input type="text" name="nama" id="nama">
        <br><br>

        <label for="no">nomor telpon suplaier : </label>
        <input type="text" name="no" id="no">
        <br><br>

        <label for="alamat">alamat Suplaier : </label>
        <input type="text" name="alamat" id="alamat">
        <br><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
</body>
</html>