<?php
	session_start();
?>
<?php include('userdashboard_nav.php') ?>
<br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="update_password.php" method="post">
				<div class="form-group">
					<label style="margin-bottom: 5px;">Enter Current Password:</label>
					<input type="password" name="old_password" class="form-control">
				</div>
				<div class="form-group">
					<label style="margin-bottom: 5px;">Enter New Password:</label>
					<input type="password" name="new_password" class="form-control">
				</div>
				<button type="submit" name="update" class="btn btn-primary mt-3 mb-3">Update Password</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
<!-- Footer-->
<?php include('footer.php') ?>