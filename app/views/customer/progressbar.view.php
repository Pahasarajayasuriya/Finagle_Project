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
    <div class="home-section">
        <div class="progress_main">
            <div class="container">
                <div class="text-container">
                    <h1>Order ID: <?= $data['orderId'] ?></h1>
                    <h2>If you have any issue, then call our hotline: <a href="tel:+940112236976">+94 (0) 11 223 6976</a></h2>
                </div>
            </div>
            <div class="bar_container">
                <div class="progress_head">
                    <p class="progress_head_1">Order <span> Status</span></p>
                </div>

                <ul>
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
                        <i class="icon uil uil-clipboard-notes"></i>
                        <div class="progress three">
                        </div>
                        <p class="progress_text">Order Dispatch</p>
                    </li>
                    <li>
                        <i class="icon uil uil-map-marker"></i>
                        <div class="progress four">
                        </div>
                        <p class="progress_text">Order Delivered</p>
                    </li>
                </ul>

            </div>
            <div class="button-container">
                <form action="<?= ROOT ?>/products">
                    <br><br><br>
                    <button type="submit" class="process_btn" id="homeButton">Place a new Order</button>
                </form>
                <form action="">
                    <br><br><br>
                    <button type="submit" class="process_btn" id="complaintButton">Rate and Review</button>
                </form>
            </div>
        </div>
        <script>
            var orderStatus = "<?= $data['orderStatus'] ?>";
            console.log(orderStatus);
        </script>

        <script src="<?= ROOT ?>/assets/js/progressbar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </div>
    <script>
    document.getElementById('complaintButton').addEventListener('click', async function(event) {
        event.preventDefault(); // Prevent the form from being submitted

        const {
            value: userName
        } = await Swal.fire({
            title: 'User Name',
            input: 'text',
            inputPlaceholder: 'Enter your user name',
            showCancelButton: true
        });

        if (userName) {
            const {
                value: review
            } = await Swal.fire({
                title: 'Review',
                input: 'textarea',
                inputPlaceholder: 'Share details of your own experience of our service.',
                inputAttributes: {
                    'aria-label': 'Type your message here'
                },
                showCancelButton: true
            });

            if (review) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Your review will be posted publicly on the web',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('<?=ROOT?>/Progressbar/saveReview', {
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