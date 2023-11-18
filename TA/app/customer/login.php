<?php 
$page = 'login';
$title = 'Masuk | Toko makanan: Meatmaster';

require_once 'templates/header.php';
require(BASEPATH."/app/fauth.php");
checkAdminTable(PDO_Connect);
session_start();
if (checkSignIn($_SESSION['signedIn']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    header('Location: '.BASEURL.'/');
}
?>

  <section id="login">
    <div class="login-container">
      <form action="<?= htmlspecialchars("login.php") ?>" method="POST">
        <div class="form-container">
          <div class="form-title">
            <h2>Masuk</h2>
          </div>
          <div class="form-element">
            <label for="customerEmail">Surel</label>
            <input type="text" name="customerEmail" id="customerEmail">
          </div>
          <div class="form-element">
            <label for="customerpwd">Password</label>
            <input type="password" name="customerpwd" id="customerpwd">
          </div>
          <div class="form-element remember">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
          </div>
          <div class="form-element">
            <button type="submit" name="login">Masuk</button>
          </div>
          <div form="account-link">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              echo (authIn(PDO_Connect, $_POST['customerEmail'], $_POST['customerpwd']));
            }
            ?>
          </div>
          <div class="account-link">
            Don't have an account?
            <a href="<?= BASEURL ?>/app/register.php">Register</a>
          </div>
        </div>
      </form>
    </div>
  </section>

  <?php require_once 'templates/footer.php' ?>