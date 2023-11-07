<?php 
$page = 'categories';
$title = 'Product Categories';
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
        <div class="card-list">
          <div class="card">
            <div class="card-desc">
              <h3>Category name</h3>
            </div>
            <div class="browse-product">
              <a href="#" class="goto-product">
                Product List
              </a>
            </div>
          </div>          

        </div>

      </div>

    </div>
  </section>

<?php require_once 'templates/footer.php'; ?>