<?php
	
	function delete_product($prodid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		# Put the parameters in an array
		$data = array('prodid' => $prodid);

		# Prepare the query
		$STH = $DBH->prepare('UPDATE products SET isVisible = false, isAvailable = false WHERE prodid = :prodid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>