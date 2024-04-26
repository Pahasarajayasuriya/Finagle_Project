<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Goals Assign</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div id="assignGoals" class="modal_new">
        <div class="model_new_content">

            <div>
                <i class='bx bx-window-close bx-fade-right' style='color:red' onclick="hidePopup('assignGoals')"></i>
            </div>

            <h5 class="text">Assign Goals to Employees</h5>

            <form method="POST">
                        <div class="inputbox">
                            <i class='bx bxs-calendar-check'></i>
                            <input value=""  name="password" id="password" placeholder="Target Orders must be">
                        </div>

                        <div class="inputbox">
                            <i class='bx bxs-dollar-circle'></i>
                            <input value=""  name="password" id="password" placeholder="Target Revenue must be">
                        </div>

                        <div class="inputbox">
                            <i class='bx bxs-group'></i>
                            <textarea value=""  name="password" id="password" placeholder="Other goals">
                        </div>
            </form>

            <div class="button-line">
                <button class="button" id="confirmDelete" onclick="cancelOrder()">OK</button>
                <button class="button" id="cancelDelete" onclick="hidePopup('assignGoals')">Cancel</button>
            
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

        .model_new{
            width:200px;
            height: 500px;
            margin-top: 5px;
            background-color: #888;

        }

        .model_new_content{
            border-radius: 10px;
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;

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

        .icon-warn,
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
    </style>
</body>

</html>
