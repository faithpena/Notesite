<?php

	require "model/get_order_details.php";

	function display_order_details($orderid)
	{
		$table = "";

		$orders = get_order_details();

		foreach ($orders as $order)
		{
			if ($orderid == $order->orderid) {
				$table .= '<tr>';

				$table .= '<td>';
				$table .= $order->prodname;
				$table .= '</td>';

				$table .= '<td>';
				$table .= $order->itemquantity;
				$table .= '</td>';

				$table .= '<td>';
				$table .= $order->currprice;
				$table .= '</td>';

				$table .= '<td>';
				$table .= $order->itemquantity * $order->currprice;
				$table .= '</td>';

				$table .= '</tr>';
			}
			
		} 

		return $table;
	}