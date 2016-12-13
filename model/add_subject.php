<?php
	
	function add_subject($subjname)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('subjname' => $subjname);

		# Prepare the query
		$STH = $DBH->prepare("INSERT INTO subjects (subjname) VALUES (:subjname)");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>