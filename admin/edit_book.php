<?php
	require('functions.php');
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_no = "";
	$book_name = "";
	$author_name = "";
	$fac_name = "";
	$book_price = "";
	$query = "select * from books where book_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$book_name = $row['book_name'];
		$book_no = $row['book_no'];
		$author_name = $row['author_name'];
		$fac_name = $row['fac_name'];
		$book_price = $row['book_price'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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


<br>
<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Book No:</label>
					<input type="text" name="book_no" value="<?php echo $book_no;?>" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Book Name:</label>
					<input type="text" name="book_name" value="<?php echo $book_name;?>" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Author Name: <?php echo $author_name;?>(Selected)</label>
					<!-- <input type="text" name="author_id" value="<?php echo $author_name;?>" class="form-control" required=""> -->
					<select class="form-control" name="author_name"  required="">
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
					<label>Faculty Name: <?php echo $fac_name;?>(Selected)</label>
					
					<select class="form-control" name="fac_name"  required="">
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
					<label>Book Price:</label>
					<input type="text" name="book_price" value="<?php echo $book_price;?>" class="form-control" required="">
				</div>
				<button class="btn btn-primary" name="update">Update Book</button>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['update'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "update books set book_name = '$_POST[book_name]',author_name='$_POST[author_name]',fac_name='$_POST[cat_id]',book_price = $_POST[book_price] where book_no = $_GET[bn]";
		$query_run = mysqli_query($connection,$query);
		echo "<script type='text/javascript'>
	alert('book updated successfully');
	window.location.href = 'manage_book.php';
</script>";
	}
?>