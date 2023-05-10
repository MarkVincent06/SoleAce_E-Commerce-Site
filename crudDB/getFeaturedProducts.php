<?php

include './config/dbconn.php';

// Construct the SQL query to join the featured_product and shoe_products tables
$sql = "SELECT featured_products.featured_product_id, featured_products.shoe_id, shoe_products.shoe_name, shoe_products.shoe_category, shoe_products.shoe_price, shoe_products.shoe_image_src FROM featured_products JOIN shoe_products ON featured_products.shoe_id = shoe_products.shoe_id;";

// Execute the query
$result = mysqli_query($conn, $sql);

// fetch and store the result in an array
$featured_products = mysqli_fetch_all($result, MYSQLI_ASSOC) or die("No featured items found!!!");

// Free result set
mysqli_free_result($result);

// closing the connection to the db
mysqli_close($conn);
