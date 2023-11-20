<?php
$page = 'product';
$title = 'Check Out';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<section>
	<div class="main-container">
		<div class="card-container">
			<h2>Check Out:</h2>

			<!-- Product List -->
			<div class="card-list checkout">
				<div class="card">
					<div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
					<div class="card-desc checkout">
						<h3>Product name</h3>
						<p class="prod-desc">300gr</p>
					</div>
					<div class="act-product">
						<div class="amount-product">
							Quantity: 0
						</div>
					</div>
				</div>

			</div>

		</div>

		<form action="">
			<div class="payment">
				<h3>Jumlah Barang: 0</h3>
				<h3>Total Bayar: 0</h3>
				<label for="payment-method">Payment Method:</label>
				<select name="payment-method" id="payment-method">
					<option value="dana">DANA</option>
					<option value="gopay">GOPAY</option>
					<option value="cod">COD</option>
				</select>
				<button name="pay">Pay</button>
			</div>
		</form>
	</div>
</section>

<a href="<?= BASEURL ?>/app/customer/cart.php" class="circle-link">
	<img src="<?= BASEURL  ?>/assets/img/cart-shopping.png" alt="cart-shopping">
</a>

<?php require_once 'templates/footer.php'; ?>