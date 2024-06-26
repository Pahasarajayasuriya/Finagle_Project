<?php

$role = "Admin";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/admin_dashboard2.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="home-section">
  <?php
       $this->view('includes/emp_topbar', $data);
      ?>
      
    <div class="grid-container">
      
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>PRODUCTS</h3>
              <span class="material-icons-outlined">inventory_2</span>
            </div>
            <h1><?= $data['counts']['product_count']; ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>BRANCHES</h3>
              <span class="material-icons-outlined">storefront</span>
            </div>
            <h1><?= $data['counts']['branch_count']; ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>CUSTOMERS</h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1><?= $data['counts']['customer_count']; ?></h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>DELIVERERS</h3>
              <span class="material-icons-outlined">local_shipping</span>
              <!-- <span class="material-icons-outlined">notification_important</span> -->
            </div>
            <h1><?= $data['counts']['deliverer_count']; ?></h1>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title">Top 5 Products</h2>
            <div id="bar-chart"></div>
          </div>
          <script>
            var totalOrders = <?= json_encode($data['totalOrders']); ?>;
            var topSellingProducts = <?= json_encode($data['topSellingProducts']); ?>;
          </script>
          <div class="charts-card">
            <h2 class="chart-title">Number of Orders</h2>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
  <script src="<?= ROOT ?>/assets/js/admin_dashboard.js"></script>

  <script>
        document.addEventListener("DOMContentLoaded", function() {


            var navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 0) {
                    navbar.style.backgroundColor = "white";
                } else {
                    navbar.style.backgroundColor = "transparent";
                }
            });
        });
    </script>
</body>


</html>