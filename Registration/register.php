<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Registration System</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<hr/>
		<h4 class="text-center">REGISTRATION FORM</h4>
		<hr/>
		<div class="row justify-content-center">
			<div class="col-4">
				<form method="POST" action="register.php">
					<?php include('errors.php'); ?>
				  <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" name="username" placeholder="Enter last name" value="<?php echo $username; ?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Email address</label>
				    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $email; ?>">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" name="password_1" placeholder="Password">
				  </div>
				   <div class="form-group">
				    <label for="confirmPassword">Password</label>
				    <input type="password" class="form-control" name="password_2" placeholder="Confirm Password">
				  </div>
				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary" name="register">Register</button><br/>
				  	<small>Already member? <a href="login.php">LogIn</a></small>
				  </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>