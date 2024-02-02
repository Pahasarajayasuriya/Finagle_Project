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
						<p>Hey,Borella Branch </p>
						<i class='bx bxs-building' ></i>
					</div>

				</div>
				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
							<h3>1020</h3>
							<p>New Order</p>
						</span>
						<div class="circular">
							<div class="inner"></div>
							<div class="outer"></div>
							<div class="numb1">
								0%
							</div>
							<div class="circle">
								<div class="dot">
									<span></span>
								</div>
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
							<h3>2834</h3>
							<p>Customers</p>
						</span>
						<div class="circular">
							<div class="inner"></div>
							<div class="outer"></div>
							<div class="numb2">
								0%
							</div>
							<div class="circle">
								<div class="dot">
									<span></span>
								</div>
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
							<h3>$2543</h3>
							<p>Total Sales</p>
						</span>
						<div class="circular">
							<div class="inner"></div>
							<div class="outer"></div>
							<div class="numb3">
								0%
							</div>
							<div class="circle">
								<div class="dot">
									<span></span>
								</div>
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
							<i class='bx bx-search'></i>
							<i class='bx bx-filter'></i>
						</div>
						<table>
							<thead>
								<tr>
									<th>User</th>
									<th>Date Order</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							<?php

                          //   show($data);
                          if (isset($data['order'])) {
	                      foreach ($data['order'] as $order) {

                            ?>
								<tr>
									<td>
										<img src="<?= ROOT?>/assets/images/customers/<?= $order->image ?>">
										<p><?= $order->username ?></p>
									</td>
									<td><?= $order->date_of_order ?></td>
									<td><span class="status<?= $order->status ?>"><?= $order->status ?></span></td>
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
							<i class='bx bx-plus'></i>
							<i class='bx bx-filter'></i>
						</div>
						<ul class="todo-list">
							<li class="completed">
							  <div class="numeric">
							    <i class='bx bxs-cart bx-tada'></i>
							  
								<p class="type">Online Orders</p>

							  </div>
							   
								<!-- <p class="increase" style="color:rgb(147, 240, 94);">+38%</p> -->
								<p class="count">380</p>

							</li>
							<li class="completed">
							 <div class="numeric">
						    	<i class='bx bxs-package bx-tada' ></i>
								<p class="type">PickUp Orders</p>
							 </div>
								<!-- <p class="increase" style="color:red;">-17%</p> -->
								<p class="count">200</p>
								
							</li>
							<li class="completed">
							<div class="numeric">
							    <i class='bx bxs-user bx-tada'></i>
								<p class="type">New Branches</p>
							</div>
								<!-- <p class="increase" style="color:rgb(147, 240, 94);">+18%</p> -->
								<p class="count">150</p>
								
							</li>
							
						</ul>
					</div>
				</div>
			</main>
			<!-- MAIN -->
		</section>
		<!-- CONTENT -->
	</div>
	<script>
            const numb1 = document.querySelector(".numb1");
            let counter1 = 0;
            const intervalId1 = setInterval(()=>{
              if(counter1 == 100){
                clearInterval(intervalId1);
              }else{
                counter1+=1;
                numb1.textContent = counter1 + "%";
              }
            }, 80);

			const numb2 = document.querySelector(".numb2");
            let counter2 = 0;
            const intervalId2 = setInterval(()=>{
              if(counter2 == 70){
                clearInterval(intervalId2);
              }else{
                counter2+=1;
                numb2.textContent = counter2 + "%";
              }
            }, 80);

			const numb3 = document.querySelector(".numb3");
            let counter3 = 0;
            const intervalId3 = setInterval(()=>{
              if(counter3 == 70){
                clearInterval(intervalId3);
              }else{
                counter3+=1;
                numb3.textContent = counter3 + "%";
              }
            }, 80);
         </script>
	<script src="script.js"></script>
</body>

</html>