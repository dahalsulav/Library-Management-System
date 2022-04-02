<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Library Management System</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="bootstrap-4.4.1/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="#page-top">Library Management System</a>
			<button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#student-login">Student Login</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#student-register">Register Student</a></li>
					<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#admin-login">Admin Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Masthead-->
	<header class="masthead bg-primary text-white text-center">
		<div class="container d-flex align-items-center flex-column">
			<!-- Masthead Avatar Image-->
			<img class="masthead-avatar mb-5" src="assets/images/banner.png" alt="homepage-banner" />
			<!-- Masthead Heading-->
			<h1 class="masthead-heading text-uppercase mb-0">Start Reading</h1>
			<!-- Icon Divider-->
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fas fa-book"></i></div>
				<div class="divider-custom-line"></div>
			</div>
			<!-- Masthead Subheading-->
			<p class="masthead-subheading font-weight-light mb-0">Nothing is pleasanter than exploring a library</p>
		</div>
	</header>
	<!-- student-login Section-->
	<section class="page-section student-login" id="student-login">
		<div class="d-flex justify-content-center">
			<div class="col-md-4 text-center" id="main_content">

				<h3>Student Login Form</h3>

				<form action="" method="post">
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Email ID:</label>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="mb-1" for="name">Password:</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<br>
					<button type="submit" name="login" class="btn btn-primary" id="student-login">Login</button>
				</form>

				<?php

				if (isset($_POST['login'])) {
					$connection = mysqli_connect("localhost", "root", "");
					$db = mysqli_select_db($connection, "lms");
					$query = "select * from users where email = '$_POST[email]'";
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						if ($row['email'] == $_POST['email']) {
							if ($row['password'] == $_POST['password']) {
								$_SESSION['name'] = $row['name'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['id'] = $row['id'];
								// $_SESSION['status'] = 'Active';
								echo "<script>window.location.href='user_dashboard.php'</script>";
							} else {
								echo "<br><br><span class='alert-danger' id='student-login'>Wrong Password</span>";
							}
						} else {
							echo "
								<br><br>
								<span class='alert-danger' id='student-login'>Wrong Email Id</span>";
						}
					}
				}
				?>
			</div>
		</div>
	</section>
	<!-- student registration Section-->
	<section class="page-section bg-primary text-white mb-0" id="student-register">
		<div class="d-flex justify-content-center">

			<div class="col-md-4 text-center" id="main_content">
				<h3 class="mb-4">Student Registration Form</h3>

				<form action="register.php" method="post">
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Full Name:</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Email ID:</label>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Password:</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Mobile Number:</label>
						<input type="text" name="mobile" class="form-control" required>
					</div>
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Address:</label>
						<textarea rows="3" cols="40" class="form-control" name="address"></textarea>
					</div>
					<button type="submit" class="btn btn-light">Register</button>
				</form>

			</div>
		</div>
	</section>
	<!-- admin login Section-->
	<section class="page-section" id="admin-login">
		<div class="d-flex justify-content-center">
			<div class="col-md-4 text-center" id="main_content">

				<h3>Admin Login Form</h3>
				<form action="" method="post">
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Email ID:</label>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="form-group mb-2">
						<label class="mb-1" for="name">Password:</label>
						<input type="password" name="password" class="form-control" required>
					</div>

					<button type="submit" name="login" class="btn btn-primary mt-2">Login</button>
				</form>

				<?php

				if (isset($_POST['login'])) {
					$connection = mysqli_connect("localhost", "root", "");
					$db = mysqli_select_db($connection, "lms");
					$query = "select * from admins where email = '$_POST[email]'";
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						if ($row['email'] == $_POST['email']) {
							if ($row['password'] == $_POST['password']) {
								$_SESSION['name'] = $row['name'];
								$_SESSION['email'] = $row['email'];

								echo "<script>window.location.href='admin/admin_dashboard.php';</script>";
							} else {
				?>
								<br><br>
								<center><span class="alert-danger">Wrong Password</span></center>
				<?php
							}
						}
					}
				}
				?>
			</div>
	</section>
	<!-- Footer-->
<?php include('footer.php') ?>