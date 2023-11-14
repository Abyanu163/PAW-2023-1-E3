<?php
$title = 'Administrator - Sistem Toko Makanan: Meatmaster';

require('../base.php');
require(BASEPATH."/app/fauth.php");
if (!checkAdminSignIn($_SESSION['adminSignIn'])) {
    header('Location: login.php');
}
require(BASEPATH."/admin/header.php");
?>
<?php
require(BASEPATH."/admin/footer.php");
?>