<?php

include '../middleware/adminMiddleware.php';
include './includes/header.php';

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="row">
            <div class="col-12 position-relative z-index-2">
               <div class="card card-plain mb-4">
                  <div class="card-body p-3">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="d-flex flex-column h-100">
                              <h2 class="font-weight-bolder mb-0">
                                 General Statistics
                              </h2>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-3 col-sm-5 mt-sm-0 mt-4">
                     <div class="card mb-2">
                        <div class="card-header p-3 pt-2">
                           <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                              <i class="material-icons opacity-10">weekend</i>
                           </div>
                           <div class="text-end pt-1">
                              <?php
                              $usersData = getAll("users");
                              $users = mysqli_fetch_all($usersData, MYSQLI_ASSOC)

                              ?>
                              <p class="text-sm mb-0">No. of Users</p>
                              <h4 class="mb-0"><?= count($users) ?></h4>
                           </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                           <p class="mb-0">
                              <span class="text-success text-sm font-weight-bolder">+55% </span>than last week
                           </p>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3 col-sm-5 mt-sm-0 mt-4">
                     <div class="card mb-2">
                        <div class="card-header p-3 pt-2">
                           <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                              <i class="material-icons opacity-10">leaderboard</i>
                           </div>
                           <div class="text-end pt-1">
                              <?php
                              $subCategoriesData = getAll("sub_categories");
                              $subCategories = mysqli_fetch_all($subCategoriesData, MYSQLI_ASSOC)
                              ?>
                              <p class="text-sm mb-0">No. of Subcategories</p>
                              <h4 class="mb-0"><?= count($subCategories) ?></h4>
                           </div>
                        </div>

                        <hr class="dark horizontal my-0" />
                        <div class="card-footer p-3">
                           <p class="mb-0">
                              <span class="text-success text-sm font-weight-bolder">+3% </span>than last month
                           </p>
                        </div>
                     </div>
                  </div>


                  <div class="col-lg-3 col-sm-5 mt-sm-0 mt-4">
                     <div class="card mb-2">
                        <div class="card-header p-3 pt-2 bg-transparent">
                           <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                              <i class="material-icons opacity-10">store</i>
                           </div>
                           <div class="text-end pt-1">
                              <?php
                              $productsData = getAll("products");
                              $products = mysqli_fetch_all($productsData, MYSQLI_ASSOC)
                              ?>
                              <p class="text-sm mb-0">No. of Products</p>
                              <h4 class="mb-0"><?= count($products) ?></h4>
                           </div>
                        </div>
                        <hr class="horizontal my-0 dark" />
                        <div class="card-footer p-3">
                           <p class="mb-0">
                              <span class="text-success text-sm font-weight-bolder">+1% </span>than yesterday
                           </p>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3 col-sm-5 mt-sm-0 mt-4">
                     <div class="card">
                        <div class="card-header p-3 pt-2 bg-transparent">
                           <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                              <i class="material-icons opacity-10">person_add</i>
                           </div>
                           <div class="text-end pt-1">
                              <?php
                              $ordersData = getPendingOrders();
                              ?>
                              <p class="text-sm mb-0">Pending Orders</p>
                              <h4 class="mb-0"><?= mysqli_num_rows($ordersData) ?></h4>
                           </div>
                        </div>

                        <hr class="horizontal my-0 dark" />
                        <div class="card-footer p-3">
                           <p class="mb-0">Just updated</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php include './includes/footer.php' ?>