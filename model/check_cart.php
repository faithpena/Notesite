<?php

	function check_cart($userid, $prodid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		$data = array('userid' => $userid, 'prodid' => $prodid);

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM cart JOIN products using (prodid) WHERE userid = :userid AND prodid = :prodid');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$product = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $product[0];
	}

?>