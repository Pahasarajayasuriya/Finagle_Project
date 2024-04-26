<?php
$role = "User";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Order cancellation</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">


</head>

<body>
    <?php $this->view('includes/cus_topbar', $data); ?>
    <div class="home-section">
        <div class="center-box">

            <i class='bx bxs-trash bx-burst' style='color:#e81212 ; font-size: 64px;'></i>

            <!-- Id and Reason  can retrieve from cancel_orders table -->
            <p class='topic'>Your Order ( No - <?= $data['orderId'] ?> ) has been cancelled </p>

            <p class='reason'><?= $data['reason'] ?></p>


            <button class="ok-button" onclick="window.location.href='products'">Place a new Order</button>
        </div>
        <div class="center-box-placeholder"></div>
        <?php $this->view('includes/cus_footer', $data); ?>
    </div>



    <style>
        .body {
            font-family: "Poppins";
        }

        .center-box {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-family: "Poppins";
            width: 600px;
            box-shadow: 2px 2px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }


        .ok-button {

            background-color: green;
            width: 200px;
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
            margin-top: 40px;
            text-align: center;
            align-items: center;
        }

        .ok-button:hover {
            background-color: rgb(16, 187, 0)
        }

        .topic {
            margin-top: 30px;
            font-size: 20px;
            font-family: sans-serif;
            font-weight: 800;
        }

        .reason {
            font-family: sans-serif;
            font-style: italic;
            font-size: 14px;

        }

        .center-box-placeholder {
            height: 500px;
        }
    </style>


    <script>
        function hidePopup() {
            var centerBox = document.querySelector('.center-box');
            if (centerBox) {
                centerBox.style.display = "none";
            }
        }
    </script>

</body>

</html>