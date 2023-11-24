<?php
$page = 'product';
$title = 'Add Product';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php 
$gagal = FALSE;
$data=selectData("SELECT * FROM suplaier");
?>

<section>
	<div class="main-container">
		<div class="formin-container">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-title">
					<h2>Add Product</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="kategori">Kategori</label>
						<select id="kategori" name="kategori">
							<option value="1">Chiken</option>
							<option value="2">Wagyu</option>
							<option value="3">Local Cow</option>
							<option value="4">Goat</option>
						</select>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="supplier">Supplier</label>
						<select name="suplai" id="suplai">
							<?php for($i = 0; $i<count($data); $i++){?>
								<option value="<?= $data[$i]['kodeSuplaier']?>"><?= $data[$i]['namaSuplaier'] ?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
					<label for="namaProduk">Nama Produk</label>
        			<input type="text" name="namaProduk" id="namaProduk" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo($_POST["namaProduk"]);} ?>">
					</div>
					<div class="input-field">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(terisikan($_POST, "namaProduk"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="gambar">Masukkan gambar</label>
						<input type="file" name="gambar" id="gambar">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="harga">Harga Produk</label>
						<input type="text" name="harga" id="harga" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo($_POST["harga"]);} ?>">
					</div>
					<div class="input-field">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(terisikan($_POST, "harga"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="stok">Stok Produk</label>
						<input type="text" name="stok" id="stok" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo($_POST["stok"]);} ?>">
					</div>
					<div class="input-field">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(terisikan($_POST, "stok"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="deskripsi">Deskripsi</label>
						<textarea name="deskripsi" id="deskripsi"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo($_POST["deskripsi"]);} ?></textarea>
					</div>
					<div class="input-field">
						<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo(terisikan($_POST, "deskripsi"));} ?>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field button">
						<button type="submit" value="Tambah" name="tambah">Add</button>
						<button onclick="location.href='product-data.php'" type="button" class="cancel">Cancel</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>

<?php 
if(isset($_POST["tambah"]) && $gagal == FALSE){
	tambahProduk($_POST);
	echo "<script>
	alert('Data berhasil diupload');
	window.location.href='product-data.php';
	</script>";
	exit();
}
require_once 'templates/footer.php'; ?>