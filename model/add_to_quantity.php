<?php

	function add_to_quantity($userid, $prodid, $quantity)
	{
		# Connect to database/postgres
$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		$data = array('userid' => $userid, 'prodid' => $prodid, 'quantity' => $quantity);

		# Prepare the query
		$STH = $DBH->prepare('UPDATE cart set itemquantity = :quantity WHERE userid = :userid AND prodid = :prodid');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$products = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $products;
	}

?>