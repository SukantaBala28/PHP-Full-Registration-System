<?php include('index.php');?>
<div class="container">
	<hr/>
	<h4 class="text-center">LOGIN FORM</h4>
	<hr/>
	<div class="row justify-content-center">
		<div class="col-4">
			<?php include('errors.php'); ?>
			<form method="POST" action="login.php">
			  <div class="form-group">
			    <label for="username">Email</label>
			    <input type="text" class="form-control" name="email" placeholder="Enter email">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" placeholder="Password">
			  </div>
			  <div class="text-center">
			  	<button type="submit" class="btn btn-primary" name="login">LogIn</button><br/>
			  	<small>Not a member yet? <a href="register.php">SignUp</a></small>
			  </div>
			</form>
		</div>
	</div>
</div>