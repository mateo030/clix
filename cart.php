<?php require 'includes/dbh.php' ?>
<?php require 'header.php' ?>

<body>
  <div class="breadcrumb">
    <p><a href="index.php">Homepage /</a></p>
    <p><a>Cart</a></p>
  </div>
  <div class="user-main">
    <div class="table-container">
      <table>
        <tr>
          <th class="table-hide"></th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th></th>
        </tr>
        <?php
        if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $array => $key) {
            echo '<tr>';
            echo '<td class="table-hide">' . '<img src=uploads/' . $key['image_url'] . '></td>';
            echo '<td>' . $key['name'] . '</td>';
            echo '<td>¥' . $key['price'] . '</td>';
            echo '<td>' . $key[8] . '</td>';
            echo '<td>¥' . $key[8] * $key['price'] . '</td>';
            echo '<td>' . '<a href="includes/cart_remove.php?id=' . $array . '"><i class="fa-solid fa-xmark"></i></a>' . '</td>';
            echo '</tr>';
          }
        }
        ?>
      </table>
    </div>
    <div class="summary-container">
      <div>
        <h1>Order Summary</h1>
      </div>
      <div class="summary-flex">
        <p>Subtotal</p>
        <p>¥
          <?php
          if (!isset($_SESSION['cart'])) {
            echo 0;
          }

          if (isset($_SESSION['cart'])) {
            $subTotal = 0;
            foreach ($_SESSION['cart'] as $array => $key) {
              $total = $key[8] * $key['price'];
              $subTotal = $subTotal + $total;
            }
            echo $subTotal;
          }
          ?>
        </p>
      </div>
      <div class="summary-flex summary-style">
        <p>Shipping</p>
        <p>Free</p>
      </div>
      <div class="summary-flex" style="margin-top: 25px;">
        <h1>Total</h1>
        <h1>¥<?php if (isset($_SESSION['cart'])) {
                echo $subTotal;
              } else {
                echo 0;
              } ?></h1>
      </div>
      <form class="checkout-form" action="includes/cart_checkout.php" method="GET">
        <button>Checkout</button>
      </form>
    </div>
  </div>
  </section>
  <?php require 'footer.php' ?>