<?php require 'includes/dbh.php'?>
<?php require 'header.php'?>
<body>  
    <div class="hero">
        <div class="hero-text">
            <h1>Find the best deals with us</h1>
            <p>Your one-stop shop for amazing products at unbeatable prices</p>
            <a href="#content">SHOP NOW</a>
        </div>
        <div class="hero-image">
            <img src="images/hero.png">
        </div>
    </div>
    <div class="hero-bottom">
        <div class="hero-icon-container">
            <i class="fa-solid fa-truck-fast"></i>
            <p style="font-weight:bold;">Same day delivery with ClickPremium</p>
        </div>
        <div class="hero-icon-container mid">
            <i class="fa-solid fa-money-bill"></i>
            <p style="font-weight:bold;">Pay online OR upon delivery</p>
        </div>
        <div class="hero-icon-container">
            <i class="fa-solid fa-headset"></i>
            <p style="font-weight:bold;">24/7 Zama-based Customer Service</p>
        </div>
    </div>
    <main>
        <section class="main-content">
            <div class="main-title" id="content">
                <h1><a href="#">Explore your options</a></h1>
                <p>Your Local Marketplace for Everything You Need</p>
            </div>
            <div class="main-container">
            <?php 
            displayCard(14);
            ?>
            </div>
        </section>
        <section class="main-content">
            <h1>Categories to choose from</h1>
            <div class="main-container category-block">
                <div class="category-img">
                    <img src="images/furniture.jpg">
                    <div class="img-bottom-text">
                        <h1>Furniture</h1>
                        <form action="products.php" method="GET">
                            <input type="hidden" name="category" value="furniture">
                            <button>View All</button>
                        </form>
                    </div>
                </div>
                <div class="category-container">
                <?php displayFilteredCard('Furniture', 5)?>
                </div>
            </div>
            <div class="main-container category-block">
                <div class="category-img">
                    <img src="images/Clothing.jpg">
                    <div class="img-bottom-text">
                        <h1>Clothing</h1>
                        <form action="products.php" method="GET">
                            <input type="hidden" name="category" value="clothes">
                            <button>View All</button>
                        </form>
                    </div>
                </div>
                <div class="category-container">
                <?php displayFilteredCard('Clothes', 5)?>
                </div>
            </div>
            <div class="main-container category-block">
                <div class="category-img">
                    <img src="images/shoes.jpg">
                    <div class="img-bottom-text">
                        <h1>Shoes</h1>
                        <form action="products.php" method="GET">
                            <input type="hidden" name="category" value="shoes">
                            <button>View All</button>
                        </form>
                    </div>
                </div>
                <div class="category-container">
                <?php displayFilteredCard('Shoes', 5)?>
                </div>
            </div>
            <div class="main-container category-block">
                <div class="category-img">
                    <img src="images/homeware.jpg">
                    <div class="img-bottom-text">
                        <h1>Homeware</h1>
                        <form action="products.php" method="GET">
                            <input type="hidden" name="category" value="homeware">
                            <button>View All</button>
                        </form>
                    </div>
                </div>
                <div class="category-container">
                <?php displayFilteredCard('Homeware', 5)?>
                </div>
            </div>
            <div class="main-container category-block">
                <div class="category-img">
                    <img src="images/food.jpg">
                    <div class="img-bottom-text">
                        <h1>Food & Beverage</h1>
                        <form action="products.php" method="GET">
                            <input type="hidden" name="category" value="food & beverage">
                            <button>View All</button>
                        </form>
                    </div>
                </div>
                <div class="category-container">
                <?php displayFilteredCard('Food & Beverage', 5)?>
                </div>
            </div>
            
        </section>
    </main>
<?php require 'footer.php'?>
