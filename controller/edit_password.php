<?php

	require "../model/update_password.php";
	require "../model/get_user.php";

	session_start();

	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$newPassword = $_POST['newPassword'];

	echo $password;
	echo $confirmPassword;
	echo $newPassword;
	if($password != $confirmPassword) {
		$_SESSION['Passwords do not match'] = 1;
	}
	else {
		$user = (get_user($_SESSION['username']));
		if(password_verify($password, $user->password))
		{
			$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
			update_password($user->userid, $newPassword);
		}
		else
		{
			$_SESSION['Not your password'] = 1;
		}
	}

	# Redirect to index.php
	header("Location: ../profile.php");
?>