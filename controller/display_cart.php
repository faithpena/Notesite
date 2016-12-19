<?php

	function display_cart()
	{
		$table = "";

		$total = 0;
		

		$items = get_products($_SESSION['userid']);

		foreach ($items as $item)
		{
			$table .= '<tr>';

			$table .= '<td style="width: 150px">';
			$table .= $item->prodname;
			$table .= '</td>';

			$table .= '<td>';
			$table .= '<input onchange="change(this.value, ' . $item->cartid . ', ' . $item->quantity . ');" class="form-control" style="width: 70px;" type="number" min="1" max=' . $item->quantity . ' name="quantity" value=' . $item->itemquantity . ' />';
			$table .= '</td>';

			$table .= '<td style="width: 30px">';
			$table .= $item->price * $item->itemquantity;
			$table .= '</td>';	

			$table .= '<td>';
			$table .= '<form action="controller/delete_cart.php" method="post">
							<input type="hidden" name="id" value=' . $item->cartid . ' />
							<input class="btn btn-default" type="submit" value="X" />
						</form>';
			$table .= '</td>';	

			$table .= '</tr>';

			$total += $item->price * $item->itemquantity;
		} 

		$table .= '<tr>';

		$table .= '<td><label>Total:  ' . $total;
		$table .= '</td>';	

		//$table .= '</tr>';

		return $table;
	}