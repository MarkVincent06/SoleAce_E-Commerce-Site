<nav>
   <a href="./index.php" class="business-logo-container">
      <img class="business-logo" src="./img/business-logo.png" alt="An image of a business logo">
   </a>

   <ul class="categories">
      <li>
         New & Featured

         <ul class="dropdown-menu">
            <li><a href="#">New Arrivals</a></li>
            <li><a href="#">Featured Shoes</a></li>
         </ul>
      </li>

      <li>
         Men

         <ul class="dropdown-menu">
            <li><a href="#">All Shoes For Men</a></li>
            <li><a href="#">Casual</a></li>
            <li><a href="#">Sneakers</a></li>
            <li><a href="#">Running</a></li>
         </ul>
      </li>
      <li>
         Women

         <ul class="dropdown-menu">
            <li><a href="#">All Shoes For Women</a></li>
            <li><a href="#">Casual</a></li>
            <li><a href="#">Sneakers</a></li>
            <li><a href="#">Running</a></li>
         </ul>
      </li>
      <li>
         Kids

         <ul class="dropdown-menu">
            <li><a href="#">All Shoes For Kids</a></li>
            <li><a href="#">Casual</a></li>
            <li><a href="#">Sneakers</a></li>
            <li><a href="#">Running</a></li>
         </ul>
      </li>
   </ul>

   <?php
   if (isset($_SESSION['auth'])) {
   ?>
      <div class="account-logged-in">
         <h3 class="username">Hi, <?= $_SESSION['authUser']['username'] ?></h3>

         <div class="account-dropdown-menu">
            <a href="./sign-out.php" class="sign-out-link">Sign out</a>
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



   <!-- WILL CHANGE THIS TO IMAGE TO ICON LATER -->
   <a href="./cart.php" class="shopping-cart-link">
      <i class="fa-solid fa-cart-shopping shopping-cart"></i>
   </a>
</nav>