<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Order Cancel Confirmation</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


</head>

<body>
   
    
    <div id="cancel" class="modal">
      <div class="modal-content">
        <span><i class="bx bx-x close" style="color: #ff0000"></i></span>
        <div>
             <i class='bx bx-window-close bx-fade-right' style='color:red'  ></i>
            <!-- <i class='bx bxs-error-circle bx-tada icon-warn' style='color:#ffd900' ></i> -->

        </div>
        <h4>Are you sure you want to proceed with the cancellation.This action is irreversible ?</h4>
        <button class="button" id="confirmDelete"  onclick="hidePopup('cancel')" >OK</button>
        <button class="button" id="cancelDelete" onclick="hidePopup('cancel')">Cancel</button>
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
        margin: 15% auto;
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

      .icon-warn{
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

    </style>

</body>

</html>