<?php 
$page = 'supplier';
$title = 'Add Supplier';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

  <section>
    <div class="main-container">
      <div class="formin-container">
        <form action="">
          <div class="form-title">
            <h2>Add Supplier</h2>
          </div>
          <div class="form-element">
            <label for="nama">Nama Supplier</label>
            <input type="text" id="nama">
          </div>
          <div class="form-element">
            <label for="alamat">Alamat Supplier</label>
            <input type="text" id="alamat">
          </div>
          <div class="form-element">
            <label for="notelp">No. Telp Supplier</label>
            <input type="text" id="notelp">
          </div>
          <div class="form-element button">
            <button href="">Add</button>
            <button href="" class="cancel">Cancel</button>
          </div>
        </form>
      </div>
      
    </div>
  </section>

<?php require_once 'templates/footer.php'; ?>