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


<br>
<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Book Name:</label>
					<select class="form-control" name="book_name" required="">
						<option>Select Book</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select book_name from books";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['book_name'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Book Author:</label>
					<select class="form-control" name="book_author">
						<option>Select Author</option>
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
				<div class="form-group">
					<label>Book Number:</label>
					<select class="form-control" name="book_no"  required="">
						<option>Select Book Number</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select book_no from books";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['book_no'];?></option>
								<?php
							}
						?>
					</select>
				<div class="form
				</div>
				<div class="form-group">
					<label>Student ID:</label>
					<select class="form-control" name="student_id"  required="">
						<option>Select Student ID</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"lms");
							$query = "select id from users";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option><?php echo $row['id'];?></option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Issue Date:</label>
					<input type="text" name="issue_date" class="form-control" value="<?php echo date("yy-m-d");?>" required="">
				</div>	
				</div>
				<button class="btn btn-primary" name="issue_book">Issue Book</button>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['issue_book'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query = "insert into issued_books values(null,$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',$_POST[student_id],1,'$_POST[issue_date]')";
		$query_run = mysqli_query($connection,$query);
		echo "<script type='text/javascript'>
	alert('book issued successfully');
	window.location.href = 'view_issued_book.php';
</script>";
	}
?>