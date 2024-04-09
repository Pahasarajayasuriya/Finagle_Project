<?php
$role = "Employee";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Stock Details</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/employee/product_stock.css">

    <script src="<?= ROOT ?>/assets/js/product_stock.js"></script>



    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <!--Fonts-->

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-iUqUNuS73FMVujGAPZssDpRVQzbuXg7Yxh01Ib0WQ3c4G4FyGxTD2NtSA/SP2A0LujZvDEh1eXD1fBU2JS9f6jQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="home-section">

        <div class="title-profile">

            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <h2 class="section-title">BRANCH EMPLOYEES</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                </div>
            </div>

        </div>

        <div class="form-header">
            <form action="#" class="sub-form">
                <div class="ad-form-input">
                    <input type="search" id="search" placeholder="Search...">
                    <button type="submit" class="ad-search-btn">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </form>
        </div>

        <form method="POST" class="complete_form">

            <div class="table-container">
                <table>
                    <tr class="table_heading">
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Category</th>

                    </tr>

                    <tr>
                        <?php

                        if (isset($data['product'])) {
                            foreach ($data['product'] as $product) {
                        ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><img src="<?= ROOT ?>/assets/uploads/<?= $product->image ?>" alt=""></td>
                        <td><?= $product->user_name ?></td>
                        <td class="black-text">
                            <span class="quantity" id="quantity_<?= $product->id ?>"><?= $product->quantity ?></span>
                            <button type="reset" class="plus-button" onclick="changeQuantity(<?= $product->id ?>, 'increase')">+</button>
                            <button type="reset" class="minus-button" onclick="changeQuantity(<?= $product->id ?>, 'decrease')">-</button>
                        </td>
                        <td>
                            <?= $product->category ?>
                        </td>

                    </tr>
                    <input type="hidden" name="id_<?= $product->id ?>" id="product_id_<?= $product->id ?>" value="<?= $product->id ?>">
                    <input type="hidden" name="qty_<?= $product->id ?>" id="updated_quantity_<?= $product->id ?>" value="<?= $product->quantity ?>" style="display: none;">
            <?php
                            }
                        }
            ?>

                </table>
            </div>

            <div class="button-container">
                <button id="back" class="back-button left-button"> <b>Back</b></button>
                <button type="submit" name="update" value="update" id="update" class="update-button right-button"><b>Update & Refresh</b></button>
            </div>
            <!-- </div> -->
        </form>

    </div>
</body>

</html>