<?php

	function get_products($userid)
	{
		# Connect to database/postgres
$DBH = new PDO("pgsql:host=ec2-54-235-173-161.compute-1.amazonaws.com;port=5432;dbname=d1p08lsn14og2", "wplbxvzslhxeoa", "7669306a79c6df85de352ad79d52ec650e1ebe59caf6d7fd6c090444c20fa11f");

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