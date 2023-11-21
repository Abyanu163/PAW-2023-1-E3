<?php 
require "../../function.php";
$kodeSuplaier=$_GET["id"];
try{
    hapusSuplaier($kodeSuplaier)>0;
    echo "<script>
    alert('suplaier Berhasil Dihapus !!!');
    document.location.href='index.php';
    </script>
    ";
}catch(Exception $e){
    echo "<script>
    alert('suplaier gagal Dihapus karena sedang mensuplai barang !!');
    document.location.href='index.php';
    </script>
    ";
}
?>