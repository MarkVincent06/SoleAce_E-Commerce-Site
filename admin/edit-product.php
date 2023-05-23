<?php

include '../middleware/adminMiddleware.php';
include './includes/header.php';

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <?php
         if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = getById('products', $id);

            if (mysqli_num_rows($product) > 0) {
               $data = mysqli_fetch_array($product);

               foreach ($data as &$value) {
                  if (is_string($value)) {
                     $value = str_replace("'", '"', $value);
                  }
               }
               unset($value);

         ?>
               <div class="card">
                  <div class="card-header">
                     <h4>
                        Edit Product
                        <a href="products.php?category=<?= $data['category'] ?>" class="btn btn-primary float-end">Back</a>
                     </h4>
                  </div>
                  <div class="card-body">
                     <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-2">
                           <div class="col-md-6">
                              <label class="mb-0" for="name">Category</label>
                              <select class="form-select form-control" aria-label="Default select example" name="category" id="category">
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
                           <div class="col-md-6">
                              <label class="mb-0" for="name">Subcategory</label>
                              <?php
                              $subCategories = getAll2("sub_categories");
                              ?>
                              <input type="hidden" id="subcategory-hidden-input" value='<?= json_encode($subCategories) ?>'>
                              <input type="hidden" id="product-hidden-input" value='<?= json_encode($data) ?>'>
                              <select class="form-select form-control" aria-label="Default select example" name="subcategory-id" id="subcategory">
                                 <script>
                                    $(document).ready(function() {
                                       $('#category').change(function() {
                                          let chosenCategory = $(this).val();

                                          const subcategoriesJSON = $('#subcategory-hidden-input').val();
                                          const parsedSubcateories = JSON.parse(subcategoriesJSON);
                                          const productJSON = $('#product-hidden-input').val();
                                          const parsedProduct = JSON.parse(productJSON);

                                          $('#subcategory').empty();
                                          parsedSubcateories.map(item => {
                                             if (item.category == chosenCategory && item.id == parsedProduct.sub_category_id) {
                                                $('#subcategory').append($('<option>').text(item.name).attr('value', item.id).attr('selected', true));
                                             } else if (item.category == chosenCategory) {
                                                $('#subcategory').append($('<option>').text(item.name).attr('value', item.id));
                                             }
                                          })
                                       }).trigger('change'); // add trigger method to execute the change listener function on page load
                                    });
                                 </script>
                              </select>
                           </div>
                        </div>

                        <input type="hidden" name="product-id" value="<?= $data['id'] ?>">

                        <div class="row mb-2">
                           <div class="col-md-6">
                              <label class="mb-0" for="name">Name</label>
                              <input value="<?= $data['name'] ?>" type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
                           </div>
                           <div class="col-md-6">
                              <label class="mb-0" for="slug">Slug</label>
                              <input value="<?= $data['slug'] ?>" type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" required>
                           </div>
                        </div>

                        <div class="col-md-12 mb-2">
                           <label class="mb-0" for="small-description">Small Description</label>
                           <textarea row="3" class="form-control" id="small-description" name="small-description" placeholder="Enter small description" required><?= $data['small_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                           <label class="mb-0" for="description">Description</label>
                           <textarea row="3" class="form-control" id="description" name="description" placeholder="Enter description" required><?= $data['description'] ?></textarea>
                        </div>

                        <div class="row mb-2">
                           <div class="col-md-6">
                              <label class="mb-0" for="original-price">Original Price</label>
                              <input value="<?= $data['original_price'] ?>" type="text" class="form-control" id="original-price" name="original-price" placeholder="Enter original price" required>
                           </div>
                           <div class="col-md-6">
                              <label class="mb-0" for="selling-price">Selling Price</label>
                              <input value="<?= $data['selling_price'] ?>" type="text" class="form-control" id="selling-price" name="selling-price" placeholder="Enter selling price" required>
                           </div>
                        </div>

                        <div class="col-md-12 mb-2">
                           <input type="hidden" name="old-image" value="<?= $data['image'] ?>">
                           <label class="mb-0" for="image">Upload Image</label>
                           <input type="file" class="form-control mb-1" id="image" name="image">
                           <label class="mb-0 me-1" for="image">Current Image:</label>
                           <img src="../uploads/<?= $data['image'] ?>" alt="Current image of a product" width="50px" height="50px">
                        </div>
                        <div class="row mb-2">
                           <div class="col-md-3">
                              <label class="mb-0" for="quantity">Quantity</label>
                              <input value="<?= $data['quantity'] ?>" type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
                           </div>
                           <div class="col-md-3">
                              <label class="mb-0" for="status">Status</label> </br>
                              <input <?= $data['status'] ? "checked" : "" ?> type="checkbox" id="status" name="status">
                           </div>
                           <div class="col-md-3">
                              <label class="mb-0" for="featured">Feature Product</label> </br>
                              <input <?= $data['featured'] ? "checked" : "" ?> type="checkbox" id=" featured" name="featured">
                           </div>
                           <div class="col-md-3">
                              <label class="mb-0" for="trending">Trending</label> </br>
                              <input <?= $data['trending'] ? "checked" : "" ?> type="checkbox" id="trending" name="trending">
                           </div>
                        </div>
                        <div class="col-md-12 mb-2">
                           <label class="mb-0" for="meta-title">Meta Title</label>
                           <input value="<?= $data['meta_title'] ?>" type="text" class="form-control" id="meta-title" name="meta-title" placeholder="Enter meta title required">
                        </div>
                        <div class="col-md-12 mb-2">
                           <label class="mb-0" for="meta-description">Meta Description</label>
                           <textarea row="3" class="form-control" id="meta-description" name="meta-description" placeholder="Enter meta description" required><?= $data['meta_description'] ?></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                           <label class="mb-0" for="meta-keywords">Meta Keywords</label>
                           <textarea row="3" class="form-control" id="meta-keywords" name="meta-keywords" placeholder="Enter meta keywords" required><?= $data['meta_keywords'] ?></textarea>
                        </div>

                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary" name="update-product">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
         <?php
            } else {
               echo "Product not found for given id";
            }
         } else {
            echo "Id missing from url";
         }
         ?>
      </div>
   </div>

   <?php include './includes/footer.php' ?>