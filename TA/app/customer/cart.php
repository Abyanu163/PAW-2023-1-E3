<?php
$page = 'product';
$title = 'Shopping Cart';

session_start();
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php 
$data=selectData("SELECT * FROM orders o
JOIN orderdetail od ON (o.kodePesanan=od.kodePesanan)
JOIN products p ON (od.kodeProduk=p.kodeProduk)
WHERE o.kodePelanggan={$_SESSION['kodePelanggan']} AND o.keterangan='belum'
");
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
			<h2>Product List:</h2>

			<!-- Product List -->
			<div class="card-list grid">
				<?php foreach($data as $ch): ?>
					<div class="card">
						<div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/product/<?= $ch["gambarProduk"] ?>);"></div>
						<div class="card-desc cart">
							<h3><?= $ch["namaProduk"] ?></h3>
							<p class="prod-price"><?= $ch["subHarga"] ?></p>
						</div>
						<div class="act-product">
							<div class="amount-product">
								Quantity: <?= $ch["qty"] ?>
							</div>
							<a href="cart-delete.php?idPesanan=<?= $ch["kodePesanan"] ?>&idProduk=<?= $ch['kodeProduk'] ?>" class="prod-button red">
								<img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			<!-- end card List -->
			</div>
		<!-- end card container -->
		</div>

	</div>
</section>

<a href="<?= BASEURL  ?>/app/customer/checkout.php" class="box-link">
	<img src="<?= BASEURL  ?>/assets/img/cart-check.png" alt="cart-check">
	Check out
</a>

<?php require_once 'templates/footer.php'; ?>