<?php

include '../middleware/adminMiddleware.php';
include './includes/header.php';

if (isset($_GET['category'])) {
   $category = $_GET['category'];

   $products = getAll("products");

   if (mysqli_num_rows($products) > 0) {
      $newProducts = array();
      foreach ($products as $subCategory) {
         if ($subCategory['category'] == $category) {
            $newProducts[] = $subCategory;
         }
      }

      if (empty($newProducts)) {
         die("No records found. Please make a product.");
      }

      if ($newProducts[0]['category'] == 'men') {
         $categoryTitle = "Men's Shoes";
      } elseif ($newProducts[0]['category'] == 'women') {
         $categoryTitle = "Women's Shoes";
      } elseif ($newProducts[0]['category'] == 'kid') {
         $categoryTitle = "Kid's Shoes";
      }
   } else {
      die("No records found");
   }
}

?>

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4>All Products - <?= $categoryTitle ?></h4>
            </div>
            <div class="card-body" id="products-table">
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Subcategory</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Trending</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     for ($i = 0; $i < count($newProducts); $i++) :
                     ?>
                        <tr>
                           <td><?= ($i + 1) ?></td>
                           <td><?= $newProducts[$i]['name'] ?></td>
                           <?php
                           $result = getById("sub_categories", $newProducts[$i]['sub_category_id']);
                           $subcategoryData = mysqli_fetch_assoc($result);
                           ?>
                           <td><?= $subcategoryData['name'] ?></td>
                           <td>
                              <img src="../uploads/<?= $newProducts[$i]['image'] ?>" width="50px" height="50px" alt="Product image">
                           </td>
                           <td>
                              <?= $newProducts[$i]['status'] == '1' ? "Visible" : "Hidden"; ?>
                           </td>
                           <td>
                              <?= $newProducts[$i]['featured'] == '1' ? "Yes" : "No"; ?>
                           </td>
                           <td>
                              <?= $newProducts[$i]['trending'] == '1' ? "Yes" : "No"; ?>
                           </td>
                           <td>
                              <a href="edit-product.php?id=<?= $newProducts[$i]['id'] ?>" class="btn btn-primary">Edit</a>
                           </td>
                           <td>
                              <button type="button" class="btn btn-danger delete-product" value="<?= $newProducts[$i]['id'] ?>">Delete</button>
                           </td>
                        </tr>
                     <?php
                     endfor;
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <?php include './includes/footer.php' ?>