<?php
// show($data);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Order Assign</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


</head>

<body>


  <div id="assignDeliver" class="modal">
    <div class="modal-content">

      <div>
        <i class='bx bxs-truck bx-fade-right' style='color:#f90000'></i>
      </div>


      <h4>Assign a deliverer to this order</h4>
      <div class="select-menu">
        <div class="select-btn">
          <span class="sBtn-text">Select a deliverer</span>
          <i class="bx bx-chevron-down"></i>
        </div>

        <?php
        //show($data);
        if (isset($data['driver_details'])) {
          // show($data['driver_details']);

          foreach ($data['driver_details'] as $driver) {
        ?>

            <ul class="options">
              <li class="option">
                <i class='bx bxs-user-circle' style='color:#ff0e0e'></i>
                <span class="option-text"><?= $driver->id ?> - <?= $driver->username ?></span>
              </li>


            </ul>

        <?php
          }
        }

        ?>
      </div>



</body>

</html>


<button class="confirm_button"  onclick="hidePopup('assignDeliver')">OK</button>

<button class="cancel_button" id="confirmDelete" onclick="hidePopup('assignDeliver')">Cancel</button>

</div>
</div>

<script>

 function assignPopup(e){

 }

</script>



<!-- Main 'Assign Drivers' button -->
   
<div id="viewAssign" class="modal">
    <div class="modal-content">

    <div>
        <i class='bx bxs-truck bx-fade-right' style='color:#f90000'></i>
      </div>


      <div class="select-menu_main">
        <div class="select-btn_main">
          <span class="sBtn-text_main">Assign a deliverer</span>
          <i class="bx bx-chevron-down"></i>
        </div>

        <?php
        //show($data);
        if (isset($data['driver_details'])) {
          // show($data['driver_details']);

          foreach ($data['driver_details'] as $driver) {
        ?>

            <ul class="options_main">
              <li class="option_main">
                <i class='bx bxs-user-circle' style='color:#ff0e0e'></i>
                <span class="option-text_main"><?= $driver->id ?> - <?= $driver->username ?></span>
              </li>


            </ul>

        <?php
          }
        }

        ?>
      </div>

    
      <h4>Are you sure you want to assign these orders to this driver ?  </h5>


        <div id="assignOrdersContainer">
          <!-- Selected orders will be appended here -->
        </div>


        <button type="submit" name="inform_btn" class="confirm_button" onclick="confirm_assign()">Yes</button>

        <button type="button" class="cancel_button" id="cancelAssign" onclick="hidePopup('viewOrderConfirm')">No</button>

        

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
    margin: 8% auto;
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
    color: rgb(172, 0, 0);
    text-decoration: none;
    cursor: pointer;
  }

  .icon-warn {
    margin-left: 27px;
    font-size: 5rem;
    display: flexbox;
    justify-content: center;
    align-items: center;
  }

  .bxs-truck {
    margin-left: 27px;
    font-size: 4rem;
    display: flexbox;
    justify-content: center;
    align-items: center;

  }

  .confirm_button{
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
    margin-top: 10px;
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

  .confirm_button:hover {
    background-color: rgb(16, 187, 0);
  }

  .cancel_button:hover {
    background-color: black;
  }

  .select-menu {
    width: 320px;
    margin: 20px auto;
  }

  .select-menu .select-btn {
    display: flex;
    height: 45px;
    background: #fff;
    padding: 15px;
    font-size: 18px;
    font-weight: 300;
    border-radius: 8px;
    align-items: center;
    cursor: pointer;
    justify-content: space-between;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }

  .select-btn i {
    font-size: 20px;
    transition: 0.3s;
  }

  .select-menu.active .select-btn i {
    transform: rotate(-180deg);
  }

  .select-menu .options {
    position: relative;
    padding: 5px;
    margin-top: 10px;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
    display: none;
    height: 40px;
  }

  .select-menu.active .options {
    display: block;
  }

  .options .option {
    display: flex;
    height: 30px;
    cursor: pointer;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    background: #fff;
  }

  .options .option:hover {
    background: #F2F2F2;
  }

  .option i {
    font-size: 25px;
    margin-right: 12px;
  }

  .option .option-text {
    font-size: 14px;
    color: #888;
    font-weight: 500;
  }

  .sBtn-text {
    font-size: 14px;
    color:#aaa;
    font-weight: 450;
    
  }


  
  .select-menu_main {
    width: 320px;
    margin: 20px auto;
  }

  .select-menu_main .select-btn_main {
    display: flex;
    height: 45px;
    background: #fff;
    padding: 15px;
    font-size: 18px;
    font-weight: 300;
    border-radius: 8px;
    align-items: center;
    cursor: pointer;
    justify-content: space-between;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }

  .select-btn_main i {
    font-size: 20px;
    transition: 0.3s;
  }

  .select-menu_main.active .select-btn_main i {
    transform: rotate(-180deg);
  }

  .select-menu_main .options_main {
    position: relative;
    padding: 5px;
    margin-top: 10px;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
    display: none;
    height: 40px;
  }

  .select-menu_main.active .options_main {
    display: block;
  }

  .options_main .option_main {
    display: flex;
    height: 30px;
    cursor: pointer;
    padding: 0 16px;
    border-radius: 8px;
    align-items: center;
    background: #fff;
  }

  .options_main .option_main:hover {
    background: #F2F2F2;
  }

  .option_main i {
    font-size: 25px;
    margin-right: 12px;
  }

  .option_main .option-text_main {
    font-size: 14px;
    color: #888;
    font-weight: 500;
  }

  .sBtn-text_main {
    font-size: 14px;
    color:#aaa;
    font-weight: 450;
    
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

   

    .order-container:hover {
      transform: translateY(-3px);

    }


    .order-container p {
      margin: 0;
      font-weight: bold;
      color: #333;
      font-size: 16px;

    }

   
.order-flex-container {
    display: flex; 
    flex-wrap: wrap; 
    gap:20px;
    margin-left: 20px;
    margin-top: 20px;
    align-items: center;
}

.order-flex-container > div {
    margin-right: 10px; 
}


 
</style>

<script>
  const optionMenu = document.querySelector(".select-menu"),
    selectBtn = optionMenu.querySelector(".select-btn"),
    options = optionMenu.querySelectorAll(".option"),
    sBtn_text = optionMenu.querySelector(".sBtn-text");

  selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

  options.forEach(option => {
    option.addEventListener("click", () => {
      let selectedOption = option.querySelector(".option-text").innerText;
      sBtn_text.innerText = selectedOption;

      optionMenu.classList.remove("active");
    });
  });
</script>

<script>
  const optionMenu_main = document.querySelector(".select-menu_main"),
    selectBtn_main = optionMenu_main.querySelector(".select-btn_main"),
    options_main = optionMenu_main.querySelectorAll(".option_main"),
    sBtn_text_main = optionMenu_main.querySelector(".sBtn-text_main");

  selectBtn_main.addEventListener("click", () => optionMenu_main.classList.toggle("active"));

  options_main.forEach(option_main => {
    option_main.addEventListener("click", () => {
      let selectedOption_main = option_main.querySelector(".option-text_main").innerText;
      sBtn_text_main.innerText = selectedOption_main;

      optionMenu_main.classList.remove("active");
    });
  });
</script>

 



</body>

</html>