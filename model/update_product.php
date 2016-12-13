<?php
	
	function update_product($prodid, $prodname, $subjid, $quantity, $price, $description, $isavailable)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		$data = array('prodid' => $prodid, 'prodname' => $prodname, 'subjid' => $subjid, 'quantity' => (string) $quantity, 'price' => $price, 'description' => $description, 'isavailable' => $isavailable);

		$STH = $DBH->prepare('UPDATE products SET prodname = :prodname, subjid = :subjid, quantity = :quantity, price = :price, description = :description, isavailable = :isavailable WHERE prodid = :prodid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}
?>