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
</head>

<body>
    <div class="home-section">
        <div class="search-container">
            <div class="branch_head">
                <p class="branch_head_1">PROD<span>UCTS</span></p>
            </div>

            <form>
                <div class="form">
                    <input  id="searchInput" class="form-group" type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>

            </form>


            <table class="table" id="productTable">
                <thead>
                    <tr>
                        <th></th>
                        <th class="ordId">Image</th>
                        <th class="desc">Product Name</th>
                        <th class="desc">category</th>
                        <th class="ordId">Price</th>
                    </tr>
                </thead>
                <?php $rowNumber = 1; ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $rowNumber++ ?></td>
                        <td class="desc">
                            <img class="image-preview" src="<?= esc($row->image) ?>" alt="Product Image">
                        </td>
                        <td class="products"><?= esc($row->user_name) ?> </td>
                        <td class="category"><?= esc($row->category) ?></td>
                        <td class="desc"><?= esc($row->price) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div id="noResultsMessage" style="display: none;">No products found</div>
            <script src="<?= ROOT ?>/assets/js/manager/view_products.js"></script>
        </div>
    </div>
</body>

</html>