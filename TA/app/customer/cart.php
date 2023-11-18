<?php 
$page = 'product';
$title = 'Shopping Cart';
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
        <h2>Product List:</h2>

        <!-- Product List -->
        <div class="card-list grid">
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/picture/meat.jpg);"></div>
            <div class="card-desc cart">
              <h3>Product name</h3>
              <p class="prod-cate">Categories</p>
              <p class="prod-desc">300gr</p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <a href="" class="minus">-</a>
                <div class="amount">0</div>
                <a href="" class="plus">+</a>
              </div>
              <a href="#" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          

        </div>

      </div>

    </div>
  </section>

  <a href="<?= BASEURL  ?>/app/customer/checkout.php" class="box-link">
    <img src="<?= BASEURL  ?>/assets/img/cart-check.png" alt="cart-check">
    Check out
  </a>

<?php require_once 'templates/footer.php'; ?>