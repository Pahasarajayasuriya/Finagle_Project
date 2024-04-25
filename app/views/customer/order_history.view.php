<?php
$role = "User";
$data['role'] = $role;

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Order History</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/order_history.css">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    $this->view('includes/cus_topbar', $data);
    ?>

    <div class="home-section">
        <div class="title-profile">

            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <h2 class="section-title">Your Orders</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                    <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
                </div>
            </div>

        </div>

        <div class="employee-table">
            <div class="table-header">
                <div class="header-item employee-image">
                </div>
                <div class="header-item">Order ID</div>
                <div class="header-item">Order Type</div>
                <div class="header-item">Outlet</div>
                <div class="header-item">Order Time</div>
                <div class="header-item">Order Total</div>
                <div class="header-item">Order Status</div>
            </div>
            <?php
            if (isset($details) && !empty($details)) {
                foreach ($details as $detail) {
            ?>
                    <div class="employee-record">
                        <div class="employee-id"><?= $detail->id ?></div>
                        <div class="employee-name"><?= $detail->delivery_or_pickup ?></div>
                        <div class="employee-name"><?= $detail->pickup_location ?></div>
                        <div class="employee-name"><?= $detail->order_time ?></div>
                        <div class="employee-name"><?= $detail->total_cost ?></div>
                        <button class="order_status" data-order-id="<?= $detail->id ?>" data-order-type="<?= $detail->delivery_or_pickup ?>">Order Status</button>
                    </div>
                <?php
                }
            } else {
                ?>
                <style>
                    .swal2-confirm {
                        background-color: #FF0000 !important;
                        color: white !important;
                        border: none !important;
                    }

                    .swal2-confirm a {
                        text-decoration: none !important;
                        color: white !important;
                    }

                    .swal2-confirm a:hover {
                        color: white !important;
                    }
                </style>
                <script>
                    Swal.fire({
                        title: "No orders!",
                        text: "You haven't placed any orders yet.",
                        icon: "info",
                        backdrop: 'rgba(255,255,255,1)',
                        confirmButtonText: '<a href="<?= ROOT ?>/products">Place an order</a>'
                    });
                </script>
            <?php
            }
            ?>
        </div>
        <?php $this->view('includes/cus_footer', $data); ?>
    </div>
    <script>
        document.querySelectorAll('.order_status').forEach(function(button) {
            button.addEventListener('click', function() {
                var orderId = this.getAttribute('data-order-id');
                var orderType = this.getAttribute('data-order-type');
                if (orderType === 'pickup') {
                    window.location.href = '<?= ROOT ?>/pickup_progressbar?orderId=' + orderId;
                } else {
                    window.location.href = '<?= ROOT ?>/Progressbar?orderId=' + orderId;
                }
            });
        });
    </script>
</body>

</html>