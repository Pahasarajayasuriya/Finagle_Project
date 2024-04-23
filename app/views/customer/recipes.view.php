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
  <title>Finagle Lanka (Pvt) Ltd</title>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/recipes.css">
</head>

<body>

  <div class="home-section">
    <div class="recipe main">
      <div class="recipe_head">
        <p class="recipe_head_1">FINAGLE <span> RECIPES</span></p>
      </div>

      <div class="rec_container">
        <div class="rec_section">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/ildn7zq_Y8Q?si=0eQN2bjNdvFF2Mz7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p><i>Finagle Breakfast Burger Recipe</i></p>
          </div>

          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/lGwZxkxcqRE?si=jbnaKigDd3TFgXH8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p><i>Deliciously Convenient Chapathi <br> Roll Recipe</i></p>
          </div>
        </div>

        <div class="rec_section">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/xla6extYfNw?si=c10m56FFttELX6GJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p><i>Deliciously Convenient Bread Pizza</i></p>
          </div>


          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/-UKqYAROGEI?si=dw67Bhk028SxXqVN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p><i>Deliciously Convenient "Pita Bread<br> Nachos" Recipe To Try Out</i></p>
          </div>
        </div>

        <div class="rec_section">

          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/VxK_V_Ke0vU?si=CVY7jgWABrwE8LKt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p><i>Introducing To You A Quick And <br>Delicious "Pita Bread Pizza" Recipe</i></p>
          </div>

        </div>
      </div>
    </div>
    <?php $this->view('includes/cus_footer', $data); ?>
  </div>
</body>

</html>

<?php
// require_once '../../Components/NavBar/Footer/cus_footer.php';
$this->view('includes/cus_topbar', $data);
?>