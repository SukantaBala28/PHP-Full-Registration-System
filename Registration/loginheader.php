<!DOCTYPE html>
<html>
<head>
	<title>PHP Registration System</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-3.3.1.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- 	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script> -->
	<style type="text/css">
		.profileLink {
			padding-top: 14px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="home.php">All Post</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  	<div class="container-fluid">
	  		<div class="row">
		  		<div class="col-6">
		  			<ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="addpost.php">Add Post</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="home.php?logout='1'">Logout</a>
				      </li>
				    </ul>
		  		</div>
		  		<div class="col-6 rightCol">
		  			<ul class="navbar-nav mr-auto">
				      <li class="nav-item">
				        <a class="nav-link"><?php echo $_SESSION['name'];?></a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link profileLink dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle userIcon"></i></a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="home.php?logout='1'" >Logout</a>
				        </div>
				      </li>
				    </ul>
		  		</div>
		  	</div>
	  	</div>
	  </div>
	</nav>
