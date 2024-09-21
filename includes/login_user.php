<?php
session_start();
require 'dbh.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['name'];
  $password = $_POST['pass'];

  if(empty($username) || empty($password)) {
    header('Location: ../sign_in.php?error=Please input all fields!');
  }

  if(!empty($username) && !empty($password)) {

    $sth = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $sth->bindParam(':username',$username);
    $sth->execute();
    $user = $sth->fetch();

    if($user && $password == $user['user_pass']) {
      $_SESSION['id'] = $user['user_id'];
      $_SESSION['name'] = $user['username'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['created_at'] = $user['created_at'];
      header('Location: ../index.php');
      exit();
    } else {
      header('Location: ../sign_in.php?error=Incorrect username or password');
    }
  }
}