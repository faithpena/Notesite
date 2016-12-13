<?php

	function get_products()
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM products JOIN subjects using (subjid) WHERE isVisible = true ORDER BY prodid ASC');
		
		# Execute the query
		$STH->execute();

		# Get all the rows that matches the query
		$products = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $products;
	}

?>