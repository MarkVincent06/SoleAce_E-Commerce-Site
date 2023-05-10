<?php
include '../config/dbconn.php';

// INSERTS A NEW DEPARTMENT AT THE DB
if (isset($_POST['addToCart'])) {
   $shoeID = htmlspecialchars($_POST['shoeID']);
   $shoeSize = htmlspecialchars($_POST['shoeSize']);

   // Check if the product already exists in the shopping cart
   $sql = "SELECT * FROM shopping_cart WHERE shoe_id='$shoeID' AND shoe_size='$shoeSize'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      // Product already exists in the cart, update the quantity
      $row = mysqli_fetch_assoc($result);
      $cartID = $row['cart_id'];
      $quantity = $row['shoe_quantity'] + 1;

      $sql = "UPDATE shopping_cart SET shoe_quantity=$quantity WHERE cart_id=$cartID";

      if (!mysqli_query($conn, $sql)) {
         die("Query error: " . mysqli_error($conn));
      }
   } else {
      // Product does not exist in the cart, insert a new record with quantity 1
      $sql = "INSERT INTO shopping_cart (shoe_id, shoe_size, shoe_quantity)
              VALUES ('$shoeID', '$shoeSize', 1)";

      if (!mysqli_query($conn, $sql)) {
         die("Query error: " . mysqli_error($conn));
      }
   }
}

// closing the connection to the db
mysqli_close($conn);
