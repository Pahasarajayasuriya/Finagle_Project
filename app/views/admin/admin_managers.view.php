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
    <title>Managers</title>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/admin/admin_manager.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <div class="home-section">
        <!-- content  -->
        <section id="main" class="main">
            <div class="ad_head">
                <p class="ad_head_1">MANAGER<span> DETAILS</span></p>
            </div>

            <div class="form-header">
                <form action="#">
                    <div class="ad-form-input">
                        <input type="search" id="search" placeholder="by name">
                        <button type="submit" class="ad-search-btn">
                            <i class='bx bx-search'></i>
                        </button>
                    </div>
                </form>

                <!-- <input class="add-btn" type="button" onclick="openReport()" value="Add Managers"> -->
            </div>

            <!-- Popup Container for add customer -->
            <form method="POST" enctype="multipart/form-data" action="<?= ROOT?>/admin_customers">
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
                    <input type="time" id="open" name="open_time" value="00:00:00">
                    <?php if (!empty($errors['open_time'])) : ?>
                            <div class="invalid"><?= $errors['open_time'] ?></div>
                    <?php endif; ?>

                    <label for="close">Closing hours:</label>
                    <input type="time" id="close" name="close_time" value="00:00:00">
                    <?php if (!empty($errors['close_time'])) : ?>
                            <div class="invalid"><?= $errors['close_time'] ?></div>
                    <?php endif; ?>
                    <div class="buttons-container">
                        <!-- <button class="cancel-btn" onclick="closePopup()">Cancel</button> -->
                        <button class="cancel-btn" ><a href="<?= ROOT."/admin_branches" ?>">Cancel</a></button>
                        <button name="add" value="add" class="submit-btn" onclick="submitForm()">Submit</button>
                    </div>

                </div>
            </div>
            </form>

            <div class="advertisement-table">
            <div class="advertisement-header">
                <!-- <div class="ad-image"></div> -->
                <!-- <div class="ad-id"> Branch ID</div>
                <div class="ad-description">Branch Name</div> -->
                <!-- <div class="ad-date">Address</div>   -->
                <!-- <div class="ad-description">Address</div>
                <div class="ad-description">Contact NO</div>
                <div class="ad-description">Open Time</div>
                <div class="ad-description">Close Time</div>    -->
                
                <div >ID</div>
                <div >User Name</div>
                <div style="margin-left:20px">Contact NO</div>
                <div style="margin-left:50px">E-mail</div>
                <div style="margin-left:70px">Joined date</div>
                <div style="margin-left:20px">Branch</div>
                <!-- <div >Address</div>  -->
            </div>
            </div>
            
            <div class="popup-container" id="editPopupContainer">
                <h2>Edit the branch</h2>
                <div class="popup-content">
                    <label for="editDescription">Branch Name:</label>
                    <input type="text" id="editDescription" name="editDescription" placeholder="Enter the branch name" value="">

                    <label for="editEndDate">Address:</label>
                    <input type="text" id="editEndDate" name="editEndDate" value="">

                    <div class="buttons-container">
                        <button class="cancel-btn" onclick="closeEditPopup()">Cancel</button>
                        <button class="submit-btn" onclick="submitEditForm()">Submit</button>
                    </div>
                </div>
            </div class="branch-container">


            <!-- delete popup -->
            <div class="popup-container" id="deletePopup">
                <h2>Are you sure you want to delete this item?</h2>
                <div class="buttons-container">
                    <button class="cancel-btn" onclick="closePopup1()">NO</button>
                    <button class="submit-btn" onclick="confirmDelete()">DELETE</button>
                </div>
            </div>


            <?php foreach ($rows as $row) : ?>
            <div class="advertisement-record">
                <!-- <div class="advertisement-image"> <img src="https://lh3.googleusercontent.com/p/AF1QipNFVt_67WFrJbjsHEQfxY691SYz3wxrn1Ioq5KC=s1360-w1360-h1020" alt="branch.id" class="customer-image"></div> -->
                <div class="branch-id"><?= esc($row->id) ?></div>
                <div class="branch-name"><?= esc($row->username) ?></div>
                <div class="branch-loc" ><?= esc($row->teleno) ?></div>
                <div class="branch-loc"><?= esc($row->email) ?></div>
                <!-- <div class="branch-loc"><?= htmlspecialchars((string)$row->joined_date, ENT_QUOTES, 'UTF-8') ?></div> -->
                <div class="branch-loc"><?= (string)esc($row->joined_date) ?></div>
                <div class="branch-loc"><?= esc($row->branch) ?></div>
                <!-- <div class="branch-loc"><?= esc($row->address) ?></div> -->

                <div class="advertisement-actions">
                  <!-- <button class="edit-button" onclick="openEditPopupDialog('${branch.id}', '${branch.name}', '${branch.location}')">Edit Branch</button> -->
                  <button class="edit-button"><a href="<?= ROOT."/admin_managers/update_manager/".$row->id ?>">Edit Manager</a></button>
                  <button class="delete-button" onclick="openDeletePopup('<?= esc($row->id) ?>')">Delete</button>
                  <!-- <button class="edit-button"><a href="<?= ROOT."/admin_branches/delete_branch/".$row->id ?>">Delete Branch</a></button>                 -->
                </div>             
             </div>
             <?php endforeach;?>
            </div>

        </section>
        <!-- <script src="branch-admin.js"></script> -->
    </div>
    <script src="<?= ROOT ?>/assets/js/admin_branch.js"></script>
    <script>
        function filterBranches() {
            var input, filter, branchesContainer, branches, branchName;
            input = document.getElementById('search');
            filter = input.value.toUpperCase();
            branchesContainer = document.getElementById('main'); // Corrected ID
            branches = branchesContainer.getElementsByClassName('advertisement-record');
            
            // Loop through all branches, hide those that don't match the search query
            for (var i = 0; i < branches.length; i++) {
                branchName = branches[i].getElementsByClassName('branch-name')[0];
                if (branchName.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    branches[i].style.display = "";
                } else {
                    branches[i].style.display = "none";
                }
            }
        }

        document.getElementById('search').addEventListener('input', filterBranches);
    </script>
    <script>
        //for get id through delete button
        function openDeletePopup(adId) {
            const popupContainer = document.getElementById('deletePopup');
            const overlay = document.getElementById('overlay');
            const deleteButton = document.querySelector('#deletePopup .submit-btn');
            deleteButton.onclick = function() { confirmDelete(adId); } // Set up the deletion confirmation
            popupContainer.classList.add('show');
            overlay.classList.add('show');
        }

        function confirmDelete(adId) {
            const url = `<?=ROOT."/admin_managers/delete_manager/"?>${adId}`;
            //console.log(url);
            window.location.href = url; // Redirect to delete the advertisement
        }

        function closePopup1() {
            const popupContainer = document.getElementById('deletePopup');
            popupContainer.classList.remove('show');
            overlay.classList.remove('show');
        }

    </script>
</body>

</html>