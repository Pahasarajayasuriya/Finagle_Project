<?php
$role = "Manager";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_products.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body>
    <div class="home-section">
        <div class="search-container">

        <div class="title-profile">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <p class="section-title">PRODUCTS<span></span></p>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
                 </div>
            </div>
        </div>



            <br>
            
            <form>
              <div class="form-group">
                <input id="searchInput" class="form-group" type="text" placeholder="Search...">
                <i class='bx bx-search icon'></i>
              </div>
            </form>


           


            <table class="table" id="productTable">
                <thead>
                    <tr>
                        <th class="ordId">Image</th>
                        <th class="desc">Product Name</th>
                        <th class="desc">Category</th>
                        <th class="ordId">Price</th>
                    </tr>
                </thead>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td class="desc"><img class="image-preview" src="<?= esc($row->image) ?>" alt="Product Image"></td>
                        <td class="products"><?= esc($row->user_name) ?> </td>
                        <td class="category"><?= esc($row->category) ?></td>
                        <td class="desc"><?= esc($row->price) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div id="noResultsMessage" style="display: none;">Product Not found</div>
            <script src="<?= ROOT ?>/assets/js/manager/view_products.js"></script>
        </div>
    </div>
</body>

</html>