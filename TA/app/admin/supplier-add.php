<?php
$page = 'supplier';
$title = 'Add Supplier';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php 
if(isset($_POST["tambah"])){
	$tambah=tambahSuplaier($_POST);
	if($tambah>0){
			echo "<script>
			alert('suplaier berhasil ditambahkan');
			window.location.href='supplier-data.php';
			</script>";
			exit();
	} else{
			echo "<script>
			alert('suplaier gagal ditambahkan');
			</script>";
	}   
}
?>

<section>
	<div class="main-container">
		<div class="formin-container">
			<form action="" method="post">
				<div class="form-title">
					<h2>Add Supplier</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="nama">Nama Supplier</label>
						<input type="text" name="nama" id="nama">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="alamat">Alamat Supplier</label>
						<input type="text" name="alamat" id="alamat">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="no">No. Telp Supplier</label>
						<input type="text" name="no" id="no">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field button">
						<button type="submit" name="tambah" value="Tambah">Add</button>
						<button onclick="location.href='supplier-data.php'" type="button" class="cancel">Cancel</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>