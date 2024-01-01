<?php
// $role = "Admin";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/product-admin.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="home-section">
        <!-- content  -->
        <section id="main" class="main">
            <div class="ad_head">
                <p class="ad_head_1">PRODUCT<span> DETAILS</span></p>
            </div>

            <div class="form-header">
                <form action="#">
                    <div class="ad-form-input">
                        <input type="search" id="search" placeholder="Search...">
                        <button type="submit" class="ad-search-btn">
                            <i class='bx bx-search'></i>
                        </button>
                    </div>
                </form>

                <input class="add-btn" type="button" onclick="openReport()" value="Add Products">
            </div>

            <!-- Popup Container -->
            <div class="popup-container" id="popupContainer">
                <h2>Add a Product</h2>
                <div class="popup-content">



                    <label for="name">Product Name:</label>
                    <input type="text" id="description" name="description" placeholder="Enter product name">

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price">

                    <label for="Image">Image:</label>
                    <input type="image" id="Image" name="Image">

                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closePopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitForm()">Submit</button>
                    </div>
                </div>
            </div>

            <div class="popup-container" id="editPopupContainer">
                <h2>Edit the product</h2>
                <div class="popup-content">
                    <label for="editDescription">Product Name:</label>
                    <input type="text" id="editDescription" name="editDescription" placeholder="Enter the product name">

                    <label for="editEndDate">Price:</label>
                    <input type="text" id="editEndDate" name="editEndDate">

                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closeEditPopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitEditForm()">Submit</button>
                    </div>
                </div>
            </div>


            <div class="products" id="productList"></div>
        </section>
        <script src="<?= ROOT ?>/assets/js/product-admin.js"></script>
    </div>
</body>

</html>