<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
   <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../admin/index.php" target="_blank">
         <img src="assets/img/admin-logo.png" class="navbar-brand-img h-100" alt="main_logo">
         <span class="ms-1 font-weight-bold text-white">SoleAce - Admin</span>
      </a>
   </div>
   <hr class="horizontal light mt-0 mb-2">
   <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-secondary" href="../pages/dashboard.html">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">dashboard</i>
               </div>
               <span class="nav-link-text ms-1">First page</span>
            </a>
         </li>

         <!-- START OF SUBCATEGORIES SECTION -->
         <li class="nav-item">
            <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#sub-category-submenu" aria-controls="sub-category-submenu" aria-expanded="false" aria-label="Toggle navigation">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-layer-group"></i>
               </div>
               <span class="nav-link-text ms-1">All Categories</span>
            </a>
         </li>
         <ul class="nav collapse ms-2" id="sub-category-submenu">
            <li class="nav-item">
               <a class="nav-link text-white " href="sub-category.php?category=men">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-shop"></i>
                  </div>
                  <span class="nav-link-text ms-1">Men's Shoes</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white " href="sub-category.php?category=women">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-shop"></i>
                  </div>
                  <span class="nav-link-text ms-1">Women's Shoes</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white " href="sub-category.php?category=kid">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-shop"></i>
                  </div>
                  <span class="nav-link-text ms-1">Kid's Shoes</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white " href="add-sub-category.php">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-plus"></i>
                  </div>
                  <span class="nav-link-text ms-1">Add Subcategory</span>
               </a>
            </li>
         </ul>
         <!-- END OF SUBCATEGORIES SECTION -->

         <!-- START OF PRODUCTS SECTION -->
         <li class="nav-item">
            <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#product-submenu" aria-controls="product-submenu" aria-expanded="false" aria-label="Toggle navigation">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-tags"></i>
               </div>
               <span class="nav-link-text ms-1">All Products</span>
            </a>
         </li>
         <ul class="nav collapse ms-2" id="product-submenu">
            <li class="nav-item">
               <a class="nav-link text-white " href="products.php?category=men">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-shop"></i>
                  </div>
                  <span class="nav-link-text ms-1">Men's Shoes</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white " href="products.php?category=women">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-shop"></i>
                  </div>
                  <span class="nav-link-text ms-1">Women's Shoes</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white " href="products.php?category=kid">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-shop"></i>
                  </div>
                  <span class="nav-link-text ms-1">Kid's Shoes</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white " href="add-product.php">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="fa-solid fa-plus"></i>
                  </div>
                  <span class="nav-link-text ms-1">Add Product</span>
               </a>
            </li>
         </ul>
         <!-- END OF PRODUCTS SECTION -->
      </ul>
   </div>
   <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
         <a class="btn bg-gradient-primary mt-4 w-100" href="../sign-out.php" type="button">Sign out</a>
      </div>
   </div>
</aside>