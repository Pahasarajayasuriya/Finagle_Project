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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager/view_employee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezDI7Ff3qRfBBZ2eHtL8eR7uh1lVC06fD0BiPfVkK40XAxC+bVti1IvDHti/E80R" crossorigin="anonymous">

</head>

<body>
    <div class="home-section">
        <div class="branch_head">
            <p class="branch_head_1">EMPLOYEE<span> DETAILS</span></p>
        </div>

        <div class="employee-table">


            <div class="table-header">
                <div class="header-item employee-image">
                    <!-- <img src="https://cdn-icons-png.flaticon.com/128/64/64572.png" alt="Employee image" class="employee-icon"> -->
                </div>
                <div class="header-item">Employee ID</div>
                <div class="header-item">User Name</div>
                <div class="header-item">Email</div>
                <div class="header-item">Branch</div>
            </div>
            <?php
            if (isset($employee)) {
                foreach ($employee as $employee) {

            ?>
                    <div class="employee-record">
                        <div class="employee-id"><?= $employee->id ?></div>
                        <div class="employee-name"><?= $employee->username ?></div>
                        <div class="employee-name"><?= $employee->email ?></div>
                        <div class="employee-name"><?= $employee->branch ?></div>
                    </div>
            <?php
                }
            }
            ?>

        </div>

    </div>
    </div>
</body>

</html>