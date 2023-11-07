<?php 
$page = 'login';
$Title = 'Login';
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
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
          </div>
          <div class="form-element">
            <button type="submit" name="login">Login</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <?php require_once 'templates/footer.php' ?>