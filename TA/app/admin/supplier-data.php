<?php
$page = 'supplier';
$title = 'Supplier Data';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php 
$query="SELECT namaSuplaier, namaProduk FROM suplaier s
JOIN products p ON (s.kodeSuplaier=p.kodeSuplaier)";
$data = selectData("SELECT * FROM suplaier");
$produk=selectData($query);
?>

<section>
	<div class="main-container">
		<form action="#" method="get">
			<div class="search">
				<input type="text" placeholder="Search product">
				<button type="submit">
					<img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
				</button>
			</div>
		</form>

		<div class="card-container">
			<h2>Supplier List:</h2>

			<!-- Product List -->
			<div class="card-list grid">
				<?php foreach ($data as $ch) : ?>
					<div class="card categories">
						<div class="card-desc no-pict">
							<h3><?= $ch["namaSuplaier"] ?></h3>
							<p class="prod-cate"><?= $ch["alamatSuplaier"] ?></p>
							<p class="prod-desc"><?= $ch["telpSuplaier"] ?></p>
							<ul class="prod-item">
								Produk:
								<?php
								$count = 0;
								foreach ($produk as $p) {
									if ($p["namaSuplaier"] == $ch["namaSuplaier"]) { ?>
										<li><?= $p["namaProduk"] ?></li>
									<?php $count++;
									} ?>
								<?php }
								if ($count == 0) { ?>
									<b>Tidak Ada Produk</b>
								<?php } ?>
							</ul>
						</div>
						<div class="act-product">
							<a href="<?= BASEURL  ?>/app/admin/supplier-edit.php?id=<?= $ch["kodeSuplaier"]?>" class="prod-button">
								<img src="<?= BASEURL  ?>/assets/img/edit.png" alt="cart">
							</a>
							<a href="<?= BASEURL  ?>/app/admin/supplier-delete.php?id=<?= $ch["kodeSuplaier"]?>" class="prod-button delete">
								<img src="<?= BASEURL  ?>/assets/img/delete.png" alt="cart">
							</a>
						</div>
					</div>
				<?php endforeach; ?>

			</div>

		</div>
	</div>
</section>

<a href="<?= BASEURL ?>/app/admin/supplier-add.php" class="box-link">
	<img src="<?= BASEURL  ?>/assets/img/plus.png" alt="plus">
	Add Supplier
</a>

<?php require_once 'templates/footer.php'; ?>