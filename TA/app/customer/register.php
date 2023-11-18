<?php 
$page = 'register';
$title = 'Register';
?>

<?php require_once 'templates/header.php' ?>

  <section id="login">
    <div class="login-container">
      <form action="">
        <div class="form-container">
          <div class="form-title">
            <h2>Register</h2>
          </div>
          <div class="form-element">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
          </div>
          <div class="form-element">
            <label for="user-type">User Type</label>
            <select name="user" id="user-type">
              <option value="customer">Customer</option>
              <option value="manager">Manager</option>
              <option value="administrator">Administrator</option>
            </select>
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
          </div>
          <div class="form-element">
            <label for="conf-password">Confirm Password</label>
            <input type="password" name="conf-password" id="conf-password">
          </div>
          <div class="form-element">
            <button type="submit" name="login">Register</button>
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