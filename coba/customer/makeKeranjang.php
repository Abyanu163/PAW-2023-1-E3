<?php 
require "../function.php";
session_start();
try{
    makeOrder($_SESSION);
    echo "<script>
    document.location.href='index.php';
    </script>";
}catch(Exception $e){
    echo "<script>
    document.location.href='index.php';
    </script>";
}

?>