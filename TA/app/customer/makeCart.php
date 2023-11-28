<?php 
require "../function.php";
session_start();
try{
    makeOrder($_SESSION);
    header('url=product.php');
}catch(Exception $e){
    header('url=product.php');
}

?>