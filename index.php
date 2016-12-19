<?php

    require "controller/birthday_select.php";
    require "controller/display_cart.php";

    require "model/get_cart.php";

    # Needed to access the session variables
    # Only for this page
    session_start();  

?>

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

    <script type="text/javascript" src="js/change.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        </li>
                        <li>
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

    <?php if (isset($_SESSION['unsuccessful login'])): ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Login Error!</strong> Invalid username and password combination.
        </div>

        <?php unset($_SESSION['unsuccessful login']); ?>
    <?php endif; ?>

     <?php if (isset($_SESSION['Username already in use'])): ?>
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Username already in use!</strong> Please choose another username.
        </div>

        <?php unset($_SESSION['Username already in use']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['Passwords do not match'])): ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Confirmation Error!</strong> Passwords do not match.
        </div>

        <?php unset($_SESSION['Passwords do not match']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['Successful signup'])): ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> User account successfully created.
        </div>

        <?php unset($_SESSION['Successful signup']); ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8">
            <!-- Page Content -->
            <div class="container">

                <div class="row">

                   

                    <div class="col-md-9" style="margin: 20px">

                        <div class="row carousel-holder">

                            <div class="col-md-12">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img class="slide-image" src="page1.png" alt="">
                                        </div>
                                        <div class="item">
                                            <img class="slide-image" src="page2.png" alt="">
                                        </div>
                                        <div class="item">
                                            <img class="slide-image" src="page3.png" alt="">
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        <?php if(!isset($_SESSION['userid'])): ?>
            <p class="lead">Sign Up</p>
             <form action="controller/signup.php" method="post">
                <input class="form-control" type="text" placeholder="Username" name="username" maxlength="30" required/><br>
                <input class="form-control" type="password" placeholder="Password" name="password" maxlength="30" required/><br>
                <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword" maxlength="30" required/><br>
                <input class="form-control" type="text" placeholder="Email" name="email" maxlength="50" required/><br>
                <input class="form-control" type="text" placeholder="First Name" name="firstname" maxlength="50" required/><br>
                <input class="form-control" type="text" placeholder="Last Name" name="lastname" maxlength="50" required/><br>
                Sex
                <label class="radio-inline"><input type="radio" style="padding: 5px" name="sex" value="male" checked>Male</label> 
                <label class="radio-inline"><input type="radio" style="padding: 5px" name="sex" value="female">Female</label>
                <br><br>
                Birthdate
                <div class="row">
                    <?= birthdate_select(); ?><br>
                </div>
                <br>
                <input class="form-control" type="text" placeholder="Contact Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="contactno"  maxlength="11" required/><br>
                <input class="btn btn-default" type="submit" value="Sign up" />
            </form>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table" id="mytable">
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                        <?= display_cart() ?>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="btn btn-default" href="controller/checkout.php">Checkout</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col">
                    <h3>Follow us at https://twitter.com/Notesite_</h3>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
