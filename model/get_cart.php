<?php

	function get_products($userid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		$data = array('userid' => $userid);

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM cart JOIN users using (userid) JOIN products using (prodid) WHERE isVisible = true AND userid = :userid ORDER BY prodid ASC');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$products = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $products;
	}

?>