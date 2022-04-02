<?php
	require('functions.php');
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$cat_name = "";
	$cat_id = "";
	$query = "select * from category where cat_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$cat_name = $row['cat_name'];
		$cat_id = $row['cat_id'];
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
					<label>Category Name:</label>
					<input type="text" name="cat_name" value="<?php echo $cat_name;?>" class="form-control" required="">
				</div>
				<button class="btn btn-primary" name="update">Update Category</button>

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
		$query = "update category set cat_name = '$_POST[cat_name]' where cat_id = $_GET[cid]";
		$query_run = mysqli_query($connection,$query);
		echo "<script type='text/javascript'>
		alert('faculty updated successfully');
		window.location.href = 'manage_cat.php';
	</script>";
	}
?>