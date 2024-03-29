<?php

include '../config/dbconn.php';
include '../functions/myFunctions.php';

if (isset($_POST['add-sub-category'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $category = $_POST['category'];
   $status = isset($_POST['status']) ?  '1' : '0';

   $subCategoryQuery = "INSERT INTO sub_categories (name, category, status) VALUES ('$name', '$category', '$status')";

   $subCategoryQueryRun = mysqli_query($conn, $subCategoryQuery);

   if ($subCategoryQueryRun) {
      redirect("add-sub-category.php", "top-end | 3000 | success | Subcategory added successfully! | 30em");
   } else {
      redirect("add-sub-category.php", "top-end | 3000 | error | Something went wrong. Please try again later. | 30em");
   }
} elseif (isset($_POST['update-sub-category'])) {
   $subCategoryId = mysqli_real_escape_string($conn, $_POST['sub-category-id']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);

   $status = isset($_POST['status']) ?  '1' : '0';

   $updateSubCategoryQuery = "UPDATE sub_categories SET name='$name', status='$status' WHERE id='$subCategoryId'";

   $updateSubCategoryQueryRun = mysqli_query($conn, $updateSubCategoryQuery);

   if ($updateSubCategoryQueryRun) {
      redirect("edit-sub-category.php?id=$subCategoryId", "top-end | 3000 | success | Subcategory updated successfully! | 30em");
   } else {
      redirect("edit-sub-category.php?id=$subCategoryId", "top-end | 3000 | error | Something went wrong. Please try again later. | 30em");
   }
} elseif (isset($_POST['deleteSubcategory'])) {
   $subCategoryId = mysqli_real_escape_string($conn, $_POST['subcategoryId']);

   $deleteSubCategoryQuery = "DELETE FROM sub_categories WHERE id='$subCategoryId'";

   $deleteSubCategoryQueryRun = mysqli_query($conn, $deleteSubCategoryQuery);

   if ($deleteSubCategoryQueryRun) {
      echo 200;
   } else {
      echo 500;
   }
} elseif (isset($_POST['add-product'])) {

   $subcategoryId = $_POST['subcategory-id'];
   $category = $_POST['category'];
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $slug = mysqli_real_escape_string($conn, $_POST['slug']);
   $smallDescription = mysqli_real_escape_string($conn, $_POST['small-description']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);
   $originalPrice = mysqli_real_escape_string($conn, $_POST['original-price']);
   $sellingPrice = mysqli_real_escape_string($conn, $_POST['selling-price']);
   $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
   $status = isset($_POST['status']) ?  '1' : '0';
   $featured = isset($_POST['featured']) ?  '1' : '0';
   $trending = isset($_POST['trending']) ?  '1' : '0';
   $metaTitle = mysqli_real_escape_string($conn, $_POST['meta-title']);
   $metaDescription = mysqli_real_escape_string($conn, $_POST['meta-description']);
   $metaKeywords = mysqli_real_escape_string($conn, $_POST['meta-keywords']);

   $image = $_FILES['image']['name'];

   $path = "../uploads";

   $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
   $filename = time() . '.' . $imageExtension;

   $productQuery = "INSERT INTO products (sub_category_id, category, name, slug, small_description, description, original_price, selling_price,
   quantity, status, featured, trending, meta_title, meta_description, meta_keywords, image) 
   VALUES ('$subcategoryId', '$category', '$name', '$slug', '$smallDescription', '$description', '$originalPrice', '$sellingPrice', '$quantity', '$status',
   '$featured', '$trending', '$metaTitle', '$metaDescription', '$metaKeywords', '$filename')";

   $productQueryRun = mysqli_query($conn, $productQuery);

   if ($productQueryRun) {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
      redirect("add-product.php", "top-end | 3000 | success | Product added succesfully. | 30em");
   } else {
      redirect("add-product.php", "top-end | 3000 | error | Something went wrong. Please try again later. | 30em");
   }
} elseif (isset($_POST['update-product'])) {
   $productId = $_POST['product-id'];
   $subcategoryId = $_POST['subcategory-id'];

   $category = $_POST['category'];
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $slug = mysqli_real_escape_string($conn, $_POST['slug']);
   $smallDescription = mysqli_real_escape_string($conn, $_POST['small-description']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);
   $originalPrice = mysqli_real_escape_string($conn, $_POST['original-price']);
   $sellingPrice = mysqli_real_escape_string($conn, $_POST['selling-price']);
   $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
   $status = isset($_POST['status']) ?  '1' : '0';
   $featured = isset($_POST['featured']) ?  '1' : '0';
   $trending = isset($_POST['trending']) ?  '1' : '0';
   $metaTitle = mysqli_real_escape_string($conn, $_POST['meta-title']);
   $metaDescription = mysqli_real_escape_string($conn, $_POST['meta-description']);
   $metaKeywords = mysqli_real_escape_string($conn, $_POST['meta-keywords']);

   $path = "../uploads";

   $newImage = $_FILES['image']['name'];
   $oldImage = $_POST['old-image'];

   if ($newImage != "") {
      $imageExtension = pathinfo($newImage, PATHINFO_EXTENSION);
      $updateFilename = time() . '.' . $imageExtension;
   } else {
      $updateFilename = $oldImage;
   }

   $updateProductQuery = "UPDATE products SET category='$category', sub_category_id='$subcategoryId', name='$name', slug='$slug', small_description='$smallDescription',
   description='$description', original_price='$originalPrice', selling_price='$sellingPrice', quantity='$quantity', status='$status',
   featured='$featured', trending='$trending', meta_title='$metaTitle', meta_description='$metaDescription', meta_keywords='$metaKeywords',
   image='$updateFilename' WHERE id='$productId'";

   $updateProductQueryRun = mysqli_query($conn, $updateProductQuery);

   if ($updateProductQueryRun) {
      if ($_FILES['image']['name'] != "") {
         move_uploaded_file($_FILES['image']['tmp_name'], $path . './' . $updateFilename);
         if (file_exists("../uploads/" . $oldImage)) {
            unlink("../uploads/" . $oldImage);
         }
      }
      redirect("edit-product.php?id=$productId", "top-end | 3000 | success | Product updated successfully! | 30em");
   } else {
      redirect("edit-product.php?id=$productId", "top-end | 3000 | error | Something went wrong. Please try again later. | 30em");
   }
} elseif (isset($_POST['deleteProduct'])) {
   $productId = $_POST['productId'];

   $productQuery = "SELECT * FROM products WHERE id='$productId'";
   $productQueryRun = mysqli_query($conn, $productQuery);
   $productData = mysqli_fetch_array($productQueryRun);
   $image = $productData['image'];

   $deleteProductQuery = "DELETE FROM products WHERE id='$productId'";
   $deleteProductQueryRun = mysqli_query($conn, $deleteProductQuery);

   if ($deleteProductQueryRun) {
      if (file_exists('../uploads/' . $image)) {
         unlink('../uploads/' . $image);
      }
      echo 200;
   } else {
      echo 500;
   }
} else {
   redirect("../index.php", "top-end | 4000 | error | You are not authorized to access this page. | 30em");
}
