<?php
$role = "Manager";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Order history</title>
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
                <p class="branch_head_1">PROD<span>UCTS</span></p>
            </div>

            <form>
                <div class="form">
                    <input id="searchInput" class="form-group" type="text" placeholder="Search by order Id">
                    <i class='bx bx-search icon'></i>
                </div>

            </form>


            <table class="table" id="productTable">
                <thead>
                    <tr>
                        <th class="ordId">Order Id</th>
                        <th class="desc">Name</th>
                        <th class="desc">Phone Number</th>
                        <th class="ordId">Deliver</th>
                        <th class="ordId">Date & Time</th>
                        <th class="ordId">Order Status</th>
                        <th class="ordId">Total Cost</th>
                        <th class="ordId">Payment Method</th>  
                        <th class="ordId">Payment Status</th>                      
                    </tr>
                </thead>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= esc($row->id) ?></td>
                        <td><?= esc($row->name) ?> </td>
                        <td><?= esc($row->phone_number) ?></td>
                        <td><?= esc($row->deliver_id) ?></td>
                        <td><?= esc($row->delivery_date) ?> <?= esc($row->delivery_time) ?></td>
                        <td><?= esc($row->order_status) ?></td>
                        <td><?= esc($row->total_cost) ?></td>
                        <td><?= esc($row->payment_method) ?></td>
                        <td><?= esc($row->payment_status) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div id="noResultsMessage" style="display: none;">Order not found</div>
            <script src="<?= ROOT ?>/assets/js/manager/order_history.js"></script>
        </div>
    </div>
</body>

</html>