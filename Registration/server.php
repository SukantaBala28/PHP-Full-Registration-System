<?php
	session_start();
	$firstName = "";
	$lastName = "";
	$email = "";
	$errors = array();

	if (isset($_POST['register'])) {
		$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

		if (empty($firstName)) {
			array_push($errors, 'Firstname is required.');
		}
		if (empty($lastName)) {
			array_push($errors, 'Lastname is required.');
		}
		if (empty($email)) {
			array_push($errors, 'Email is required.');
		}
		if (empty($password_1)) {
			array_push($errors, 'Pasword is required.');
		}
		if (empty($password_2)) {
			array_push($errors, 'Confirm password is required.');
		}
		if ($password_1 != $password_2) {
			array_push($errors, 'Passwords do not match.');
		}
		$query = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($result);
		if($data['email'] == $email) {
			array_push($errors, 'Your email is already exists.');
		}
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO users (firstname, lastname, email, password) VALUES('$firstName', '$lastName', '$email', '$password')";
			mysqli_query($conn, $query);
			$_SESSION['name'] = $firstName .' '. $lastName;
			$_SESSION['email'] = $email;
			$_SESSION['success'] = 'You are logged in';
			header('location: home.php');
		}
	}
	// logged in form
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($email)) {
			array_push($errors, 'Username is required');
		}
		if (empty($password)) {
			array_push($errors, 'Email is required');
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($conn, $query);
			$data = mysqli_fetch_assoc($result);
			if (mysqli_num_rows($result) == 1) {
				$_SESSION['name'] = $data['firstname'] .' '. $data['lastname'];
				$_SESSION['email'] = $email;
				$_SESSION['success'] = 'You are logged in';
				header('location: home.php');
			} else {
				array_push($errors, 'Wrong email/password combination.');
			}
		}
	}

	// logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location:login.php');
	}

?>