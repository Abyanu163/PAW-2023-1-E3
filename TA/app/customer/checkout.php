<?php 
$page = 'product';
$title = 'Check Out';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<section>
    <div class="main-container">
      <div class="card-container">
        <h2>Check Out:</h2>

        <!-- Product List -->
        <div class="card-list">
          <div class="card">
            <div class="card-pict"></div>
            <div class="card-desc">
              <h3>Product name</h3>
              <!-- <p>Categories</p> -->
            </div>
            <div class="buy-product">
              <div class="amount-product">
                Quantity: 0
              </div>
              <a href="#" class="cart-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-minus.png" alt="cart-minus">
              </a>
            </div>
          </div>          

        </div>

      </div>

      <div class="payment">
        <h3>Jumlah Barang: 0</h3>
        <h3>Total Bayar: 0</h3>
        <label for="payment-method">Payment Method:</label>
        <select name="payment-method" id="payment-method">
          <option value="dana">DANA</option>
          <option value="gopay">GOPAY</option>
          <option value="cod">COD</option>
        </select>
        <button name="pay">Pay</button>
      </div>
    </div>
  </section>

  <?php require_once 'templates/footer.php'; ?>