<?php

	require "../model/add_product.php";
	require "../model/add_subject.php";
	require "../model/get_subjid.php";

	session_start();

	$prodname = $_POST['prodname'];
	$subjname = strtolower(str_replace(' ', '', $_POST['subjname']));
	$quantity = $_POST['quantity'];
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

	add_product($prodname, $subjid, $quantity, $price, $description, $isavailable);

	header("Location: ../add_product.php");
?>