<?php

include __DIR__.'/../config/db.php';
	
	$delete_id = mysqli_real_escape_string($conn, $_POST['d']);
		$query = "DELETE FROM posts WHERE id = {$delete_id}";
		if (mysqli_query($conn, $query)) {
		   	echo "d";
		} else { 
			echo 'ERROR: '.mysqli_error($conn);
		}
?>