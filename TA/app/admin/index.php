<?php
$title = 'Administrator - Sistem Toko Makanan: Meatmaster';

require('../base.php');
require(BASEPATH."/app/fauth.php");

session_start();
$adminSignIn = $_SESSION['adminSignIn'] ?? false;
$roleCode = $_SESSION['roleCode'] ?? false;
if ($adminSignIn == FALSE) {
    header('Location: '.BASEURL.'/app/admin/login.php');
}
require(BASEPATH."/app/templates/header.php");
?>


<?php
require(BASEPATH."/app/templates/footer.php");
?>