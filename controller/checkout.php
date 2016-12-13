<?php

	require "../model/checkout.php";

	session_start();

	checkout($_SESSION['userid']);
	
	header("Location: ../index.php");

?>