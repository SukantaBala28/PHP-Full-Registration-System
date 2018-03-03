<?php 
	include('index.php');
	$query = 'SELECT * FROM posts ORDER BY created_at DESC';
	$result = mysqli_query($conn, $query);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
<?php include('landingheader.php'); ?>
<div class="container">
	<h1>Posts</h1>
	<?php foreach ($posts as $post):?> 
		<div class="row" style="border: 1px solid #CCC;padding: 10px;margin-top: 10px;">
			<div class="col-md-4">
				<?php echo "<img src ='images/".$post['title_img']."' >";?>
				<!-- <h1>title</h1> -->
			</div>
			<div class="col-md-8">
				<h3><?php echo $post['title'];?></h3>
				<small>Created at <?php echo $post['created_at'];?> by <?php echo $post['author'];?></small><br/>
				<button class="btn btn-default"><a href="<?php echo ROOT_URL;?>postdetails.php?id=<?php echo $post['id'];?>">Read More</a></button>
			</div>
		</div>
	<?php endforeach;?>
</div>
<?php include('landingfooter.php'); ?>
<style type="text/css">
	img {
		width: 100%;
		height: 40%;
	}
</style>