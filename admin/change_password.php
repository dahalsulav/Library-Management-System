<?php
	session_start();
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
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="update_password.php" method="post">
				<div class="form-group">
					<label>Enter Current Password:</label>
					<input type="password" name="old_password" class="form-control">
				</div>
				<div class="form-group">
					<label>Enter New Password:</label>
					<input type="password" name="new_password" class="form-control">
				</div>
				<button type="submit" name="update" class="btn btn-primary">Update Password</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>