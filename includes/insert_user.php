<?php

require 'dbh.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  try {
    $userName = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $userPass = htmlspecialchars($_POST['user_pass']);
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);

    if (empty($userName) || empty($email) || empty($userPass) || empty($firstName) || empty($lastName)) {
      header('Location: ../sign_up.php?error=Please input all fields!');
    }

    $sth = $pdo->prepare('INSERT INTO users (username, email, user_pass, first_name, last_name) VALUES (:username, :email, :user_pass, :first_name, :last_name)');
    $sth->bindParam(':username',$userName);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':user_pass',$userPass);
    $sth->bindParam(':first_name',$firstName);
    $sth->bindParam(':last_name',$lastName);

    $sth->execute();

    header('Location: ../sign_in.php');
    exit();
  } catch (Exception $e) {
    echo 'There was an error signing up', $e->getMessage(), '\n';
  }

}