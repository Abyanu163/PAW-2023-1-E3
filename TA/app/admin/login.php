<?php
$title = "Silahkan masuk | Administrasi Laman Toko Makanan: Meatmaster";

require("../base.php");
require(BASEPATH."/adminLoginF.php");
checkAdminTable(PDO_USED);

require(BASEPATH."/admin/header.php");
?>
        <form action="<?= htmlspecialchars("login.php") ?>" method="POST">
            <div>
                <label for="admin_USE" class="form-element">Nama pengguna</label>
                <input type="text" id="admin_USE" name="admin_USE" class="form-element"/>
            </div>
            <div>
                <label for="PWD_admin" class="form-element">Kata sandi</label>
                <input type="password" id="PWD_admin" name="PWD_admin" class="form-element"/>
            </div>
            <div>
                <button type="submit" id="submit" value="Masuk" class="form-element">Masuk</button>
            </div>
        </form>
<?php require("footer.php") ?>