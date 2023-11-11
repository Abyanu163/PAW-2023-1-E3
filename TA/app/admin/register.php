<?php
$title = "Pendaftaran | Administrasi Laman Toko Makanan: Meatmaster";
require("../adminRegister.php");
require("../header.php");
?>
        <h2>Pendaftaran untuk pengguna admin</h2>
        <form action="<?= htmlspecialchars("register.php") ?>" method="POST">
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