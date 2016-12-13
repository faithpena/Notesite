<?php
	
	function delete_cart($id)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('id' => $id);

		# Prepare the query
		$STH = $DBH->prepare('DELETE FROM cart WHERE cartid = :id');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>