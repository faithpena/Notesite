<?php

	require "controller/display_products.php";

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
		<?php if(isset($_SESSION['too much quantity'])): ?>

			<div class="alert alert-danger">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Success!</strong> Product was successfully added.
	        </div>

			<?php unset($_SESSION['too much quantity']); ?>  <!-- Unsets the session variable so the pop up will disappear -->

		<?php endif; ?>

		<?php if (isset($_SESSION['Successful add product'])): ?>
	        <div class="alert alert-success">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Success!</strong> Product was successfully added.
	        </div>

	        <?php unset($_SESSION['Successful add product']); ?>
	    <?php endif; ?>

	    <?php if (isset($_SESSION['Successful delete product'])): ?>
	        <div class="alert alert-success">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Success!</strong> Product was successfully deleted.
	        </div>

	        <?php unset($_SESSION['Successful delete product']); ?>
	    <?php endif; ?>

	     <?php if (isset($_SESSION['Successful update product'])): ?>
	        <div class="alert alert-success">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Success!</strong> Product was successfully updated.
	        </div>

	        <?php unset($_SESSION['Successful update product']); ?>
	    <?php endif; ?>

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
	                <a class="navbar-brand" href="index.php">Home</a>
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

	    <div class="row">
	    	<div class="col-md-4" style="margin: 10px">
			    <?php if(isset($_SESSION['admin'])): ?>
					<form action="add_product.php" method="post">
					  <input class="btn btn-control" type="submit" value="Add Product"/>
				   </form>
				<?php endif; ?>
			</div>
		</div>

	    <div class="row">
	    	<div class="col-md-12">
				<table class="table">
					<th>ID</th>
					<th>Name</th>
					<th>Subject</th>
					<th>Status</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Description</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<?= display_products(); ?>
				</table>
			</div>
		</div>
	</body>
</html>