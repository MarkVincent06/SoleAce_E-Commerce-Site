<?php

include './includes/header.php';
include '../middleware/adminMiddleware.php';

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <?php
         if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $subCategory = getById('sub_categories', $id);

            if (mysqli_num_rows($subCategory) > 0) {
               $data = mysqli_fetch_array($subCategory);
         ?>
               <div class="card">
                  <div class="card-header">
                     <h4>
                        Edit Subcategory
                        <a href="sub-category.php?category=<?= $data['category'] ?>" class="btn btn-primary float-end">Back</a>
                     </h4>
                  </div>
                  <div class="card-body">
                     <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="sub-category-id" value="<?= $data['id'] ?>">

                        <div class="row mb-2">
                           <div class="col-md-6">
                              <label class="mb-0" for="name">Name</label>
                              <input value="<?= $data['name'] ?>" type="text" class="form-control" id="name" name="name" placeholder="Enter sub-category name">
                           </div>
                           <div class="col-md-6">
                              <label class="mb-0" for="name">Category</label>
                              <select class="form-select form-control" aria-label="Default select example" name="category">
                                 <?php
                                 $categories = ["men", "women", "kid"];
                                 foreach ($categories as $category) :
                                    $selectedCategory = ($category === $data['category']) ? "selected" : "";
                                 ?>
                                    <option <?= $selectedCategory ?> value="<?= $category ?>"><?= ucfirst($category) ?>'s Shoes</option>
                                 <?php
                                 endforeach
                                 ?>
                              </select>
                           </div>
                        </div>

                        <div class="row mb-2">
                           <div class="col-md-6">
                              <label class="mb-0" for="status">Status</label> </br>
                              <input <?= $data['status'] ? "checked" : "" ?> type="checkbox" id="status" name="status">
                           </div>
                        </div>

                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary" name="update-sub-category">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
         <?php
            } else {
               echo "Subcategory not found";
            }
         } else {
            echo "Id missing from url";
         }
         ?>
      </div>
   </div>

   <?php include './includes/footer.php' ?>