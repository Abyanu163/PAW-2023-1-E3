<?php 
$page = 'customer';
$title = 'Customer Data';
?>

<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/navbar.php' ?>

  <section id="content">
    <div class="main-container">
      <form action="#" method="get">
        <div class="search">
          <input type="text" placeholder="Search customer">
          <button type="submit">
            <img src="<?= BASEURL  ?>/assets/img/search.png" alt="search">
          </button>
        </div>
      </form>
      
      <div class="card-container">
        <h2>Customer List:</h2>

        <div class="table-container admin">
          <table>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Alamat</th>
            </tr>
            <tr>
              <td>Username Customer</td>
              <td>Email Customer</td>
              <td>Alamat Customer</td>
            </tr>
          </table>
          <!-- end table -->
        </div>
        <!-- end card container -->
      </div>

    </div>
  </section>

<?php require_once 'templates/footer.php'; ?>