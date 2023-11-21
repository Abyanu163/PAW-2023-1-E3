<?php
$page = 'product';
$title = 'Shopping Cart';

session_start();
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

<?php
$produk = selectData("SELECT * FROM products WHERE kodeProduk={$_GET['id']}");
$cek = selectData("SELECT * FROM orderdetail WHERE kodePesanan={$_SESSION["kodePesanan"]} AND kodeProduk={$_GET['id']}");

if (isset($_POST['tambah'])) {
  if ($_SESSION['jumlah'] < $produk[0]["stokProduk"]) {
    $_SESSION['jumlah'] += 1;
  }
} else if (isset($_POST['kurang'])) {
  if ($_SESSION['jumlah'] > 1) {
    $_SESSION['jumlah'] -= 1;
  }
} else if (!isset($_POST['kurang']) && !isset($_POST['tambah']) && !isset($_POST['masukkan'])) {
  $_SESSION['jumlah'] = 1;
}

$_POST["jumlah"] = $_SESSION['jumlah'];
$_POST["kodeProduk"] = intval($_GET['id']);
$_POST["kodePesanan"] = $_SESSION["kodePesanan"];
$_POST["subHarga"] = $produk[0]['hargaProduk'] * $_SESSION["jumlah"];

if ($cek == []) {
  if (isset($_POST["masukkan"])) {
    $tambah = addOrderDetail($_POST['kodePesanan'], $_POST['kodeProduk'], $_SESSION['jumlah']);
    if ($tambah > 0) {
      echo "<script>
            alert('BARANG BERHASIL DITAMBAHKAN KE KERANJANG !!!')
            document.location.href='cart.php';
            </script>";
    }
  }
} else {
  echo "<script>
    alert('BARANG SUDAH ADA DI KERANJANG !!!')
    document.location.href='cart.php';
    </script>";
}
?>

<section>
  <div class="main-container">

    <div class="card-container">
      <h2>Jumlah Produk:</h2>
      <form action="" method="post">
        <!-- Product List -->
        <div class="card-list grid">
          <div class="card">
            <div class="card-pict" style="background-image: url(<?= BASEURL ?>/assets/img/product/<?= $produk[0]['gambarProduk'] ?>);"></div>
            <div class="card-desc cart">
              <h3><?= $produk[0]['namaProduk'] ?></h3>
              <p class="prod-desc"><?= $produk[0]["deskripsiProduk"] ?></p>
              <p class="prod-stok">Stock: <?= $produk[0]["stokProduk"] ?></p>
              <p class="prod-price"><?= $produk[0]['hargaProduk'] * $_SESSION["jumlah"] ?></p>
            </div>
            <div class="act-product">
              <div class="quantity">
                <button type="submit" name="kurang" value="-" class="minus">-</button>
                <div class="amount"><?= $_SESSION["jumlah"] ?></div>
                <button type="submit" name="tambah" value="+" class="plus">+</button>
              </div>
              <button type="submit" name="masukkan" value="Masukkan Order" class="prod-button">
                <img src="<?= BASEURL  ?>/assets/img/cart-plus.png" alt="cart-minus">
              </button>
            </div>
          </div>
          <!-- end card list -->
        </div>
      </form>
      <!-- end card container -->
    </div>

  </div>
</section>

<?php require_once 'templates/footer.php'; ?>