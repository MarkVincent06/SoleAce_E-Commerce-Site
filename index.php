<?php

include 'functions/myFunctions.php';
include './crudDB/getFeaturedProducts.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/index.css">
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

   <!-- ADD TO CART JS -->
   <script src="./js/add_to_cart.js" type="module"></script>

   <!-- SWAL-TOAST-MESSAGE JS -->
   <script src="./js/swalToastMsg.js" type="module"></script>

   <!-- SWEETALERT CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

   <title>Home | SoleAce</title>
</head>

<body>
   <!-- This session will handle some toast messages -->
   <?php if (isset($_SESSION['swalToastMsg'])) : ?>
      <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
      <input id="toastMsg-input" type="hidden" value="<?php echo $_SESSION['swalToastMsg'];
                                                      unset($_SESSION['swalToastMsg']);
                                                      ?>">
   <?php elseif (isset($_SESSION['swalToastMsg'])) : ?>
      <input id="toastMsg-input" type="hidden" value="<?php echo $_SESSION['swalToastMsg'];
                                                      unset($_SESSION['swalToastMsg']);
                                                      ?>">
   <?php endif ?>

   <!-- START OF NAV -->
   <?php include './includes/navigation.php' ?>
   <!-- END  OF NAV -->

   <main>
      <!-- START OF HERO -->
      <section class="hero">
         <h1 class="hero--slogan">Unleash Your Sole<br> Power With<br> <span>SoleAce</span></h1>
         <img class="hero--shoe-item" src="./img/hero-shoe-item.png" alt="A picture of a big shoe">
      </section>
      <!-- END OF HERO -->

      <!-- START OF FEATURED PRODUCTS -->
      <section class="featured-container">
         <h2 class="featured--title">FEATURED ITEMS</h2>

         <form class="products-container" method="POST">

            <?php foreach ($featured_products as $product) : ?>
               <div class="product-container">

                  <!-- This hidden input is will store the id of the product and will be used for buying/adding to cart -->
                  <input class="hidden-product-id" type="hidden" value="<?php echo $product['shoe_id'] ?>">

                  <img class="product--image" src="<?php echo $product['shoe_image_src'] ?>" />
                  <h3 class="product--name"><?php echo $product['shoe_name'] ?></h3>
                  <p class="product--category"><?php echo $product['shoe_category'] ?></p>
                  <div class="product-selection">
                     <label for="product-size">Size</label>
                     <select name="product-size" id="product-size">
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                     </select>
                  </div>
                  <p class="product--price">₱ <?php echo $product['shoe_price'] ?></p>
                  <div class="product--buttons-container">
                     <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                     <button class="product--button add-to-cart-btn" style="background-color: #BB0000;">ADD TO CART</button>
                  </div>
               </div>
            <?php endforeach; ?>

         </form>
      </section>
      <!-- END OF FEATURED PRODUCTS -->

      <!-- START OF NEW PRODUCTS SECTION -->
      <section class="new-products-container">
         <div class="new-products-subcontainer">
            <h2 class="new-products--title">NEW ITEMS</h2>
            <div class="new-products--images-container">
               <?php
               $newProducts = getNewestActive('products', 4);
               foreach ($newProducts as $item) :
               ?>
                  <img src="./uploads/<?= $item['image'] ?>" alt="A picture of a product">
               <?php
               endforeach;
               ?>
            </div>
            <button class="new-products--button">SHOP NOW</button>
         </div>
      </section>
      <!-- END OF NEW PRODUCTS SECTION -->
   </main>

   <!-- START OF FOOTER SECTION -->
   <?php include './includes/footer.php' ?>
   <!-- END OF FOOTER SECTION -->
</body>

</html>