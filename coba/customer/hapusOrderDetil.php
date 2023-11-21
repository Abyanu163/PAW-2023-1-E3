<?php 
require "../function.php";
session_start();
if(editOrderDetil($_GET["idProduk"],$_GET["idPesanan"])>0){
    echo "
    <script>
    alert('Pesanan berhasil dihapus !!!!');
    document.location.href='keranjang.php';
    </script>
    ";
} else{
    echo "
    <script>
    alert('Pesanan gagal dihapus !!!!');
    document.location.href='keranjang.php';
    </script>
    ";
}

?>