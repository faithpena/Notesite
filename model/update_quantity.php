<?php

	function update_quantity($cartid, $quantity)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('cartid' => $cartid, 'quantity' => $quantity);

		# Prepare the query
		$STH = $DBH->prepare("UPDATE cart SET itemquantity = :quantity WHERE cartid = :cartid");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>