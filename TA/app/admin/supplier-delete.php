<?php require_once 'templates/header.php' ?>

<?php 
$kodeSuplaier=$_GET["id"];
try{
    hapusSuplaier($kodeSuplaier)>0;
    echo "<script>
    alert('suplaier Berhasil Dihapus !!!');
    document.location.href='supplier-data.php';
    </script>
    ";
}catch(Exception $e){
    echo "<script>
    alert('suplaier gagal Dihapus karena sedang mensuplai barang !!');
    document.location.href='supplier-data.php';
    </script>
    ";
}
?>

<?php require_once 'templates/footer.php'; ?>