<?php require 'includes/dbh.php'?>
<?php require 'header.php'?>
<body>  
    <div class="hero">
        <div class="hero-text">
            <h1>WEEKLY DISCOUNT</h1>
            <p>Discount up to 80%</p>
            <a href="#">SHOP NOW</a>
        </div>
        <div class="hero-image">
            <img src="images/hero.png">
        </div>
    </div>
    <div class="menu-block">
        <ul>
            <a href="index.php"><li><i class="fa-solid fa-star" style="color:goldenrod"></i> What's New</li></a>
            <a href="furniture.php"><li><i class="fa-solid fa-chair" style="color:indianred"></i> Furniture</li></a>
            <a href="clothes.php"><li><i class="fa-solid fa-shirt" style="color:darkcyan"></i> Clothes</li></a>
            <a href="shoes.php"><li><i class="fa-solid fa-shoe-prints" style="color:olive"></i> Shoes</li></a>
            <a href="homeware.php" class="selected"><li><i class="fa-solid fa-blender-phone" style="color:dimgray"></i> Homeware</li></a>
            <a href="food.php"><li><i class="fa-solid fa-burger" style="color:tan;"></i> Food & Beverage</li></a>
        </ul>
    </div>
    <main>
        <?php require 'aside.php'?>
        <section class="main-content">
            <div class="main-title">
                <h1>Homeware</h1>
                <p>Appliances, Gadgets, and other stuff</p>
            </div>
            <div class="card-container">
               <?php 
               $rows = $pdo->query("SELECT * FROM products WHERE category = 'Homeware'")->fetchAll(PDO::FETCH_ASSOC);
               $product = count($rows);

               foreach($rows as $row) {
                   echo '<div class="product-card">';
                   echo '<a href="card_view.php?id=' . $row['id'] . '">';
                   echo '<div class="product-thumbnail">';
                   echo '<img src="uploads/' . $row['image_url'] . '">';
                   echo '</div>';
                   echo '<div class="product-desc">';
                   echo '<h1>' . $row['name'] . '</h1>';
                   echo '<p>' . $row['category'] . '</p>';
                   echo '</div>';
                   echo '</div>';
               }
               ?>
            </div>
        </section>
    </main>
<?php require 'footer.php'?>