<?php

session_start();
include '../config/dbconn.php';

if (isset($_SESSION['auth'])) {
   if (isset($_POST['scope'])) {
      $scope = $_POST['scope'];

      switch ($scope) {
         case "add":
            $productId = $_POST['productID'];
            $productSize = $_POST['productSize'];
            $productQuantity = $_POST['productQuantity'];

            $userId = $_SESSION['authUser']['userId'];

            $checkExistingCart = "SELECT * FROM carts WHERE product_id = '$productId' AND user_id = '$userId'";
            $checkExistingCartRun = mysqli_query($conn, $checkExistingCart);

            if (mysqli_num_rows($checkExistingCartRun) > 0) {
               echo "existing";
            } else {
               $insertQuery = "INSERT INTO carts (user_id, product_id, product_size, product_quantity) VALUES ('$userId', '$productId', '$productSize', '$productQuantity')";
               $insertQueryRun = mysqli_query($conn, $insertQuery);

               if ($insertQueryRun) {
                  echo 201;
               } else {
                  echo 500;
               }
            }

            break;
         case "update":
            $productId = $_POST['productID'];
            $productSize = $_POST['productSize'];
            $productQuantity = $_POST['productQuantity'];

            $userId = $_SESSION['authUser']['userId'];

            $checkExistingCart = "SELECT * FROM carts WHERE product_id = '$productId' AND user_id = '$userId'";
            $checkExistingCartRun = mysqli_query($conn, $checkExistingCart);

            if (mysqli_num_rows($checkExistingCartRun) > 0) {
               $updateQuery = "UPDATE carts SET product_size = '$productSize', product_quantity = '$productQuantity' WHERE product_id = '$productId' AND user_id = '$userId'";
               $updateQueryRun = mysqli_query($conn, $updateQuery);

               if ($updateQueryRun) {
                  echo 201;
               } else {
                  echo 500;
               }
            } else {
               echo 500;
            }

            break;
         case "delete":
            $cartId = $_POST['cartID'];

            $userId = $_SESSION['authUser']['userId'];

            $checkExistingCart = "SELECT * FROM carts WHERE id = '$cartId' AND user_id = '$userId'";
            $checkExistingCartRun = mysqli_query($conn, $checkExistingCart);

            if (mysqli_num_rows($checkExistingCartRun) > 0) {
               $deleteQuery = "DELETE FROM carts WHERE id = '$cartId'";
               $deleteQueryRun = mysqli_query($conn, $deleteQuery);

               if ($deleteQueryRun) {
                  echo 201;
               } else {
                  echo 500;
               }
            } else {
               echo 500;
            }

            break;
         default:
            echo 500;
            break;
      }
   }
} else {
   echo "login";
}
