<?php

	require "../model/add_to_cart.php";
	require "../model/check_cart.php";
	require "../model/add_to_quantity.php";

	session_start();

	$quantity = $_POST['quantity'];
	$prodid = $_POST['prodid'];

	$cart = check_cart($_SESSION['userid'], $prodid);

	if(isset($cart))
	{
		$quantity = $quantity + $cart->itemquantity;

		if($quantity > $cart->quantity)
		{
			$_SESSION['too much quantity'] = 1;
		}
		else
		{
			add_to_quantity($_SESSION['userid'], $prodid, $quantity);
		}
		
	}
	else
	{
		add_to_cart($_SESSION['userid'], $prodid, $quantity);
	}

	header("Location: ../products.php");

?>