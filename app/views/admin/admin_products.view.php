<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/product-admin.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="home-section">
        <!-- content  -->
        <section id="main" class="main">

            <h2>PRODUCTS</h2>

            <form>
                <div class="form">
                    <input class="form-group" type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                    <input class="btn" type="button" onclick="openReport()" value="Add Products">
                </div>

            </form>


            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="ordId">Id</th>
                        <th class="ordId">Image</th>
                        <th class="desc">Product Name</th>
                        <th class="desc">category</th>
                        <th class="ordId">Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php $rowNumber = 1; ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $rowNumber++ ?></td>
                        <td class="ordId"><?= esc($row->id) ?></td>
                        <td class="desc">
                            <img class="image-preview" src="<?= esc($row->image) ?>" alt="Product Image">
                        </td>
                        <td class="products"><?= esc($row->name) ?> </td>
                        <td class="category"><?= esc($row->category) ?></td>
                        <td class="desc"><?= esc($row->price) ?></td>
                        <td><button type="submit" class="view-order-btn" onclick="openView()">Edit Products</button></td>
                        <td><button type="submit" class="view-order-btn">Delete Products</button></td>
                    </tr>
                <?php endforeach; ?>
            </table>


        </section>
        <!-- Add this message element -->
        <div id="no-results-message" class="no-results-message">No matching products found.</div>
        <!-- POPUP -->
        <form method="POST" enctype="multipart/form-data" action="<?= ROOT ?>/admin_products">
            <div class="popup-report">
                <h2>Add Products</h2>
                <div>
                    <label for="name"> Product Name</label>
                    <input required type="text" id="name" name="name" value="<?= set_value('name') ?>">
                    <?php if (!empty($errors['name'])) : ?>
                        <div class="invalid"><?= $errors['name'] ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="image">Product image</label>
                    <input onchange="load_image(this.files[0])" type="file" name="image" value="<?= set_value('image') ?>">
                    <?php if (!empty($errors['image'])) : ?>
                        <div class="invalid"><?= $errors['image'] ?></div>
                    <?php endif; ?>
                    </br>
                </div>
                <div>
                    <label for="category">Category</label>
                    <input required type="text" id="category" name="category" value="<?= set_value('category') ?>">
                    <?php if (!empty($errors['category'])) : ?>
                        <div class="invalid"><?= $errors['category'] ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="price">Price</label>
                    <input required type="text" name="price" value="<?= set_value('price') ?>">
                    <?php if (!empty($errors['price'])) : ?>
                        <div class="invalid"><?= $errors['price'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="btns">
                    <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                    <input type="submit" name="add_branches" value="Add" class="close-btn">
                </div>
            </div>
        </form>



        <div class="popup-view" id="popup-view">
            <button type="button" class="update-btn pb" onclick="closeView()">Update Product</button>
            <button type="button" class="cancel-btn pb" onclick="closeView()">Cancel</button>
            <h2>Product Details</h2>

            <div class="container1">
                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Product Name </span>
                            <input type="text" required onChange="" value="<?= set_value('name', $row->name) ?>" />
                        </div>

                        <div class="input-box">
                            <span class="details">Category</span>
                            <input type="text" required onChange="" value="<?= set_value('category', $row->category) ?>" />
                        </div>

                        <div class="input-box">
                            <label for="edit-image">Edit Image</label>
                            <input type="file" name="edit-image" accept="image/*">
                            <?php if ($row->image) : ?>
                                <div>Current Image: <?= basename($row->image) ?></div>
                                <input type="hidden" name="current-image" value="<?= basename($row->image) ?>">
                            <?php endif; ?>
                        </div>

                        <div class="input-box">
                            <span class="details">price</span>
                            <input type="text" required onChange="" value="<?= set_value('price', $row->price) ?>" />
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
    <script src="<?= ROOT ?>/assets/js/admin-products.js"></script>
</body>

</html>