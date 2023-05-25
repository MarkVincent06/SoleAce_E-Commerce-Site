<?php

include 'functions/myFunctions.php';
include 'authenticate.php';

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
   <link rel="stylesheet" href="styles/footer.css">

   <!-- GOOGLE FONTS LINK -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <!-- FONTAWESOME CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- JQUERY MINIFIED CDN -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

   <!-- CUSTOM JS -->
   <script src="./js/custom.js" type="module"></script>


   <title>My Cart | SoleAce</title>
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
            $cartItems = getCartItems();

            $totalPrice = 0;
            foreach ($cartItems as $citem) :
               $productTotalPrice = $citem["selling_price"] * $citem["product_quantity"];
               $totalPrice += $productTotalPrice;
            ?>
               <div class="cart--product-container">
                  <img src="./uploads/<?= $citem['image'] ?>" alt="An image of a product">
                  <div class="cart--product-details">
                     <h3><?= $citem['pname'] ?></h3>
                     <p>
                        <?php
                        if ($citem['sname'] === "Boys" || $citem['sname'] === "Girls") {
                           echo "Kid's Shoes";
                        } elseif ($citem['sname'] === "Sneakers") {
                           echo ucfirst($citem['category']) . "'s " . $citem['sname'];
                        } else {
                           echo ucfirst($citem['category']) . "'s " . $citem['sname'] . " Shoes";
                        }
                        ?>
                     </p>
                     <div class="cart--product-selection">
                        <input type="hidden" value="<?= $citem['pid'] ?>" class="hiddenInput">
                        <div>
                           <label for="product-size">Size</label>
                           <select name="product-size" id="product-size" class="product-size">
                              <?php
                              $sizes = ["7", "8", "9", "10", "11", "12", "13", "14", "15"];
                              foreach ($sizes as $size) :
                                 $selectedSize = ($size === $citem["product_size"]) ? "selected" : "";
                              ?>
                                 <option value="<?php echo $size ?>" <?php echo $selectedSize ?>><?php echo $size ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>

                        <div>
                           <label for="product-quantity">Quantity</label>
                           <select name="product-quantity" id="product-quantity" class="product-quantity">
                              <?php
                              $quantities = ["1", "2", "3", "4", "5"];
                              foreach ($quantities as $quantity) :
                                 $selectedQuantity = ($quantity === $citem["product_quantity"]) ? "selected" : "";
                              ?>
                                 <option value="<?php echo $quantity ?>" <?php echo $selectedQuantity ?>><?php echo $quantity ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>

                     <div style="margin-top: 10px;">
                        <button class="wishlist"><i class="fa-regular fa-heart"></i></button>
                        <button class="trashcan delete-item" value="<?= $citem['product_id'] ?>"><i class="fa-regular fa-trash-can"></i></button>
                     </div>
                  </div>
                  <small class="cart--product-price">₱ <?= number_format($citem['selling_price']); ?></small>
               </div>
            <?php endforeach ?>

         </section>

         <section class="summary-container">
            <h2>SUMMARY</h2>
            <div class="summary--subtotal">
               <p>Subtotal</p>
               <p><?= ($cartItems) ? "₱ " . number_format($totalPrice) : "—"; ?></p>
            </div>

            <div class="summary--shipping-fee">
               <p>Shipping Fee</p>
               <p>Free</p>
            </div>

            <div class="summary--hori-line"></div>

            <div class="summary--total">
               <p>Total</p>
               <p><?= ($cartItems) ? "₱ " . number_format($totalPrice) : "—"; ?></p>
            </div>

            <div class="summary--hori-line"></div>

            <button class="summary--checkout-button">Checkout</button>
         </section>
      </form>
      <!-- END OF CART SUMMARY -->

      <!-- START OF FOOTER SECTION -->
      <?php include './includes/footer.php' ?>
      <!-- END OF FOOTER SECTION -->
   </main>
</body>

</html>