<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Branch</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/admin_style.css">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <!-- <span class="material-icons-outlined">shopping_cart</span> --> ADMIN
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="<?= ROOT?>/admin_dashboard" target="_self">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_self">
              <span class="material-icons-outlined">inventory_2</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="<?= ROOT?>/admin_branch" target="_self">
              <span class="material-icons-outlined">storefront</span> Branches
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">groups</span> Customers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">local_shipping</span> Deliverers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">manage_accounts</span> Employees
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">manage_accounts</span> Managers
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">featured_video</span> Advertisements
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#" target="_blank">
              <span class="material-icons-outlined">settings</span> Settings
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>BRANCH</h2>
          <button id ='add_button'>Add Branch</button>
        </div>
            <!-- ======Begine of the table=====-->
          <!-- <section class="attendance"> -->
            <div class="attendance-list">
              <!-- <h1>Attendance List</h1> -->
              <table class="table">
                <thead>
                  <tr>
                    <th>Branch ID</th>
                    <th>Branch Name</th>
                    <th>Address</th>
                    <th>Actions</th>              
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($rows as $row): ?>
                  <tr>
                    <td><?= esc($row->id) ?></td>
                    <td><?= esc($row->name) ?></td>
                    <td><?= esc($row->address) ?></td>
                    <td><button>Edit</button> <button>Delete</button></td>                    
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </section>

          <!-- =====End of the table====-->
      </main>
      <div>
        
      </div>
      <!-- End Main -->

    </div>
    <!-- Custom JS -->
    <script src="<?= ROOT?>/assets/js/admin.js"></script>
  </body>
</html>