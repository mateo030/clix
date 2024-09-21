<?php require 'header.php'?>
<?php require 'includes/dbh.php'?>
<?php 
$query = explode("=",$_SERVER['QUERY_STRING']); 
if(!isset($_GET['keyword'])) {
  $rows = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
} else if(isset($_GET['keyword'])) {
  $filteredRows = $pdo->query("SELECT * FROM products WHERE name LIKE '" . "%"  . $_GET['keyword'] . "%" . "' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
}
?>
<body>
  <div class="breadcrumb background-pink">
    <p><a href="index.php">Homepage</a> / </p>
    <p><a>Products</a></p>
  </div>
  <div class="product-catalog">
    <h1>Products</h1>
    <div class="product-catalog-body">
      <aside class="product-catalog-aside light-shadow">
        <div class="aside-block">
          <h1>Other Categories</h1>
          <form action="products.php" method="GET">
              <input type="hidden" name="category" value="furniture">
              <button>Furniture</button>
          </form>
          <form action="products.php" method="GET">
              <input type="hidden" name="category" value="clothes">
              <button>Clothes</button>
          </form>
          <form action="products.php" method="GET">
              <input type="hidden" name="category" value="shoes">
              <button>Shoes</button>
          </form>
          <form action="products.php" method="GET">
              <input type="hidden" name="category" value="homeware">
              <button>Homeware</button>
          </form>
          <form action="products.php" method="GET">
              <input type="hidden" name="category" value="food & beverage">
              <button>Food & Beverage</button>
          </form>
        </div>
        <div class="aside-block">
          <h1>Product Condition</h1>
          <form>
            <div class="aside-radio">
              <input type="radio" name="condition" id="new" value="new">
              <label>New</label>
            </div>
            <div class="aside-radio">
              <input type="radio" name="condition" id="refurbished" value="refurbished">
              <label>Refurbished</label>
            </div>
            <div class="aside-radio">
              <input type="radio" name="condition" id="used" value="used">
              <label>Used</label>
            </div>
            <button class="filter-button">Go</button>
          </form>
        </div>
      </aside>
      <div class="product-catalog-main">
        <div class="product-catalog-header light-shadow">
          <p>
          <?php 
          if (isset($_GET['keyword'])) { 
            echo count($filteredRows);
          } else if (!isset($_GET['keyword'])) { 
            if ($query[0] == 'category') {
              echo returnFilteredCardCount($_GET['category']);
            } else {
              echo count($rows);
            }
          }
          ?> 
           Product(s)
          </p>
          <form>
            <select>
              <option>Price (low to high)</option>
              <option>Price (high to low)</option>
            </select>
          </form>
        </div> 
        <div class="product-catalog-display">
        <?php
        
        if($query[0] == 'category') {

          $category = $_GET['category'];
          displayFilteredCard($category,5);

        } else if(!isset($_GET['keyword'])) {

          $rowCount = count($rows);
          displayCard($rowCount);

        } else if(isset($_GET['keyword'])) {

          $filteredRowCount = count($filteredRows);
          for ($i = 0; $i < $filteredRowCount; $i++) {
            $filteredRow = $filteredRows[$i];
            echo '<div class="product-card">';
            echo '<a href="card_view.php?id=' . $filteredRow['id'] . '">';
            echo '<div class="product-thumbnail">';
            echo '<img src="uploads/' . htmlspecialchars($filteredRow['image_url']) . '">';
            echo '</div>';
            echo '<div class="product-desc">';
            echo '<p style="font-weight: bold;">' . htmlspecialchars($filteredRow['name']) . '</p>';
            echo '</a>';
            echo '<div class="product-desc-block">';
            echo '<p>¥' . $filteredRow['price'] . '</p>';
            echo '<a href="card_view.php?id=' . $filteredRow['id'] . '">' . 'View Product' . '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
          }
        } 
          ?>
          </div>
        </div>
      </div> 
    </div>
  </div>
</body>