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

		<div class="card-container">
			<h2>Supplier List:</h2>

			<div class="table-container supplier">
				<table>
					<tr>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No. Telp</th>
						<th>Produk</th>
						<th>Aksi</th>
					</tr>
					<?php foreach ($data as $ch) : ?>
						<tr>
							<td><?= $ch["namaSuplaier"] ?></td>
							<td><?= $ch["alamatSuplaier"] ?></td>
							<td><?= $ch["telpSuplaier"] ?></td>
							<td>
								<ul>
									<?php
									$count = 0;
									foreach ($produk as $p) :
										if ($p["namaSuplaier"] == $ch["namaSuplaier"]) { 
									?>
										<li><?= $p["namaProduk"] ?></li>
										<?php $count++;} ?>
									<?php endforeach;
									if ($count == 0) { ?>
										<b>Tidak Ada Produk</b>
									<?php } ?>
								</ul>
							</td>
							<td>
								<div class="act-product">
									<a href="<?= BASEURL  ?>/app/admin/supplier-edit.php?id=<?= $ch["kodeSuplaier"]?>" class="prod-button">
										<img src="<?= BASEURL  ?>/assets/img/edit.png" alt="cart">
									</a>
									<a href="<?= BASEURL  ?>/app/admin/supplier-delete.php?id=<?= $ch["kodeSuplaier"]?>" class="prod-button delete">
										<img src="<?= BASEURL  ?>/assets/img/delete.png" alt="cart">
									</a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<!-- end table -->
			</div>

		</div>
	</div>
</section>

<a href="<?= BASEURL ?>/app/admin/supplier-add.php" class="box-link">
	<img src="<?= BASEURL  ?>/assets/img/plus.png" alt="plus">
	Add Supplier
</a>

<?php require_once 'templates/footer.php'; ?>