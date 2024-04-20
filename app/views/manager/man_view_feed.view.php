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
                    <img decoding="async" src="../../img/pic-1.png" alt="">
                    <h3><?= $rows->name ?></h3>
                </div>
                <p><?= $rows->feedback ?></p>
            </div>

           <!--  <div class="review-box">
                <div class="user-review">

                        <img decoding="async" src="../../img/pic-2.png" alt="">
                        <h3>Malki Yasodhara</h3>

                    

                </div>
                <p>Love it. Love the bread and bakery items produce by them. Top quality....❤❤</p>
            </div>

            <div class="review-box">
                <div class="user-review">
                 
                  
                        <img decoding="async" src="../../img/pic-3.png" alt="">
                        <h3>Mithun Weerasinghe</h3>
                  
                </div>
                <p>Super and excellent productions. And my favorite product was roller cake</p>
            </div> -->

            <!-- <div class="review-box">
                <div class="user-review">
                   
                   
                        <img decoding="async" src="../../img/pic-4.png" alt="">
                        <h3>Senuri Hettiarachchi</h3>
                 
                </div>
                <p>Great food and quality is ensured by the process and management.
                </p>
            </div>

            <div class="review-box">
                <div class="user-review">
                  
                  
                        <img decoding="async" src="../../img/pic-5.png" alt="">
                        <h3>Dilshan Akalanka</h3>
                    
                </div>
                <p>Good place for employers. They produce healthy bakery food.</p>
            </div>

            <div class="review-box">
                <div class="user-review">
                   
                  
                        <img decoding="async" src="../../img/pic-6.png" alt="">
                        <h3>Mihiri Samarasekara</h3>
                 
                </div>
                <p>Best manufacturer of bakery items in srilanka </p>
            </div> -->


            <?php
                }
            }
            ?>
        </section>
    </div>
</body>

</html>