<?php 
$title = 'Detail Transaksi';
require_once 'templates/header.php';

if(!isset($_GET['isPaid'])) {
  header('location: ' . BASEURL . '/app/manager/transaction-paid.php');
}

$page = $_GET['isPaid'];
require_once 'templates/navbar.php' 
?>

  <section id="content">
    <div class="main-container">
      <form action="#" method="get">
        <div class="search">
          <input type="text" placeholder="Search customer, date, method, total">
          <button type="submit">
            <img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
          </button>
        </div>
      </form>
      
      <div class="card-container">
        <h2>Transaction Detail:</h2>

        <div class="table-container detail">
          <table>
            <tr>
              <th>Product</th>
              <th>Jumlah</th>
              <th>Harga Satuan</th>
              <th>Total Harga</th>
            </tr>
            <tr>
              <td>Barang</td>
              <td>10</td>
              <td>Rp. 10.000,00</td>
              <td>Rp. 200.000,00</td>
            </tr>
          </table>
          <!-- end table -->
          <a href="<?php if($page == 'paid') echo BASEURL . '/app/manager/transaction-paid.php'; else echo BASEURL . '/app/manager/transaction-unpaid.php' ?>" class="back">Kembali</a>
        </div>
        <!-- end card container -->
      </div>

    </div>
  </section>

<?php require_once 'templates/footer.php'; ?>