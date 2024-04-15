<?php
$role = "Employee";
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

                    <button onclick='filterOrders("D",<?php echo json_encode($data) ?>)'>Deliveries</button>
                    <button onclick='filterOrders("P",<?php echo json_encode($data) ?>)'>Pickups</button>
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
                            <div id="alreadyProcessedButton" onclick="showSelectedOrders()">Already Processed</div>
                            <div onclick="selectPlacedOption('Cancel Orders')">Cancel Orders</div>
                        </div>
                    </div>


                </div>




                <div class="placed-order-list" id="placed-order-list">

                    <?php
                    if (isset($data['detail'])) {
                        // show($data['detail']);
                        foreach ($data['detail'] as $val) {

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
                                            <div class="ready-time"><?= $val->delivery_date ?></div>
                                        </div>
                                    <?php

                                    }
                                    ?>

                                </div>
                                <div class="item-options">


                                    <button class="view-details" data-order='<?php echo json_encode($val); ?>' onclick="showPopup(this,'viewDetails')">View Details</button>
                                    <button class="cancel" id="deleteButton" onclick="showPopup(this,'cancel')">Cancel</button>
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


                <div class="selectOption">
                    <div class="select-all" id="select-all-ready" onclick="selectAllItems('ready')">
                        <div class="outer-circle">
                            <div class="inner-circle"></div>
                        </div>
                        <span>Select All</span>
                    </div>


                    <div class="dropdown">
                        <div class="dropdown-header" onclick="toggleReadyDropdown()" id="readyDropdownHeader">
                            <span id="readySelectedOption">Change the State</span>
                            <i class="bx bxs-down-arrow style='color:#888"></i>
                        </div>
                        <div class="dropdown-content" id="readyDropdownContent">
                            <div onclick="selectReadyOption('Assign to Drivers')">Assign to Drivers</div>

                        </div>
                    </div>
                </div>

                <div class="ready-order-list" id="ready-order-list">
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">

                                <input class="checkbox" type="checkbox" id="checkbox-<?= $val->id ?>" name="checkbox-<?= $val->id ?>">
                                <p class="item-id">D0123</p>
                            </div>


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

                <div class="selectOption">
                    <div class="select-all" id="select-all-dispatch" onclick="selectAllItems('dispatch')">
                        <div class="outer-circle">
                            <div class="inner-circle"></div>
                        </div>
                        <span>Select All</span>
                    </div>



                    <div class="dropdown">
                        <div class="dropdown-header" onclick="toggleDispatchDropdown()">
                            <span id="dispatchSelectedOption">Change the State</span>
                            <i class="bx bxs-down-arrow style='color:#266bff"></i>
                        </div>
                        <div class="dropdown-content" id="dispatchDropdownContent">
                            <div onclick="selectDispatchOption('Ready to Dispatch')">Ready to Dispatch</div>
                            <div onclick="selectDispatchOption('Option 2')">Option 2</div>
                            <div onclick="selectDispatchOption('Option 3')">Option 3</div>
                        </div>
                    </div>
                </div>
                <div class="dispatch-order-list" id="dispatch-order-list">
                    <div class="placed-item">
                        <div class="item-title">
                            <div class="main-item">

                                <input class="checkbox" type="checkbox" id="checkbox-<?= $val->id ?>" name="checkbox-<?= $val->id ?>">
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





    <!-- Import JQuary Library script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




    <script>
        var view_details = document.querySelector('view-details');


        function showPopup(button, popupId) {


            data = JSON.parse(button.getAttribute('data-order'));
            var popup = document.getElementById(popupId);

            if (popup) {
                popup.style.display = "block";
            }

            var order_id = document.getElementById('view-order-id');
            var user_location = document.getElementById('user-location');
            var pay_status = document.getElementById('pay-status');
            var total_cost = document.getElementById('total_cost');


            console.log(data);

            order_id.innerHTML = data.id;
            user_location.innerHTML = data.delivery_address;
            total_cost.innerHTML = data.total_cost;

            if (data.payment_method == 'card') {
                pay_status.innerHTML = "PAID";

            } else {
                pay_status.innerHTML = "NOT PAID";
            }



        }


        function hidePopup(popupId) {
            var popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = "none";
            }
        }

        function showConfirmPopup(popupId) {


        }

        function filterOrders(type, data) {


            var placed = document.getElementById("placed-order-list");

            placed.textContent = ""

            item_id = document.getElementsByName("item-id")

            // data.forEach(element => {
            for (let index = 0; index < data.detail.length; index++) {

                const element = data[index];

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


        function toggleDispatchDropdown() {

            var dropdownContent = document.getElementById("dispatchDropdownContent");
            var dropdownHeader = document.querySelector(".dropdown-header");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
                dropdownContent.style.width = dropdownHeader.offsetWidth + "px";
            }
        }

        function selectDispatchOption(option) {

            document.getElementById("dispatchSelectedOption").innerText = option;

            document.getElementById("dispatchDropdownContent").style.display = "none";
        }

        function selectAllItems(category) {
            var outerCircle = document.querySelector('#select-all-' + category + ' .outer-circle');
            var placedItems = document.querySelectorAll('.' + category + '-order-list .placed-item input[type="checkbox"]');

            // Toggle the clicked class to change outer circle color
            outerCircle.classList.toggle('clicked');

            // Check/uncheck all placed items
            placedItems.forEach(function(item) {
                item.checked = !item.checked;
            });
        }

        // Function to show the popup modal
        function showModal(selectedOrders) {
            var modal = document.getElementById("myModal");
            var modalContent = document.querySelector(".modal-content");
            var closeBtn = document.getElementsByClassName("close")[0];

            var ordersDiv = document.getElementById("selectedOrders");
            ordersDiv.innerHTML = "";

            selectedOrders.forEach(function(order) {
                var p = document.createElement("p");
                p.textContent = order;
                ordersDiv.appendChild(p);
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

        // Call this function when the "Already Processed" option is selected
        function showSelectedOrders() {
            var selectedOrders = [];
            var checkboxes = document.querySelectorAll(".placed-order-list .checkbox:checked");
            checkboxes.forEach(function(checkbox) {
                var orderId = checkbox.parentElement.nextElementSibling.querySelector(".item-id").textContent;
                selectedOrders.push(orderId);
            });
            showModal(selectedOrders);
        }
    </script>

    <style>


    </style>
</body>

</html>