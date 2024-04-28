<?php
$role = "Admin";
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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/add_employee.css">
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
    <title><?= APPNAME ?></title>
</head>

<body>
<div class="home-section">

   <?php
    $this->view('includes/emp_topbar', $data);
    ?>
    <!-- <div class="login_container"> -->
    <!-- <img src="https://i.pinimg.com/564x/4c/80/3b/4c803b6dcc4b96172ee2667ac3f80eff.jpg"> -->


    <div class="form-container">
        <section>
            <!-- <i class="fas fa-birthday-cake" style="font-size:30px;margin-left:280px;"></i> -->
            <form method="post">
                <h1>Add Employee</h1>
                <div class="line-inputs">

                    <div class="inputbox">

                        <i class="fas fa-user"></i>
                        <input value="<?= set_value('username') ?>" type="text" name="username" id="username" placeholder="Username" required>
                        <!-- <label for="">Username </label> -->

                        <?php if (!empty($errors['username'])) : ?>
                            <div class="invalid"><?= $errors['username'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="inputbox">
                        <i class="fas fa-envelope"></i>
                        <input value="<?= set_value('email') ?>" type="email" name="email" id="name" placeholder="Email" required>

                        <?php if (!empty($errors['email'])) : ?>
                            <div class="invalid"><?= $errors['email'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="line-inputs">

                    <div class="inputbox">
                        <i class="fas fa-lock"></i>
                        <input value="<?= set_value('password') ?>" type="password" name="password" id="password" placeholder="Create Password" required>
                        <!-- <label for="">Create Password</label> -->

                        <?php if (!empty($errors['password'])) : ?>
                            <div class="invalid"><?= $errors['password'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="inputbox">
                        <i class="fas fa-lock"></i>
                        <input value="<?= set_value('repassword') ?>" type="password" name="repassword" id="repassword" placeholder="Confirm Password" required>
                        <!-- <label for="">Confirm Password</label> -->

                        <?php if (!empty($errors['password'])) : ?>
                            <div class="invalid"><?= $errors['password'] ?></div>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="line-inputs">

                    <div class="inputbox">
                        <i class="fas fa-phone"></i>

                        <input value="<?= set_value('teleno') ?>" type="phoneno." name="teleno" id="teleno" placeholder="Contact Number" required>
                        <!-- <label for="">Contact Number </label> -->

                        <?php if (!empty($errors['teleno'])) : ?>
                            <div class="invalid"><?= $errors['teleno'] ?></div>
                        <?php endif; ?>
                    </div>


                    <div class="inputbox">
                        <i class="far fa-calendar-alt"></i>

                        <!-- <label for="address">Joined Date</label> -->

                        <input type="date" name="joined_date" id="joined_date" value="<?= set_value('joined_date') ?> " placeholder="Joined Date" required style="color: #717171;">
                        <?php if (!empty($errors['joined_date'])) : ?>
                            <div class="invalid"><?= $errors['joined_date'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="line-inputs">
                    <div class="inputbox">
                        <i class="fas fa-code-branch"></i>

                        <!-- <label for="branch">Branch</label> -->

                        <select name="branch" id="branch" placeholder="Branch">
                            <?php foreach ($branches as $branch) : ?>
                                <option class="branch_select"><?= $branch->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="inputbox">
                        <i class="fas fa-tasks"></i>
                        <!-- <label for="role">Role</label> -->
                        <select name="role" id="role" placeholder="Role">
                            <!-- <option value="admin">Admin</option> -->
                            <option value="manager">Manager</option>
                            <option value="employee">Employee</option>
                            <option value="deliverer">Deliverer</option>
                        </select>
                    </div>
                </div>



                <button>REGISTER</button>
            </form>
        </section>
    </div>
</div>
<script>
        document.addEventListener("DOMContentLoaded", function() {


            var navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 0) {
                    navbar.style.backgroundColor = "white";
                } else {
                    navbar.style.backgroundColor = "transparent";
                }
            });
        });
    </script>

</body>


</html>