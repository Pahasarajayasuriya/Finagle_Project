<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/product-admin.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="home-section">
        <!-- content  -->
        <section id="main" class="main">

            <h2>Categories</h2>

            <form>
                <div class="form">
                    <input class="form-group" type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                    <input class="btn" type="button" onclick="openReport()" value="Add Categories">
                </div>

            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="ordId">Category Id</th>
                        <th class="desc">Categories Name</th>
                        <th class="desc">Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <td>1</td>
                <td class="ordId">002345</td>
                <td class="desc">Cakes </td>
                <td class="desc">hello </td>
                <td><button type="submit" class="view-order-btn" onclick="openView()">Edit Products</button></td>
                <td><button type="submit" class="view-order-btn">Delete Products</button></td>
                </tr>
            </table>
        </section>


        <!-- POPUP -->
        <form  method="post">
            <div class="popup-report">
                <h2>Add Categories</h2>
                <label for="name">Category name</label>
                <input required type="text" name="name"> </br>
                <label for="address">Description</label>
                <input required type="text" name="address"></br>
                <div class="btns">
                    <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                    <input type="submit" name="add_branches" value="Add" class="close-btn" onclick="closeReport()">
                </div>
            </div>
            </form>



            <div class="popup-view" id="popup-view">
                <button type="button" class="update-btn pb" onclick="closeView()">Update Branch</button>
                <button type="button" class="cancel-btn pb" onclick="closeView()">Cancel</button>
                <h2>Account Details</h2>

                <div class="container1">
                    <form>
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Category Id </span>
                                <input type="text" required onChange="" value="0023456" />
                            </div>

                            <div class="input-box">
                                <span class="details">Category Name </span>
                                <input type="text" required onChange="" value="Ja-ela" />
                            </div>

                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" required onChange="" value="0112815328" />
                            </div>
                        </div>
                    </form>
                </div>
                <button type="button" class="ok-btn" onclick="closeView()">OK</button>
            </div>
            <div id="overlay" class="overlay"></div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/categories.js"></script>
</body>

</html>