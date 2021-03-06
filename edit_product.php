<?php

	$prodid = $_POST['prodid'];
	$prodname = $_POST['prodname'];
	$subjname = $_POST['subjname'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$description = $_POST['description'];

	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Home</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="css/shop-homepage.css" rel="stylesheet">

	</head>

	<body>
		<!-- Navigation -->
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="index.php">Notesite</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav">
	                    <li>
	                        <a href="products.php">Products</a>
	                    </li>
	                </ul>

	                <div class="navbar-right">
	                    <?php if(!isset($_SESSION['userid'])): ?>
	                    
	                        <form class="navbar-form" action="controller/login.php" method="post">
	                            <input class="form-control" type="text" placeholder="Username" name="username" />
	                            <input class="form-control" type="password" placeholder="Password" name="password" />
	                            <input class="btn btn-default" type="submit" value="Login"/>
	                        </form>
	                    

	                    <?php else: ?>
	                    <ul class="nav navbar-nav">
	                        <li>
                            <a href="order_history.php">Order History</a>
                        </li><li>
	                            <a href="profile.php">Profile</a>
	                        </li>

	                            <?php if(isset($_SESSION['admin'])): ?>
	                            <li>
	                                <a href="users.php">Users</a>
	                            </li>
	                            <?php endif; ?>

	                        <li>
	                            <a href="controller/logout.php">Log Out</a>
	                        </li>
	                    </ul>
	                    <?php endif; ?>
	                </div>
	           
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
		
		<div class="row" style="margin: 10px">
	    	<div class="col-md-4">
				<form action="controller/edit_product.php" method="post">
					<input class="form-control" type="hidden" name="prodid" value="<?= $prodid ?>"/><br>
					<label>Product Name</label>
					<input class="form-control" type="text" name="prodname" maxlength="30" value="<?= $prodname ?>" required/><br>
					<label>Subject</label>
					<input class="form-control" type="text" name="subjname" maxlength="25" value="<?= $subjname ?>" required/><br>
					<label>Quantity</label>
					<input class="form-control" type="number" min="0" name="quantity" value="<?= $quantity ?>" required/><br>
					<label>Price</label>
					<input class="form-control" type="number" min="0" step="0.01" name="price" value="<?= $price ?>" required/><br>
					<label>Description</label>
					<textarea style="resize: none" class="form-control" type="text" name="description" maxlength="350" value="<?= $description ?>"><?= $description ?></textarea><br>
					<input class="btn btn-default" type="submit" value="Edit Product"/>
				</form>
			</div>
	</body>
</html>