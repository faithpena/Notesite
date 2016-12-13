<?php

	require "../model/delete_product.php";

	$prodid = $_POST['id'];
	delete_product($prodid);
	
	# Redirect to index.php
	header("Location: ../products.php");
?>