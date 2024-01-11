<?php
$role = "Admin";

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Branches</title>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/admin_products.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="home-section">
        <!-- content  -->
        <section id="main" class="main">
            <div class="ad_head">
                <p class="ad_head_1">BRANCH<span> DETAILS</span></p>
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

                <input class="add-btn" type="button" onclick="openReport()" value="Add Branches">
            </div>

            <!-- Popup Container -->
            <div class="popup-container" id="popupContainer">
                <h2>Add a Branch</h2>
                <div class="popup-content">



                    <label for="name">Branch Name:</label>
                    <input type="text" id="description" name="description" placeholder="Enter branch name">

                    <label for="address">Address:</label>
                    <input type="text" id="price" name="address">

                    <label for="contact-number">Contact number:</label>
                    <input type="text" id="Image" name="contact-number">

                    <label for="open">Openning hours:</label>
                    <input type="time" id="open" name="open">

                    <label for="close">Closing hours:</label>
                    <input type="time" id="close" name="close">


                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closePopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitForm()">Submit</button>
                    </div>
                </div>
            </div>
            <div class="advertisement-table">
            <div class="advertisement-header">
                <div class="ad-image"></div>
                <div class="ad-id"> Branch ID</div>
                <div class="ad-description">Branch Name</div>
                <div class="ad-date">Address</div>
            </div>
            </div>

            <div class="popup-container" id="editPopupContainer">
                <h2>Edit the branch</h2>
                <div class="popup-content">
                    <label for="editDescription">Branch Name:</label>
                    <input type="text" id="editDescription" name="editDescription" placeholder="Enter the branch name">

                    <label for="editEndDate">Address:</label>
                    <input type="text" id="editEndDate" name="editEndDate">

                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closeEditPopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitEditForm()">Submit</button>
                    </div>
                </div>
            </div class="branch-container">
            <div class="advertisement-record">
                <div class="advertisement-image"> <img src="https://lh3.googleusercontent.com/p/AF1QipNFVt_67WFrJbjsHEQfxY691SYz3wxrn1Ioq5KC=s1360-w1360-h1020" alt="branch.id" class="customer-image"></div>
                <div class="branch-id">13</div>
                <div class="branch-name">Borella</div>
                <div class="branch-loc">104/2, Main road, Borella</div>
                <div class="advertisement-actions">
                  <button class="edit-button" onclick="openEditPopupDialog('${branch.id}', '${branch.name}', '${branch.location}')">Edit Product</button>
                </div>
            
             </div>
            </div>

        </section>
        <!-- <script src="branch-admin.js"></script> -->
    </div>
</body>

</html>