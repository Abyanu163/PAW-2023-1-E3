<?php
$page = 'paid';
$title = 'Transaksi Sudah Dibayar';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php
$data = selectData(
	"SELECT * FROM pembayaran p
	JOIN orders o ON (p.kodePesanan = o.kodePesanan)
	JOIN customers c ON (o.kodePelanggan = c.kodePelanggan)
	WHERE o.keterangan = 'sudah'
	;"
);

$labelChart = [];
$valueChart = [];
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<section id="content">
	<div class="main-container">

		<div class="card-container">
			<h2>Transaksi Sudah Dibayar:</h2>

			<div class="chart-container">
				<div class="chart">
					<canvas id="myChart"></canvas>
				</div>
			</div>
			
			<div class="table-container paid">
					<table>
					<tr>
						<th>Username</th>
						<th>Tanggal Transaksi</th>
						<th>Metode Pembayaran</th>
						<th>Total Bayar</th>
						<th>Detail</th>
					</tr>
					<?php foreach($data as $ch): ?>
						<tr>
							<?php 
							$labelChart[] = $ch['waktuBayar'];
							$valueChart[] = $ch['total'];
							?>
							<td><?= $ch['usernamePelanggan'] ?></td>
							<td><?= $ch['waktuBayar'] ?></td>
							<td><?= $ch['metode'] ?></td>
							<td><?= $ch['total'] ?></td>
							<td><a href="transaction-detail.php?isPaid=paid&kodePesanan=<?= $ch['kodePesanan'] ?>">detail</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<!-- end table -->
			</div>
			<!-- end card container -->
		</div>

	</div>
</section>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labelChart); ?>,
            datasets: [{
                label: 'Daftar Pembelian',
                data: <?= json_encode($valueChart); ?>,
                borderWidth: 1,
								borderColor: '#36A2EB',
								backgroundColor: '#9BD0F5'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php require_once 'templates/footer.php'; ?>