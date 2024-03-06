<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Response to Complains</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager/response_complaint.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>


<body>
    <div class="home-section">
        <div class="response_container">
            <div class="res_head">

                <p class="res_head_1">RESPOND TO<span> COMPLAINTS</span></p>
            </div>




            <div class="res_card">
                <form action="response_complaint.php" method="POST">

                    <div class="res_inline">
                        <label class="res_name" for="res_comemail">E-mail of Complained Customer</label>
                        <input class="res_input" type="email" id="res_comemail" name="res_comemail">
                    </div>

                    <div class="res_inline">
                        <label class="res_name" for="res_complaint">Response to the Complaint</label>
                        <textarea class="res_input" id="res_complaint" name="pro_complaint"></textarea>
                    </div>

                    <div class="res_button">
                        <p>&emsp;</p>
                        <form action="response_complaint.php">
                            <div class="actions">
                                <button type="submit" class="res_back_btn">Back</button>
                                <button type="submit" class="res_send_btn">Send</button>

                            </div>

                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>