<?php
$title = 'Administrator - Sistem Toko Makanan: Meatmaster';

require('../base.php');
require(BASEPATH."/app/fauth.php");
if (!checkSignIn($_SESSION['adminSignIn'])) {
    header('Location: '.BASEURL.'/app/admin/login.php');
}
require(BASEPATH."/admin/header.php");
?>
<?php
require(BASEPATH."/admin/footer.php");
?>