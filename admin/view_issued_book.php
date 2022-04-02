<?php
	require('functions.php');
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$book_no = "";
	$student_name = "";
	$query = "select issued_books.status, issued_books.issue_date, issued_books.book_name,issued_books.book_author,issued_books.book_no,users.name from issued_books left join users on issued_books.student_id = users.id";
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

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
		
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
				<div class="dropdown-menu">
					<a href="" class="dropdown-item">Add New Book</a>
					<a href="" class="dropdown-item">Manage Books</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
				<div class="dropdown-menu">
					<a href="" class="dropdown-item">Add New Faculty</a>
					<a href="" class="dropdown-item">Manage Faculty</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
				<div class="dropdown-menu">
					<a href="" class="dropdown-item">Add New Author</a>
					<a href="" class="dropdown-item">Manage Authors</a>
				</div>
			</li>
			<li class="nav-item">
				<a href="issue_book.php" class="nav-link">Issue Book</a>
			</li>
		</ul>
	</div>
</nav>

<br><br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form>
			<table class="table-bordered" width="900px" style="text-align: center">
				<tr>
					<th>Name:</th>
					<th>Author:</th>
					<th>Number:</th>
					<th>Student Name:</th>
					<th>Issued Date:</th>
					<th>Status:</th>

				</tr>
				<?php
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						$issue_date = $row['issue_date'];
						$book_name = $row['book_name'];
						$book_author = $row['book_author'];
						$book_no = $row['book_no'];
						$student_name = $row['name'];
						$status = $row['status'];

				?>
						<tr>
							<td><?php echo $book_name;?></td>
							<td><?php echo $book_author;?></td>
							<td><?php echo $book_no;?></td>
							<td><?php echo $student_name;?></td>
							<td><?php echo $issue_date;?></td>
							<td><?php if((int)$status == 1){echo "Not Returned"; }else{echo "Returned";};?></td>

						</tr>
						<?php
					}
				?>
			</table>
		</form>
	</div>
	<div class="col-md-2"></div>
</div>
	
</body>
</html>