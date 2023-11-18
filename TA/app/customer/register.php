<?php 
$page = 'register';
$title = 'Daftar sebagai pelanggan | Toko makanan: Meatmaster';

require_once 'templates/header.php';
require("../fregist.php");
$failRegist = FALSE;
?>

  <section id="login">
    <div class="login-container">
      <form action="<?= htmlspecialchars("register.php") ?>" method="POST">
        <div class="form-container">
          <div class="form-title">
            <h2>Daftar</h2>
          </div>
          <div class="form-element">
<<<<<<< HEAD
            <label for="customerEmail">Surel</label>
            <input type="text" name="customerEmail" id="customerEmail">
=======
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
>>>>>>> 71dc182d35d0d106be0ee0bf052870000c8a086e
          </div>
          <div class="form-element">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'customerEmail'));} ?>
          </div>
          <div class="form-element">
            <label for="customeraddr">Alamat</label>
          </div>
          <div class="form element">
            <textarea name="customeraddr" id="customeraddr"></textarea>
          </div>
          <div class="form-element">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'customeraddr'));} ?>
          </div>
          <div class="form-element">
            <label for="customerpwd">Kata sandi</label>
            <input type="password" name="customerpwd" id="customerpwd">
          </div>
          <div class="form-element">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'customerpwd'));} ?>
          </div>
          <div class="form-element">
            <label for="conf-password">Konfirmasi kata sandi</label>
            <input type="password" name="conf-password" id="conf-password">
          </div>
          <div class="form-element">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(isSetValue($_POST,'conf-password')); echo(setSameDiffValue($_POST['cutomerpwd'], $_POST['conf-password']));} ?>
          </div>
          <div class="form-element">
            <button type="submit" name="regist">Daftar</button>
          </div>
          <div class="form-element">
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['customerEmail'] != "")) {echo(isRegisteredCustomer($_POST['customerEmail'], PDO_Connect));}
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($failRegist == FALSE)) {isOKRegistCsutomer($failRegist, PDO_Connect, $_POST['customerEmail'], $_POST['customerpwd'], $_POST['customeraddr']);} ?>
          </div>
          <div class="account-link">
            Have an account?
            <a href="<?= BASEURL ?>/app/login.php">Login</a>
          </div>
        </div>
      </form>
    </div>
  </section>

  <?php require_once 'templates/footer.php' ?>