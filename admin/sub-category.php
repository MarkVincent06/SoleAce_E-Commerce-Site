<?php

include './includes/header.php';
include '../middleware/adminMiddleware.php';

if (isset($_GET['category'])) {
   $category = $_GET['category'];

   $subCategories = getAll("sub_categories");

   if (mysqli_num_rows($subCategories) > 0) {
      $newSubCategories = array();
      foreach ($subCategories as $subCategory) {
         if ($subCategory['category'] == $category) {
            $newSubCategories[] = $subCategory;
         }
      }

      if (empty($newSubCategories)) {
         die("No records found. Please make a subcategory on this current category page.");
      }

      if ($newSubCategories[0]['category'] == 'men') {
         $categoryTitle = "Men's Shoes";
      } elseif ($newSubCategories[0]['category'] == 'women') {
         $categoryTitle = "Women's Shoes";
      } elseif ($newSubCategories[0]['category'] == 'kid') {
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
               <h4>All Subcategories - <?= $categoryTitle ?></h4>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     for ($i = 0; $i < count($newSubCategories); $i++) :
                     ?>
                        <tr>
                           <td><?= ($i + 1) ?></td>
                           <td><?= $newSubCategories[$i]['name'] ?></td>
                           <td>
                              <?= $newSubCategories[$i]['status'] == '1' ? "Visible" : "Hidden"; ?>
                           </td>
                           <td>
                              <div class="d-flex gap-3">
                                 <a href="edit-sub-category.php?id=<?= $newSubCategories[$i]['id'] ?>" class="btn btn-primary">Edit</a>
                                 <form action="code.php" method="POST">
                                    <input type="hidden" name="sub-category-id" value="<?= $newSubCategories[$i]['id'] ?>">
                                    <input type="hidden" name="category" value="<?= $newSubCategories[$i]['category'] ?>">
                                    <button type="submit" class="btn btn-danger" name="delete-sub-category">Delete</button>
                                 </form>
                              </div>
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