<?php
	require('functions.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	  	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="../bootstrap-4.4.1/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php include('adnavbar.php') ?>
<?php include('secondnav.php') ?>

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Book Name:</label>
					<input type="text" name="book_name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Book Author:</label>
					<select class="form-control" name="book_author"  required="">
						<option>Select Author </option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select author_name from authors";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['author_name'];?></option>
								<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Faculty Name:</label>
					<select class="form-control" name="book_cat"  required="">
						<option>Select Faculty </option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select cat_name from category";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['cat_name'];?></option>
								<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Book No:</label>
					<input type="number" name="book_no" class="form-control" required="">
				</div>

				<div class="form-group">
					<label>Book Price:</label>
					<input type="number" name="book_price" class="form-control" required="">
				</div>
				<button class="btn btn-primary" name="add_book">Add Book</button>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['add_book'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into books values(null,'$_POST[book_name]','$_POST[book_author]','$_POST[book_cat]',$_POST[book_no],$_POST[book_price])";
		$query_run = mysqli_query($connection,$query);
		echo "<script type='text/javascript'>
	alert('book added successfully');
	window.location.href = 'manage_book.php';
</script>";
	}
?>