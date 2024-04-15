<?php
$role = "Employee";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);


// show($data);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Employee Profile</title>
	<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/employee/emp_dashboard.css">
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
	<!-- <div class="navbar">
         <div class="logo_icon">
             <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
         </div>
    </div> -->
	<div class="home-section">
		<section id="content">
			<main>
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>

					<div class="right">
						<p>Hey,
							<?php
							if (isset($data['BranchName'])) {
								foreach ($data['BranchName'] as $branch) {
									// show($val);

							?><?= $branch->name ?> Branch </p>

				<?php

								}
							}
				?>


				<i class='bx bxs-building'></i>
					</div>

				</div>
				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
							<?php
							//show($data['count']);

							if (isset($data['count'])) {
								foreach ($data['count'] as $order_count) {

							?>
									<h3><?= $order_count->total_records ?></h3>


							<?php
								}
							}
							?>
							<p>Orders</p>
						</span>

						<div class="circular">
							<div class="inner"></div>
							<div class="outer"></div>
							<div class="numb1">

							</div>
							<div class="circle">
								<div class="bar left">
									<div class="progress"></div>
								</div>
								<div class="bar right">
									<div class="progress"></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<i class='bx bxs-group'></i>
						<span class="text">
							<?php
							//show($data['count']);

							if (isset($data['getCusData'])) {
								foreach ($data['getCusData'] as $cus_count) {

							?>
									<h3><?= $cus_count->total_customers ?></h3>


							<?php
								}
							}
							?>
							<!-- <p>Customers</p> -->
							<p>Buyers</p>
						</span>

						<div class="circular">
							<div class="inner"></div>
							<div class="outer"></div>
							<div class="numb2">

							</div>
							<div class="circle">
								<div class="bar left">
									<div class="progress"></div>
								</div>
								<div class="bar right">
									<div class="progress"></div>
								</div>
							</div>
						</div>
					</li>



					<li>
						<i class='bx bxs-dollar-circle'></i>
						<span class="text">

							<?php
							//show($data['count']);
							if (isset($data['getTotalcost'])) {
								foreach ($data['getTotalcost'] as $total_cost) {
							?>
									<h3><?= $total_cost->total_sum ?></h3>
							<?php
								}
							}
							?>
							<p>Revenue</p>
						</span>

						<div class="circular">
							<div class="inner"></div>
							<div class="outer"></div>
							<div class="numb3">

							</div>
							<div class="circle">
								<div class="bar left">
									<div class="progress"></div>
								</div>
								<div class="bar right">
									<div class="progress"></div>
								</div>
							</div>
						</div>
					</li>
				</ul>

				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Recent Orders</h3>
							<!-- <i class='bx bx-search'></i>
							<i class='bx bx-filter'></i> -->
						</div>
						<table>
							<thead>
								<tr>
									<th>User</th>
									<th>Order ID</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php

								//   show($data);
								if (isset($data['getData'])) {
									foreach ($data['getData'] as $order) {

								?>
										<tr>
											<td>
												<!-- <img src="<?= ROOT ?>/assets/images/customers/<?= $order->image ?>"> -->
												<p><?= $order->name ?></p>
											</td>
											<td> <?= $order->id ?></td>
											<td><span class="status<?= $order->order_status ?>"><?= $order->order_status ?></span></td>
										</tr>

								<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="todo">
						<div class="head">
							<h3>Sales Analytics</h3>

						</div>
						<ul class="todo-list">
							<li class="completed">
								<div class="numeric">
									<i class='bx bxs-cart bx-tada'></i>

									<p class="type">Online Orders</p>

								</div>
								<?php
								//show($data['getOnlineorders']);

								if (isset($data['getOnlineorders'])) {
									foreach ($data['getOnlineorders'] as $online_orders) {

								?>
										<p class="count"><?= $online_orders->online_delivery_count ?></p>


								<?php
									}
								}
								?>


							</li>


							<li class="completed">
								<div class="numeric">
									<i class='bx bxs-package bx-tada'></i>
									<p class="type">PickUp Orders</p>
								</div>

								<?php
								//show($data['getPickuporders ']);

								if (isset($data['getPickuporders '])) {
									foreach ($data['getPickuporders '] as $pickup_orders) {

								?>
										<p class="count"><?= $pickup_orders->pickup_count ?></p>


								<?php
									}
								}
								?>


							</li>
							<li class="completed">
								<div class="numeric">
									<i class='bx bxs-user bx-tada'></i>
									<p class="type">New Branches</p>
								</div>
								<?php
								//show($data['count']);
								if (isset($data['getBranchcount '])) {
									foreach ($data['getBranchcount '] as $branch_count) {
								?>
										<p class="count"><?= $branch_count->total_records ?></p>
								<?php
									}
								}
								?>



							</li>

						</ul>
					</div>
				</div>
			</main>

		</section>

	</div>
	<script>
		const numb1 = document.querySelector(".numb1");
		let counter1 = 0;
		const targetPercentage1 = <?= $order_count->total_records ?>;
		const intervalId1 = setInterval(() => {
			if (counter1 >= targetPercentage1) {
				clearInterval(intervalId1);
			} else {
				counter1 += 1;
				numb1.textContent = (counter1 / 400) * 100 + "%";

			}
		}, 80);




		const numb2 = document.querySelector(".numb2");
		let counter2 = 0;
		const targetPercentage2 = <?= $cus_count->total_customers ?>;
		const intervalId2 = setInterval(() => {
			if (counter2 >= targetPercentage2) {
				clearInterval(intervalId2);
			} else {
				counter2 += 1;
				numb2.textContent = (counter2 / 200) * 100 + "%";

			}
		}, 80);




		const numb3 = document.querySelector(".numb3");
		let counter3 = 0;
		const targetPercentage3 = <?= $total_cost->total_sum ?>;
		const intervalId3 = setInterval(() => {
			if (counter3 == targetPercentage3) {
				clearInterval(intervalId3);
			} else {
				counter3 += 1;
				numb3.textContent = (counter1 / 1000) * 100 + "%";

			}
		}, 80);


</script>




</body>

</html>