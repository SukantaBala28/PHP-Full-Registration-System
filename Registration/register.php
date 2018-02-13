<?php include('index.php');?>
<div class="container">
	<hr/>
	<h4 class="text-center">REGISTRATION FORM</h4>
	<hr/>
	<div class="row justify-content-center">
		<div class="col-4">
			<form method="POST" action="register.php">
				<?php include('errors.php'); ?>
			  <div class="form-group">
			    <label for="firstName">First Name</label>
			    <input type="text" class="form-control" name="firstName" placeholder="Enter last name" value="<?php echo $firstName; ?>">
			  </div>
			  <div class="form-group">
			    <label for="lastName">Last Name</label>
			    <input type="text" class="form-control" name="lastName" placeholder="Enter last name" value="<?php echo $lastName; ?>">
			  </div>

			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $email; ?>">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password_1" placeholder="Password">
			  </div>
			   <div class="form-group">
			    <label for="confirmPassword">Confirm Password</label>
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