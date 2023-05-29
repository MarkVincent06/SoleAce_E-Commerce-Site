<nav>
   <a href="./index.php" class="business-logo-container">
      <img class="business-logo" src="./img/business-logo.png" alt="An image of a business logo">
   </a>

   <ul class="categories">
      <li>
         New & Featured

         <ul class="dropdown-menu">
            <li><a href="sub-category.php?category=new">New Arrivals</a></li>
            <li><a href="sub-category.php?category=featured">Featured Shoes</a></li>
         </ul>
      </li>

      <li>
         Men

         <ul class="dropdown-menu">
            <li><a href="sub-category.php?category=men&subcat=all">All Shoes For Men</a></li>
            <?php
            $subCategories = getAllActive('sub_categories');

            if (mysqli_num_rows($subCategories) > 0) {
               foreach ($subCategories as $item) :
                  if ($item['category'] === "men") {
            ?>
                     <li><a href="sub-category.php?category=men&subcat=<?= $item['name'] ?>"><?= $item['name'] ?></a></li>
            <?php
                  }
               endforeach;
            }
            ?>
         </ul>
      </li>
      <li>
         Women

         <ul class="dropdown-menu">
            <li><a href="sub-category.php?category=women&subcat=all">All Shoes For Women</a></li>
            <?php
            foreach ($subCategories as $item) :
               if ($item['category'] === "women") {
            ?>
                  <li><a href="sub-category.php?category=women&subcat=<?= $item['name'] ?>"><?= $item['name'] ?></a></li>
            <?php
               }
            endforeach;
            ?>
         </ul>
      </li>
      <li>
         Kids

         <ul class="dropdown-menu">
            <li><a href="sub-category.php?category=kid&subcat=all">All Shoes For Kids</a></li>

            <?php
            foreach ($subCategories as $item) :
               if ($item['category'] === "kid") {
            ?>
                  <li><a href="sub-category.php?category=kid&subcat=<?= $item['name'] ?>"><?= $item['name'] ?></a></li>
            <?php
               }
            endforeach;
            ?>
         </ul>
      </li>
   </ul>

   <?php
   if (isset($_SESSION['auth'])) {
   ?>
      <div class="account-logged-in">
         <h3 class="username">Hi, <?= $_SESSION['authUser']['username'] ?></h3>

         <div class="account-dropdown-menu">
            <a href="./my-orders.php" class="sign-out-link">My Orders</a>
            <a href="./sign-out.php" class="sign-out-link">Sign Out</a>
         </div>
      </div>
   <?php
   } else {
   ?>
      <a class="sign-in-link" href="sign-in.php">
         <h3>Sign in</h3>
      </a>
   <?php
   };
   ?>

   <?php
   if (isset($_SESSION['auth'])) {
      $cartItems = getCartItems();
   }
   ?>
   <a href="./cart.php" class="shopping-cart-link" id="shopping-cart-link">
      <?php
      if (isset($_SESSION['auth']) && count($cartItems) > 0) :
      ?>
         <div class="number-of-items"><?= count($cartItems) ?> </div>
      <?php endif; ?>
      <i class="fa-solid fa-cart-shopping shopping-cart"></i>
   </a>

</nav>