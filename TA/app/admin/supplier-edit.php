<?php
$page = 'supplier';
$title = 'Edit Supplier';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php 
$id=$_GET['id'];
$data = selectData("SELECT * FROM suplaier WHERE kodeSuplaier = $id");
if(isset($_POST["edit"])){
    if(editSuplaier($_POST)>0){
        echo "<script>
        alert('suplaier Berhasil Diedit !!!');
        document.location.href='supplier-data.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('suplaier Gagal Diedit !!!');
        </script>
        ";
    }
}
?>

<section>
	<div class="main-container">
		<div class="formin-container">
			<form action="" method="post">
				<input type="hidden" name="id" value="<?= $id ?>">
				<div class="form-title">
					<h2>Edit Supplier</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="nama">Nama Supplier</label>
						<input type="text" id="nama" name="nama" value="<?= $data[0]['namaSuplaier'] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="alamat">Alamat Supplier</label>
						<input type="text" id="alamat" name="alamat" value="<?= $data[0]['alamatSuplaier'] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="nomor">No. telp Supplier</label>
						<input type="text" id="nomor" name="nomor" value="<?= $data[0]['telpSuplaier'] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field button">
						<button type="submit" name="edit" value="Edit">Edit</button>
						<button onclick="location.href='supplier-data.php'" type="button" class="cancel">Cancel</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>