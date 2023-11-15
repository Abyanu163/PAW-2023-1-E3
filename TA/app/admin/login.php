<?php
$title = "Silahkan masuk | Administrasi Laman Toko Makanan: Meatmaster";

require("../base.php");
require(BASEPATH."/app/fauth.php");
checkAdminTable(PDO_Connect);

require(BASEPATH."/app/admin/header.php");
?>
        <form action="<?= htmlspecialchars("login.php") ?>" method="POST" class="login">
            <div class="form-container">
                <div class="form-element">
                    <labe   l for="username" class="form-element">Nama pengguna</label>
                    <input type="text" id="username" name="username" class="form-element"/>
                </div>
                <div class="form-element">
                    <label for="pwd" class="form-element">Kata sandi</label>
                    <input type="password" id="pwd" name="pwd" class="form-element"/>
                </div>
                <div class="form-element">
                    <button type="submit" id="submit" value="Masuk" class="form-element">Masuk</button>
                </div>
            </div>
        </form>
<?php require(BASEPATH."/app/admin/footer.php") ?>