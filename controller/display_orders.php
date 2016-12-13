<?php

	require "model/get_orders.php";

	function display_orders()
	{
		$table = "";

		$orders = get_orders();

		foreach ($orders as $order)
		{
			if(!isset($_SESSION['admin']) && $_SESSION['userid'] != $order->userid)
			{
				continue;
			}

			$table .= '<tr>';

			$table .= '<td>';
			$table .= $order->orderid;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $order->firstname;
			$table .=  ' ';
			$table .= $order->lastname;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $order->orderdate;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $order->total;
			$table .= '</td>';

			$table .= '<td>';
			$table .= '<form action="order_details.php" method="post">
						  <input class="btn btn-default" type="submit" value="View Order Details"/>
						  <input type="hidden" name="orderid" value="' . $order->orderid . '"/>
					   </form>';
			$table .= '</td>';

			$table .= '</tr>';
		} 

		return $table;
	}