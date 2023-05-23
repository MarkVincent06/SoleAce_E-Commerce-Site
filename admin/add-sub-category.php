<?php

include '../middleware/adminMiddleware.php';
include './includes/header.php';

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4>Add Subcategory</h4>
            </div>
            <div class="card-body">
               <form action="code.php" method="POST" enctype="multipart/form-data">
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="mb-0" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter sub-category name">
                     </div>
                     <div class="col-md-6">
                        <label class="mb-0" for="name">Category</label>
                        <select class="form-select form-control" aria-label="Default select example" name="category">
                           <option selected>Please choose a category</option>
                           <option value="men">Men's Shoes</option>
                           <option value="women">Women's Shoes</option>
                           <option value="kid">Kid's Shoes</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="mb-0" for="status">Status</label> </br>
                        <input type="checkbox" id="status" name="status">
                     </div>
                  </div>

                  <small class="mb-2 d-inline-block text-danger"><i class="fa-solid fa-circle-exclamation me-1"></i>Once you add this subcategory, you won't be able to change it's category.</small>

                  <div class="col-md-12">
                     <button type="submit" class="btn btn-primary" name="add-sub-category">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <?php include './includes/footer.php' ?>