<?php

	function get_orders()
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM order_history JOIN users using (userid) JOIN orders using (orderid) ORDER BY orderid ASC');
		
		# Execute the query
		$STH->execute();

		# Get all the rows that matches the query
		$orders = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $orders;
	}

?>