<?php
$role = "Employee";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

// $this->view('includes/cancel_popup', $data);
$this->view('includes/details_popup', $data);

// require_once '../includes/cancel_popup.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Orders Status Details</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/employee/progress.css">



    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <!--Fonts-->

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-iUqUNuS73FMVujGAPZssDpRVQzbuXg7Yxh01Ib0WQ3c4G4FyGxTD2NtSA/SP2A0LujZvDEh1eXD1fBU2JS9f6jQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

   

</head>

<body>
    <div class="home-section">
        <div class="main-title">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <h2 class="section-title">ORDERS PROGRESS</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                    <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
                </div>
            </div>
        </div>

        <div class="orders-container">
            <div class="order-status placed-orders">
                <div class="title-section">
                    <!-- <i class="fas fa-shopping-cart"></i> -->
                    <i class='bx bxs-cart-alt bx-tada'></i>
                    <div class="status-title">Placed Orders</div>
                </div>

                <div class="filter-buttons">
                    <button onclick="filterOrders('deliveries')">Deliveries</button>
                    <button onclick="filterOrders('pickups')">Pickups</button>
                </div>

                <div class="placed-order-list">
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0123</p>
                            </div>
                            <div class="time-duration">
                                <i class='bx bx-time-five'></i>
                                <div class="ready-time">1d</div>
                            </div>

                        </div>
                        <div class="item-options">
                            <button class="view-details" id="detailButton">View Details</button>
                            <button class="cancel" id="deleteButton">Cancel</button>
                        </div>

                    </div>
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0123</p>
                            </div>
                            <div class="time-duration">
                                <i class='bx bx-time-five'></i>
                                <div class="ready-time">1d</div>
                            </div>

                        </div>
                        <div class="item-options">
                            <button class="view-details">View Details</button>
                            <button class="cancel">Cancel</button>
                        </div>

                    </div>
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0245</p>
                            </div>
                            <div class="time-duration" style="color:red;">
                                <i class='bx bx-time-five'></i>
                                <div class="ready-time">2h</div>
                            </div>

                        </div>
                        <div class="item-options">
                            <button class="view-details">View Details</button>
                            <button class="cancel">Cancel</button>
                        </div>

                    </div>
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0005</p>
                            </div>
                            <div class="time-duration">
                                <i class='bx bx-time-five'></i>
                                <div class="ready-time">4d</div>
                            </div>

                        </div>
                        <div class="item-options">
                            <button class="view-details">View Details</button>
                            <button class="cancel">Cancel</button>
                        </div>

                    </div>
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0120</p>
                            </div>
                            <div class="time-duration">
                                <i class='bx bx-time-five'></i>
                                <div class="ready-time">10h</div>
                            </div>

                        </div>
                        <div class="item-options">
                            <button class="view-details">View Details</button>
                            <button class="cancel">Cancel</button>
                        </div>

                    </div>
                </div>


            </div>



            <div class="order-status ready-orders">
                <div class="title-section">
                    <!-- <i class="fas fa-check"></i> -->
                    <i class='bx bx-check-circle bx-tada'></i>
                    <div class="status-title">Ready Orders</div>
                </div>
                <div class="ready-order-list">
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0123</p>
                            </div>
                            <!-- <div class="time-duration">
                                 <i class='bx bx-time-five'></i>
                                 <div class="ready-time">1d</div>
                            </div> -->

                        </div>
                        <div class="item-options">
                            <button class="view-details">View Details</button>

                            <button class="cancel">Assign Deliverer</button>
                        </div>

                    </div>
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0123</p>
                            </div>
                            <!-- <div class="time-duration">
                                 <i class='bx bx-time-five'></i>
                                 <div class="ready-time">1d</div>
                            </div> -->

                        </div>
                        <div class="item-options">
                            <button class="view-details" type="hide">View Details</button>
                            <button class="cancel">Assign Deliverer</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="order-status dispatched-orders">
                <div class="title-section">
                    <!-- <i class="fas fa-truck"></i> -->
                    <i class='bx bxs-truck bx-tada'></i>
                    <div class="status-title">Dispatched Orders</div>
                </div>
            </div>
        </div>
    </div>

  
    <script src="<?= ROOT ?>/assets/js/order_details.js"></script>
    <script src="<?= ROOT ?>/assets/js/order_cancel.js"></script>

</body>

</html>