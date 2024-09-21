<?php

function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre';
}

function modifyFilePath($file, $link) {

    if ($link) { 
        echo 'href="../' . $file . '"';
    } else {
        echo 'href="' . $file . '"';
    }

}

function getArrayCount($array) {
    $count = count($array);
    return $count;
}

function displayCard($count) {
    require 'dbh.php';
    $rows = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < $count; $i++) {
    $row = $rows[$i];
    echo '<div class="product-card">';
    echo '<a href="card_view.php?id=' . $row['id'] . '">';
    echo '<div class="product-thumbnail">';
    echo '<img src="uploads/' . htmlspecialchars($row['image_url']) . '">';
    echo '</div>';
    echo '<div class="product-desc">';
    echo '<p style="font-weight: bold;">' . htmlspecialchars($row['name']) . '</p>';
    echo '</a>';
    echo '<div class="product-desc-block">';
    echo '<p>¥' . $row['price'] . '</p>';
    echo '<a href="card_view.php?id=' . $row['id'] . '">' . 'View Product' . '</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    }
}

function displayFilteredCard($key, $count) {
    require 'dbh.php';
    $rows = $pdo->query("SELECT * FROM products WHERE category LIKE '" . $key . "' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < $count; $i++) {
    $row = $rows[$i];
    echo '<div class="product-card">';
    echo '<a href="card_view.php?id=' . $row['id'] . '">';
    echo '<div class="product-thumbnail">';
    echo '<img src="uploads/' . htmlspecialchars($row['image_url']) . '">';
    echo '</div>';
    echo '<div class="product-desc">';
    echo '<p style="font-weight: bold;">' . htmlspecialchars($row['name']) . '</p>';
    echo '</a>';
    echo '<div class="product-desc-block">';
    echo '<p>¥' . $row['price'] . '</p>';
    echo '<a href="card_view.php?id=' . $row['id'] . '">' . 'View Product' . '</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    }
}

function returnFilteredCardCount($key) {
    require 'dbh.php';
    $rows = $pdo->query("SELECT * FROM products WHERE category LIKE '" . $key . "' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    return count($rows);
}

function displaySearchedCard($count, $filteredRows) {
    for ($i = 0; $i < $count; $i++) {
        $filteredRow = $filteredRows[$i];
        echo '<div class="product-card">';
        echo '<a href="card_view.php?id=' . $filteredRow['id'] . '">';
        echo '<div class="product-thumbnail">';
        echo '<img src="uploads/' . htmlspecialchars($filteredRow['image_url']) . '">';
        echo '</div>';
        echo '<div class="product-desc">';
        echo '<p style="font-weight: bold;" id="card-title">' . htmlspecialchars($filteredRow['name']) . '</p>';
        echo '</a>';
        echo '<div class="product-desc-block">';
        echo '<p>¥' . $filteredRow['price'] . '</p>';
        echo '<a href="card_view.php?id=' . $filteredRow['id'] . '">' . 'View Product' . '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        }
}