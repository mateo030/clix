<?php require 'header.php' ?>
<?php require 'includes/dbh.php'?>
<?php

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product= $stmt->fetch();

?>
<div class="view-body">
    <section class="breadcrumb background-pink">
        <p><a href="index.php">Homepage </a>/</p>
        <p><a><?= $product['category']?> </a>/</p>
        <p><a><?= $product['name']?></a></p>
    </section>
    <section class="product-section">
    <?php
    if ($product) {
        echo '<div class="product-image">';
        echo '<img src="uploads/' . $product['image_url'] .'"></div>';
        echo '<div class="purchase-area">';
        echo '<h1>' . $product['name'] . '</h1>';
        echo '<h2>¥' . $product['price'] .'</h2>';
        echo '<form action="includes/cart_insert.php" method="POST">';
        echo '<select name="quantity" required>';
        for ($i = 1; $i<=10; $i++) {
            echo '<option value="' . $i . '". > ' . $i . '</option>';
        }
        echo '<input type="hidden" name="product_id" value="' . $product["id"] . '">';
        echo '<button>Add to cart</button>';
        echo '</form>';
        echo '<p><a href=#>Write a review</a></p>';
    
    }
    ?>
    <h1><i class="fa-solid fa-lock" style="color: #1E1C1C; font-size: 24px;"></i> Secure Payment Options</h1>
    <small>With CliX you are able to pay and on the delivery, CliX keeps your payment information secure and our shops never receive your credit card information. If paying online your credit won't be charged until you confirm that you received your order. </small>
    </section>
</div>
<section class="product-desc">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event,'Description')" id="defaultOpen">Description</button>
        <button class="tablinks" onclick="openTab(event,'Reviews')">Reviews</button>
        <button class="tablinks" onclick="openTab(event,'Delivery')">Delivery & Returns</button>
    </div>
    <div id="Description" class="tab-content">
        <h1>Item Details</h1>
        <p><?= $product['product_desc']?></p>
        <h1>Condition</h1>
        <p><?= $product['product_con']?></p>
    </div>
    <div id="Reviews" class="tab-content">
    <h1>Mateo Bonete</h1>
    <p>Timely and correct delivery</p>
    <small>Sun Dec 12 2021 </small>
    </div>
    <div id="Delivery" class="tab-content">
    <h1>Estimated Delivery Time</h1>
    <small>7 Business Days</small>
    <h1>Returns</h1>
    <small>We give a 48-hour grace period within which the customer can return or exchange a product in case it is faulty, damaged or not as described. </small>
    <h1>Guarantee</h1>
    <small>100% Money back guarantee</small>
    </div>
</section>
<script src="js/script.js"></script>
<?php require 'footer.php'?>
</body>
</html>