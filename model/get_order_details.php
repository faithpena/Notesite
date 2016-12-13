<?php

	function get_order_details()
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM orders JOIN products using (prodid)');
		
		# Execute the query
		$STH->execute();

		# Get all the rows that matches the query
		$orders = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $orders;
	}

?>