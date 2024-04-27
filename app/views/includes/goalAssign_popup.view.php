<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Goals Assign</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div id="assignGoals" class="modal">

        <div class="modal-content">

            <!-- <div>
                <i class='bx bx-window-close bx-fade-right' style='color:red'></i>


            </div> -->

          <form method="POST" action="<?= ROOT ?>/Manager_employee">

            <h2>Assign Goals to Employees</h2>


            <div class="check_inline">
                <label class="check_order" for="check_order" name='orders' id="orders">Target Orders</label>
                <input class="check_input" name='orders' value="" type="text" id="orders" name="orders">
            </div>

            <div class="check_inline">
                <label class="check_order" for="check_customer" name='customers'>Target Customers</label>
                <input class="check_input" name='customers' value="" type="text" id="customers" name="customers">
            </div>

            <div class="check_inline">
                <label class="check_order" for="check_revenue" name='revenues'>Target Revenue</label>
                <input class="check_input" name='revenues' value="" type="text" id="revenue" name="revenues">
            </div>

            <div class="check_inline" id="others">
                <label class="check_order" id="other_note" name='others'>Other:</label><br><br>
                <textarea class="check_input" id="others" name="others" value=""></textarea>
            </div>




            <div class="button-line">
                <button class="button" id="confirmDelete" type="submit">OK</button>
                <button class="button" id="cancelDelete" onclick="hidePopup('assignGoals')">Cancel</button>

            </div>


          </form>
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
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: 5%;
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
            margin-top: 20px;
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


        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }



        
        input[type="text"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        
        /* Additional styles for textarea */
        #other {
            height: 100px;
            /* Adjust height as needed */
        }

        /* Optional: Styles for the check_inline container */
        .check_inline {
            margin-top: 20px;
        }

        .check_input:focus {
          border-color: #000;
         }

         .check_input:hover{
            border-color: #000;
         }
    </style>
</body>

</html>