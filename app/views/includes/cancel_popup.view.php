<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Order Progress</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


</head>

<body>

  <!-- ***************************************** Cancel popup for a single order ***************************************** -->

  <div id="cancel" class="modal">
    <div class="modal-content">

      <div>
        <i class='bx bx-window-close bx-fade-right' style='color:red'></i>


      </div>

      <h5 class="text">Are you sure you want to proceed with the cancellation ? This action is irreversible.</h5>

      <div class="cancel-dropdown">
        <div class="dropdownHeader" onclick="toggleSingleCancelDropdown()">
          <span id="placedSingleCancelOption">Reason for the cancellation...</span>
        </div>
        <div class="dropdownContent" id="placedSingleCancelDropdown">
          <div onclick="selectSingleCancelOption('Unfortunately, we have run out of the stock')"> Unfortunately, we have run out of the stock</div>
          <div onclick="selectSingleCancelOption('We will not be able to fulfill within the requested time.')">We will not be able to fulfill within the requested time. </div>

        </div>
      </div>

      <div class="button-line">
        <button class="button" id="confirmDelete" onclick="cancelOrder()">OK</button>
        <button class="button" id="cancelDelete" onclick="hidePopup('cancel')">Cancel</button>

      </div>


    </div>
  </div>


  <script>
    // use for pass to the backend.
    var cancel_reason_State = "";

    // Set the initial state value
    var currentState = "Reason for the cancellation...";
    document.getElementById("placedSingleCancelOption").innerText = currentState;

    // Display the dropdown content initially
    var dropdownContent = document.getElementById("placedSingleCancelDropdown");
    dropdownContent.style.display = "block";

    function toggleSingleCancelDropdown() {
      var dropdownContent = document.getElementById("placedSingleCancelDropdown");
      var dropdownHeader = document.querySelector(".dropdown-header");

      dropdownContent.style.display = "block";

    }

    function selectSingleCancelOption(option) {
      document.getElementById("placedSingleCancelOption").innerText = option;
      document.getElementById("placedSingleCancelDropdown").style.display = "none";

      // Update the currentState variable
      currentState = option;

      // change the backend pass reason data
      cancel_reason_State = option;

    }
  </script>

  <!-- ***************************************** Cancel popup for multiple orders *********************************** -->

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

            // change the backend pass reason data
            cancel_reason_State = option;
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
          <button type="submit" name="inform_btn" class="confirm_button" onclick="cancelOrder()">Yes</button>

          <button type="button" class="cancel_button" id="cancelDetails_cancel" onclick="hidePopup('viewOrderConfirm')">No</button>


        </div>




    </div>



  </div>


  <script>
    function cancelOrder() {

      console.log(cancel_order_id);
      console.log(cancel_reason_State);

      // can't ok when not choosed reason
      if (cancel_reason_State == "") {
        return;
      }

      data = {
        id_array: cancel_order_id,
        status: "order cancelled",
        reason: cancel_reason_State
      };


      $.ajax({
        type: "POST",
        url: status_update_endpoint,
        data: data,
        cache: false,
        success: function(res) {
          try {
            console.log(res);

            // convert to the json type
            Jsondata = JSON.parse(res);

            location.reload();

          } catch (error) {}
        },
        error: function(xhr, status, error) {
          // return xhr;
        },
      });

    }
  </script>

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
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
      text-align: center;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: rgb(172, 0, 0);
      text-decoration: none;
      cursor: pointer;
    }

    .icon-warn {
      margin-left: 27px;
      font-size: 7rem;
      display: flexbox;
      justify-content: center;
      align-items: center;
    }

    .bx-window-close {
      margin-left: 27px;
      font-size: 7rem;
      display: flexbox;
      justify-content: center;
      align-items: center;

    }

    .bx.bx-window-close.bx-fade-right {
      font-size: 4rem;
      padding-top: -5px;
    }

    .button-line {
      margin-top: 110px;
      padding-bottom: 5px;

    }

    .button {
      width: 100px;
      height: 37px;
      font-size: 16px;
      display: inline-block;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      border: none;
      outline: none;
      color: #fff;
      transition: 0.3s ease-in;
      margin-top: 40px;

    }

    #confirmDelete {
      margin-right: 10px;
      background-color: #000000;
    }

    #cancelDelete {
      background-color: #f44336;
    }

    #confirmDelete:hover {
      background-color: rgb(16, 187, 0);
    }

    #cancelDelete:hover {
      background-color: rgb(255, 0, 0);
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