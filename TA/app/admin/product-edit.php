<?php
$page = 'product';
$title = 'Edit Product';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php 
$data = selectData("SELECT * FROM products WHERE kodeProduk=$_GET[id]");
$suplai = selectData("SELECT * FROM suplaier");
$kategori = selectData("SELECT * FROM categories");
if(isset($_POST["edit"])){
    if (editProduk($_POST)>0){
        echo "
        <script>
            alert('Data Berhasil Diubah !!!');
            document.location.href='product-data.php';
        </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Diubah !!!');
            document.location.href='product-data.php';
        </script>
        ";
    };
}
?>

<section>
	<div class="main-container">
		<div class="formin-container">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $data[0]['kodeProduk'];?>">
        <input type="hidden" name="gambarLama" value="<?= $data[0]["gambarProduk"];?>">
				<div class="form-title">
					<h2>Edit Product</h2>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori">
								<?php foreach($kategori as $ch){
										if($ch["kodeKategori"]==$data[0]["kodeKategori"]){?>
												<option value="<?= $ch["kodeKategori"] ?>"><?= $ch["namaKategori"] ?></option>
										<?php }}?>
										<?php foreach($kategori as $ch){
										if($ch["kodeKategori"]!=$data[0]["kodeKategori"]){?>
												<option value="<?= $ch["kodeKategori"] ?>"><?= $ch["namaKategori"] ?></option>
										<?php }}?>
						</select>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="suplai">Supplier</label>
						<select name="suplai" id="suplai">
								<?php foreach($suplai as $ch){
										if($ch["kodeSuplaier"]==$data[0]["kodeSuplaier"]){?>
												<option value="<?= $ch["kodeSuplaier"] ?>"><?= $ch["namaSuplaier"] ?></option>
										<?php }}?>
										<?php foreach($suplai as $ch){
										if($ch["kodeSuplaier"]!=$data[0]["kodeSuplaier"]){?>
												<option value="<?= $ch["kodeSuplaier"] ?>"><?= $ch["namaSuplaier"] ?></option>
										<?php }}?>
						</select>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="nama">Nama Produk</label>
						<input type="text" name="namaProduk" id="namaProduk" value="<?= $data[0]["namaProduk"] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="gambar">Gambar lama</label>
						<div class="form-gambar">
							<img src="<?= BASEURL ?>/assets/img/picture/<?= $data[0]['gambarProduk'] ?>" alt="">
						</div>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="gambar">Gambar baru</label>
						<input type="file" name="gambar" id="gambar">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="harga">Harga</label>
						<input type="text" name="harga" id="harga" value="<?= $data[0]["hargaProduk"] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="stok">Stok</label>
						<input type="text" name="stok" id="stok" value="<?= $data[0]["stokProduk"] ?>">
					</div>
				</div>
				<div class="form-element">
					<div class="input-field">
						<label for="deskripsi">Deskripsi</label>
						<textarea name="deskripsi" id="deskripsi"><?= $data[0]["deskripsiProduk"] ?></textarea>
					</div>
				</div>
				<div class="form-element">
					<div class="input-field button">
						<button type="submit" value="Edit" name="edit">Edit</button>
						<button onclick="location.href='product-data.php'" type="button" class="cancel">Cancel</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</section>

<?php require_once 'templates/footer.php'; ?>