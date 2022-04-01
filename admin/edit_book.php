<?php
	require('functions.php');
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_no = "";
	$book_name = "";
	$author_id = "";
	$cat_id = "";
	$book_price = "";
	$query = "select * from books where book_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$book_name = $row['book_name'];
		$book_no = $row['book_no'];
		$author_id = $row['author_id'];
		$cat_id = $row['cat_id'];
		$book_price = $row['book_price'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
  	</style>
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
					<label>Author ID:</label>
					<input type="text" name="author_id" value="<?php echo $author_id;?>" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Category ID:</label>
					<input type="text" name="cat_id" value="<?php echo $cat_id;?>" class="form-control" required="">
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
		$query = "update books set book_name = '$_POST[book_name]',author_id=$_POST[author_id],cat_id=$_POST[cat_id],book_price = $_POST[book_price] where book_no = $_GET[bn]";
		$query_run = mysqli_query($connection,$query);
		header("location:manage_book.php");
	}
?>