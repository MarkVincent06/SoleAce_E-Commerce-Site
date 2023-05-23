<?php

// Construct the SQL query to join the shopping_cart and shoe_products tables
$sql = "SELECT shopping_cart.cart_id, shopping_cart.shoe_id, shopping_cart.shoe_size, shopping_cart.shoe_quantity, shoe_products.shoe_name, shoe_products.shoe_category, shoe_products.shoe_price, shoe_products.shoe_image_src FROM shopping_cart JOIN shoe_products ON shopping_cart.shoe_id = shoe_products.shoe_id;";

// Execute the query
$result = mysqli_query($conn, $sql);

// fetch and store the result in an array
$cart_products = mysqli_fetch_all($result, MYSQLI_ASSOC) or die("There are no items in your cart.");
