<?php
$page = 'login';
$title = "Silahkan masuk | Administrasi Laman Toko Makanan: Meatmaster";

require("../base.php");
require(BASEPATH."/app/fauth.php");
checkAdminTable(PDO_Connect);
<<<<<<< HEAD
session_start();
if (checkSignIn($_SESSION['adminSignIn']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    managerAuthRedirect($_SESSION['roleCode']);
    header('Location: '.BASEURL.'/app/admin/');
}
require(BASEPATH."/app/templates/header.php");
=======

require(BASEPATH."/app/admin/templates/header.php");
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
?>
        <section id="login">
            <div class="login-container">
                <form action="<?= htmlspecialchars("login.php") ?>" method="POST">
                    <div class="form-container">
                        <div class="form-title">
                            <h2>Masuk</h2>
                        </div>
                        <div class="form-element">
                            <label for="adminusr" >Nama pengguna</label>
                            <input type="text" id="adminusr" name="adminusr"/>
                        </div>
                        <div class="form-element">
                            <label for="adminpwd" >Kata sandi</label>
                            <input type="password" id="adminpwd" name="adminpwd"/>
                        </div>
                        <div class="form-element">
                            <button type="submit" id="submit" value="Masuk">Masuk</button>
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
<<<<<<< HEAD
        </section>
    </body>
</html>
=======
        </form>
<?php require(BASEPATH."/app/admin/templates/footer.php") ?>
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
