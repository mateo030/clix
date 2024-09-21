<?php

include 'functions.php';
session_start();
date_default_timezone_set('Asia/Tokyo');
//Creates new session
if(!isset($_SESSION['user_orders'])) {
  $_SESSION['user_orders'] = [];
}
//Initiates new time session
$currentDate = date("F j, Y, g:i a");
$deliveryDate = date("F j, Y", strtotime('+1 week'));
$_SESSION['current_date'] = $currentDate;
$_SESSION['delivery_date'] = $deliveryDate;
//Pushes old cart data into new array
if(isset($_SESSION['user_orders'])) {
  foreach($_SESSION['cart'] as $id=>$key) {
    array_push($_SESSION['user_orders'], $key);
  }
  //Empties old session so it wont appear in the user's cart
  $_SESSION['cart'] = [];
}

header('Location:../user_acc.php');