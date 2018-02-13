<?php include('server.php');
	if (empty($_SESSION['email'])) {
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Registration System</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<hr/>
		<h4 class="text-center">Home Page</h4>
		<hr/>
		<div class="row justify-content-center">
			<div class="col-6">
				<?php if (isset($_SESSION['success'])): ?>
					<div class="success">
						<h3>
							<?php 
								echo $_SESSION['success'];
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>
				<?php if (isset($_SESSION["email"])): ?>
					<div class="content">
						<p>Welcome <?php echo $_SESSION['name'];?></p>
						<p><a href="home.php?logout='1'">Logout</a></p>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>