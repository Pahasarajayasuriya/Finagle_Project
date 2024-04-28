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
    <title>Advertisements</title>
    <link rel="stylesheet" href="<?= ROOT?>/assets/css/admin/admin_advertisements.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="overlay" id="overlay"></div>
    <?php
       $this->view('includes/emp_topbar', $data);
      ?>

    <div class="home-section">
        <!-- content  -->
        <section id="main" class="main">

        <div class="title-profile">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <p class="section-title">ADVERTISEMENTS<span> DETAILS</span></p>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
                 </div>
            </div>
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

                <input class="add-btn"  style ="margin-top:20px" type="button" onclick="openReport()" value="Add Advertisement">
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

                    <label for="image">Image:</label>
                    <input type="file" onchange="load_image(this.files[0])" id="image" name="image" style ="background-color:grey ; color:white" >
                    <?php if (!empty($errors['image'])) : ?>
                            <div class="invalid"><?= $errors['image'] ?></div>
                    <?php endif; ?>

                    <label for="end_date">End_date:</label>
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
                <!-- <div class="ad-image">Image</div>
                <div class="ad-id">ID</div>
                <div class="ad-description">Description</div>
                <div class="ad-date">End Date</div> -->

                <div style ="margin-left:-50px">Image</div>
                <div style ="margin-right:280px">ID</div>
                <div style ="margin-left:-210px">Description</div>
                <div style ="margin-right:220px">End Date</div>
              
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
                <h2>Are you sure you want to delete this advertisement?</h2>
                <div class="buttons-container">
                    <button class="cancel-btn" style ="background-color:black"  onclick="closePopup1()">NO</button>
                    <button class="submit-btn" onclick="confirmDelete()">DELETE</button>
                </div>
            </div>


            <?php foreach ($rows as $row) : ?>
            <div class="advertisement-record">
                <!-- <div class="advertisement-image"> <img src="https://lh3.googleusercontent.com/p/AF1QipNFVt_67WFrJbjsHEQfxY691SYz3wxrn1Ioq5KC=s1360-w1360-h1020" alt="branch.id" class="customer-image"></div> -->
                <div class="advertisement-image"><img src="<?= esc($row->image) ?>" alt="Description of image"></div>
                <div class="branch-id"><?= esc($row->id) ?></div>
                <div class="branch-name"><?= esc($row->description) ?></div>
                <div class="branch-loc"><?= esc($row->end_date) ?></div>
                <div class="advertisement-actions">
                  <!-- <button class="edit-button" onclick="openEditPopupDialog('${branch.id}', '${branch.name}', '${branch.location}')">Edit Branch</button> -->
                  <button class="edit-button"><a href="<?= ROOT."/admin_advertisements/update_advertisement/".$row->id ?>">Edit</a></button>
                  <button class="delete-button" onclick="openDeletePopup('<?= esc($row->id) ?>')">Delete</button>
                  <!-- <button class="edit-button" onclick="openReport1()">Delete Advertisement</button>                 -->
                  <!-- <button class="edit-button"><a href="<?= ROOT."/admin_advertisements/delete_advertisement/".$row->id ?>">Delete Advertisement</a></button>                 -->
                </div>             
             </div>
             <?php endforeach;?>
            </div>

        </section>
        <!-- <script src="branch-admin.js"></script> -->
    </div>
    <script src="<?= ROOT ?>/assets/js/admin_branch.js"></script>
    <script>
        //for search bar
        var deleteulr="<?= ROOT ?>/admin_advertisements/delete_advertisement/";
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
            const url = `<?=ROOT."/admin_advertisements/delete_advertisement/"?>${adId}`;
            //console.log(url);
            window.location.href = url; // Redirect to delete the advertisement
        }

        function closePopup1() {
            const popupContainer = document.getElementById('deletePopup');
            popupContainer.classList.remove('show');
            overlay.classList.remove('show');
        }

    </script>

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