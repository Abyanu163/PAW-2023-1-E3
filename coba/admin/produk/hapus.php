<?php 
require "../../function.php";
$kodeProduk=$_GET["id"];
if (hapusProduk($kodeProduk)>0){
    echo "
    <script>
        alert('Data Berhasil Dihapus !!!');
        document.location.href='index.php';
    </script>
    ";
} else{
    echo "
    <script>
        alert('Data Gagal Dihapus !!!');
        document.location.href='index.php';
    </script>
    ";
};
?>