<?php

	require "../model/add_to_cart.php";
	require "../model/check_cart.php";
	require "../model/add_to_quantity.php";

	session_start();

	$quantity = $_POST['quantity'];
	$prodid = $_POST['prodid'];

	echo 'Did it even go over here';

	$cart = check_cart($_SESSION['userid'], $prodid);

	if(isset($cart))
	{
		echo 'Should not go here';
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
		echo 'Nice it went here';
		add_to_cart($_SESSION['userid'], $prodid, $quantity);
	}

	//header("Location: ../products.php");

?>