<?php

	require "../model/delete_cart.php";

	$cart = $_POST['id'];
	delete_cart($cart);
	
	# Redirect to index.php
	header("Location: ../index.php");
?>