<?php

	# To be able to use session_destroy()
	session_start();

	# To destray ALL session variables (since they're global)
	session_destroy();

	# Redirect to index.php
	header("Location: ../index.php");

?>