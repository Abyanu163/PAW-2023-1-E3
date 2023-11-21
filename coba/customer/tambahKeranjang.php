<?php
require "../function.php"; 
session_start();
$data=makeOrder($_SESSION);

$cek=selectData("SELECT * FROM orderdetail WHERE kodePesanan={$data["kodePesanan"]} AND kodeProduk={$_GET['id']}");
if($cek==[]){
    $tambah=addOrderDetail($data["kodePesanan"],$_GET["id"]);
    echo "<script>
    alert('BARANG BERHASIL DITAMBAHKAN KE KERANJANG !!!')
    document.location.href='index.php';
    </script>";
} else{
    echo "<script>
    alert('BARANG SUDAH ADA DI KERANJANG !!!')
    document.location.href='index.php';
    </script>";
}
?>