<?php

session_start();
include '../config/dbconn.php';

if (isset($_SESSION['auth'])) {
   if (isset($_POST['place-order'])) {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $contactNo = mysqli_real_escape_string($conn, $_POST['contact-no']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $zip = mysqli_real_escape_string($conn, $_POST['zip']);
      $payment = mysqli_real_escape_string($conn, $_POST['payment']);

      $trackingNo = 'soleace' . uniqid();
      $userId = $_SESSION['authUser']['userId'];

      $queryCartItems = "SELECT c.id as cid, c.product_id, c.product_size, c.product_quantity, s.name as sname, p.id as pid, p.name as pname, p.category, p.image, p.selling_price FROM carts c, products p, sub_categories s WHERE c.product_id = p.id AND c.user_id ='$userId' AND p.sub_category_id = s.id AND s.status = 1 ORDER BY c.created_at DESC";

      if (mysqli_query($conn, $queryCartItems)) {
         $cartItems = mysqli_fetch_all(mysqli_query($conn, $queryCartItems), MYSQLI_ASSOC);
         $totalPrice = 0;
         foreach ($cartItems as $item) {
            $productTotalPrice = $item["selling_price"] * $item["product_quantity"];
            $totalPrice += $productTotalPrice;
         }
      } else {
         $_SESSION['swalToastMsg'] = "top-end | 3000 | error | Something went wrong! | 24em";
         header('Location: ../checkout.php');
         exit(0);
      }

      $insertOrderQuery = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, zip_code, total_price, payment_method, payment_id) VALUES ('$trackingNo', '$userId', '$name', '$email', '$contactNo', '$address', '$zip', '$totalPrice', '$payment', NULL)";
      $insertOrderQueryRun = mysqli_query($conn, $insertOrderQuery);

      if ($insertOrderQueryRun) {
         $orderId = mysqli_insert_id($conn);
         foreach ($cartItems as $citem) {
            $productId = $citem['product_id'];
            $productSize = $citem['product_size'];
            $productQuantity = $citem['product_quantity'];
            $productPrice = $citem['selling_price'];

            $insertItemsQuery = "INSERT INTO order_items (order_id, product_id, product_size, product_quantity, product_price) VALUES ('$orderId', '$productId', '$productSize', '$productQuantity', '$productPrice')";
            $insertItemsQueryRun = mysqli_query($conn, $insertItemsQuery);

            $productQuery = "SELECT * FROM products WHERE id='$productId' LIMIT 1";
            $productQueryRun = mysqli_query($conn, $productQuery);
            $productData = mysqli_fetch_array($productQueryRun);

            $currentQty = $productData['quantity'];
            $newQty = $currentQty - $productQuantity;

            $updateQtyQuery = "UPDATE products SET quantity = '$newQty' WHERE id='$productId'";
            $updateQtyQueryRun = mysqli_query($conn, $updateQtyQuery);
         }

         $deleteCartQuery = "DELETE FROM carts WHERE user_id = '$userId'";
         $deleteCartQueryRun = mysqli_query($conn, $deleteCartQuery);

         $_SESSION['swalToastMsg'] = "top-end | 3000 | success | Order placed successfully! | 24em";
         header('Location: ../my-orders.php');
         die();
      } else {
         $_SESSION['swalToastMsg'] = "top-end | 3000 | error | Something went wrong! | 24em";
         header('Location: ../checkout.php');
      }
   }
} else {
   header('Location: ../index.php');
}
