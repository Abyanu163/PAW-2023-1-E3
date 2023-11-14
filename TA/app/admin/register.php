<?php
$title = "Pendaftaran | Administrasi Laman Toko Makanan: Meatmaster";
require("../base.php");
require(BASEPATH."/app/fregist.php");
require(BASEPATH."/app/admin/header.php");
?>
        <h2>Pendaftaran untuk pengguna admin</h2>
        <form action="<?= htmlspecialchars("register.php") ?>" method="POST">
            <div>
                <label for="adminusr" class="form-element">Nama pengguna</label>
                <input type="text" id="adminusr" name="adminusr" class="form-element"/>
            </div>
            <div>
                <label for="adminpwd" class="form-element">Kata sandi</label>
                <input type="password" id="adminpwd" name="adminpwd" class="form-element"/>
            </div>
            <div>
                <label for="jabatan" class="form-element">Jabatan</label><br/>
                <input type="radio" id="admin" name="jabatan" value="1"/>
                <label for="admin">Admin</label>
                <input type="radio" id="manajer" name="jabatan" value="2"/>
                <label for="manajer">Manajer</label>
            </div>
            <div>
                <button type="submit" id="submit" value="Masuk" class="form-element">Buat akun</button>
            </div>
        </form>
<?php require(BASEPATH."/app/admin/footer.php") ?>