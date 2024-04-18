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


        <button type="submit" name="inform_btn" class="confirm_button" onclick="confirm_cancel()">Yes</button>

        <button type="button" class="cancel_button" id="cancelDetails_cancel" onclick="hidePopup('viewOrderConfirm')">No</button>

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
      margin-top: 20px;
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
  </style>


</body>

</html>