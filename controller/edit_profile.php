<?php

	require "../model/update_user.php";
	require "../model/get_user.php";

	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$sex = $_POST['sex'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$birthdate = $year . '-' . date('m', strtotime($month)) . '-' . $day;

	# Check if the username is already in use
	$user = (get_user($username));
	if(isset($user->userid) && ($_SESSION['userid'] == $user->userid) && password_verify($password, $user->password))
	{
		update_user($_SESSION['userid'], $username, $email, $firstname, $lastname, $sex, $birthdate);

		# Update user details
		$_SESSION['username'] = $username;
	}
	elseif(!isset($user->userid) && password_verify($password, $user->password))
	{
		update_user($_SESSION['userid'], $username, $email, $firstname, $lastname, $sex, $birthdate);

		# Update user details
		$_SESSION['username'] = $username;
	}
	else
	{
		if(isset($user->userid) && ($_SESSION['userid'] != $user->userid))
		{
			$_SESSION['Username is already taken'] = 1;
		}
		elseif(!password_verify($password, $user->password))
		{
			$_SESSION['Not your password'] = 1;
		}
	}
	//$user = get_user($username);
	//create_admin($user->userid);

	# Redirect to index.php
	header("Location: ../profile.php");
?>