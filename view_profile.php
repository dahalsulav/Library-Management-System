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
	<div class="row" style="margin-bottom: 50px;">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form>
				<div class="form-group">
					<label style="margin-bottom: 5px;">Name:</label>
					<input type="text" class="form-control" value="<?php echo $name;?>" disabled>
				</div>
				<br>
				<div class="form-group">
					<labe style="margin-bottom: 5px;"l>Email:</labe>
					<input type="text" class="form-control" value="<?php echo $email;?>" disabled>
				</div>
				<br>
				<div class="form-group">
					<label style="margin-bottom: 5px;">Mobile:</label>
					<input type="text" class="form-control" value="<?php echo $mobile;?>" disabled>
				</div>
				<br>

				<div class="form-group">
					<label style="margin-bottom: 5px;">Address:</label>
					<textarea rows="3" cols="40" disabled="" class="form-control"><?php echo $address;?></textarea>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
<!-- Footer-->
<?php include('footer.php') ?>