<?php
$page = 'register';
$title = "Pendaftaran | Administrasi Laman Toko Makanan: Meatmaster";
require("../base.php");
require(BASEPATH."/app/fregist.php");
<<<<<<< HEAD
require(BASEPATH."/app/templates/header.php");
=======
require(BASEPATH."/app/admin/templates/header.php");
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
$failRegist = FALSE;
?>
        <section id="login">
            <div class="login-container">
                <form action="<?= htmlspecialchars("register.php") ?>" method="POST">
                    <div class="form-container">
                        <div class="form-element">
                            <h2 class="txt-center">Pendaftaran untuk pengguna admin</h2>
                        </div>
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
            </div>
        </section>
<<<<<<< HEAD
    </body>
</html>
=======
<?php require(BASEPATH."/app/admin/templates/footer.php") ?>
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
