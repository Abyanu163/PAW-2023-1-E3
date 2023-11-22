<?php 
require "../../function.php";
$data=selectData("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Customer</h1>
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <th>no</th>
            <th>username</th>
            <th>alamat</th>
        </tr>
        <?php 
        $i=1;
        foreach($data as $ch){?>
           <tr>
            <td><?= $i; ?></td>
            <td><?= $ch["usernamePelanggan"] ?></td>
            <td><?= $ch["alamatPelanggan"] ?></td>
           </tr> 
        <?php
        $i++; 
        } ?>
    </table>
</body>
</html>