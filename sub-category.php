<?php

include 'functions/myFunctions.php';

$categoryTitle = null;
$category = null;
$subcategory = null;
if (isset($_GET['category'])) {
   $category = $_GET['category'];
   if ($category === "new") {
      $categoryTitle = "New Arrivals";
   } elseif ($category === "featured") {
      $categoryTitle = "Featured Shoes";
   } else {
      if (isset($_GET['subcat'])) {
         $subcategory = $_GET['subcat'];

         $subCategoriesData = getAllActive("sub_categories");
         $subCategories = mysqli_fetch_all($subCategoriesData, MYSQLI_ASSOC);

         if ($subcategory === "all" && $category === "men") {
            $categoryTitle = "All Shoes for Men";
         } elseif ($subcategory === "all" && $category === "women") {
            $categoryTitle = "All Shoes for Women";
         } elseif ($subcategory === "all" && $category === "kid") {
            $categoryTitle = "All Shoes for Kids";
         } else {
            foreach ($subCategories as $item) {
               if ($category === "men" && $subcategory === $item['name']) {
                  if ($item['name'] === "Sneakers") {
                     $categoryTitle = ucfirst($category) . "'s " . $item['name'];
                  } else {
                     $categoryTitle = ucfirst($category) . "'s " . $item['name'] . " Shoes";
                  }
                  break;
               } elseif ($category === "women" && $subcategory === $item['name']) {
                  if ($item['name'] === "Sneakers") {
                     $categoryTitle = ucfirst($category) . "'s " . $item['name'];
                  } else {
                     $categoryTitle = ucfirst($category) . "'s " . $item['name'] . " Shoes";
                  }
                  break;
               } elseif ($category === "kid" && $subcategory === $item['name']) {
                  if ($item['name'] === "Boys" || $item['name'] === "Girls") {
                     $categoryTitle = $item['name'] . "' " . "Shoes";
                  } else {
                     $categoryTitle = ucfirst($category) . "'s " . $item['name'] . " Shoes";
                  }
                  break;
               }
            }
         }
      }
   }
} else {
   redirect('index.php', "top-end | 3000 | error | Cannot find category. | 30em");
}

if ($categoryTitle == null) {
   redirect('index.php', "top-end | 3000 | error | Cannot find what you're looking for. | 30em");
} else {
   if ($category === "men" || $category === "women" || $category === "kid") {
      $newSubCategories = array();
      foreach ($subCategories as $item) {
         if ($item['category'] == $_GET['category']) {
            $newSubCategories[] = $item;
         }
      }

      if (empty($newSubCategories)) {
         die("No records found.");
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/sub-category.css">
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

   <!-- SORTING JS -->
   <script src="./js/sort.js" type="module" defer></script>

   <!-- SWAL-TOAST-MESSAGE JS -->
   <script src="./js/swalToastMsg.js" type="module"></script>

   <!-- SWEETALERT CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

   <title><?= $categoryTitle ?> | SoleAce</title>
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

   <!-- START OF MAIN SECTION -->
   <main>
      <div class="subcategories">
         <ul class="subcategories--links">
            <?php if ($category === "new" || $category === "featured") : ?>
               <li><a href="sub-category.php?category=new" class="<?= $category === "new" ? "active" : "" ?>">New Arrivals</a></li>
               <li><a href="sub-category.php?category=featured" class="<?= $category === "featured" ? "active" : "" ?>">Featured Shoes</a></li>
            <?php else : ?>
               <li><a href="sub-category.php?category=<?= $newSubCategories[0]['category'] ?>&subcat=all" class="<?= $subcategory === "all" ? "active" : "" ?>">All Shoes For <?= ucfirst($newSubCategories[0]['category']) ?></a></li>
               <?php foreach ($newSubCategories as $item) : ?>
                  <li><a href="sub-category.php?category=<?= $item['category'] ?>&subcat=<?= $item['name'] ?>" class="<?= $subcategory === $item['name'] ? "active" : "" ?>"><?= $item['name'] ?></a></li>
               <?php endforeach; ?>
            <?php endif; ?>
         </ul>
      </div>

      <section class="subcategory-container">
         <div class="subcategory--header">
            <h2 class="subcategory--header-title"><?= $categoryTitle ?> <span>[9]</span></h2>
            <div class="sort">
               <h3>Sort By: </h3>
               <select name="sort-type" id="sort-input">
                  <option value="newest">Newest</option>
                  <option value="featured">Featured</option>
                  <option value="price-high-low">Price: High-Low</option>
                  <option value="price-low-high">Price: Low-High</option>
               </select>
            </div>
         </div>

         <form class="products-container" method="POST">

            <div class="product-container">
               <img class="product--image" src="./uploads/product1.png" />
               <h3 class="product--name">Sample Name</h3>
               <p class="product--category">Sample subcategory</p>
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
               <p class="product--price">₱ 12000</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button add-to-cart-btn" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>
            <div class="product-container">
               <img class="product--image" src="./uploads/product1.png" />
               <h3 class="product--name">Sample Name</h3>
               <p class="product--category">Sample subcategory</p>
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
               <p class="product--price">₱ 12000</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button add-to-cart-btn" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>
            <div class="product-container">
               <img class="product--image" src="./uploads/product1.png" />
               <h3 class="product--name">Sample Name</h3>
               <p class="product--category">Sample subcategory</p>
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
               <p class="product--price">₱ 12000</p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button add-to-cart-btn" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>
            <div class="product-container">
               <img class="product--image" src="./uploads/product1.png" />
               <h3 class="product--name">Sample Name</h3>
               <p class="product--category">Sample subcategory</p>
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
               <p class="product--selling-price">₱ 12000 <span class="product--original-price">₱ 7580</span></p>
               <div class="product--buttons-container">
                  <button class="product--button" style="background-color: #F6BF31;">BUY NOW</button>
                  <button class="product--button add-to-cart-btn" style="background-color: #BB0000;">ADD TO CART</button>
               </div>
            </div>

         </form>
      </section>
   </main>
   <!-- END OF MAIN SECTION -->

   <!-- START OF FOOTER SECTION -->
   <?php include './includes/footer.php' ?>
   <!-- END OF FOOTER SECTION -->
</body>

</html>