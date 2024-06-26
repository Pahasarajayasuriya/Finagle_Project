<?php
$role = "Employee";
$data['role'] = $role;


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
    <?php $this->view('includes/emp_topbar', $data); ?>

    <div class="home-section">

        <div class="title-profile">

            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <h2 class="section-title">PRODUCTS STOCK</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                </div>
            </div>

        </div>

        <div class="form-header">
            <form action="#" class="sub-form">
                <div class="ad-form-input">
                    <input type="search" id="search" onkeyup="searchProducts()" placeholder="Search...">
                    <button type="submit" class="ad-search-btn">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </form>
        </div>



        <form method="POST" class="complete_form">
            <div class="table-container">
                <table id="product-table">
                    <tr class="table_heading">
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Category</th>

                    </tr>


                    <?php

                    if (isset($product)) {
                        foreach ($product as $product) {
                    ?>
                            <tr>
                                <td><?= $product->id ?></td>
                                <td><img src="<?= ROOT ?>/<?= $product->image ?>" alt=""></td>
                                <td><?= $product->user_name ?></td>
                                <td class="black-text">
                                    <!-- <span class="quantity" id="quantity_<?= $product->id ?>"><?= $product->quantity ?></span> -->
                                   
                                    <span class="quantity" id="quantity_<?= $product->id ?>" data-product-id="<?= $product->id ?>" contenteditable="true"><?= $product->quantity ?></span>

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

        function searchProducts() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("product-table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td_id = tr[i].getElementsByTagName("td")[0]; // Product ID column
                td_name = tr[i].getElementsByTagName("td")[2]; // Product Name column
                if (td_id && td_name) {
                    txtValue_id = td_id.textContent || td_id.innerText;
                    txtValue_name = td_name.textContent || td_name.innerText;
                    if (txtValue_id.toUpperCase().indexOf(filter) > -1 || txtValue_name.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>