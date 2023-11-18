  <section>
    <nav>
      <div class="nav-container admin">
        <a href="" class="logo">
          <img src="<?= BASEURL ?>/assets/img/meat.png" alt="meat-icon">
          <h1>MeatMaster<span>(admin)</span></h1>
        </a>
        <ul class="link-list">
          <li><a href="<?= BASEURL ?>/app/admin/product-data.php" class="<?php if($page == 'product') echo 'link-active' ?>">Product Data</a></li>
          <li><a href="<?= BASEURL ?>/app/admin/category-data.php" class="<?php if($page == 'category') echo 'link-active' ?>">Category Data</a></li>
          <li><a href="<?= BASEURL ?>/app/admin/supplier-data.php" class="<?php if($page == 'supplier') echo 'link-active' ?>">Supplier Data</a></li>
          <li><a href="<?= BASEURL ?>/app/admin/customer-data.php" class="<?php if($page == 'customer') echo 'link-active' ?>">Customer Data</a></li>
          <li><a href="#" class="logout" >Log out</a></li>
        </ul>
        <div class="hamburger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </nav>
  </section>