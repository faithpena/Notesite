<?php
	
	require "../model/update_quantity.php";
	require "../model/delete_cart.php";
	require "display_cart.php";
	require "../model/get_cart.php";

	# Needed to access the session variables
	session_start();

	$cartid = $_POST['id'];
	$quantity = $_POST['quantity'];

	if($quantity == 0)
	{
		delete_cart($cartid);
	}
	else
	{
		update_quantity($cartid, $quantity);
	}

	$html = display_cart();

	echo $html;

?>