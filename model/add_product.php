<?php

	function add_product($prodname, $subjid, $quantity, $price, $description, $isavailable)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('prodname' => $prodname, 'subjid' => $subjid, 'quantity' => $quantity, 'price' => $price, 'description' => $description, 'isavailable' => $isavailable);

		# Prepare the query
		$STH = $DBH->prepare("INSERT INTO products (prodname, subjid, quantity, price, description, isavailable) VALUES (:prodname, :subjid, :quantity, :price, :description, :isavailable)");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>