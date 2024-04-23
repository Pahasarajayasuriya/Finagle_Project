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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/process.css">
    <title>Process</title>

    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <!--Fonts-->

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
<?php $this->view('includes/cus_topbar', $data); ?>
    

    <div class="home-section">

        <!-- <div class="service-item rounded pt-3"> -->
        <div class="process-category">

            <div class="p-section">
                <div class="process-main-title">
                  <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                  <h5 class="process-title">Process</h5>
                </div>
              
                <p class="process-content">The entire process, from sourcing to the final delivery of goods to customers, is scrupulously managed to ensure adherence to the strict quality standards required. Price is no doubt an important criterion, but the Eemphasis is on consistent quality where procurement of raw and packing material is concerned. While incoming goods are subject to thorough quality inspections, all suppliers of raw and packing material are periodically audited for compliance to quality guidelines. Wherever and whenever necessary, we provide advice to assist suppliers to improve their processes. Our Quality Assurance team does an excellent job in this respect. We also ensure that all imported ingredients are sourced from reputed and quality certified organisations.</p>
            </div>
        </div>

        <div class="separate-process-category">

            <h3>HYGIENE AND QUALITY</h3>

            <div class="category-process">
                <div class="process-category-content">
                    <img src="<?= ROOT ?>/assets/images/01.jpg" alt="" class="process-category-image">
                    <p class="process-category-title">In the Food Industry, Hygiene and Quality go hand in hand.You can’t have one without the other.</p>
                </div>
            </div>

            <br> <br>
            <h3>PRODUCTION LINES</h3>

            <div class="category-process">
                <div class="process-category-content">
                    <img src="<?= ROOT ?>/assets/images/02.jpg" alt="" class="process-category-image">
                    <p class="process-category-title">We have four main lines of production; Bread, Buns, Pastry and Cakes. Apart from this, our Frozen Foods section accounts for all par-baked, baked, or ready-to-bake products that are supplied to our business clientele. These include Buns, Pastries, and varipous types of Roti. etc.</p> 
                    

                </div>
            </div>

            <br> <br>
            <h3>COMMISSARY</h3>

            <div class="category-process">
                <div class="process-category-content">
                    <img src="<?= ROOT ?>/assets/images/02_our-story.jpg" alt="" class="process-category-image">
                    <p class="process-category-title"> The commissary is fully mechanised. Modern equipment is used for mixing, proofing to baking and blast freezing. The entire process takes place under strict hygienic controls, untouched by human hand. All equipment, especially those used for measuring, are subject to regular maintenance, monitoring and calibration. Quality Assurance checks are performed on all product batches. An important aspect of commissary hygiene is our programme of pest control, which aspect is also subject to quality checks.</p>
                    

                </div>
            </div>

            <br> <br>
            <h3>PACKING AND STORAGE</h3>

            <div class="category-process">
                <div class="process-category-content">
                    <img src="<?= ROOT ?>/assets/images/04.jpg" alt="" class="process-category-image">
                    <p class="process-category-title">All incoming materials are stored under hygienic conditions. The same holds true for finished goods till the time they are despatched to customers. Our temperature controlled walk-in freezers ensure safe storage of all frozen products. We also make use of a quality certified third party warehouse for storage of frozen goods whenever necessary.</p>
                </div>
            </div>

            <br> <br>
            <h3>DELIVERY</h3>
            <div class="category-process">
                <div class="process-category-content">
                    <img src="<?= ROOT ?>/assets/images/05.jpg" alt="" class="process-category-image">
                    <p class="process-category-title">Frozen products are delivered to our business customers under controlled temperature through our freezer trucks. These trucks are well-maintained and cleaned and fumigated regularly as part of the quality requirements. Fresh products like breads, buns and pastries are supplied mainly to supermarkets (chains or individually owned) and other retail customers. Such deliveries are handled by our accredited agents. All such products are packed and crated. Returned crates are sent through an automated washer as a matter of routine, thus ensuring cleanliness</p>
                </div>
            </div>
        </div>
        <?php $this->view('includes/cus_footer', $data); ?>
     </div>


    <script src="<?= ROOT ?>/assets/js/process.js"></script>
</body>

</html>