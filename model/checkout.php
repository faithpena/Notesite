<?php
	
	function checkout($userid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-168-152.compute-1.amazonaws.com;port=5432;dbname=d12huncta76ish", "wepmlqqqfwcfug", "fe104016295a164ab48cbcb0c55229049c778561b00449f849fa79c75d2d76b3");

		$total = 0;

		try {
			
			$DBH->beginTransaction();

			# Put the parameters in an array
			$data = array('userid' => $userid);

			# Prepare the query
			$STH = $DBH->prepare('SELECT * FROM cart JOIN products USING (prodid) WHERE userid = :userid');
			$STH->execute($data);
			$carts = $STH->fetchAll(PDO::FETCH_OBJ);

			# Prepare the query
			$STH = $DBH->prepare('DELETE FROM cart WHERE userid = :userid');
			$STH->execute($data);

			# Prepare the query
			$STH = $DBH->prepare('INSERT INTO order_history (userid, orderdate, total) VALUES (:userid, now(), default) RETURNING orderid');
			$STH->execute($data);
			$orderid = $STH->fetchAll(PDO::FETCH_OBJ);
			
			foreach($carts as $cart)
			{
				$total .= $cart->price * $cart->itemquantity;
				$data = array('orderid' => $orderid[0]->orderid, 'prodid' => $cart->prodid, 'itemquantity' => $cart->itemquantity, 'currprice' => $cart->price);
				$STH = $DBH->prepare('INSERT INTO orders (orderid, prodid, itemquantity, currprice) VALUES (:orderid, :prodid, :itemquantity, :currprice)');
				$STH->execute($data);

				$data = array('prodid' => $cart->prodid);
				$STH = $DBH->prepare('SELECT quantity FROM products WHERE prodid = :prodid');
				$STH->execute($data);
				$quantity = $STH->fetchAll(PDO::FETCH_OBJ)[0];

				$data = array('prodid' => $cart->prodid, 'quantity' => $quantity->quantity-$cart->itemquantity);
				$STH = $DBH->prepare('UPDATE products SET quantity = :quantity WHERE prodid = :prodid ');
				$STH->execute($data);
			}

			$data = array('orderid' => $orderid[0]->orderid, 'total' => $total);
			$STH = $DBH->prepare('UPDATE order_history SET total = :total WHERE orderid = :orderid');
			$STH->execute($data);

			$DBH->commit();

		} catch (Exception $e){
			$DBH->rollback();
		}

		# Disconnect the database		
		$DBH = null;
	}

?>