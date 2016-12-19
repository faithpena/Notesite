<?php

	function get_orders()
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-173-161.compute-1.amazonaws.com;port=5432;dbname=d1p08lsn14og2", "wplbxvzslhxeoa", "7669306a79c6df85de352ad79d52ec650e1ebe59caf6d7fd6c090444c20fa11f");

		# Prepare the query
		$STH = $DBH->prepare('SELECT DISTINCT ON (orderid) * FROM order_history JOIN users using (userid) JOIN orders using (orderid) ORDER BY orderid ASC');
		
		# Execute the query
		$STH->execute();

		# Get all the rows that matches the query
		$orders = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $orders;
	}

?>