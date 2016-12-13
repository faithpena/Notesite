<?php

	function add_to_quantity($userid, $prodid, $quantity)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

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