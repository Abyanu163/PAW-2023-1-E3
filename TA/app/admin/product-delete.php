<?php require_once 'templates/header.php' ?>

<?php 
$kodeProduk=$_GET["id"];
try {
    hapusProduk($kodeProduk);
    echo "
    <script>
        alert('Data Berhasil Dihapus !!!');
        document.location.href='product-data.php';
    </script>
    ";
} catch(Exception $e) {
    echo "
    <script>
        alert('Data Gagal Dihapus !!!');
        document.location.href='product-data.php';
    </script>
    ";
};
?>

<?php require_once 'templates/footer.php'; ?>