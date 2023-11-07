<?php 
$page = 'product';
$title = 'Product List';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<section>
    <div class="main-container">
      <form action="#" method="get">
        <div class="search">
          <input type="text" placeholder="Search product, categories">
          <button type="submit">
            <img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
          </button>
        </div>
      </form>
      
      <div class="card-container">
        <h2>Product List:</h2>

        <!-- Product List -->
        <div class="card-list">
          <div class="card">
            <div class="card-pict"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p>Categories</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, rerum!</p>
              <p>Stock: 0</p>
            </div>
            <div class="buy-product">
              <a href="#" class="cart-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <!-- end card List -->
        </div>
        <!-- end card container -->
      </div>

    </div>
  </section>

  
  <a href="<?= BASEURL ?>/app/customer/shopping-cart.php" class="cart-link">
    <img src="<?= BASEURL  ?>/assets/img/cart-shopping.png" alt="cart-shopping">
  </a>

<?php require_once 'templates/footer.php'; ?>