<?php

include 'functions/myFunctions.php';

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

   <!-- CUSTOM JS -->
   <script src="./js/custom.js" type="module"></script>

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

            <?php
            $featuredProducts = getFeaturedActive("products", 6);

            foreach ($featuredProducts as $product) :
            ?>
               <div class="product-container">
                  <a class="more-details-link" href="product-view.php?product=<?= $product['slug'] ?>">
                     <img class="product--image" src="./uploads/<?= $product['image'] ?>" />
                     <h3 class="product--name"><?= $product['name'] ?></h3>
                     <p class="product--sub-category">
                        <?php
                        if ($product['subcategory_name'] === "Boys" || $product['subcategory_name'] === "Girls") {
                           echo "Kid's Shoes";
                        } elseif ($product['subcategory_name'] === "Sneakers") {
                           echo ucfirst($product['category']) . "'s " . $product['subcategory_name'];
                        } else {
                           echo ucfirst($product['category']) . "'s " . $product['subcategory_name'] . " Shoes";
                        }
                        ?>
                     </p>

                     <?php
                     $tagName = null;
                     $tagType = null;
                     if ($product['quantity']) {
                        if ($product['featured'] && $product['trending']) {
                           $tagType = "product--tag featured-trending";
                           $tagName = "FEATURED & HOT";
                        } elseif ($product['featured']) {
                           $tagType = "product--tag featured";
                           $tagName = "FEATURED";
                        } else if ($product['trending']) {
                           $tagType = "product--tag trending";
                           $tagName = "HOT";
                        }
                     } else {
                        $tagType = "product--tag soldout";
                        $tagName = "SOLD OUT";
                     }
                     ?>

                     <?php if ($tagType && $tagName) : ?>
                        <p class="<?= $tagType ?>"><?= $tagName ?></p>
                     <?php endif; ?>

                     <!-- <i class="fa-regular fa-heart product--wishlist-btn"></i> -->
                  </a>
                  <div class="product-selection">
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
                  <p class="product--selling-price">₱ <?= number_format($product['selling_price']) ?> <?php if ($product['original_price'] > $product['selling_price']) : ?><span class="product--original-price">₱ <?= number_format($product['original_price']) ?></span> <?php endif; ?></p>
                  <div class="product--buttons-container">
                     <button class="product--button" style="background-color: #F6BF31;">BUY NOW<i class="fa-solid fa-money-bills" style="margin-left: 7px"></i></button>
                     <button class="product--button add-to-cart-btn" style="background-color: #BB0000;" value="<?= $product['id'] ?>">ADD TO CART<i class="fa-solid fa-cart-plus" style="margin-left: 7px"></i></button>
                  </div>
               </div>
            <?php endforeach; ?>

         </form>
      </section>
      <!-- END OF FEATURED PRODUCTS -->

      <!-- START OF NEW PRODUCTS SECTION -->
      <section class=" new-products-container">
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
            <a href="sub-category.php?category=new" class="new-products--button">SHOP NOW</a>
         </div>
      </section>
      <!-- END OF NEW PRODUCTS SECTION -->
   </main>

   <!-- START OF FOOTER SECTION -->
   <?php include './includes/footer.php' ?>
   <!-- END OF FOOTER SECTION -->
</body>

</html>