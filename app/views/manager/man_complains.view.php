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
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_products.css">
</head>

<body>
    <div class="home-section">
        <div class="search-container">
            <div class="branch_head">
                <p class="branch_head_1">COM<span>PLAITNS</span></p>
            </div>

            <form>
                <div class="form">
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
                            <td><button type="submit" class="view-order-btn response-btn">Response</button></td>
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
                        const {
                            value: email
                        } = await Swal.fire({
                            title: "Input email address",
                            input: "email",
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
</body>

</html>