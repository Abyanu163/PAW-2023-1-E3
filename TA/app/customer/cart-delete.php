<?php 
require "../function.php";
session_start();
if(hapusOrderDetil($_GET["idProduk"],$_GET["idPesanan"])>0){
    echo "
    <script>
    alert('Pesanan berhasil dihapus !!!!');
    document.location.href='cart.php';
    </script>
    ";
} else{
    echo "
    <script>
    alert('Pesanan gagal dihapus !!!!');
    document.location.href='cart.php';
    </script>
    ";
}
?>