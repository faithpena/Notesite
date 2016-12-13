<?php
	
	function update_product($prodid, $prodname, $subjid, $quantity, $price, $description, $isavailable)
	{
		# Connect to database/postgres
$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		$data = array('prodid' => $prodid, 'prodname' => $prodname, 'subjid' => $subjid, 'quantity' => (string) $quantity, 'price' => $price, 'description' => $description, 'isavailable' => $isavailable);

		$STH = $DBH->prepare('UPDATE products SET prodname = :prodname, subjid = :subjid, quantity = :quantity, price = :price, description = :description, isavailable = :isavailable WHERE prodid = :prodid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}
?>