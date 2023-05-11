<?php
session_start();
// gets all the featured product data in the database
include './crudDB/getShoppingCart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/cart.css">
   <link rel="stylesheet" href="./styles/navigation.css">

   <!-- GOOGLE FONTS LINK -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <!-- FONTAWESOME CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Shopping Cart | SoleAce</title>
</head>

<body>
   <!-- START OF NAV -->
   <?php include './includes/navigation.php' ?>
   <!-- END  OF NAV -->

   <main>
      <!-- START OF CART SUMMARY -->
      <form class='cart-summary-container' method="post" onsubmit="return false;">
         <section class="cart-container">
            <h2>CART</h2>

            <?php
            $total_price = 0; // Initialize total price to 0
            foreach ($cart_products as $product) :
               // Calculate total price of the product based on quantity and price
               $product_total_price = $product["shoe_price"] * $product["shoe_quantity"];
               $total_price += $product_total_price; // Add product price to the running total
            ?>
               <div class="cart--product-container">
                  <img src="<?php echo $product["shoe_image_src"] ?>" alt="A picture of an item">
                  <div class="cart--product-details">
                     <h3><?php echo $product["shoe_name"] ?></h3>
                     <p><?php echo $product["shoe_category"] ?></p>
                     <!-- <p>Black/Tour Yellow/White</p> -->
                     <div class="cart--product-selection">
                        <div>
                           <label for="product-size">Size</label>
                           <select name="product-size" id="product-size">
                              <?php
                              $sizes = ["7", "8", "9", "10", "11", "12", "13", "14", "15"];
                              foreach ($sizes as $size) :
                                 $selectedSize = ($size === $product["shoe_size"]) ? "selected" : "";
                              ?>
                                 <option value="<?php echo $size ?>" <?php echo $selectedSize ?>><?php echo $size ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>

                        <div>
                           <label for="product-quantity">Quantity</label>
                           <select name="product-quantity" id="product-quantity">
                              <?php
                              $quantities = ["1", "2", "3", "4", "5"];
                              foreach ($quantities as $quantity) :
                                 $selectedQuantity = ($quantity === $product["shoe_quantity"]) ? "selected" : "";
                              ?>
                                 <option value="<?php echo $quantity ?>" <?php echo $selectedQuantity ?>><?php echo $quantity ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>
                     <a href="#"><i class="fa-regular fa-trash-can trashcan"></i></a>
                  </div>
                  <small class="cart--product-price">₱ <?php echo $product["shoe_price"] ?></small>
               </div>
            <?php endforeach ?>

         </section>

         <section class="summary-container">
            <h2>SUMMARY</h2>
            <div class="summary--subtotal">
               <p>Subtotal</p>
               <p>₱ <?php echo number_format($total_price) ?></p>
            </div>

            <div class="summary--shipping-fee">
               <p>Shipping Fee</p>
               <p>Free</p>
            </div>

            <div class="summary--hori-line"></div>

            <div class="summary--total">
               <p>Total</p>
               <p>₱ <?php echo number_format($total_price) ?></p>
            </div>

            <div class="summary--hori-line"></div>

            <button class="summary--checkout-button">Checkout</button>
         </section>
      </form>
      <!-- END OF CART SUMMARY -->
   </main>
</body>

</html>