<?php

	require "../model/update_product.php";
	require "../model/get_subjid.php";
	require "../model/add_subject.php";

	$prodid = $_POST['prodid'];
	$prodname = $_POST['prodname'];
	$subjname = $_POST['subjname'];
	$quantity = '0';

	if(isset($_POST['quantity'])) {
		$quantity = (string) $_POST['quantity'];
	}

	$price = $_POST['price'];
	$description = $_POST['description'];
	$isavailable = "true";

	if ($quantity == 0) {
		$isavailable = "false";
	}

	$subjid = get_subjid($subjname);

	if($subjid == NULL) {
		add_subject($subjname);
		$subjid = get_subjid($subjname);
	}
	
	update_product($prodid, $prodname, $subjid, $quantity, $price, $description, $isavailable);

	$_SESSION['Successful update product'] = 1;

	# Redirect to index.php
	header("Location: ../products.php");
?>