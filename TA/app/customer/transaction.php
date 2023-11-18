<?php 
$page = 'transaction';
$title = 'Transaction Data';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

  <section id="content">
    <div class="main-container">
      <form action="#" method="get">
        <div class="search">
          <input type="text" placeholder="Search date, method, total">
          <button type="submit">
            <img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
          </button>
        </div>
      </form>
      
      <div class="card-container">
        <h2>Transaction History:</h2>

        <div class="table-container customer">
          <table>
            <tr>
              <th>Tanggal Transaksi</th>
              <th>Metode Pembayaran</th>
              <th>Total</th>
              <th>Detail</th>
            </tr>
            <tr>
              <td>21-10-2023</td>
              <td>DANA</td>
              <td>Rp. 200.000,00</td>
              <td><a href="">detail</a></td>
            </tr>
            <tr>
              <td>21-10-2023</td>
              <td>DANA</td>
              <td>Rp. 200.000,00</td>
              <td><a href="">detail</a></td>
            </tr>
            <tr>
              <td>21-10-2023</td>
              <td>DANA</td>
              <td>Rp. 200.000,00</td>
              <td><a href="">detail</a></td>
            </tr>
            <tr>
              <td>21-10-2023</td>
              <td>DANA</td>
              <td>Rp. 200.000,00</td>
              <td><a href="">detail</a></td>
            </tr>
            <tr>
              <td>21-10-2023</td>
              <td>DANA</td>
              <td>Rp. 200.000,00</td>
              <td><a href="">detail</a></td>
            </tr>
          </table>
          <!-- end table -->
        </div>
        <!-- end card container -->
      </div>

    </div>
  </section>

<?php require_once 'templates/footer.php'; ?>