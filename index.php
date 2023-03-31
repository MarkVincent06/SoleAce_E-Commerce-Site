<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/index.css">

   <!-- GOOGLE FONTS LINK -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <title>Dashboard - SoleAce</title>
</head>

<body>
   <!-- START OF NAV -->
   <nav>
      <a href="#" class="business-logo-container">
         <img class="business-logo" src="./img/business-logo.png" alt="An image of a business logo">
      </a>

      <ul class="categories">
         <li><a href="#">New & Featured</a></li>
         <li><a href="#">Men</a></li>
         <li><a href="#">Women</a></li>
         <li><a href="#">Kids</a>
         </li>
      </ul>

      <a class="account-link" href="">
         <h3>My Account</h3>
      </a>

      <!-- WILL CHANGE THIS TO IMAGE TO ICON LATER -->
      <a href="" class="shopping-cart-link">
         <img src="./img/icons/shopping-cart.png" alt="An icon of a shopping cart">
      </a>
   </nav>
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

         <form class="products-container" method="post" onsubmit="return false;">

            <div class="product-container">
               <img class="product--image" src="./uploads/product1.png" />
               <h3 class="product--name">New Balance Fresh Foam</h3>
               <p class="product--category">Women's Running Shoes</p>
               <p class="product--price">₱ 4,620</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

            <div class="product-container">
               <img class="product--image" src="./uploads/product2.png" />
               <h3 class="product--name">Nike Legend Essential 2</h3>
               <p class="product--category">Men's Training Shoes</p>
               <p class="product--price">₱ 2,895</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

            <div class="product-container">
               <img class="product--image" src="./uploads/product3.png" />
               <h3 class="product--name">K.Swiss Defier</h3>
               <p class="product--category">Men's Training Shoes</p>
               <p class="product--price">₱ 3,210</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

            <div class="product-container">
               <img class="product--image" src="./uploads/product4.png" />
               <h3 class="product--name">Nike SuperRep Go</h3>
               <p class="product--category">Men's Training Shoes</p>
               <p class="product--price">₱ 2,715</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

            <div class="product-container">
               <img class="product--image" src="./uploads/product5.png" />
               <h3 class="product--name">New Balance REVLite 247</h3>
               <p class="product--category">Men's Training Shoes</p>
               <p class="product--price">₱ 4,235</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

            <div class="product-container">
               <img class="product--image" src="./uploads/product6.png" />
               <h3 class="product--name">Nike Free Metcon 4</h3>
               <p class="product--category">Women's Training Shoes</p>
               <p class="product--price">₱ 5,159</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

         </form>
      </section>
      <!-- END OF FEATURED PRODUCTS -->

      <!-- START OF NEW PRODUCTS SECTION -->
      <section class="new-products-container">
         <div class="new-products-subcontainer">
            <h2 class="new-products--title">NEW ITEMS</h2>
            <div class="new-products--images-container">
               <img src="./uploads/product7.png" alt="A picture of a product">
               <img src="./uploads/product8.png" alt="A picture of a product">
               <img src="./uploads/product9.png" alt="A picture of a product">
               <img src="./uploads/product10.png" alt="A picture of a product">
            </div>
            <button class="new-products--button">SHOP NOW</button>
         </div>
      </section>
      <!-- END OF NEW PRODUCTS SECTION -->
   </main>
</body>

</html>