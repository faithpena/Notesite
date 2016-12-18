<?php

	require "model/get_products.php";

	function display_products()
	{
		$table = "";

		$products = get_products();

		foreach ($products as $product)
		{
			$table .= '<tr>';

			$table .= '<td style="width: 25px";>';
			$table .= $product->prodid;
			$table .= '</td>';

			$table .= '<td style="width: 175px">';
			$table .= $product->prodname;
			$table .= '</td>';

			$table .= '<td style="width: 125px">';
			$table .= $product->subjname;
			$table .= '</td>';	

			$table .= '<td>';
			if ($product->isavailable == true) {
				$table .= 'Available';
			}
			else {
				$table .= 'Not Available';
			}
			$table .= '</td>';

			$table .= '<td>';
			$table .= $product->quantity;
			$table .= '</td>';

			$table .= '<td>';
			$table .= $product->price;
			$table .= '</td>';
	
			$table .= '<td style="width: 300px;">';
			$table .= $product->description;
			$table .= '</td>';

			if(isset($_SESSION['admin'])) {
				$table .= '<td>';
				$table .= '<form action="edit_product.php" method="post">
							  <input class="btn btn-default" type="submit" value="Edit Product"/>
							  <input type="hidden" name="prodid" value="' . $product->prodid . '"/>
							  <input type="hidden" name="prodname" value="' . $product->prodname . '" />
							  <input type="hidden" name="subjname" value="' . $product->subjname . '" />
							  <input type="hidden" name="quantity" value="' . $product->quantity . '" />
							  <input type="hidden" name="price" value="' . $product->price . '" />
							  <input type="hidden" name="description" value="' . $product->description . '" />
						   </form>';
				$table .= '</td>';

				$table .= '<td>';
				$table .= '<form action="controller/delete_product.php" method="post">
							  <input class="btn btn-default" type="submit" value="Delete Product"/>
							  <input type="hidden" name="id" value="' . $product->prodid . '"/>
						   </form>';
				$table .= '</td>';
			}

			if (isset($_SESSION['userid'])) {
				$table .= '<td>';
				$table .= '<form action="controller/add_to_cart.php" method="post">
							  <input class="form-control" type="number" name="quantity" style="width: 5em" min="1" max=' . $product->quantity . ' value="1"/>
							  </td><td><input class="btn btn-default" type="submit" value="Add to Cart" />
							  <input type="hidden" name="prodid" value="' . $product->prodid . '"/>
						   </form>';
				$table .= '</td>';
			}

			$table .= '</tr>';
		} 

		return $table;
	}