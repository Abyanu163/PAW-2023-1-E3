<?php
$page = 'product';
$title = 'Check Out';
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

<?php 
if(isset($_POST['pay'])) {
	if(addPembayaran($data[0]['kodePesanan'], $_POST['payment-method'])) {
		echo "
    <script>
    alert('Pembayaran Berhasil');
    document.location.href='product.php';
    </script>
    ";
	} else {
		echo "
    <script>
    alert('Pembayaran Gagal');
    </script>
    ";
	}

}
?>

<section>
	<div class="main-container">
		<div class="card-container">
			<h2>Check Out:</h2>

			<!-- Product List -->
			<div class="card-list checkout">
				<?php 
				$totalHarga = 0; 
				$jumlahBarang = 0;
				?>
				<?php foreach($data as $ch): ?>
				<div class="card">
					<div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/product/<?= $ch["gambarProduk"] ?>);"></div>
					<div class="card-desc checkout">
						<h3><?= $ch["namaProduk"] ?></h3>
						<p class="prod-desc"><?= $ch["deskripsiProduk"] ?></p>
					</div>
					<div class="act-product">
						<p class="prod-price"><?= $ch["subHarga"] ?></p>
						<div class="amount-product">
							Quantity: <?= $ch["qty"] ?>
						</div>
					</div>
				</div>
				<?php 
				$totalHarga += (int)$ch["subHarga"];
				$jumlahBarang += (int)$ch['qty'];
				?>
				<?php endforeach; ?>

			</div>

		</div>

		<form action="" method="post">
			<div class="payment">
				<h3>Jumlah Barang: <?= $totalHarga; ?></h3>
				<h3>Total Bayar: <?= $jumlahBarang; ?></h3>
				<label for="payment-method">Payment Method:</label>
				<select name="payment-method" id="payment-method">
					<option value="DANA">DANA</option>
					<option value="GOPAY">GOPAY</option>
					<option value="COD">COD</option>
				</select>
				<button type="submit" name="pay">Pay</button>
			</div>
		</form>
	</div>
</section>

<a href="<?= BASEURL ?>/app/customer/cart.php" class="circle-link">
	<img src="<?= BASEURL  ?>/assets/img/cart-shopping.png" alt="cart-shopping">
</a>

<?php require_once 'templates/footer.php'; ?>