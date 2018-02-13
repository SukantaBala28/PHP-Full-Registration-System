<?php
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (mysqli_connect_errno()) {
		echo 'Connection failed to Database'. mysqli_connect_errno();
	}
?>