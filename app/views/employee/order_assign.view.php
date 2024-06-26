<?php
// show($data);

$role = "Employee";
$data['role'] = $role;

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

$this->view('includes/cancel_popup', $data);
$this->view('includes/details_popup', $data);
$this->view('includes/assign_popup', $data);
$this->view('includes/alreadyProcess_popup', $data);

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
    <?php $this->view('includes/emp_topbar', $data); ?>

    <div class="home-section">
        <div class="main-title">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <h2 class="section-title">ORDERS PROGRESS</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">

                </div>
            </div>

            <button class="circle-container" id="notification-button">

                <i id="bell-icon" class='bx bxs-bell' style='color:#ffffff'></i>

                <div id="notification-box">
                    <h3 class="notify_topic">Notifications</h3>
                    <?php

                    if (!empty($notify)) {


                        foreach ($notify as $val) {

                            if ($val->view_status == 0) {

                                // show($val);
                    ?>
                                <hr>

                                <div class="notify" id="notification_<?= $val->id ?>">
                                    <img src="<?= ROOT ?>/assets/images/drivers/<?= $val->image ?>" class="profile-img">
                                    <p class="msg"> <b>Deliver_ID - <?= $val->deliver_id ?> </b>delivered the <b>Order-<?= $val->id ?> </b> successfully</p>

                                    <!-- Delete the notification about successfull deliveres -->
                                    <p class="clear-msg" onclick="clearNotification(<?= $val->id ?>)">Clear</p>

                                </div>

                    <?php
                            }
                        }
                    }
                    ?>

                </div>

            </button>






        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var notificationButton = document.getElementById("notification-button");
                var notificationBox = document.getElementById("notification-box");

                notificationButton.addEventListener("click", function() {
                    // Toggle the visibility of the notification box
                    if (notificationBox.style.display === "none") {
                        notificationBox.style.display = "block";
                    } else {
                        notificationBox.style.display = "none";
                    }
                });
            });


            function clearNotification(id) {

                data = {
                    id_array: parseInt(id),
                    status: "notification",
                };

                $.ajax({
                    type: "POST",
                    url: status_update_endpoint,
                    data: data,
                    cache: false,
                    success: function(res) {
                        try {
                            // alert(res);

                            // convert to the json type
                            Jsondata = JSON.parse(res);

                            // location.reload();
                            document.getElementById(`notification_${id}`).style.display = "none";
                            notificationBox.style.display = "block";

                        } catch (error) {}
                    },
                    error: function(xhr, status, error) {
                        // return xhr;
                    },
                });
            }

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

        <div class="orders-container">
            <div class="order-status placed-orders">
                <div class="title-section">

                    <i class='bx bxs-cart-alt bx-tada'></i>
                    <div class="status-title">Placed Orders</div>
                </div>

                <div class="all-button">
                </div>

                <div class="filter-buttons">

                    <a href="<?= ROOT ?>/Emp_progress">All</a>

                    <button onclick='filterOrders("D",<?php echo json_encode($data["detail"]) ?>)'>Deliveries</button>
                    <button onclick='filterOrders("P",<?php echo json_encode($data["detail"]) ?>)'>Pickups</button>
                </div>

                <div class="selectOption">
                    <div class="select-all" id="select-all-placed" onclick="selectAllItems('placed')">
                        <div class="outer-circle">
                            <div class="inner-circle"></div>
                        </div>
                        <span>Select All</span>
                    </div>


                    <div class="dropdown">
                        <div class="dropdown-header" onclick="togglePlacedDropdown()" id="placedDropdownHeader">
                            <span id="placedSelectedOption">Change the State</span>
                            <i class="bx bxs-down-arrow" style="color:#888"></i>
                        </div>
                        <div class="dropdown-content" id="placedDropdownContent">
                            <div id="alreadyProcessedButton" onclick="showProcessedOrders()">Already Processed</div>
                            <!-- <div id="informButton" onclick="showPickupsOrders()">Inform Customers</div> -->
                            <div id="cancelButton" onclick="showSelectedOrders_cancel()">Cancel</div>
                        </div>
                    </div>


                </div>

                <div class="placed-order-list" id="placed-order-list">

                    <?php

                    if (!empty($detail)) {
                        //show($detail);
                        foreach ($detail as $val) {

                    ?>
                            <div class="placed-item">
                                <div class="item-title">
                                    <div class="main-item">

                                        <input class="checkbox" type="checkbox" id="checkbox-<?= $val->id ?>" name="checkbox-<?= $val->id ?>">
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
                                            <div class="ready-time"><?= $val->delivery_time ?></div>
                                        </div>
                                    <?php

                                    }
                                    ?>

                                </div>
                                <div class="item-options">


                                    <button class="view-details" data-order='<?php echo json_encode($val); ?>' onclick="showPopup(this,'viewOrderDetails')">View Details</button>

                                    <button class="cancel" id="deleteButton" data-order='<?php echo json_encode($val); ?>' onclick="showPopup(this,'cancel')">Cancel</button>
                                </div>

                            </div>
                        <?php

                        }
                    } else {

                        ?>
                        <p class="empty-box">No Available placed orders</p>
                    <?php
                    }
                    ?>

                </div>


            </div>



            <div class="order-status ready-orders">
                <div class="title-section">
                    <i class='bx bx-check-circle bx-tada'></i>
                    <div class="status-title">Ready Orders</div>
                </div>


                <div class="selectOption">
                    <div class="select-all" id="select-all-ready" onclick="selectAllItems('ready')">
                        <div class="outer-circle">
                            <div class="inner-circle"></div>
                        </div>
                        <span>Select All</span>
                    </div>


                    <div class="dropdown">
                        <div class="dropdown-header" onclick="updateAssignButtonState()" id="updateAssign">

                            <div id="readySelectedOption" onclick="showDrivers()">Assign to Drivers</div>

                        </div>
                    </div>


                </div>

                <div class="ready-order-list" id="ready-order-list">
                    <?php

                    if (!empty($ready)) {
                        //show($data['ready']);
                        foreach ($ready as $val) {

                    ?>
                            <div class="placed-item">
                                <div class="item-title">
                                    <div class="main-item">
                                        <?php
                                        if ($val->delivery_or_pickup == "delivery") {
                                        ?>
                                            <input class="checkbox" type="checkbox" id="checkbox-<?= $val->id ?>" name="checkbox-<?= $val->id ?>">
                                        <?php
                                        }
                                        ?>



                                        <p class="item-id"><b><?= $val->id ?><span>

                                                    <?php
                                                    if ($val->delivery_or_pickup == "delivery") {
                                                        echo 'D';
                                                    } else {
                                                        echo 'P';
                                                    }
                                                    ?>
                                    </div>


                                </div>

                                <div class="item-options">

                                    <button class="view-details" data-order='<?php echo json_encode($val); ?>' onclick="showPopup(this,'viewOrderDetails')">View Details</button>
                                    <?php
                                    if ($val->delivery_or_pickup == "delivery") {
                                    ?>

                                        <button class="cancel" id="assignButton" data-order='<?php echo json_encode($val); ?>' onclick="showPopup(this,'assignDeliver')">Assign Deliverer</button>

                                    <?php
                                    } else {

                                    ?>
                                        <form method="POST">
                                            <input type="hidden" name="order_status" value="order delivered">
                                            <input type="hidden" name="id" value="<?= $val->id ?>">
                                            <button name="cancel" class="cancel">Finish the Order</button>
                                        </form>
                                        <!-- <button class="cancel" id="assignButton">Finish the Order</button> -->

                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>

                        <?php

                        }
                    } else {

                        ?>
                        <p class="empty-box">No Available ready orders</p>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                function updateOrders() {
                    $.ajax({
                        url: 'http://localhost/finagle/public/Emp_progress/getOrdersJson',
                        type: 'GET',
                        success: function(orders) {
                            // Clear the current list of orders
                            $('#placed-order-list').empty();
                            console.log(orders);
                            // Loop through the new orders and add them to the page
                            orders.forEach(order => {
                                // Create the HTML for the order
                                var orderHtml = `
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">
                                <input class="checkbox" type="checkbox" id="checkbox-${order.id}" name="checkbox-${order.id}">
                                <p class="item-id"><b>${order.id}<span>${order.delivery_or_pickup == "delivery" ? 'D' : 'P'}</span></b></p>
                            </div>
                            ${order.delivery_or_pickup == "delivery" ? `
                                <div class="time-duration">
                                    <i class='bx bx-time-five'></i>
                                    <div class="ready-time">${order.delivery_time}</div>
                                </div>
                            ` : ''}
                        </div>
                        <div class="item-options">
                            <button class="view-details" data-order='${JSON.stringify(order)}' onclick="showPopup(this,'viewOrderDetails')">View Details</button>
                            <button class="cancel" id="deleteButton" data-order='${JSON.stringify(order)}' onclick="showPopup(this,'cancel')">Cancel</button>
                        </div>
                    </div>`;

                                // Add the order to the page
                                $('#placed-order-list').append(orderHtml);
                            });
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                }

                setInterval(updateOrders, 60000); // 60000 milliseconds = 60 seconds
            </script>


            <div class="order-status dispatched-orders">
                <div class="title-section">

                    <i class='bx bxs-truck bx-tada'></i>
                    <div class="status-title">Dispatched Orders</div>
                </div>



                <div class="dispatch-order-list" id="dispatch-order-list">
                    <?php

                    if (!empty($dispatch)) {
                        //show($data['ready']);
                        foreach ($dispatch as $val) {

                    ?>
                            <div class="placed-item">
                                <div class="item-title">
                                    <div class="main-item">

                                        <!-- <input class="checkbox" type="checkbox" id="checkbox-<?= $val->id ?>" name="checkbox-<?= $val->id ?>"> -->
                                        <p class="item-id"><?= $val->id ?></p>
                                    </div>
                                    <i class='bx bxs-right-arrow-square'></i>
                                    <!-- <p class="item-id"><?= $val->username ?></p> -->
                                    <p class="item-id">Deliver ID -<?= $val->deliver_id ?></p>



                                </div>
                                <div class="item-options">

                                    <button class="view-details" data-order='<?php echo json_encode($val); ?>' onclick="showPopup(this,'viewOrderDetails')">View Details</button>

                                </div>



                            </div>
                        <?php
                        }
                    } else {

                        ?>
                        <p class="empty-box">No Available dispatch orders</p>
                    <?php
                    }
                    ?>

                </div>


            </div>




        </div>
    </div>




    <!-- Import JQuary Library script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script>
        var view_details = document.querySelector('view-details');

        var data = {};

        // select pickup orders list
        var driver_assign_order_id = [];

        // cancel order id list
        var cancel_order_id = [];

        function showPopup(button, popupId) {

            cancel_reason_State = ""

            data = {};

            data = JSON.parse(button.getAttribute('data-order'));

            var popup = document.getElementById(popupId);

            //  console.log(data.mult_order);

            if (popup) {
                popup.style.display = "block";
            }


            // when call the assign deliver button tap with check 
            if (popupId == "assignDeliver") {

                driver_assign_order_id = [];
                driver_assign_order_id.push(data.id);
                return;
            }
            // when call the cancel each single orders tap with check 
            else if (popupId == "cancel") {

                cancel_order_id = [];
                cancel_order_id.push(data.id);
                return;
            }

            var order_id = document.getElementById('view-order-id');


            var user_location = document.getElementById('user-location');


            var pay_status = document.getElementById('pay-status');
            var pay_status_btn = document.getElementById('pay-status-btn');

            var total_cost = document.getElementById('total_cost');
            var note = document.getElementById('note');



            order_id.innerHTML = data.id;

           
            user_location.innerHTML = data.delivery_address; 
                    
            
          
            // user_phone.innerHTML = data.phone_number;
            pay_status.innerHTML = data.payment_method;
            total_cost.innerHTML = data.total_cost;

            note.innerHTML = data.note;



            if (data.payment_method == 'card') {
                pay_status.innerHTML = ('PAID');
                pay_status_btn.classList.remove('active');

            } else {
                pay_status.innerHTML = ('NOT PAID');
                pay_status_btn.classList.add('active');

            }

            // document.getElementById('order-id-input').value = data.id;

            document.getElementById('order-details').innerHTML = "";

            for (let index = 0; index < data.mult_order.length; index++) {
                // console.log(data.mult_order[index]);

                order_list(data.mult_order[index]);
            }

        }


        function hidePopup(popupId) {
            var popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = "none";
            }
        }

        function order_list(orders_list) {


            var details = document.getElementById('order-details');
            var newCard = document.createElement("div");
            newCard.className = "product-item";

            newCard.innerHTML = `<div class="product-name" id="product-name">${orders_list.user_name}</div>
          <div class="product-qty" id="product-qty">${orders_list.quantity}</div>
          <div class="product-price" id="product-price">Rs.${orders_list.price}</div>
      `;

            newCard.style.transition = "all 0.5s ease-in-out";
            details.appendChild(newCard);
        }



        function filterOrders(type, data) {

            // console.log(data);

            var placed = document.getElementById("placed-order-list");

            placed.textContent = ""

            item_id = document.getElementsByName("item-id")



            for (let index = 0; index < data.length; index++) {

                const element = data[index];
                // console.log(element);


                switch (type) {

                    case 'D':

                        if (element.delivery_or_pickup == "delivery") {

                            item_id.textContent = element.id
                            // console.log(item_id)
                            itemContainer = createItemHTML(element);
                            placed.appendChild(itemContainer);

                        }
                        break;

                    case 'P':

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




        //PLACED-ORDER-CONTAINER

        document.addEventListener("DOMContentLoaded", function() {
            var dropdownHeader = document.getElementById("placedDropdownHeader");
            updateDropdownColor(); // Call the function to set initial color
        });

        function updateDropdownColor() {
            var dropdownHeader = document.getElementById("placedDropdownHeader");
            if (isAnyOrderSelected()) {
                dropdownHeader.classList.remove('disabled');
                dropdownHeader.style.color = '#808080'; // Change text color to grey
            } else {
                dropdownHeader.classList.add('disabled');
                dropdownHeader.style.color = '#e4e4e4'; // Change text color back to light gray
            }
        }

        function togglePlacedDropdown() {
            var dropdownContent = document.getElementById("placedDropdownContent");
            var dropdownHeader = document.getElementById("placedDropdownHeader");
            if (isAnyOrderSelected()) {
                dropdownContent.classList.remove('disabled');
                dropdownHeader.classList.remove('disabled');
                dropdownHeader.style.color = '#808080'; // Change text color to grey
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                    dropdownContent.style.width = dropdownHeader.offsetWidth + "px";
                }
            } else {
                dropdownContent.classList.add('disabled');
                dropdownHeader.classList.add('disabled');
                dropdownHeader.style.color = '#e4e4e4'; // Change text color back to light gray
            }
        }

        // Function to check if any order is selected
        function isAnyOrderSelected() {
            var checkboxes = document.querySelectorAll('.placed-order-list .checkbox');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    return true; // If any checkbox is checked, return true
                }
            }
            return false; // If no checkbox is checked, return false
        }
        // Attach event listeners to checkboxes to update dropdown color when clicked
        var checkboxes = document.querySelectorAll('.placed-order-list .checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', updateDropdownColor);
        });

        var selectAllCheckbox = document.getElementById('select-all-placed');
        selectAllCheckbox.addEventListener('click', updateDropdownColor);

        function selectPlacedOption(option) {
            document.getElementById("placedSelectedOption").innerText = option;
            document.getElementById("placedDropdownContent").style.display = "none";
        }




        // Function to show the popup modal of 'alreadyProcess_popup'
        function showModal(selectedOrders) {
            var modal = document.getElementById("viewAlreadyProcessed");
            var modalContent = document.querySelector(".modal-content");
            var closeBtn = document.getElementById("cancelDetails");
            var ordersContainer = document.getElementById("selectedOrdersContainer");

            // Clear previous content
            ordersContainer.innerHTML = "";


            selectedOrders.forEach(function(order) {
                // Create a container for each order
                var orderContainer = document.createElement("div");
                orderContainer.classList.add("order-container");

                // Create a paragraph element to display order details
                var p = document.createElement("p");
                p.textContent = order;

                // Append the paragraph to the order container
                orderContainer.appendChild(p);

                // Append the order container to the orders container
                ordersContainer.appendChild(orderContainer);
            });


            modal.style.display = "block";

            // Close the modal when clicking on the close button
            closeBtn.onclick = function() {
                modal.style.display = "none";
            };

            // Close the modal when clicking outside of it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        }

        // select orders from placed list
        var selectedOrders = [];

        function showProcessedOrders() {

            selectedOrders = [];
            var checkboxes = document.querySelectorAll(".placed-order-list .checkbox:checked");
            checkboxes.forEach(function(checkbox) {
                //find the closest ancestor element with the class .placed-item
                var orderId = checkbox.closest(".placed-item").querySelector(".item-id").textContent;
                selectedOrders.push(orderId);
            });
            showModal(selectedOrders);
        }




        // Function to show the popup modal of 'InformCustomers_popup'
        function showPickupModal(selectedPickups) {
            var modal = document.getElementById("customerInform");
            var modalContent = document.querySelector(".modal-content");
            var closeBtn = document.getElementById("cancelDetails_pickups");
            var ordersContainer = document.getElementById("selectedPickupsContainer");

            // Clear previous content
            ordersContainer.innerHTML = "";


            selectedPickups.forEach(function(order) {
                // Create a container for each order
                var orderContainer = document.createElement("div");
                orderContainer.classList.add("order-container");

                // Create a paragraph element to display order details
                var p = document.createElement("p");
                p.textContent = order;

                // Append the paragraph to the order container
                orderContainer.appendChild(p);

                // Append the order container to the orders container
                ordersContainer.appendChild(orderContainer);
            });


            modal.style.display = "block";

            // Close the modal when clicking on the close button
            closeBtn.onclick = function() {
                modal.style.display = "none";
            };

            // Close the modal when clicking outside of it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        }

        function showPickupsOrders() {

            selectedPickups = [];
            var checkboxes = document.querySelectorAll(".placed-order-list .checkbox:checked");
            checkboxes.forEach(function(checkbox) {
                //find the closest ancestor element with the class .placed-item
                var orderId = checkbox.closest(".placed-item").querySelector(".item-id").textContent;
                selectedPickups.push(orderId);
            });
            showPickupModal(selectedPickups);
        }



        // Function to show the popup modal of 'cancel_popup'
        function showCancelModal(selectedOrders) {
            var modal = document.getElementById("viewCancel");
            var modalContent = document.querySelector(".modal-content");
            var closeBtn = document.getElementById("cancelDetails_cancel");
            var ordersContainer_cancel = document.getElementById("selectedOrdersContainer_cancel");

            // Clear previous content
            ordersContainer_cancel.innerHTML = "";


            selectedOrders.forEach(function(order) {
                // Create a container for each order
                var orderContainer_cancel = document.createElement("div");
                orderContainer_cancel.classList.add("order-container-cancel");

                // Create a paragraph element to display order details
                var p = document.createElement("p");
                p.textContent = order;

                // Append the paragraph to the order container
                orderContainer_cancel.appendChild(p);

                // Append the order container to the orders container
                ordersContainer_cancel.appendChild(orderContainer_cancel);

                // get the cancel process for selected all order ids 
                cancel_order_id.push(order);
            });


            modal.style.display = "block";

            // Close the modal when clicking on the close button
            closeBtn.onclick = function() {
                modal.style.display = "none";
            };

            // Close the modal when clicking outside of it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        }

        function showSelectedOrders_cancel() {

            // add initial reason state in empty
            cancel_reason_State = ""

            var selectedOrders = [];
            var checkboxes = document.querySelectorAll(".placed-order-list .checkbox:checked");
            checkboxes.forEach(function(checkbox) {
                //find the closest ancestor element with the class .placed-item
                var orderId = checkbox.closest(".placed-item").querySelector(".item-id").textContent;
                selectedOrders.push(orderId);
            });
            showCancelModal(selectedOrders);
        }





        //READY-ORDER-CONTAINER
        document.addEventListener("DOMContentLoaded", function() {
            updateAssignButtonState(); // Call the function to set initial button state
        });


        function updateAssignButtonState() {
            var assignButton = document.getElementById("readySelectedOption");
            var checkboxes = document.querySelectorAll('.ready-order-list .checkbox');
            var isAnySelected = false;

            // Check if any checkbox is checked
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isAnySelected = true;
                    break;
                }
            }

            // Update button state
            assignButton.disabled = !isAnySelected;

            // Update button color based on disabled state
            if (assignButton.disabled) {
                assignButton.style.color = '#e4e4e4'; // Disabled color
            } else {
                assignButton.style.color = '#808080'; // Enabled color
            }
        }


        // Function to check if any order is selected
        function isAnyReadyOrderSelected() {
            var checkboxes = document.querySelectorAll('.ready-order-list .checkbox');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    return true; // If any checkbox is checked, return true
                }
            }
            return false; // If no checkbox is checked, return false
        }

        // Attach event listeners to checkboxes to update button state when clicked
        var checkboxes = document.querySelectorAll('.ready-order-list .checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', updateAssignButtonState);
        });

        var selectAllReadyCheckbox = document.getElementById('select-all-ready');
        selectAllReadyCheckbox.addEventListener('click', function() {
            selectAllDeliveryOrders();
            updateAssignButtonState();
        });

        function selectAllDeliveryOrders() {
            var checkboxes = document.querySelectorAll('.ready-order-list .checkbox');
            checkboxes.forEach(function(checkbox) {
                var orderType = checkbox.parentElement.parentElement.querySelector('.main-item span').textContent;
                if (orderType.trim() === 'D') {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false; // Uncheck non-delivery orders
                }
            });
        }

        function selectReadyOption(option) {
            document.getElementById("readySelectedOption").innerText = option;
        }



        // Function to show the popup modal of 'driver assign_popup'

        function showAssignModal(selectedOrders) {
            var modal = document.getElementById("viewAssign");
            var modalContent = document.querySelector(".modal-content");
            var closeBtn = document.getElementById("cancelAssign");
            var ordersContainer = document.getElementById("assignOrdersContainer");

            // Clear previous content
            ordersContainer.innerHTML = "";


            selectedOrders.forEach(function(order) {
                // Create a container for each order
                var orderContainer = document.createElement("div");
                orderContainer.classList.add("order-flex-container");

                // Create a paragraph element to display order details
                var p = document.createElement("p");
                p.textContent = order;

                // Append the paragraph to the order container
                orderContainer.appendChild(p);

                // Append the order container to the orders container
                ordersContainer.appendChild(orderContainer);
            });


            modal.style.display = "block";

            // Close the modal when clicking on the close button
            closeBtn.onclick = function() {
                modal.style.display = "none";
            };

            // Close the modal when clicking outside of it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        }

        function showDrivers() {

            var selectedOrders = [];
            var checkboxes = document.querySelectorAll(".ready-order-list .checkbox:checked");
            checkboxes.forEach(function(checkbox) {
                //find the closest ancestor element with the class .placed-item
                var orderId = checkbox.closest(".placed-item").querySelector(".item-id").textContent;
                selectedOrders.push(orderId);
            });

            // get order id list 
            driver_assign_order_id = selectedOrders;

            // console.log(driver_assign_order_id);
            showAssignModal(selectedOrders);
        }



        //DISPATCH-ORDER-CONTAINER
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownHeader = document.getElementById("dispatchDropdownHeader");
            updateDispatchDropdownColor(); // Call the function to set initial color
        });

        function updateDispatchDropdownColor() {
            var dropdownHeader = document.getElementById("dispatchDropdownHeader");
            if (isAnyDispatchOrderSelected()) {
                dropdownHeader.classList.remove('disabled');
                dropdownHeader.style.color = '#808080'; // Change text color to grey
            } else {
                dropdownHeader.classList.add('disabled');
                dropdownHeader.style.color = '#e4e4e4'; // Change text color back to light gray
            }
        }

        function toggleDispatchDropdown() {
            var dropdownContent = document.getElementById("dispatchDropdownContent");
            var dropdownHeader = document.getElementById("dispatchDropdownHeader");
            if (isAnyDispatchOrderSelected()) {
                dropdownContent.classList.remove('disabled');
                dropdownHeader.classList.remove('disabled');
                dropdownHeader.style.color = '#808080'; // Change text color to grey
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                    dropdownContent.style.width = dropdownHeader.offsetWidth + "px";
                }
            } else {
                dropdownContent.classList.add('disabled');
                dropdownHeader.classList.add('disabled');
                dropdownHeader.style.color = '#e4e4e4'; // Change text color back to light gray
            }
        }

        // Function to check if any order is selected
        function isAnyDispatchOrderSelected() {
            var checkboxes = document.querySelectorAll('.dispatch-order-list .checkbox');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    return true; // If any checkbox is checked, return true
                }
            }
            return false; // If no checkbox is checked, return false
        }
        // Attach event listeners to checkboxes to update dropdown color when clicked

        var checkboxes = document.querySelectorAll('.dispatch-order-list .checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', updateDispatchDropdownColor);
        });


        var selectAllDispatchCheckbox = document.getElementById('select-all-dispatch');
        selectAllDispatchCheckbox.addEventListener('click', updateDispatchDropdownColor);

        function selectDispatchOption(option) {
            document.getElementById("dispatchSelectedOption").innerText = option;
            document.getElementById("dispatchDropdownContent").style.display = "none";
        }



        function selectAllItems(category) {

            var outerCircle = document.querySelector('#select-all-' + category + ' .outer-circle');
            var placedItems = document.querySelectorAll('.' + category + '-order-list .placed-item input[type="checkbox"]');

            // Toggle the clicked class to change outer circle color
            outerCircle.classList.toggle('clicked');

            // alert(outerCircle.checked);
            if (outerCircle.classList.contains('clicked')) {

                // Check/uncheck all placed items
                placedItems.forEach(function(item) {
                    item.checked = !item.checked;
                });
            } else {
                placedItems.forEach(function(item) {
                    item.checked = false;
                });
            }


            // console.log();
        }
    </script>

    <style>


    </style>
</body>

</html>