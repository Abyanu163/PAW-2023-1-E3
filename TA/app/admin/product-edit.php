<?php 
$page = 'product';
$title = 'Edit Product';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

  <section>
    <div class="main-container">
      <div class="formin-container">
        <form action="">
          <div class="form-title">
            <h2>Edit Product</h2>
          </div>
          <div class="form-element">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori">
              <option value="1">kategori1</option>
              <option value="2">kategori2</option>
              <option value="3">kategori3</option>
            </select>
          </div>
          <div class="form-element">
            <label for="supplier">Supplier</label>
            <select id="supplier" name="supplier">
              <option value="1">supplier1</option>
              <option value="2">supplier2</option>
              <option value="3">supplier3</option>
            </select>
          </div>
          <div class="form-element">
            <label for="nama">Nama Produk</label>
            <input type="text" id="nama">
          </div>
          <div class="form-element">
            <label for="gambar">Gambar lama</label>
            <div class="form-gambar">
              <img src="<?= BASEURL ?>/assets/img/picture/meat.jpg" alt="">
            </div>
          </div>
          <div class="form-element">
            <label for="gambar">Gambar baru</label>
            <input type="file" id="gambar">
          </div>
          <div class="form-element">
            <label for="harga">Harga</label>
            <input type="text" id="harga">
          </div>
          <div class="form-element">
            <label for="stok">Stok</label>
            <input type="text" id="stok">
          </div>
          <div class="form-element">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"></textarea>
          </div>
          <div class="form-element button">
            <button href="">Edit</button>
            <button href="" class="cancel">Cancel</button>
          </div>
        </form>
      </div>
      
    </div>
  </section>

<?php require_once 'templates/footer.php'; ?>