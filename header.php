<?php require 'includes/functions.php'?>
<?php session_start()?>
<?php $uri = $_SERVER['REQUEST_URI']?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clix</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="images/couch.jpg" type="image/icon type">
    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Custom Icons-->
    <script src="https://kit.fontawesome.com/492cd470a0.js" crossorigin="anonymous"></script>    
</head>
<header>
    <div class="logo">
        <i class="fa-solid fa-couch"></i><a href="index.php"><h1>CliX</h1></a>
    </div>
    <div class="search-form">
        <form action='products.php' method="GET">
            <input type="text" placeholder="Search for product" name="keyword">
            <i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i>
        </form>
    </div>
    <nav>
        <ul>
            <li><a href="products.php">Products</a></li>            
            <?php 
            if(isset($_SESSION['name'])) {
                if(!isset($_SESSION['cart'])) {
                    echo '<li><i class="fa-solid fa-user"></i><a href="user_acc.php"> My Account</a></li>';
                    echo '<li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i> 0 item(s)</a></li>';
                } else if(isset($_SESSION['name']) && isset($_SESSION['cart'])) {
                    echo '<li><i class="fa-solid fa-user"></i><a href="user_acc.php"> My Account</a></li>';
                    echo '<li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i> ' . getArrayCount($_SESSION['cart']) . ' item(s)</a></li>';
                }
            }
            else {
                echo '<li><a href="sign_in.php" id="signup">Sign In</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
<div class="hidden-form">
    <form action='products.php' method="GET">
        <input type="text" placeholder="Search for product" name="keyword">
        <i class="fa-solid fa-magnifying-glass" style="font-size: 20px;"></i>
    </form>
</div>