<?php 
$title = 'Hapus Produk' ;
session_start();
?>
<?php require_once 'templates/header.php' ?>

<?php 
if(hapusOrderDetil($_GET["idProduk"],$_GET["idPesanan"])>0){
    echo '<div class="popup">
            <span class="success">Barang berhasil dihapus</span>
        </div>';
    // header('Refresh: 2, url=cart.php');
} else{
    echo '<div class="popup">
            <span class="danger">Barang gagal dihapus</span>
        </div>';
    // header('Refresh: 2, url=cart.php');
}

?>

<?php require_once 'templates/footer.php'; ?>