<?php
	require('index.php');
	if (empty($_SESSION['email'])) {
		header('location: login.php');
	}
	if(isset($_POST['submit'])) {
		$updated_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);
		$query = "UPDATE posts SET
			title ='$title',
			author ='$author',
			body ='$body'
			WHERE id = {$updated_id};
		";
		if (mysqli_query($conn, $query)) {
		   	header('Location: '.ROOT_URL. 'post.php');
		} else { 
			echo 'ERROR: '.mysqli_error($conn);
		}
	};
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$query = 'SELECT * FROM posts WHERE id = '.$id;
	$result = mysqli_query($conn, $query);
	$post = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);
	if(empty($id)) {
		header('location: home.php');
	}

?>
<?php include('loginheader.php');?>
<div class="container">
	<h1>UPDATE Post</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
		<div class="form-group">
			<label>Title</label>
			<input type="text" name="title" placeholder="Title" class="form-control" value="<?php echo $post['title']; ?>">
		</div>
		<div class="form-group">
			<label>Author</label>
			<input type="text" name="author" placeholder="Author" class="form-control" value="<?php echo $post['author']; ?>">
		</div>
		<div class="form-group">
			<label>Body</label>
			<textarea type="text" name="body" class="form-control"><?php echo $post['body']; ?>  </textarea>
		</div>
		<input type="hidden" name="update_id" value="<?php echo $post['id'];?>">
		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
	</form>
</div>
<?php include('landingfooter.php')?>