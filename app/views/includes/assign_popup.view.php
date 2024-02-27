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
      <!-- <span><i class="bx bx-x close" style="color: #ff0000"></i></span> -->
      <div>
        <i class='bx bxs-truck bx-fade-right' style='color:#f90000'></i>


        <!-- <i class='bx bx-window-close bx-fade-right' style='color:red'  ></i> -->
      </div>
      <!-- <h4>Assign a deliverer for this order</h4> -->


      <div class="select-menu">
        <div class="select-btn">
          <span class="sBtn-text">Assign a deliverer</span>
          <i class="bx bx-chevron-down"></i>
        </div>

        <?php 
        show($data);
        if (isset($data['driver'])) {
               foreach ($data['driver'] as $driver) {
        ?>

        <ul class="options">
          <li class="option">
            <i class='bx bxs-user-circle' style='color:#ff0e0e'  ></i>
            <span class="option-text"><?= $driver->id ?> - <?= $driver->name ?></span>
          </li>
          <!-- <li class="option">
            <i class='bx bxs-user-circle' style='color:#ff0e0e'  ></i>
            <span class="option-text">DD02 - Pahasara Jayasooriya</span>
          </li>
          <li class="option">
            <i class='bx bxs-user-circle' style='color:#ff0e0e'  ></i>
            <span class="option-text">DD03 - Mithun Weerasinghe</span>
          </li>
          <li class="option">
            <i class='bx bxs-user-circle' style='color:#ff0e0e'  ></i>
            <span class="option-text">DD04 - Dilshan Akalanka</span>
          </li> -->
          
        </ul>

        <?php
               }
              }

        ?>
      </div>



</body>

</html>


<button class="button" id="confirmDelete"  onclick="hidePopup('assignDeliver')" >OK</button>
<button class="button" id="confirmDelete"  onclick="hidePopup('assignDeliver')" >Cancel</button>

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
    font-size: 7rem;
    display: flexbox;
    justify-content: center;
    align-items: center;
  }

  .bxs-truck {
    margin-left: 27px;
    font-size: 7rem;
    display: flexbox;
    justify-content: center;
    align-items: center;

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
    margin-top: 10px;
    text-align: center;
    align-items: center;


  }

  #confirmOK {
    margin-right: 10px;
    background-color: #000000;
  }

  #cancelOK {
    background-color: #f44336;
  }

  #confirmOK:hover {
    background-color: rgb(16, 187, 0);
  }

  #cancelOK:hover {
    background-color: rgb(255, 0, 0);
  }

  .select-menu {
    width: 380px;
    margin: 20px auto;
  }

  .select-menu .select-btn {
    display: flex;
    height: 55px;
    background: #fff;
    padding: 20px;
    font-size: 18px;
    font-weight: 400;
    border-radius: 8px;
    align-items: center;
    cursor: pointer;
    justify-content: space-between;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  }

  .select-btn i {
    font-size: 25px;
    transition: 0.3s;
  }

  .select-menu.active .select-btn i {
    transform: rotate(-180deg);
  }

  .select-menu .options {
    position: relative;
    padding: 20px;
    margin-top: 10px;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
    display: none;
  }

  .select-menu.active .options {
    display: block;
  }

  .options .option {
    display: flex;
    height: 55px;
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
    font-size: 16px;
    color: #888;
    font-weight: 600;
  }

  .sBtn-text{
    font-size: 16px;
    font-weight: bold;
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
</body>

</html>