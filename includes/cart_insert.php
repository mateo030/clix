<?php

session_start();
require 'dbh.php';
require 'functions.php';

if(!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
} 

if(isset($_SESSION['cart'])) {
  (int)$count = $_POST['quantity'];
  $productId = $_POST['product_id'];
  $sth = $pdo->prepare('SELECT * FROM products WHERE id = :id');
  $sth->bindParam(':id',$productId);
  $sth->execute();
  $product = $sth->fetch();
  array_push($product, $count);
  array_push($_SESSION['cart'], $product);

  header('location:../cart.php');
}