<?php
$role = "Employee";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

// include 'includes/details_popup.view.php';


$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

$this->view('includes/cancel_popup', $data);
$this->view('includes/details_popup', $data);
$this->view('includes/assign_popup', $data);

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

                <div class="all-button">
                </div>

                <div class="filter-buttons">
                    <!-- <button >All</button> -->

                    <a href="<?= ROOT ?>/Emp_progress">All</a>

                    <button onclick='filterOrders("d",<?php echo json_encode($data) ?>)'>Deliveries</button>
                    <button onclick='filterOrders("p",<?php echo json_encode($data) ?>)'>Pickups</button>
                </div>


                <div class="placed-order-list" id="placed-order-list">

                    <?php
                    if (isset($data)) {
                        // show($data);
                        foreach ($data['detail'] as $val) {

                    ?>
                            <div class="placed-item">
                                <div class="item-title">
                                    <div class="main-item">
                                        <div class="item-symbol">
                                            <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                        </div>
                                        <p class="item-id"><b><?= $val->id ?><span>
                                                    <?php
                                                    if ($val->delivery_or_pickup == "delivery") {
                                                        echo 'D';
                                                    } else {
                                                        echo 'P';
                                                    }
                                                    ?>
                                                </span></b></p>
                                    </div>

                                    <?php
                                    if ($val->delivery_or_pickup == "delivery") {
                                    ?>
                                        <div class="time-duration">
                                            <i class='bx bx-time-five'></i>
                                            <div class="ready-time"><?= $val->delivery_date ?></div>
                                        </div>
                                    <?php

                                    }
                                    ?>

                                </div>
                                <div class="item-options">
                                    <button class="view-details" id="detailButton" onclick="showPopup('viewDetails','<?= $val->id ?>')">View Details</button>
                                    <button class="cancel" id="deleteButton" onclick="showPopup('cancel')">Cancel</button>
                                </div>

                            </div>
                    <?php

                        }
                    }
                    ?>

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
                            <button class="view-details" onclick="showPopup('viewDetails')">View Details</button>

                            <button class="cancel" id="assignButton" onclick="showPopup('assignDeliver')">Assign Deliverer</button>
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
                <div class="dispatched-order-list">
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <div class="item-symbol">
                                    <i class='bx bx-dots-vertical-rounded bx-rotate-180'></i>
                                </div>
                                <p class="item-id">D0123</p>
                            </div>
                            <i class='bx bxs-right-arrow-square'></i>
                            <p class="item-id">DD003</p>


                        </div>
                        <div class="item-options">
                            <button class="view-details" id="detailButton" onclick="showPopup('viewDetails')">View Details</button>
                            <!-- <button class="cancel" id="deleteButton" >Cancel</button> -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- <script src="<?= ROOT ?>/assets/js/order_cancel.js"></script>

    <script src="<?= ROOT ?>/assets/js/order_details.js"></script>

    <script src="<?= ROOT ?>/assets/js/order_assign.js"></script> -->

    <!-- Import JQuary Library script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script>
        function showPopup(popupId, id = 0) {

            // console.log(id);
            var popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = "block";

            }
            data = {
                'order_id': id
            }

            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>/OrderDetail_Popup",
                data: data,
                cache: false,
                success: function(res) {
                    var detail = JSON.parse(res);
                    // console.log(detail);


                    detail.forEach(element => {

                        console.log(element)
                        createProductItem(element.user_name,element.quantity,element.price)
                    });

                },
                error: function(xhr, status, error) {
                    // return xhr;
                }
            });

        }

    function createProductItem(name, qty, price) {
    // Create the product-item div
    var productItemDiv = document.createElement("div");
    productItemDiv.className = "product-item";

    // Create the product-name div
    var productNameDiv = document.createElement("div");
    productNameDiv.className = "product-name";
    productNameDiv.textContent = name;

    // Create the product-qty div
    var productQtyDiv = document.createElement("div");
    productQtyDiv.className = "product-qty";
    productQtyDiv.textContent = qty;

    // Create the product-price div
    var productPriceDiv = document.createElement("div");
    productPriceDiv.className = "product-price";
    productPriceDiv.textContent = price;

    // Append product-name, product-qty, and product-price divs to product-item div
    productItemDiv.appendChild(productNameDiv);
    productItemDiv.appendChild(productQtyDiv);
    productItemDiv.appendChild(productPriceDiv);


    document.getElementById("details").appendChild(productItemDiv)


    // return productItemDiv;
}


        function hidePopup(popupId) {
            var popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = "none";
            }
        }

        function filterOrders(type, data) {
            console.log(data)
            console.log(type);

            var placed = document.getElementById("placed-order-list");

            placed.textContent = ""

            item_id = document.getElementsByName("item-id")

            // data.forEach(element => {
            for (let index = 0; index < data.detail.length; index++) {

                const element = data[index];

                switch (type) {

                    case 'd':

                        if (element.delivery_or_pickup == "delivery") {

                            item_id.textContent = element.id
                            // console.log(item_id)
                            itemContainer = createItemHTML(element);
                            placed.appendChild(itemContainer);

                        }
                        break;

                    case 'p':

                        if (element.delivery_or_pickup == "pickup") {
                            item_id.textContent = element.id
                            // console.log(item_id)
                            itemContainer = createItemHTML(element);
                            placed.appendChild(itemContainer);

                        }
                        break;

                    default:
                        break;
                }


            }

            // });

        }

        function createItemHTML(val) {
            var itemContainer = document.createElement('div');
            itemContainer.className = 'placed-item';

            var itemTitle = document.createElement('div');
            itemTitle.className = 'item-title';

            var mainItem = document.createElement('div');
            mainItem.className = 'main-item';

            var itemSymbol = document.createElement('div');
            itemSymbol.className = 'item-symbol';
            var icon = document.createElement('i');
            icon.className = 'bx bx-dots-vertical-rounded bx-rotate-180';
            itemSymbol.appendChild(icon);

            var itemId = document.createElement('p');
            itemId.className = 'item-id';
            var boldText = document.createElement('b');
            boldText.textContent = val.id;
            var span = document.createElement('span');
            span.textContent = (val.delivery_or_pickup === "delivery") ? 'D' : 'P';
            boldText.appendChild(span);
            itemId.appendChild(boldText);

            mainItem.appendChild(itemSymbol);
            mainItem.appendChild(itemId);

            var timeDuration = document.createElement('div');
            timeDuration.className = 'time-duration';
            if (val.delivery_or_pickup === "delivery") {
                var timeIcon = document.createElement('i');
                timeIcon.className = 'bx bx-time-five';
                var readyTime = document.createElement('div');
                readyTime.className = 'ready-time';
                readyTime.textContent = val.delivery_date;
                timeDuration.appendChild(timeIcon);
                timeDuration.appendChild(readyTime);
            }

            itemTitle.appendChild(mainItem);
            itemTitle.appendChild(timeDuration);

            var itemOptions = document.createElement('div');
            itemOptions.className = 'item-options';

            var viewDetailsButton = document.createElement('button');
            viewDetailsButton.className = 'view-details';
            viewDetailsButton.textContent = 'View Details';
            viewDetailsButton.onclick = function() {
                showPopup('viewDetails');
            };

            var cancelButton = document.createElement('button');
            cancelButton.className = 'cancel';
            cancelButton.textContent = 'Cancel';
            cancelButton.onclick = function() {
                showPopup('cancel');
            };

            itemOptions.appendChild(viewDetailsButton);
            itemOptions.appendChild(cancelButton);

            itemContainer.appendChild(itemTitle);
            itemContainer.appendChild(itemOptions);

            return itemContainer;
        }
    </script>
</body>

</html>