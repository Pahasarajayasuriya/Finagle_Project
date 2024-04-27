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
    <title>View Complaints</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/complaints_view.css">

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
    <?php $this->view('includes/emp_topbar', $data); ?>

    <div class="home-section">
        <div class="search-container">

            <div class="title-profile">
                <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                <p class="section-title">COMPLAINTS<span></span></p>
                <div class="divider dark mb-4">
                    <div class="icon-wrap">
                        <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
                    </div>
                </div>
            </div>

            <form>
                <div class="form-group">
                    <input id="searchInput" class="form-group" type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>

            </form>


            <table class="table" id="productTable">
                <thead>
                    <tr>
                        <th class="ordId">Id</th>
                        <th class="ordId">Customer Name</th>
                        <th class="desc">Complaint</th>
                        <th class="desc">Phone Number</th>
                        <th class="ordId">Email</th>
                        <th class="ordId">Response</th>
                    </tr>
                </thead>
                <tbody id="complaintsTableBody">
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td class="ordId"><?= esc($row->id) ?></td>
                            <td class="products"><?= esc($row->name) ?> </td>
                            <td class="category"><?= esc($row->complaint) ?></td>
                            <td class="desc"><?= esc($row->teleno) ?></td>
                            <td class="desc"><?= esc($row->email) ?></td>
                            <td><button type="submit" class="view-order-btn response-btn" data-email="<?= esc($row->email) ?>">Response</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div id="noResultsMessage" style="display: none;">Complaint Not found</div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="<?= ROOT ?>/assets/js/manager/view_complains.js"></script>

            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
                document.querySelectorAll('.response-btn').forEach(function(button) {
                    button.addEventListener('click', async function(event) {
                        event.preventDefault();
                        const userEmail = this.getAttribute('data-email');
                        const {
                            value: email
                        } = await Swal.fire({
                            title: "Input email address",
                            input: "email",
                            inputValue: userEmail, 
                            inputLabel: "Your email address",
                            inputPlaceholder: "Enter your email address"
                        });

                        if (email) {
                            const {
                                value: response
                            } = await Swal.fire({
                                title: "Write your response",
                                input: "textarea",
                                inputLabel: "Your response",
                                inputPlaceholder: "Enter your response here"
                            });

                            if (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Email send successfully"
                                });
                                fetch('<?= ROOT ?>/man_complains/sendEmail', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify({
                                            email: email,
                                            response: response
                                        }),
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire('Email sent successfully');
                                        } else {
                                            Swal.fire('Failed to send email');
                                        }
                                    })
                                    .catch((error) => {
                                        console.error('Error:', error);
                                    });
                            }
                        }
                    });
                });


                document.getElementById('searchInput').addEventListener('keyup', function() {
                    let searchValue = this.value.toLowerCase();
                    let tableRows = document.querySelectorAll('#complaintsTableBody tr');
                    tableRows.forEach(function(row) {
                        let rowText = row.textContent.toLowerCase();
                        if (rowText.includes(searchValue)) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    });
                    let visibleRows = Array.from(tableRows).filter(row => row.style.display !== "none");
                    document.getElementById('noResultsMessage').style.display = visibleRows.length ? "none" : "block";
                });
            </script>
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