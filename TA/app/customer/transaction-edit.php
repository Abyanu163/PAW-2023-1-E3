<?php
$page = 'transaction';
$title = 'Transaction Data';
session_start();
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php
$id=$_GET['id'];
$data = selectData(
	"SELECT * FROM pembayaran 
	WHERE kodePembayaran = $id;
	;"
);

?>

<section id="content">
	<div class="main-container">
    <div class="formin-container">
			<form action="" method="post">
				<input type="hidden" name="id" value="<?= $id ?>">
				<div class="form-title">
					<h2>Edit Metode Pembayaran</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="waktuBayar">Tanggal Transaksi</label>
						<input type="text" id="waktuBayar" name="waktuBayar" readonly value="<?= $data[0]['waktuBayar'] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="metode">Metode Pembayaran</label>
						<input type="text" id="metode" name="metode" value="<?= $data[0]['metode'] ?>">

					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="total">Total</label>
						<input type="text" id="total" name="total" readonly value="<?= $data[0]['total'] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field button">
						<button type="submit" name="edit" value="Edit">Edit</button>
						<button onclick="location.href='transaction.php'" type="button" class="cancel">Cancel</button>
					</div>
				</div>
			</form>
		</div>
		<!-- end card container -->

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>