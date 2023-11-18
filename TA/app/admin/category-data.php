<?php 
$page = 'category';
$title = 'Category Data';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<section>
    <div class="main-container">
      <form action="#" method="get">
        <div class="search">
          <input type="text" placeholder="Search product">
          <button type="submit">
            <img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
          </button>
        </div>
      </form>
      
      <div class="card-container">
        <h2>Category List:</h2>

        <!-- Product List -->
        <div class="card-list grid">
          <div class="card categories">
            <div class="card-desc no-pict">
              <h3>Category name</h3>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/edit.png" alt="cart">
              </a>
              <a href="#" class="prod-button delete">
                <img src="<?= BASEURL  ?>/assets/img/delete.png" alt="cart">
              </a>
            </div>
          </div>          

        </div>

      </div>
    </div>
  </section>

  <a href="<?= BASEURL ?>/app/admin/add-product.php" class="box-link">
    <img src="<?= BASEURL  ?>/assets/img/plus.png" alt="plus">
    Add Supplier
  </a>

<?php require_once 'templates/footer.php'; ?>