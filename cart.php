<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/index.css">
   <link rel="stylesheet" href="./styles/cart.css">

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

            <div class="cart--product-container">
               <img src="./uploads/product10.png" alt="A picture of an item">
               <div class="cart--product-details">
                  <h3>Jordan Nu Retro 1 Low</h3>
                  <p>Men's Shoes</p>
                  <p>Black/Tour Yellow/White</p>
                  <div class="cart--product-selection">
                     <div>
                        <label for="product-size">Size</label>
                        <select name="product-size" id="product-size">
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                        </select>
                     </div>

                     <div>
                        <label for="product-quantity">Quantity</label>
                        <select name="product-quantity" id="product-quantity">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                        </select>
                     </div>
                  </div>
                  <a href="#"><i class="fa-regular fa-trash-can trashcan"></i></a>
               </div>
               <small class="cart--product-price">₱ 5,895.00</small>
            </div>

            <div class="cart--product-container">
               <img src="./uploads/product9.png" alt="A picture of an item">
               <div class="cart--product-details">
                  <h3>Nike Air Max SYSTEM</h3>
                  <p>Men's Shoes</p>
                  <p>White/ summit White/BlacK</p>
                  <div class="cart--product-selection">
                     <div>
                        <label for="product-size">Size</label>
                        <select name="product-size" id="product-size">
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                        </select>
                     </div>

                     <div>
                        <label for="product-quantity">Quantity</label>
                        <select name="product-quantity" id="product-quantity">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                        </select>
                     </div>
                  </div>
                  <a href="#"><i class="fa-regular fa-trash-can trashcan"></i></a>
               </div>
               <small class="cart--product-price">₱ 5,095.00</small>
            </div>

         </section>

         <section class="summary-container">
            <h2>SUMMARY</h2>
            <div class="summary--subtotal">
               <p>Subtotal</p>
               <p>₱ 10,990.00</p>
            </div>

            <div class="summary--shipping-fee">
               <p>Shipping Fee</p>
               <p>Free</p>
            </div>

            <div class="summary--hori-line"></div>

            <div class="summary--total">
               <p>Total</p>
               <p>₱ 10,990.00</p>
            </div>

            <div class="summary--hori-line"></div>

            <button class="summary--checkout-button">Checkout</button>
         </section>
      </form>
      <!-- END OF CART SUMMARY -->
   </main>
</body>

</html>