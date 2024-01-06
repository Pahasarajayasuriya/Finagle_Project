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

    
    <div class="black-background">
        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> 
        <h2 class="section-title">PRODUCTS STOCK</h2>
        <div class="divider dark mb-4">
            <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
            </div>
        </div>

        <div class="table-container">
            <table>
                <tr class="table_heading">
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td>001</td>
                    <td><img src="./images/sandwich_bread.jpg" alt=""></td>
                    <td>Sandwitch Bread</td>
                    <td class="black-text">
                        <span class="quantity">10</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td><img src="./images/hotdog.jpg" alt=""></td>
                    <td>Hot Dog Buns</td>
                    <td class="black-text">
                        <span class="quantity">15</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td><img src="./images/crust-top-bread.jpg" alt=""></td>
                    <td>Crust Top Bread</td>
                    <td class="black-text">
                        <span class="quantity">20</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td><img src="./images/black-forest-cake.jpg" alt=""></td>
                    <td>Black Forest Cake</td>
                    <td class="black-text">
                        <span class="quantity">12</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>

                <tr>
                
                 <td>005</td>
                    <td><img src="./images/chicken_bun.jpg" alt=""></td>
                    <td>Chicken Bun</td>
                    <td class="black-text">
                        <span class="quantity">12</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>

                <tr>
                    <td>006</td>
                    <td><img src="./images/burger-bun.jpg" alt=""></td>
                    <td>Burger Buns</td>
                    <td class="black-text">
                        <span class="quantity">12</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>
                <tr>
                    <td>007</td>
                    <td><img src="./images/kottu_roti.jpg" alt=""></td>
                    <td>Kottu Roti</td>
                    <td class="black-text">
                        <span class="quantity">12</span>
                        <button class="plus-button">+</button>
                        <button class="minus-button">-</button>
                    </td>
                </tr>
                <!-- Add more product rows with text as needed -->
            </table>
        </div>

        <div class="button-container">
            <button id="back" class="back-button left-button"> <b>Back</b></button>
            <script>
                document.getElementById("back").addEventListener("click", function() {
                    window.location.href = "employee_profile.php"
                });
            </script>
            <button id="update" class="update-button right-button"><b>Update & Refresh</b></button>
            <script>
                document.getElementById("update").addEventListener("click", function() {
                    window.location.href = "product_stock.php"
                });
            </script>
        </div>
    </div>
    </div>
    <script src="product_stock.js"></script>
</body>

</html>