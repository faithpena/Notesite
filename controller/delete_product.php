<?php

	require "../model/delete_product.php";

	$prodid = $_POST['id'];
	delete_product($prodid);

	$_SESSION['Successful delete product'] = 1;
	
	# Redirect to index.php
	header("Location: ../products.php");
?>