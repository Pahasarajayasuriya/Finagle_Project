<?php
$role = "Admin";

$data['role']=$role;


$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Advertisements</title>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/admin/admin_advertisements.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="home-section">
      <?php
       $this->view('includes/emp_topbar', $data);
      ?>
        <!-- content  -->
        <section id="main" class="main">
            <div class="ad_head">
                <p class="ad_head_1">ADVERTISEMENTS<span> DETAILS</span></p>
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

                <input class="add-btn" type="button" onclick="openReport()" value="Add ADVERTISEMENT">
            </div>

            <!-- Popup Container for add branch -->
            <form method="POST" enctype="multipart/form-data" action="<?= ROOT?>/admin_advertisements">
            <div class="popup-container" id="popupContainer">
                <h2>Add a Advertisement</h2>
                <div class="popup-content">
                    <label for="description">Description:</label>
                    <input value="<?= set_value('name') ?>" type="text" id="description" name="description" placeholder="" style ="background-color:grey ; color:white" >
                    <?php if (!empty($errors['name'])) : ?>
                            <div class="invalid"><?= $errors['description'] ?></div>
                    <?php endif; ?>

                    <label for="image">image:</label>
                    <input type="text" id="price" name="image" style ="background-color:grey ; color:white" >
                    <?php if (!empty($errors['address'])) : ?>
                            <div class="invalid"><?= $errors['image'] ?></div>
                    <?php endif; ?>

                    <label for="end_date">end_date:</label>
                    <input type="date" id="Image" name="end_date" style ="background-color:grey ; color:white" >
                    <?php if (!empty($errors['contact_number'])) : ?>
                            <div class="invalid"><?= $errors['end_date'] ?></div>
                    <?php endif; ?>

                    <div class="buttons-container">
                        <!-- <button class="cancel-btn" onclick="closePopup()">Cancel</button> -->
                        <button class="cancel-btn" style ="background-color:black"  ><a href="<?= ROOT."/admin_advertisements" ?>">Cancel</a></button>
                        <button name="add" value="add" class="submit-btn" onclick="submitForm()">Submit</button>
                    </div>

                </div>
              </div>
              </form>

            <div class="advertisement-table">
            <div class="advertisement-header">
                <div class="ad-image">Image</div>
                <div class="ad-id">ID</div>
                <div class="ad-description">Description</div>
                <div class="ad-date">End Date</div>
              
            </div>
            </div>
            
            <form method="POST" enctype="multipart/form-data" action="<?= ROOT?>/admin_advertisements">
            <div class="popup-container" id="editPopupContainer">
                <h2>Edit the Advertisement</h2>
                <div class="popup-content">

                    <label for="editEndDate">Image:</label>
                    <input type="file" id="editEndDate" name="image" value="<?= $row[0]->image ?>" style ="background-color:grey ; color:white" >

                    <label for="editEndDate">Description:</label>
                    <input type="text" id="editEndDate" name="description" value="<?= $row[0]->description ?>" style ="background-color:grey ; color:white" >

                    <label for="editEndDate">End Date:</label>
                    <input type="date" id="editEndDate" name="end_date" value="<?= $row[0]->end_date ?>" style ="background-color:grey ; color:white" >


                    <input type="hidden" name="id" value="<?= $row[0]->id; ?>">
                    
                    <div class="buttons-container">
                        <!-- <button class="cancel-btn" onclick="closeEditPopup()">Cancel</button> -->
                        <button class="cancel-btn" style ="background-color:black"><a href="<?= ROOT."/admin_advertisements" ?>">Cancel</a></button>
                        <button name="update" value="update" class="submit-btn" onclick="submitEditForm()">Submit</button>
                    </div>
                </div>
            </div class="branch-container">
            </form>

            <?php foreach ($rows as $row) : ?>
            <div class="advertisement-record">
                <div class="advertisement-image"> <img src="https://lh3.googleusercontent.com/p/AF1QipNFVt_67WFrJbjsHEQfxY691SYz3wxrn1Ioq5KC=s1360-w1360-h1020" alt="branch.id" class="customer-image"></div>
                <div class="branch-id"><?= esc($row->image) ?></div>
                <div class="branch-id"><?= esc($row->id) ?></div>
                <div class="branch-name"><?= esc($row->description) ?></div>
                <div class="branch-loc"><?= esc($row->end_date) ?></div>
                <div class="advertisement-actions">
                  <!-- <button class="edit-button" onclick="openEditPopupDialog('${branch.id}', '${branch.name}', '${branch.location}')">Edit Branch</button> -->
                  <button class="edit-button"><a href="<?= ROOT."/admin_advertisements/update_advertisement/".$row->id ?>">Edit</a></button>
                  <button class="edit-button"><a href="<?= ROOT."/admin_advertisements/delete_advertisement/".$row->id ?>">Delete</a></button>                
                </div>             
             </div>
             <?php endforeach;?>
            </div>

        </section>
        <!-- <script src="branch-admin.js"></script> -->
    </div>
    <script src="<?= ROOT ?>/assets/js/admin_branch_update.js"></script>

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