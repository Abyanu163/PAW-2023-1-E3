<?php
$page = 'profil';
$title = 'Profil';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<section>
	<div class="main-container">
		<div class="formin-container">
			<form action="">
				<div class="form-title">
					<h2>Customer Profile</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="username">Username</label>
						<input type="text" id="username" disabled value="Username">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="email">Email</label>
						<input type="text" id="email" value="Email">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat"></textarea>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="email">Old Password</label>
						<input type="text" id="email">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="email">New Password</label>
						<input type="text" id="email">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<button>Edit Profil</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>