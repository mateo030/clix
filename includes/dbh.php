<?php

$dbhost = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'zc_data';

try {
    $pdo = new PDO("mysql:host=". $dbhost .";dbname=zc_data", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

