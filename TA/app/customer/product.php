<?php 
$page = 'product';
$title = 'Product List';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<section id="content">
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
        <div class="card-list grid">
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart">
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
              <p class="prod-stok">Stock: 0</p>
            </div>
            <div class="act-product">
              <a href="#" class="prod-button">
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

  
  <a href="<?= BASEURL ?>/app/customer/cart.php" class="circle-link">
    <img src="<?= BASEURL  ?>/assets/img/cart-shopping.png" alt="cart-shopping">
  </a>

<?php require_once 'templates/footer.php'; ?>