<?php
$page = 'login';
$title = 'Masuk | Toko makanan: Meatmaster';

require('../base.php');
require_once '../templates/header.php';
require(BASEPATH . "/app/fauth.php");
checkCustomerTable(PDO_Connect);
session_start();
$signedIn = $_SESSION['signedIn'] ?? false;
$savedSignedIn = $_COOKIE['userIDSaved'] ?? false;
if ($savedSignedIn != FALSE) {
	$signedIn = TRUE;
	$_SESSION['userID'] = $_COOKIE['userID'];
}
if ($signedIn != FALSE && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
	header('Location: ' . BASEURL . '/');
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
					<div class="input-field">
						<label for="customerEmail">Surel</label>
						<input type="text" name="customerEmail" id="customerEmail">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="customerpwd">Password</label>
						<input type="password" name="customerpwd" id="customerpwd">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field remember">
						<input type="checkbox" name="remember" id="remember" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {rememberMe();} ?>>
						<label for="remember">Remember me</label>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<button type="submit" name="login">Masuk</button>
					</div>
				</div>
				<div form="account-link">
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						echo (authIn(PDO_Connect, $_POST['customerEmail'], $_POST['customerpwd'], ($_POST['remember'] ?? FALSE)));
					}
					?>
				</div>
				<div class="account-link">
					Tidak punya akun pelanggan?
					<a href="<?= BASEURL ?>/app/customer/register.php">Daftar di sini</a>.
				</div>
			</div>
		</form>
	</div>
</section>

<?php require_once 'templates/footer.php' ?>