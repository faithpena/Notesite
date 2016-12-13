<?php

	function get_products($userid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

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