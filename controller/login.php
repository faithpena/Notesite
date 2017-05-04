<?php

	# Needed to access the session variables
	session_start();

	include "../model/get_user.php";
	include "../model/get_admin.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$user = get_user($username);

	# If current user is not null and the password matches
	# Successful Login
	if(isset($user) && password_verify($password, $user->password)) {
		$_SESSION['userid'] = $user->userid;
		$_SESSION['username'] = $user->username;
		$admin = get_admin($user->userid);
		
		if(isset($admin)) {
			$_SESSION['admin'] = 1;
		}
	}
	else {
		$_SESSION['unsuccessful login'] = 1;
	}

	# Redirect to index.php
	#header("Location: ../index.php");

?>