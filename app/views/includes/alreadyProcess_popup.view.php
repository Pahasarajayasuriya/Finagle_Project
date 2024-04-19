<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Order Details Display</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>

  <!-- Already Processed orders -->
  <div id="viewAlreadyProcessed" class="modal">
    <div class="modal-content">

      <div>
        <i class='bx bx-edit bx-fade-right' style='color:red'></i>
      </div>


      <h4>Are you sure you want to move these orders as READY ? </h5>

        <!-- <h2>Selected Orders</h2> -->
        <!-- <div id="selectedOrders"></div> -->

        <div id="selectedOrdersContainer">
          <!-- Selected orders will be appended here -->
        </div>

        <!-- <form method="POST"> -->
        <!-- <input type="hidden" name="order_status" value="ready"> -->
        <!-- <input type="hidden" id="order-ids" name="order_ids" value="" > -->
        <button type="submit" name="processed_btn" class="confirm_button" onclick="confirm_process()">Yes</button>

        <button type="button" class="cancel_button" id="cancelDetails" onclick="hidePopup('viewOrderConfirm')">No</button>
        <!-- </form> -->


        <!-- 
      <button class="confirm_button" id="confirmDetails" onclick="hidePopup('viewOrderConfirm')">Yes</button>
      <button class="cancel_button" id="cancelDetails" onclick="hidePopup('viewOrderConfirm')">No</button> -->

    </div>
  </div>



  <!-- Import JQuary Library script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    status_update_endpoint = "<?= ROOT ?>/Order_status_update"

    function confirm_process() {

      // Remove newline characters and everything after
      let cleanedArray = selectedOrders.map(element => parseInt(element.replace(/\n.*$/, ''), 10));

      //console.log(cleanedArray);

      data = {
        id_array: cleanedArray,
        status: "order preparing"
      };

      $.ajax({
        type: "POST",
        url: status_update_endpoint,
        data: data,
        cache: false,
        success: function(res) {
          try {
            console.log(res);

            // convet to the json type
            Jsondata = JSON.parse(res);

            location.reload();

          } catch (error) {}
        },
        error: function(xhr, status, error) {
          // return xhr;
        },
      });


      //  document.getElementById('order-ids').value = JSON.stringify(selectedOrders);


      hidePopup('viewOrderConfirm')



    }
  </script>



  <!-- Inform customer orders -->

  <div id="customerInform" class="modal">
    <div class="modal-content">

      <div>
        <i class='bx bx-edit bx-fade-right' style='color:red'></i>
      </div>


      <h4>Are you sure you want to inform these orders as ready? </h5>


        <div id="selectedPickupsContainer">
          <!-- Selected orders will be appended here -->
        </div>

        <button type="submit" name="inform_btn" class="confirm_button" onclick="confirm_inform()">Yes</button>

        <button type="button" class="cancel_button" id="cancelDetails_pickups" onclick="hidePopup('viewOrderConfirm')">No</button>
    </div>
  </div>


  <!-- Import JQuary Library script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    status_update_endpoint = "<?= ROOT ?>/Order_status_update"

    function confirm_inform() {

      // Remove newline characters and everything after
      let cleanedArray = selectedPickups.map(element => parseInt(element.replace(/\n.*$/, ''), 10));

      console.log(cleanedArray);

      data = {
        id_array: cleanedArray,
        status: "order preparing"
      };

      $.ajax({
        type: "POST",
        url: status_update_endpoint,
        data: data,
        cache: false,
        success: function(res) {
          try {
            console.log(res);


            Jsondata = JSON.parse(res);

            location.reload();

          } catch (error) {}
        },
        error: function(xhr, status, error) {
          return xhr;
        },
      });


      document.getElementById('order-ids').value = JSON.stringify(selectedOrders);


      hidePopup('viewOrderConfirm')



    }
  </script>






  <!-- Cancel orders -->
  <div id="viewCancel" class="modal">
    <div class="modal-content">

      <div>
        <i class='bx bx-edit bx-fade-right' style='color:red'></i>
      </div>


      <h4>Are you sure you want to proceed with the cancellation ? ? </h5>


        <div id="selectedOrdersContainer_cancel">
          <!-- Selected orders will be appended here -->
        </div>

        <div class="cancel-dropdown">
          <div class="dropdownHeader" onclick="toggleCancelDropdown()">
            <span id="placedAllCancelOption">Reason for the cancellation...</span>
          </div>
          <div class="dropdownContent" id="placedAllCancelDropdown">
            <div onclick="selectCancelOption('Unfortunately, we have run out of the stock')">Unfortunately, we have run out of the stock</div>
            <div onclick="selectCancelOption('We will not be able to fulfill within the requested time.')">We will not be able to fulfill within the requested time.</div>
          </div>
        </div>

        <script>
          // Set the initial state value
          var currentState = "Reason for the cancellation...";
          document.getElementById("placedAllCancelOption").innerText = currentState;

          function toggleCancelDropdown() {
            var dropdownContent = document.getElementById("placedAllCancelDropdown");
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
          }

          function selectCancelOption(option) {
            document.getElementById("placedAllCancelOption").innerText = option;
            document.getElementById("placedAllCancelDropdown").style.display = "none";
            currentState = option;
          }

          // Close the dropdown when clicking outside of it
          window.onclick = function(event) {
            if (!event.target.matches('.dropdownHeader')) {
              var dropdowns = document.getElementsByClassName("dropdownContent");
              for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                  openDropdown.style.display = "none";
                }
              }
            }
          };
        </script>

        <div class="button-line">
          <button type="submit" name="inform_btn" class="confirm_button" onclick="confirm_cancel()">Yes</button>

          <button type="button" class="cancel_button" id="cancelDetails_cancel" onclick="hidePopup('viewOrderConfirm')">No</button>


        </div>

     


    </div>



  </div>


  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      border-radius: 10px;
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
      text-align: center;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .bx.bx-edit.bx-fade-right {
      font-size: 4rem;
      padding-top: -5px;
    }

    .button-line {
      display: flex;
      margin-top: 75px;
      margin-left: 150px;
      gap: 30px;

    }


    .confirm_button,
    .cancel_button {
      width: 100px;
      height: 37px;
      font-size: 16px;
      display: inline-block;
      padding: 5px;
      border-radius: 5px;
      cursor: pointer;
      border: none;
      outline: none;
      color: #fff;
      transition: 0.3s ease-in;
      margin-top: 30px;
      text-align: center;
      align-items: center;
    }


    .confirm_button {
      margin-right: 10px;
      background-color: #000000;
    }

    .cancel_button {
      background-color: #f44336;
    }

    #cancelDetails_cancel {
      background-color: #f44336;
    }

    .confirm_button:hover {
      background-color: rgb(16, 187, 0);
    }

    .cancel_button:hover {
      background-color: rgb(255, 0, 0);
    }

    #cancelDetails_cancel:hover {
      background-color: rgb(255, 0, 0);
    }

    .order-container {
      border: 1px;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 15px;
      background-color: #f9f9f9;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      margin-top: 10px;
      width: 30%;
      margin-left: 35%;
    }

    .order-container-cancel {
      border: 1px;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 15px;
      background-color: #f9f9f9;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      margin-top: 10px;
      width: 30%;
      margin-left: 35%;

    }

    .order-container:hover {
      transform: translateY(-3px);

    }


    .order-container-cancel:hover {
      transform: translateY(-3px);

    }

    .order-container p {
      margin: 0;
      font-weight: bold;
      color: #333;
      font-size: 16px;

    }

    .order-container-cancel p {
      margin: 0;
      font-weight: bold;
      color: #333;
      font-size: 16px;

    }


    .cancel-dropdown {
      position: relative;
      display: inline-block;
      font-size: 13px;
      color: rgb(138, 138, 138);
      width: 400px;
      margin-top: 20px;



    }

    .dropdownHeader {
      cursor: pointer;
      padding: 10px;
      padding-left: 15px;
      padding-right: 15px;
      background-color: white;
      border-radius: 5px;
      display: flex;
      align-items: center;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);



    }

    .dropdownHeader:hover {
      background-color: #f9f9f9;
    }

    /* .dropdownHeader i {
  margin-left: 5px;
} */

    .dropdownContent {
      display: none;
      position: absolute;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-top: none;
      border-radius: 5px;
      margin-top: 5px;
      width: 100%;
      text-align: left;
      padding: 7px
        /* padding-left: 7px;
  padding-right: 7px; */

    }

    .dropdownContent div {
      padding: 10px;
      cursor: pointer;
      border-top: 1px solid #D3D3D3;
      /* padding-left: 7px;
  padding-right: 7px; */

    }

    .dropdownContent div:first-child {
      border-top: none;
      /* Remove border for the first option */
    }


    /* Hover effect for dropdown options */
    .dropdownContent div:hover {
      background-color: #f0f0f0;
      /* Change background color on hover */


    }
  </style>


</body>

</html>