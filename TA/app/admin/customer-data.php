<?php
$page = 'customer';
$title = 'Customer Data';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php $data=selectData("SELECT * FROM customers"); ?>

<section id="content">
	<div class="main-container">
		<form action="#" method="get">
			<div class="search">
				<input type="text" placeholder="Search customer">
				<button type="submit">
					<img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
				</button>
			</div>
		</form>

		<div class="card-container">
			<h2>Customer List:</h2>

			<div class="table-container admin">
				<table>
					<tr>
						<th>No.</th>
						<th>Username</th>
						<th>Alamat</th>
					</tr>
					<?php $i = 0; foreach($data as $ch): ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $ch["usernamePelanggan"] ?></td>
							<td><?= $ch["alamatPelanggan"] ?></td>
						</tr>
					<?php $i++; endforeach; ?>
				</table>
				<!-- end table -->
			</div>
			<!-- end card container -->
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>