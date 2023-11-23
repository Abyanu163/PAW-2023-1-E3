<?php
$title = 'Administrator - Sistem Toko Makanan: Meatmaster';

require('../base.php');
require(BASEPATH."/app/fauth.php");

session_start();
checkAdminSignedIn();
whenIsManager();
require(BASEPATH."/app/templates/header.php");
header('Location: '.BASEURL.'/app/admin/product-data.php');
?>


<?php
require(BASEPATH."/app/templates/footer.php");
?>