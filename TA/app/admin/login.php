<?php
$title = "Silahkan masuk | Administrasi Laman Toko Makanan: Meatmaster";

require("../base.php");
require(BASEPATH."/app/fauth.php");
checkAdminTable(PDO_Connect);
if (!checkAdminSignIn($_SESSION['adminSignIn'])) {
    header('Location: '.BASEURL.'/app/admin/register.php');
}

require(BASEPATH."/app/admin/header.php");
?>
        <form action="<?= htmlspecialchars("login.php") ?>" method="POST">
            <div class="form-element">
                <label for="username" class="form-element">Nama pengguna</label>
                <input type="text" id="username" name="username" class="form-element"/>
            </div class="form-element">
            <div class="form-element">
                <label for="pwd" class="form-element">Kata sandi</label>
                <input type="password" id="pwd" name="pwd" class="form-element"/>
            </div>
            <div class="form-element">
                <button type="submit" id="submit" value="Masuk" class="form-element">Masuk</button>
            </div>
        </form>
<?php require(BASEPATH."/app/admin/footer.php") ?>