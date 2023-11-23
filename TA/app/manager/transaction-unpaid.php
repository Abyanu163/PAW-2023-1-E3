<?php
$page = 'unpaid';
$title = 'Transaksi Belum Dibayar';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php
$data = selectData(
	"SELECT o.kodePesanan, c.usernamePelanggan, 
		(SELECT SUM(od.subHarga) FROM orderdetail od WHERE od.kodePesanan = o.kodePesanan) AS totalHarga, 
		(SELECT SUM(od.qty) FROM orderdetail od WHERE od.kodePesanan = o.kodePesanan) AS totalBarang
	FROM orders o
	JOIN customers c ON (o.kodePelanggan = c.kodePelanggan)
	WHERE o.keterangan = 'belum'
	;"
);

?>

<section id="content">
	<div class="main-container">

		<div class="card-container">
			<h2>Transaksi Belum Dibayar:</h2>
			<!-- <?php var_dump($data) ?> -->

			<div class="table-container unpaid">
				<table>
					<tr>
						<th>Username</th>
						<th>Total Harga</th>
						<th>Total Barang</th>
						<th>Detail</th>
					</tr>
					<?php foreach($data as $ch): ?>
						<tr>
							<td><?= $ch['usernamePelanggan'] ?></td>
							<td><?= $ch['totalHarga'] ?></td>
							<td><?= $ch['totalBarang'] ?></td>
							<td><a href="transaction-detail.php?isPaid=unpaid&kodePesanan=<?= $ch['kodePesanan'] ?>">detail</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<!-- end table -->
			</div>
			<!-- end card container -->
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>