
<?php 
	include('index.php');

	$query = 'SELECT * FROM posts ORDER BY created_at DESC';
	$result = mysqli_query($conn, $query);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
	if (empty($_SESSION['email'])) {
		header('location: login.php');
	}
?>
<?php require('loginheader.php'); ?>
	<div class="container">
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
			<div class="col-10">
				<table class="table table-striped">
				  <tbody>
				  	<?php foreach ($posts as $post):?>
					    <tr>
					      <td style="width:80%"><h5><?php echo $post['title'];?></h5></td>
					      <td style="width:10%"><button class="btn btn-warning"><a href="<?php echo ROOT_URL;?>editpost.php?id=<?php echo $post['id'];?>">Edit</a></button></td>
					      <td style="width: 10%">
					      	<span id="dlt_<?php echo $post['id']; ?>"></span><input type="submit" name="delete" data-postid="<?php echo $post['id']; ?>" value="Delete" class="btn btn-danger dltbtn">
					      </td>
					    </tr>
					  <?php endforeach;?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal" tabindex="-1" id="confirmModal" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Confirmation Modal</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Are you sure want to delete this post?</p>
	      </div>
	      <div class="modal-footer">
	      	<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
	      		<input type="hidden" name="delete_id" value="<?php echo $postIdNo; ?>">
	      		<button type="button" name="delete"  class="btn btn-primary">OK</button>
	      	</form>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
	      </div>
	    </div>
	  </div>
	</div>
<?php require('landingfooter.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		  $(".dltbtn").on("click", function(e){
		  var d = $(this).attr("data-postid");
		  //alert(d);
  		e.preventDefault();

  		var p = confirm("Are you sure wbnt to delete");

  		if(p) {

  			$("#dlt_"+d).html('Deleting..');

	  		 $.ajax({

	  		 		type: "POST",
	  		 		url: "engine/deletePost.php",
	  		 		data: {d: d}


	  		 })
	  		 .done(function(data){

	  		 	 if(data === "d") {

	  		 	 	  	$("#dlt_"+d).html("Deleted...");

	  		 	 	  	setTimeout(function(){
	  		 	 	  		window.location.href = "home.php";
	  		 	 	  	},1500);

	  		 	 } else {

	  		 	 	  	$("#dlt_"+d).html(data);
	  		 	 }
	  		 })
	  		 .fail(function(){
	  		 		$("#dlt_"+d).html("url not found");
	  		 });

	  		}


  	});

	})
</script>