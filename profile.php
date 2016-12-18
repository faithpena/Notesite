<?php

	session_start();

	require "controller/profile.php"
	
?>

<html>
	<!DOCTYPE html>
	<html lang="en">
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
		 <?php if (isset($_SESSION['Passwords do not match'])): ?>
	        <div class="alert alert-danger">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Confirmation Error!</strong> Passwords do not match.
	        </div>

	        <?php unset($_SESSION['Passwords do not match']); ?>

		<?php elseif(isset($_SESSION['Not your password'])): ?>
			<div class="alert alert-danger">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Confirmation Error!</strong> Password is incorrect.
	        </div>

			<?php unset($_SESSION['Not your password']); ?>  <!-- Unsets the session variable so the pop up will disappear -->

		<?php endif; ?>

		<?php if(isset($_SESSION['Username is already taken'])): ?>

			<div class="alert alert-warning">
	          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	          <strong>Username already in use!</strong> Please choose another username.
	        </div>

			<?php unset($_SESSION['Username is already taken']); ?>  <!-- Unsets the session variable so the pop up will disappear -->

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

	    <div class="container" style="margin:15px">
			<label><h1><?= $user->username; ?></h1></label><br>
			<h3>Name: <?= $user->firstname . ' ' . $user->lastname; ?><br>
			Email: <?= $user->email; ?><br>
			Sex: <?= $user->sex; ?><br>
			Birthdate: <?= $user->birthdate; ?><br>
			Contact Number: <?= $user->contactno; ?><br></h3>

			<div class="row">
				
				<form class="col-md-2" action="edit_profile.php" method="post">
					<input class="btn btn-default" type="submit" value="Edit profile"/>
				</form>

				<form class="col-md-3" action="edit_password.php" method="post">
					<input class="btn btn-default" type="submit" value="Edit password"/>
				</form>
			</div>
		</div>

	</body>
</html>