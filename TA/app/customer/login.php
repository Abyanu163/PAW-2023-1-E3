<?php 
$page = 'login';
$title = 'Login';
?>

<?php require_once 'templates/header.php' ?>

  <section id="login">
    <div class="login-container">
      <form action="">
        <div class="form-container">
          <div class="form-title">
            <h2>Login</h2>
          </div>
          <div class="form-element">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
          </div>
          <div class="form-element remember">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
          </div>
          <div class="form-element">
            <button type="submit" name="login">Login</button>
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