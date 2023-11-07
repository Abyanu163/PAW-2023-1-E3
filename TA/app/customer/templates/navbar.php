  <section>
    <nav>
      <div class="nav-container">
        <div class="logo">
          <h1>Title</h1>
        </div>
        <ul class="link-list">
          <li><a href="<?= BASEURL ?>/app/customer/product.php" class="<?php if($page == 'product') echo 'link-active' ?>">Product</a></li>
          <li><a href="<?= BASEURL ?>/app/customer/categories.php" class="<?php if($page == 'categories') echo 'link-active' ?>">Categories</a></li>
          <li><a href="<?= BASEURL ?>/app/customer/profil.php" class="<?php if($page == 'profil') echo 'link-active' ?>">Profil</a></li>
          <li><a href="#">Log out</a></li>
        </ul>
        <div class="hamburger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </nav>
  </section>