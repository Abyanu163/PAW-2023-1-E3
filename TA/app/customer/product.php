<?php
$page = 'product';
$title = 'Product List';

session_start();
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php
$_SESSION["kodePelanggan"] = 1;
$data = selectData("SELECT * FROM products p
                  JOIN categories c ON (p.kodeKategori = c.kodeKategori)");
$keranjang = selectData("SELECT * FROM orders WHERE kodePelanggan={$_SESSION['kodePelanggan']} AND keterangan='belum'");
?>

<section id="content">
	<div class="main-container">
		<form action="#" method="get">
			<div class="search">
				<input type="text" placeholder="Search product, categories">
				<button type="submit">
					<img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
				</button>
			</div>
		</form>

		<div class="card-container">
			<h2>Product List:</h2>

			<!-- Product List -->
			<div class="card-list grid">
				<?php foreach($data as $ch): ?>
				<div class="card">
					<div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/product/<?= $ch['gambarProduk'] ?>);"></div>
					<div class="card-desc">
						<h3><?= $ch["namaProduk"] ?></h3>
						<p class="prod-cate"><?= $ch["namaKategori"] ?></p>
						<p class="prod-desc"><?= $ch["deskripsiProduk"] ?></p>
						<p class="prod-stok">Stock: <?= $ch["stokProduk"] ?></p>
					</div>
					<div class="act-product">
						<p class="prod-price"><?= $ch["hargaProduk"] ?></p>
						<?php if ($ch["stokProduk"] > 0 && !empty($keranjang)) { ?>
							<a href="cart-add.php?id=<?= $ch["kodeProduk"] ?>" class="prod-button">
								<img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
							</a>
						<?php } else if ($ch["stokProduk"] <= 0 && !empty($keranjang)) { ?>
							<a class="prod-button disabled" disabled>
								<img src="<?= BASEURL  ?>/assets/img/cart-x.png" alt="cart">
							</a>
						<?php } else { ?>
							<a class="prod-button disabled" disabled>
								<img src="<?= BASEURL  ?>/assets/img/cart-fast.png" alt="cart">
							</a>
						<?php } ?>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- end card List -->
			</div>
			<!-- end card container -->
		</div>

	</div>
</section>

<?php
if (empty($keranjang)) { ?>
	<a href="<?= BASEURL ?>/app/customer/makeCart.php" class="box-link">
		<img src="<?= BASEURL  ?>/assets/img/cart-fast.png" alt="cart-shopping">
		Buat Keranjang
	</a>
<?php } else {
	$_SESSION["kodePesanan"] = $keranjang[0]['kodePesanan'] ?>
	<a href="<?= BASEURL ?>/app/customer/cart.php" class="circle-link">
		<img src="<?= BASEURL  ?>/assets/img/cart-shopping.png" alt="cart-shopping">
	</a>
<?php } ?>

<?php require_once 'templates/footer.php'; ?>