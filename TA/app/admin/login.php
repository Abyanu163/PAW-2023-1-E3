<?php
$page = 'login';
$title = "Silahkan masuk | Administrasi Laman Toko Makanan: Meatmaster";

require("../base.php");
require(BASEPATH."/app/fauth.php");
checkAdminTable(PDO_Connect);
session_start();
$adminSignIn = $_SESSION['adminSignIn'] ?? false;
$roleCode = $_SESSION['roleCode'] ?? false;
if (($adminSignIn != FALSE) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    managerAuthRedirect($roleCode);
    header('Location: '.BASEURL.'/app/manager/');
}
require(BASEPATH."/app/templates/header.php");
?>
        <section id="login">
            <div class="login-container">
                <form action="<?= htmlspecialchars("login.php") ?>" method="POST">
                    <div class="form-container">
                        <div class="form-title">
                            <h2>Masuk</h2>
                        </div>
                        <div class="form-element">
                            <div class="input-field">
                                <label for="adminusr" >Nama pengguna</label>
                                <input type="text" id="adminusr" name="adminusr"/>
                            </div>
                        </div>
                        <div class="form-element">
                            <div class="input-field">
                                <label for="adminpwd" >Kata sandi</label>
                                <input type="password" id="adminpwd" name="adminpwd"/>
                            </div>
                        </div>
                        <div class="form-element">
                            <div class="input-field">
                                <button type="submit" id="submit" value="Masuk">Masuk</button>
                            </div>
                        </div>
                        <div form="account-link">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                echo (adminAuth(PDO_Connect, $_POST['adminusr'], $_POST['adminpwd']));
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>
