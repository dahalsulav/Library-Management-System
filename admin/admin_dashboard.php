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
  	<style type="text/css">
		  body{
			  cursor: pointer;
		  }
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
		  .row{
			  margin-left:0;
			  margin-right: 0;
		  }
  	</style>
</head>
<body>
<?php include('adnavbar.php') ?>
<?php include('secondnav.php') ?>

<br>
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered Users:</div>
				<div class="card-body">
					<p class="card-text">No. of total users: <?php echo get_user_count();?></p>
					<a href="regusers.php" class="btn btn-danger">View Registered Users</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered Books:</div>
				<div class="card-body">
					<p class="card-text">No. of availbale books: <?php echo get_book_count();?></p>
					<a href="regbooks.php" class="btn btn-primary">View Registered Books</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered Category:</div>
				<div class="card-body">
					<p class="card-text">No. of book's category: <?php echo get_category_count();?></p>
					<a href="regcat.php" class="btn btn-info">View Categories</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered Authors:</div>
				<div class="card-body">
					<p class="card-text">No. of availbale authors: <?php echo get_author_count();?></p>
					<a href="regauth.php" class="btn btn-primary" >View Authors</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Issued Books:</div>
				<div class="card-body">
					<p class="card-text">No. Issued Books: <?php echo get_issued_book_count();?></p>
					<a href="view_issued_book.php" class="btn btn-success">View Issued books</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>