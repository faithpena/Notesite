<?php

	function add_product($prodname, $subjid, $quantity, $price, $description, $isavailable)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		# Put the parameters in an array
		$data = array('prodname' => $prodname, 'subjid' => $subjid, 'quantity' => $quantity, 'price' => $price, 'description' => $description, 'isavailable' => $isavailable);

		# Prepare the query
		$STH = $DBH->prepare("INSERT INTO products (prodname, subjid, quantity, price, description, isavailable) VALUES (:prodname, :subjid, :quantity, :price, :description, :isavailable)");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>