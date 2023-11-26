<?php
session_start();
$page = 'profil';
$title = 'Profil';
$failUpdate = FALSE;
?>

<?php require_once 'templates/header.php'; getUserData(PDO_Connect, ($_SESSION['userID'] ?? $_COOKIE['userID'] ?? FALSE)) ?>
<?php require_once 'templates/navbar.php' ?>

<section>
	<div class="main-container">
		<div class="formin-container">
			<form action="" method="POST">
				<div class="form-title">
					<h2>Customer Profile</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="customerEmail">Email</label>
						<input type="text" id="customerEmail" name="customerEmail" readonly value="<?= $UIDFetched['usernamePelanggan'] ?>">
					</div>
					<div class="error-msg">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(setted($_POST, "customerEmail"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo($_POST['alamat']);} else {echo($UIDFetched['alamatPelanggan']);} ?></textarea>
					</div>
					<div class="error-msg">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(setted($_POST, "alamat"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="customerpwdOLD">Password Lama</label>
						<input type="password" id="customerpwdOLD" name="customerpwdOLD">
					</div>
					<div class="error-msg">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(setted($_POST, "customerpwdOLD"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="customerpwdNEW">Password Baru</label>
						<input type="password" id="customerpwdNEW" name="customerpwdNEW">
					</div>
					<div class="error-msg">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(setted($_POST, "customerpwdNEW"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<button type="submit" name="edit">Edit Profil</button>
					</div>
				</div>
				<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {updateUserData($failUpdate, PDO_Connect, ($_SESSION['userID'] ?? $_COOKIE['userID'] ?? FALSE), $_POST['customerEmail'], $_POST['customerpwdNEW'], $_POST['alamat']);} ?>
			</form>
		</div>

		<?php 
		$wallet = selectData("SELECT * FROM wallet WHERE kodePelanggan = {$UIDFetched['kodePelanggan']}")
		?>
		
		<div class="formin-container">
			<form action="" method="POST">
				<div class="form-title">
					<h2>Customer Wallets</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="dana">DANA</label>
						<input type="text" id="dana" name="dana" value="">
					</div>
					<div class="error-msg"><!-- div error message --></div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="gopay">GOPAY</label>
						<input type="text" id="gopay" name="gopay" value="">
					</div>
					<div class="error-msg"><!-- div error message --></div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="ovo">OVO</label>
						<input type="text" id="ovo" name="ovo" value="">
					</div>
					<div class="error-msg"><!-- div error message --></div>
				</div>
				<div class="form-element">
					<div class="input-field button">
						<button type="submit" name="tambah">Tambah Wallet</button>
						<button onclick="location.href='wallet-edit.php'" type="button">Edit Wallet</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>