<?php
	require('index.php');
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$query = 'SELECT * FROM posts WHERE id = '.$id;
	$result = mysqli_query($conn, $query);
	$post = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
<?php include('landingheader.php') ?>
	<div class="container">
		<h1><?php echo $post['title'];?></h1>
		<small>Created at <?php echo $post['created_at'];?> by <?php echo $post['author'];?></small>
		<p><?php echo $post['body'];?></p>
	</div>
<?php include('landingfooter.php') ?>