<?php

	function get_subjid($subjname)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('subjname' => $subjname);

		# Prepare the query
		$STH = $DBH->prepare('SELECT subjid FROM subjects WHERE subjname = :subjname');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$subject = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $subject[0]->subjid;
	}

?>