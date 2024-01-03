<?php
$role = "User";
// require_once '../includes/header.view.php';
// require_once '../views/includes/NavBar.view.php';
// require_once '../views/includes/footer.view.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <title> Products <?= APPNAME ?> </title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cus_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">


     <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
     <!--Fonts-->

    
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


   </head>
<body>
<?php
// require_once '../../Components/NavBar/Footer/cus_footer.php';
$this->view('includes/cus_topbar', $data);
?>

</body>
</html>
