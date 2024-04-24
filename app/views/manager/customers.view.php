<?php
$role = "Manager";
$data['role'] = $role;

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);


// show($data);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customers</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_products.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <div class="home-section">
        <div class="search-container">
            <div class="branch_head">
                <p class="branch_head_1">CUS<span>TOMERS</span></p>
            </div>

            <form>
                <div class="form">
                    <input id="searchInput" class="form-group" type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>

            <table class="table" id="productTable">
                <thead>
                    <tr>
                        <th class="ordId">Id</th>
                        <th class="ordId">Name</th>
                        <th class="desc">Email</th>
                        <th class="desc">Phone Number</th>
                    </tr>
                </thead>
                <?php foreach ($customer as $order) : ?>
                    <tr>
                        <td class="desc"><?= esc($order->id) ?></td>
                        <td class="products"><?= esc($order->username) ?> </td>
                        <td class="category"><?= esc($order->email) ?></td>
                        <td class="desc"><?= esc($order->teleno) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div id="noResultsMessage" style="display: none;">User not found</div>
            <script src="<?= ROOT ?>/assets/js/manager/view_products.js"></script>
        </div>
    </div>
</body>

</html>