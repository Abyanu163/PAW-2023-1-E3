<?php
$title = 'Administrator - Sistem Toko Makanan: Meatmaster';

require('../base.php');
require(BASEPATH."/app/fauth.php");

session_start();
if (!checkSignIn($_SESSION['adminSignIn'])) {
    header('Location: '.BASEURL.'/app/admin/login.php');
}
<<<<<<< HEAD
require(BASEPATH."/app/templates/header.php");
=======
require(BASEPATH."/admin/templates/header.php");
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
?>


<?php
<<<<<<< HEAD
require(BASEPATH."/app/templates/footer.php");
=======
require(BASEPATH."/admin/templates/footer.php");
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
?>