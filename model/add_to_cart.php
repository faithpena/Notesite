<?php

	function add_to_cart($userid, $prodid, $quantity)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('userid' => $userid, 'prodid' => $prodid, 'quantity' => $quantity);

		# Prepare the query
		$STH = $DBH->prepare("INSERT INTO cart (userid, prodid, itemquantity) VALUES (:userid, :prodid, :quantity)");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>