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
            <i class='bx bx-cart-download' style='color:#e81212 ; font-size: 64px;'></i>

            <p>You haven't placed any orders yet.</p>


            <button class="ok-button" onclick="window.location.href='products'">Place a new Order</button>
        </div>
        <div class="center-box-placeholder"></div>
        <?php $this->view('includes/cus_footer', $data); ?>
    </div>



    <style>
        @keyframes shake {
            0% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            10% {
                transform: translate(-1px, -2px) rotate(-1deg);
            }

            20% {
                transform: translate(-3px, 0px) rotate(1deg);
            }

            30% {
                transform: translate(3px, 2px) rotate(0deg);
            }

            40% {
                transform: translate(1px, -1px) rotate(1deg);
            }

            50% {
                transform: translate(-1px, 2px) rotate(-1deg);
            }

            60% {
                transform: translate(-3px, 1px) rotate(0deg);
            }

            70% {
                transform: translate(3px, 1px) rotate(-1deg);
            }

            80% {
                transform: translate(-1px, -1px) rotate(1deg);
            }

            90% {
                transform: translate(1px, 2px) rotate(0deg);
            }

            100% {
                transform: translate(1px, -2px) rotate(-1deg);
            }
        }

        /* Apply the shake animation to the cart symbol */
        .bx-cart-download {
            animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both infinite;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            perspective: 1000px;
        }

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
            width: 500px;
        }


        .ok-button {
            box-shadow: 0 0 10px rgba(0, 187, 0, 0.3);
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
            margin-top: 10px;
            text-align: center;
            align-items: center;
        }

        .ok-button:hover {
            background-color: rgb(16, 187, 0)
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