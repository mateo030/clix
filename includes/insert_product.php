<?php

require 'dbh.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $name = htmlentities($_GET["name"], ENT_QUOTES, 'UTF-8');
    $price = htmlentities($_GET["price"], ENT_QUOTES, 'UTF-8');
    $category = $_GET["category"];
    $img =htmlentities($_GET["img"], ENT_QUOTES, 'UTF-8');
    $product_desc =htmlentities($_GET["description"], ENT_QUOTES, 'UTF-8');
    $product_con =htmlentities($_GET["condition"], ENT_QUOTES, 'UTF-8');
    
    try {
        $sth = $pdo->prepare("INSERT INTO products (name, price, category, product_desc, product_con, image_url) VALUES (:name, :price, :category, :product_desc, :product_con, :img)");

        $sth->bindParam(":name", $name);
        $sth->bindParam(":price", $price);
        $sth->bindParam(":category", $category);
        $sth->bindParam(":img", $img);
        $sth->bindParam(":product_desc", $product_desc);
        $sth->bindParam(":product_con", $product_con);

        $sth->execute();

        header("location:../admin.php");
        
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

}

