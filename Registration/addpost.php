<?php
	require('index.php');
	$msg = "";
	if(isset($_POST['submit'])) {
		$image = $_FILES['image']['name'];
	  	$target = "images/".basename($image);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);
		$query = "INSERT INTO posts (title, author, body, title_img) VALUES ('$title', '$author', '$body', '$image')";
		if (mysqli_query($conn, $query)) {
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		  		$msg = "Image uploaded successfully";
		  		header('Location: '.ROOT_URL.'post.php');
		  	}else{
		  		$msg = "Failed to upload image";
		  	}
		} else {
			echo 'ERROR: '.mysqli_error($conn);
		}
	};
?>
<?php include('landingheader.php');?>
<div class="container">
	<h1>Add Post</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
		<div class="form-group">
			<label>Title</label>
			<input type="text" name="title" placeholder="Title" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Author</label>
			<input type="text" name="author" placeholder="Author" class="form-control" required>
		</div>
		<input type="hidden" name="size" value="1000000">
	  	<div class="form-group">
	  		<label>Upload title image</label><br/>
	  	  	<input type="file" name="image">
	  	</div>
		<div class="form-group">
			<label>Body</label>
			<textarea type="text" name="body" placeholder="Body" class="form-control" required></textarea>
		</div>
		<p><?php echo $msg;?></p>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
	</form>
</div>
<?php include('landingfooter.php')?>