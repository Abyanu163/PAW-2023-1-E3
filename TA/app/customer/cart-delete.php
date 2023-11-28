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
    echo '<div class="popup">
            <span class="success">Barang berhasil dihapus</span>
        </div>';
    header('Refresh: 2, url=cart.php');
} else{
    echo '<div class="popup">
            <span class="danger">Barang gagal dihapus</span>
        </div>';
    header('Refresh: 2, url=cart.php');
}
?>