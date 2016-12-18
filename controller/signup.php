<?php
	
	require "../model/set_user.php";
	require "../model/get_user.php";
	require "../model/create_admin.php";
	require "../model/get_admin.php";
	require "../model/set_admin.php";

	# Needed to access the session variables
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$sex = $_POST['sex'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];


	if($password != $confirmPassword) {
		$_SESSION['Passwords do not match'] = 1;
	}
	else {
		echo 'NICE, TAMA TO';
		if(!get_user($username)) {
			$password = password_hash($password, PASSWORD_DEFAULT);
			set_user($username, $password, $email, $firstname, $lastname, $sex, $month, $day, $year);
			$_SESSION['Successful signup'] = 1;
		}
		else {
			echo 'IT WENT OVER HERE';
			echo get_user($username)->userid;
			if(get_admin(get_user($username)->userid)) {
				echo 'IT WENT HERE WAJA';
				$password = password_hash($password, PASSWORD_DEFAULT);
				set_admin(get_user($username)->userid, $username, $password, $email, $firstname, $lastname, $sex, $month, $day, $year);
				echo 'Made it';
				$_SESSION['Successful signup'] = 1;
			}
			else {
				$_SESSION['Username already in use'] = 1;
			}
		}
	}

	//$user = get_user($username);
	//create_admin($user->userid);

	# Redirect to index.php
	header("Location: ../index.php");
?>