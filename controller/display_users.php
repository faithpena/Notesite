<?php

	require "model/get_users.php";

	function display_users()
	{
		$table = "";

		$users = get_users();

		foreach ($users as $user)
		{
			$table .= '<tr>';

			$table .= '<td>';
			$table .= $user->userid;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $user->username;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $user->firstname;
			$table .= '</td>';	

			$table .= '<td>';
			$table .= $user->lastname;
			$table .= '</td>';
	
			$table .= '<td>';
			$table .= $user->email;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $user->sex;
			$table .= '</td>';			

			$table .= '<td>';
			$table .= $user->birthdate;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $user->contactno;
			$table .= '</td>';
			
			$table .= '</tr>';
		} 

		return $table;
	}