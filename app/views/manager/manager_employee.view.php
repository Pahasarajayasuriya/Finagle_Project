<?php
$role = "Manager";
$data['role'] = $role;

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Employees</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_employee.css">
    
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <div class="home-section">
    
        <div class="title-profile">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <p class="section-title">EMPLOYEE<span> DETAILS</span></p>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
                 </div>
            </div>
        </div>

    <br>
        <div class="employee-table">


            <div class="table-header">
                <div class="header-item employee-image">
                    <!-- <img src="https://cdn-icons-png.flaticon.com/128/64/64572.png" alt="Employee image" class="employee-icon"> -->
                   
                </div>
                <div class="header-item">Employee ID</div>
                <div class="header-item">User Name</div>
                <div class="header-item">Email</div>
                <div class="header-item">Branch</div>
                <div class="header-item">Goal</div>
                
            </div>
            <?php
            if (isset($employee)) {
                foreach ($employee as $employee) {

            ?>
                    <div class="employee-record">
                    <div class="employee-image"><img src="<?= ROOT ?>/assets/images/Emp_profiles/<?= $employee->image ?>" alt="Employee 1"></div>
                        <div class="employee-id"><?= $employee->id ?></div>
                        <div class="employee-name"><?= $employee->username ?></div>
                        <div class="employee-email"><?= $employee->email ?></div>
                        <div class="employee-branch"><?= $employee->branch ?></div>
                        <div class="goal-container">
                            <button class="goal-button" onclick="showPopup()">Assign Goal</button>
                        </div>
                        
                    </div>
            <?php
                }
            }
            ?>

        </div>

    </div>
    </div>

    <div id="popup" class="popup">
    <span class="close" onclick="hidePopup()">&times;</span>
        
    <textarea id="goalInput" rows="4" placeholder="Enter your goal..."></textarea>
        <button class="assign-button" onclick="assignGoal()">Assign</button>
    </div>

    <script src="<?= ROOT ?>/assets/js/manager/view_employee.js"></script>

</body>

</html>