<?php
$title = 'Silahkan masuk | MeatMaster';
require 'base.php';
require 'fauth.php';
checkAdminTable(PDO_Connect);
checkCustomerTable(PDO_Connect);
session_start();
isSignedIn();
include('templates/header.php');
?>
<div id="login">
	<div class="login-container">
		<form action="<?= htmlspecialchars("login.php") ?>" method="POST">
			<div class="form-container">
				<div class="form-title">
					<h2>Masuk</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="username">Nama pengguna</label>
						<input type="text" name="username" id="username">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="passwd">Kata sandi</label>
						<input type="password" name="passwd" id="passwd">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field remember">
						<input type="checkbox" name="remember" id="remember" <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {rememberMe();} ?>>
						<label for="remember">Ingat ini dalam 30 hari</label>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<button type="submit" name="login">Masuk</button>
					</div>
				</div>
				<div class="account-link">
					<p>Test form login</p>
				</div>
				<div class="account-link">
					Tidak punya akun pelanggan?
					<a href="<?= BASEURL ?>/app/customer/register.php" title="Ini untuk pelanggan">Daftar di sini</a>.
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>