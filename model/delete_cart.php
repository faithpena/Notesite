<?php
	
	function delete_cart($id)
	{
		# Connect to database/postgres
$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		# Put the parameters in an array
		$data = array('id' => $id);

		# Prepare the query
		$STH = $DBH->prepare('DELETE FROM cart WHERE cartid = :id');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>