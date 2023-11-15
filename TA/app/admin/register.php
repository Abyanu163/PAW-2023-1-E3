<?php
$title = "Pendaftaran | Administrasi Laman Toko Makanan: Meatmaster";
require("../base.php");
require(BASEPATH."/app/fregist.php");
require(BASEPATH."/app/admin/header.php");
?>
        <section id="login">
            <form action="<?= htmlspecialchars("register.php") ?>" method="POST" class="login-container">
                <h2 class="form-title">Pendaftaran untuk pengguna admin</h2>
                <div class="form-container">
                    <div class="form-element">
                        <label for="adminusr">Nama pengguna</label>
                        <input type="text" id="adminusr" name="adminusr" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo($_POST['adminusr']);} ?>"/>
                    </div>
                    <div class="form-element">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'adminusr'));} ?>
                    </div>
                    <div class="form-element">
                        <label for="adminpwd" >Kata sandi</label>
                        <input type="password" id="adminpwd" name="adminpwd" />
                    </div>
                    <div class="form-element">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'adminpwd'));} ?>
                    </div>
                    <div class="form-element">
                        <label for="jabatan" >Jabatan</label><br/>
                        <input type="radio" id="admin" name="jabatan" value="1"/>
                        <label for="admin">Admin</label>
                        <input type="radio" id="manajer" name="jabatan" value="2"/>
                        <label for="manajer">Manajer</label>
                    </div>
                    <div class="form-element">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'jabatan'));} ?>
                    </div>
                    <div class="form-element">
                        <button type="submit" id="submit" value="Masuk" >Buat akun</button>
                    </div>
                </div>
            </form>
        </section>
<?php require(BASEPATH."/app/admin/footer.php") ?>