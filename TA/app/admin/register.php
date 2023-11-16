<?php
$title = "Pendaftaran | Administrasi Laman Toko Makanan: Meatmaster";
require("../base.php");
require(BASEPATH."/app/fregist.php");
require(BASEPATH."/app/admin/header.php");
$failRegist = FALSE;
?>
        <section id="login">
            <form action="<?= htmlspecialchars("register.php") ?>" method="POST" class="login-container">
                <div class="form-container">
                    <div class="form-element">
                        <h2 class="txt-center">Pendaftaran untuk pengguna admin</h2>
                    </div>
                </div>
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
                        <input type="radio" name="jabatan" value="1" checked/>Karyawan
                        <input type="radio" name="jabatan" value="2"/>Manajer
                    </div>
                    <div class="form-element">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'jabatan'));} ?>
                    </div>
                    <div class="form-element">
                        <button type="submit" id="submit" value="Masuk" >Buat akun</button>
                    </div>
                    <div class="form-element">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['adminusr'] != "")) {echo(isRegisteredAdmin($_POST['adminusr'], PDO_Connect));}
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($failRegist == FALSE)) {isOKRegistAdmin($failRegist, PDO_Connect, $_POST['adminusr'], $_POST['adminpwd'], $_POST['jabatan']);} ?>
                    </div>
                </div>
            </form>
        </section>
<?php require(BASEPATH."/app/admin/footer.php") ?>