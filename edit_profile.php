<?php
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$name = "";
	$email = "";
	$mobile = "";
	$address = "";
	$query = "select * from users where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$address = $row['address'];
	}
?>
<?php include('userdashboard_nav.php') ?>
<br><br>
<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="update.php" method="post">
				<div class="form-group">
					<label style="margin-bottom: 5px;">Name:</label>
					<input type="text" class="form-control" value="<?php echo $name;?>" name="name">
				</div>
				<br>
				<div class="form-group">
					<label style="margin-bottom: 5px;">Email:</label>
					<input type="text" class="form-control" value="<?php echo $email;?>" name="email">
				</div>
				<br>

				<div class="form-group">
					<label style="margin-bottom: 5px;">Mobile:</label>
					<input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile">
				</div>
				<br>

				<div class="form-group">
					<label style="margin-bottom: 5px;">Address:</label>
					<textarea rows="3" cols="40" name="address" class="form-control"><?php echo $address;?></textarea>
				</div>
				<button  type="submit" name="update" class="btn btn-primary mt-3 mb-3">Update</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
<!-- Footer-->
<?php include('footer.php') ?>