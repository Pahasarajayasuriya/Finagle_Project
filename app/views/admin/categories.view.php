<?php
// $role = "Admin";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories</title>
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
                <p class="ad_head_1">CATEGORIES<span> DETAILS</span></p>
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

                <input class="add-btn" type="button" onclick="openReport()" value="Add Categories">
            </div>

            <!-- Popup Container -->
            <div class="popup-container" id="popupContainer">
                <h2>Add New category</h2>
                <div class="popup-content">



                    <label for="name">Category Name:</label>
                    <input type="text" id="description" name="description" placeholder="Enter category name">

                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closePopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitForm()">Submit</button>
                    </div>
                </div>
            </div>

            <div class="popup-container" id="editPopupContainer">
                <h2>Edit Category</h2>
                <div class="popup-content">
                    <label for="editDescription">Category Name:</label>
                    <input type="text" id="editDescription" name="editDescription" placeholder="Enter the Category name">


                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closeEditPopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitEditForm()">Submit</button>
                    </div>
                </div>
            </div>

            <div class="popup-container" id="editPopupContainer">
                <h2>Delete Category</h2>
            </div>


            <div class="products" id="productList"></div>
        </section>
        <script src="<?= ROOT ?>/assets/js/categories.js"></script>
    </div>
</body>

</html>