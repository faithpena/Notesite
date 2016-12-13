<?php
	
	function delete_product($prodid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('prodid' => $prodid);

		# Prepare the query
		$STH = $DBH->prepare('UPDATE products SET isVisible = false, isAvailable = false WHERE prodid = :prodid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>