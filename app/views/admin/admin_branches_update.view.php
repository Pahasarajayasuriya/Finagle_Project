<?php
$role = "Admin";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Branches</title>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/admin_branches.css">

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

            <!-- Popup Container for add a branch -->
            <form method="POST" enctype="multipart/form-data" action="<?= ROOT?>/admin_branches">
            <div class="popup-container" id="popupContainer">
                <h2>Add a Branch</h2>
                <div class="popup-content">
                    <label for="name">Branch Name:</label>
                    <input value="<?= set_value('name') ?>" type="text" id="description" name="name" placeholder="Enter branch name">
                    <?php if (!empty($errors['name'])) : ?>
                            <div class="invalid"><?= $errors['name'] ?></div>
                    <?php endif; ?>

                    <label for="address">Address:</label>
                    <input type="text" id="price" name="address">
                    <?php if (!empty($errors['address'])) : ?>
                            <div class="invalid"><?= $errors['address'] ?></div>
                    <?php endif; ?>

                    <label for="contact-number">Contact number:</label>
                    <input type="text" id="Image" name="contact_number">
                    <?php if (!empty($errors['contact_number'])) : ?>
                            <div class="invalid"><?= $errors['contact_number'] ?></div>
                    <?php endif; ?>

                    <label for="open">Openning hours:</label>
                    <input type="time" id="open" name="open_time">
                    <?php if (!empty($errors['open_time'])) : ?>
                            <div class="invalid"><?= $errors['open_time'] ?></div>
                    <?php endif; ?>

                    <label for="close">Closing hours:</label>
                    <input type="time" id="close" name="close_time">
                    <?php if (!empty($errors['close_time'])) : ?>
                            <div class="invalid"><?= $errors['close_time'] ?></div>
                    <?php endif; ?>
                    <div class="buttons-container">
                        <!-- <button class="cancel-btn" onclick="closePopup()">Cancel</button> -->
                        <button class="cancel-btn" ><a href="<?= ROOT."/admin_branches" ?>">Cancel</a></button>
                        <button class="submit-btn" onclick="submitForm()">Submit</button>
                    </div>

                </div>
              </div>
              </form>

            <div class="advertisement-table">
            <div class="advertisement-header">

                <!-- <div class="ad-image"></div>
                <div class="ad-id"> Branch ID</div>
                <div class="ad-description">Branch Name</div>
                <div class="ad-date">Address</div> -->
                
                <div >ID</div>
                <div >Branch Name</div>
                <div >Address</div>
                <div >Contact NO</div>
                <div >Open Time</div>
                <div >Close Time</div> 
              
            </div>
            </div>
            
            <!-- Pop for edit branch -->
            <form method="POST" enctype="multipart/form-data" action="<?= ROOT?>/admin_branches">
            <div class="popup-container" id="editPopupContainer">
                <h2>Edit the branch</h2>
                <div class="popup-content">
                    <label for="editDescription">Branch Name:</label>
                    <input type="text" id="editDescription" name="name" placeholder="Enter the branch name" value="<?= $row[0]->name ?>">

                    <label for="editEndDate">Address:</label>
                    <input type="text" id="editEndDate" name="address" value="<?= $row[0]->address ?>">

                    <label for="editEndDate">Contact NO:</label>
                    <input type="text" id="editEndDate" name="address" value="<?= $row[0]->contact_number ?>">

                    <label for="editEndDate">OPEN HOUR:</label>
                    <input type="text" id="editEndDate" name="address" value="<?= $row[0]->open_time ?>">

                    <label for="editEndDate">CLOSE HOUR:</label>
                    <input type="text" id="editEndDate" name="address" value="<?= $row[0]->close_time ?>">

                    <input type="hidden" name="id" value="<?= $row[0]->id; ?>">
                    
                    <div class="buttons-container">
                        <!-- <button class="cancel-btn" onclick="closeEditPopup()">Cancel</button> -->
                        <button class="cancel-btn"><a href="<?= ROOT."/admin_branches" ?>">Cancel</a></button>
                        <button name="update" value="update" class="submit-btn" onclick="submitEditForm()">Submit</button>
                    </div>
                </div>
            </div class="branch-container">
            </form>

            <!-- data for tables -->
            <?php foreach ($rows as $row) : ?>
            <div class="advertisement-record">
                <!-- <div class="advertisement-image"> <img src="https://lh3.googleusercontent.com/p/AF1QipNFVt_67WFrJbjsHEQfxY691SYz3wxrn1Ioq5KC=s1360-w1360-h1020" alt="branch.id" class="customer-image"></div> -->
                <div class="branch-id"><?= esc($row->id) ?></div>
                <div class="branch-name"><?= esc($row->name) ?></div>
                <div class="branch-loc"><?= esc($row->address) ?></div>
                <div class="advertisement-actions">
                  <button class="edit-button" onclick="openEditPopupDialog('${branch.id}', '${branch.name}', '${branch.location}')">Edit Branch</button>
                  <button class="edit-button"><a href="<?= ROOT."/admin_branches/delete_branch/".$row->id ?>">Delete Branch</a></button>                
                </div>             
             </div>
             <?php endforeach;?>
            </div>

        </section>
        <!-- <script src="branch-admin.js"></script> -->
    </div>
    <script src="<?= ROOT ?>/assets/js/admin_branch_update.js"></script>
</body>

</html>