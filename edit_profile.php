<?php

	session_start();

	require "controller/profile.php";
	require "controller/birthday_select.php";

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

	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-4">
					<form action="controller/edit_profile.php" method="post">
						<label>Username</label>
						<input class="form-control" type="text" placeholder="Username" name="username" maxlength="30" value="<?= $user->username ?>"/><br>
						<label>First Name</label>
						<input class="form-control" type="text" placeholder="Firstname" name="firstname" maxlength="30" value="<?= $user->firstname ?>"/><br>
						<label>Last Name</label>
						<input class="form-control" type="text" placeholder="Lastname" name="lastname" maxlength="30" value="<?= $user->lastname ?>"/><br>
						<label>Email</label>
						<input class="form-control" type="text" placeholder="Email" name="email" maxlength="50" value="<?= $user->email ?>" /><br>
						<label>Sex  </label>
						<?php if ($user->sex == "male"): ?>   
							<input type="radio" name="sex" value="male" style="margin:5px" checked> Male  
							<input type="radio" name="sex" value="female"> Female<br>
						<?php else: ?>
							<input class="radio-inline" type="radio" name="sex" value="male" style="margin:5px"> Male  
							<input class="radio-inline" type="radio" name="sex" value="female" checked> Female<br>maxlength="50" 
						<?php endif; ?><br>
						<label>Birthdate</label>
						<div class="row">
							<?=	birthdate_select($user); ?><br>
				   		</div>
				   		<br>
				   		<label>Contact Number</label>
				   		<input class="form-control" type="text" placeholder="Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="contactno"  maxlength="11" value="<?= $user->contactno ?>" required/><br>
				   		<label>Password Confirmation</label>
				        <input class="form-control" type="password" placeholder="Password" name="password" /><br>
						<input class="btn btn-default" type="submit" value="Edit profile"/>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>