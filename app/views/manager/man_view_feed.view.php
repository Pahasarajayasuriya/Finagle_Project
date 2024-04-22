<?php
        $role = "Manager";
        $data['role'] = $role;
        //require_once '../../Components/NavBar/header.php';
        //require_once '../../Components/NavBar/NavBar.php';
        //require_once '../../Components/NavBar/footer.php';

        $this->view('includes/header', $data);
        $this->view('includes/NavBar', $data);
        $this->view('includes/footer', $data);
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedbacks</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_feedbacks.css">
</head>

<body>
    <div class="home-section">

        <div class="feedback_head">
            <p class="feedback_head_1">CUSTOMER<span> FEEDBACKS</span></p>
        </div>


        <section class="feedback-container">

        <?php

        //   show($data);
          if (isset($rows)) {
               foreach ($rows as $rows) {
       
          ?>

            <div class="review-box">
                <div class="user-review">
                <img src='<?= esc($rows->image) ?>' alt="">
                    <h3><?= $rows->userName ?></h3>
                </div>
                <p><?= $rows->review ?></p>
            </div>
            <?php
                }
            }
            ?>
        </section>
    </div>
</body>

</html>