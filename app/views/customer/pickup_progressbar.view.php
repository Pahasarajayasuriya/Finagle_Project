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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Bar</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/progressbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php $this->view('includes/cus_topbar', $data); ?>
    <div class="home-section">
        <div class="progress_main">
            <div class="container">
                <div class="text-container">
                    <h1>Order ID: <?= $data['orderId'] ?></h1>
                    <p>If you have any issue, then call our hotline: <a href="tel:+940112236976">+94 (0) 11 223 6976</a></p>
                </div>
            </div>
            <div class="bar_container">
                <div class="progress_head">
                    <p class="progress_head_1">Order <span> Status</span></p>
                </div>

                <ul class="ul">
                    <li>
                        <i class="icon uil uil-capture"></i>
                        <div class="progress one">
                        </div>
                        <p class="progress_text">Order Placed</p>
                    </li>
                    <li>
                        <i class="icon uil uil-exchange"></i>
                        <div class="progress two">
                        </div>
                        <p class="progress_text">Order Preparing</p>
                    </li>
                    <li>
                        <i class="icon uil uil-map-marker"></i>
                        <div class="progress three">
                        </div>
                        <p class="progress_text">Order Picked</p>
                    </li>
                </ul>

            </div>
            <div class="button-container">
                <form action="">
                    <br><br><br>
                    <button type="submit" class="process_btn" id="complaintButton">Review</button>
                </form>
            </div>
        </div>
        <?php $this->view('includes/cus_footer', $data); ?>
        <script>
            var orderStatus = "<?= $data['orderStatus'] ?>";
            var orderId = "<?= $data['orderId'] ?>";
            var userName = <?= json_encode(Auth::is_customer() ? Auth::getName() : '') ?>;
            console.log(orderId);
            console.log(orderStatus);
        </script>

        <script src="<?= ROOT ?>/assets/js/pickup_progressbar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </div>
    <script>
        document.getElementById('complaintButton').addEventListener('click', async function(event) {
            event.preventDefault(); // Prevent the form from being submitted

            const {
                value: userInput
            } = await Swal.fire({
                title: 'User Name',
                input: 'text',
                inputValue: userName, // Pre-fill the input with the username
                showCancelButton: true,
                confirmButtonColor: '#FF0000',
                cancelButtonColor: 'black',
            });

            if (userInput) {
                const {
                    value: review
                } = await Swal.fire({
                    title: 'Review',
                    input: 'textarea',
                    inputPlaceholder: 'Share details of your own experience of our service.',
                    inputAttributes: {
                        'aria-label': 'Type your message here'
                    },
                    showCancelButton: true,
                    confirmButtonColor: '#FF0000',
                    cancelButtonColor: 'black',
                });

                if (review) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Your review will be posted publicly on the web',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#FF0000',
                        cancelButtonColor: 'black',
                        confirmButtonText: 'Yes, Confirm!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('<?= ROOT ?>/Progressbar/saveReview', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        userName: userName,
                                        review: review
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: 'Saved!',
                                            text: 'Your review has been saved.',
                                            icon: 'success'
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'There was an error saving your review. Please try again.',
                                            icon: 'error'
                                        });
                                    }
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                                });
                        }
                    });
                }
            }
        });
    </script>
</body>

</html>