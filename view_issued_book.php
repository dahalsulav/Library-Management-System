<?php
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$book_no = "";
	$query = "select issue_date, book_name,book_author,book_no from issued_books where student_id = $_SESSION[id] and status = 1";
?>
<?php include('userdashboard_nav.php') ?>

<div class="row" style="margin-bottom: 100px;">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form>
			<table class="table-bordered" width="900px" style="text-align: center">
				<tr>
					<th>Book Name:</th>
					<th>Book Author:</th>
					<th>Book Number:</th>
					<th>Issue Date:</th>

				</tr>
				<?php
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						$book_name = $row['book_name'];
						$author = $row['book_author'];
						$book_no = $row['book_no'];
						$issue_date = $row['issue_date'];

				?>
						<tr>
							<td><?php echo $book_name;?></td>
							<td><?php echo $author;?></td>
							<td><?php echo $book_no;?></td>
							<td><?php echo $issue_date;?></td>

						</tr>
						<?php
					}
				?>
			</table>
		</form>
	</div>
	<div class="col-md-2"></div>
</div>
	


	<!-- Footer-->
	<?php include('footer.php') ?>