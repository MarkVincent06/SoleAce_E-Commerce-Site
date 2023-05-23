<?php

include '../middleware/adminMiddleware.php';
include './includes/header.php';

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
      echo "No records found";
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
                        <th>Edit</th>
                        <th>Delete</th>
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
                              <a href="edit-sub-category.php?id=<?= $newSubCategories[$i]['id'] ?>" class="btn btn-primary">Edit</a>
                           </td>
                           <td>
                              <button type="button" class="btn btn-danger delete-sub-category" value="<?= $newSubCategories[$i]['id'] ?>">Delete</button>
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