<?php
	
	function update_user($userid, $username, $email, $firstname, $lastname, $sex, $birthdate)
	{
		# Connect to database/postgres
$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		# Put the parameters in an array
		$data = array('userid' => $userid, 'username' => $username, 'email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'sex' => $sex, 'birthdate' => $birthdate);

		# Prepare the query
		$STH = $DBH->prepare('UPDATE users SET username = :username, email = :email, firstname = :firstname, lastname = :lastname, sex = :sex, birthdate = :birthdate WHERE userid = :userid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}
?>