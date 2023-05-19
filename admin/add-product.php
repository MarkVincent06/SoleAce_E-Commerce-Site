<?php

include './includes/header.php';
include '../middleware/adminMiddleware.php';

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4>Add Product</h4>
            </div>
            <div class="card-body">
               <form action="code.php" method="POST" enctype="multipart/form-data">
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="mb-0" for="name">Category</label>
                        <select class="form-select form-control" aria-label="Default select example" name="category" name="category" id="category">
                           <option selected>Please choose a category</option>
                           <option value="men">Men's Shoes</option>
                           <option value="women">Women's Shoes</option>
                           <option value="kid">Kid's Shoes</option>
                        </select>
                     </div>
                     <div class="col-md-6">
                        <label class="mb-0" for="name">Subcategory</label>
                        <select class="form-select form-control" aria-label="Default select example" name="subcategory-id" id="subcategory" disabled="true">
                           <?php
                           $subCategories = getAll2("sub_categories");
                           ?>
                           <input type="hidden" id="subcategory-hidden-input" value='<?= json_encode($subCategories) ?>'>
                           <script>
                              $(document).ready(function() {
                                 $('#category').change(function() {
                                    var chosenCategory = $(this).val();
                                    if (chosenCategory != "") {
                                       $('#subcategory').prop('disabled', false);
                                       const subcategoriesJSON = $('#subcategory-hidden-input').val();
                                       const parsedSubcateories = JSON.parse(subcategoriesJSON);
                                       console.log(parsedSubcateories);
                                       $('#subcategory').empty();
                                       $('#subcategory').append($('<option>').text('Please choose a subcategory').attr('selected', true).attr('disabled', true));
                                       parsedSubcateories.map(item => {
                                          if (item.category == chosenCategory) {
                                             $('#subcategory').append($('<option>').text(item.name).attr('value', item.id));
                                          }
                                       })
                                    } else if ($(this).val() == "Please choose a category") {
                                       $('#subcategory').val(''); // clear any selected subcategory
                                       $('#subcategory').prop('disabled', true);
                                    } else {
                                       $('#subcategory').prop('disabled', true);
                                    }
                                 });
                              });
                           </script>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="mb-0" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                     </div>
                     <div class="col-md-6">
                        <label class="mb-0" for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" required>
                     </div>
                  </div>

                  <div class="col-md-12 mb-2">
                     <label class="mb-0" for="small-description">Small Description</label>
                     <textarea row="3" class="form-control" id="small-description" name="small-description" placeholder="Enter small description" required></textarea>
                  </div>

                  <div class="col-md-12 mb-2">
                     <label class="mb-0" for="description">Description</label>
                     <textarea row="3" class="form-control" id="description" name="description" placeholder="Enter description" required></textarea>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="mb-0" for="original-price">Original Price</label>
                        <input type="text" class="form-control" id="original-price" name="original-price" placeholder="Enter original price" required>
                     </div>
                     <div class="col-md-6">
                        <label class="mb-0" for="selling-price">Selling Price</label>
                        <input type="text" class="form-control" id="selling-price" name="selling-price" placeholder="Enter selling price" required>
                     </div>
                  </div>
                  <div class="col-md-12 mb-2">
                     <label class="mb-0" for="image">Upload Image</label>
                     <input type="file" class="form-control" id="image" name="image" required>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-3">
                        <label class="mb-0" for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
                     </div>
                     <div class="col-md-3">
                        <label class="mb-0" for="status">Status</label> </br>
                        <input type="checkbox" id="status" name="status">
                     </div>
                     <div class="col-md-3">
                        <label class="mb-0" for="featured">Feature Product</label> </br>
                        <input type="checkbox" id=" featured" name="featured">
                     </div>
                     <div class="col-md-3">
                        <label class="mb-0" for="trending">Trending</label> </br>
                        <input type="checkbox" id="trending" name="trending">
                     </div>
                  </div>
                  <div class="col-md-12 mb-2">
                     <label class="mb-0" for="meta-title">Meta Title</label>
                     <input type="text" class="form-control" id="meta-title" name="meta-title" placeholder="Enter meta title required">
                  </div>
                  <div class="col-md-12 mb-2">
                     <label class="mb-0" for="meta-description">Meta Description</label>
                     <textarea row="3" class="form-control" id="meta-description" name="meta-description" placeholder="Enter meta description" required></textarea>
                  </div>
                  <div class="col-md-12 mb-2">
                     <label class="mb-0" for="meta-keywords">Meta Keywords</label>
                     <textarea row="3" class="form-control" id="meta-keywords" name="meta-keywords" placeholder="Enter meta keywords" required></textarea>
                  </div>

                  <div class="col-md-12">
                     <button type="submit" class="btn btn-primary" name="add-product">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <?php include './includes/footer.php' ?>