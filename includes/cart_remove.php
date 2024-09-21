<?php

session_start();

unset($_SESSION['cart'][$_REQUEST['id']]);

echo 'success';

header('location: ../cart.php');