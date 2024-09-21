<?php require 'includes/dbh.php'?>
<?php require 'header.php'?>
<body>
    <div class="breadcrumb background-pink">
        <p><a href="../index.php">Homepage /</a></p>
        <p><a>My account</a></p>
    </div>
    <section class="user-main">
      <div class="user-sidenav">
        <h1>Your Account</h1>
        <?php require 'user_aside.php'?>
      </div>
      <div class="user-content">
        <h1>Order History</h1>
        <table>
          <tr>
            <th class="table-hide">ID</th>
            <th>Date</th>
            <th>Delivery Date</th>
            <th>Total</th>
            <th>Quantity</th>
            <th class="table-hide"></th>
          </tr>
          <?php
          if (isset($_SESSION['user_orders'])) {
            $arrayCount = count($_SESSION['user_orders']);
            $array = $_SESSION['user_orders'];
            for($i = 0; $i < $arrayCount; $i++) {
              echo '<tr>';
              echo '<td class="table-hide">' . $array[$i][0] . '</td>';
              echo '<td>' . $_SESSION['current_date'] . '</td>'; 
              echo '<td>' . $_SESSION['delivery_date'] . '</td>'; 
              echo '<td>' . $array[$i][2] . '</td>'; 
              echo '<td>' . $array[$i][6] . '</td>';
              echo '<td class="table-hide">' . '<p><a href="card_view.php?id=' . $array[$i][0] . '">View</a></p>' . '</td>';
              echo '</tr>';
            }
          }
          ?>
        </table>
      </div>
    </section>
</body>
<?php require 'footer.php'?>
