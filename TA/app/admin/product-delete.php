<?php require_once 'templates/header.php' ?>

<?php 
$kodeProduk=$_GET["id"];
if (hapusProduk($kodeProduk)>0){
    echo "
    <script>
        alert('Data Berhasil Dihapus !!!');
        document.location.href='product-data.php';
    </script>
    ";
} else{
    echo "
    <script>
        alert('Data Gagal Dihapus !!!');
        document.location.href='product-data.php';
    </script>
    ";
};
?>

<?php require_once 'templates/footer.php'; ?>