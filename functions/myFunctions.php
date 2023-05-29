<?php

session_start();
include 'config/dbconn.php';

// ADMIN SIDE FUNCTIONS
function getAll($table)
{
   global $conn;
   $query = "SELECT * FROM $table";
   $queryRun = mysqli_query($conn, $query);
   return $queryRun;
}


function getAll2($table)
{
   global $conn;
   $query = "SELECT * FROM $table";
   $queryRun = mysqli_query($conn, $query);

   array_walk_recursive($queryRun, function (&$value) {
      $value = str_replace("'", "\'", $value);
   });
   return mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
}


function getById($table, $id)
{
   global $conn;
   $query = "SELECT * FROM $table WHERE id='$id'";
   $queryRun = mysqli_query($conn, $query);
   return $queryRun;
}

function getAllActive($table)
{
   global $conn;
   $query = "SELECT * FROM $table WHERE status='1'";
   $queryRun = mysqli_query($conn, $query);
   return $queryRun;
}


// USER SIDE FUNCTIONS
function getNewestActive($table, $limit)
{
   global $conn;
   $query = "SELECT sub_categories.name AS subcategory_name, sub_categories.status AS subcategory_status, $table.* FROM $table JOIN sub_categories ON products.sub_category_id = sub_categories.id WHERE sub_categories.status = 1 AND products.status = 1 ORDER BY created_at DESC, $table.featured DESC, $table.trending DESC LIMIT $limit";
   $queryRun = mysqli_query($conn, $query);
   $result = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
   return $result;
}

function getFeaturedActive($table, $limit)
{
   global $conn;
   $query = "SELECT sub_categories.name AS subcategory_name, sub_categories.status AS subcategory_status, $table.* FROM $table JOIN sub_categories ON products.sub_category_id = sub_categories.id WHERE $table.featured ='1' AND sub_categories.status = '1' AND products.status = '1' ORDER BY $table.featured DESC, $table.trending DESC, $table.created_at DESC LIMIT $limit";
   $queryRun = mysqli_query($conn, $query);
   $result = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
   return $result;
}

function getAllByCategoryActive($table, $category, $sortType)
{
   global $conn;
   if ($sortType === "featured") {
      $sortPhrase = "$table.featured DESC, $table.trending DESC, $table.created_at DESC";
   } elseif ($sortType === "newest") {
      $sortPhrase = "$table.created_at DESC";
   } elseif ($sortType === "price-high-low") {
      $sortPhrase = "$table.selling_price DESC";
   } elseif ($sortType === "price-low-high") {
      $sortPhrase = "$table.selling_price ASC";
   }
   $query = "SELECT sub_categories.name AS subcategory_name, sub_categories.status AS subcategory_status, $table.* FROM $table JOIN sub_categories ON products.sub_category_id = sub_categories.id WHERE $table.category ='$category' AND sub_categories.status = '1' AND products.status = '1' ORDER BY $sortPhrase";
   $queryRun = mysqli_query($conn, $query);
   $result = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
   return $result;
}

function getByCategoryAndSubcategoryActive($table, $category, $subcategory, $sortType)
{
   global $conn;
   if ($sortType === "featured") {
      $sortPhrase = "$table.featured DESC, $table.trending DESC, $table.created_at DESC";
   } elseif ($sortType === "newest") {
      $sortPhrase = "$table.created_at DESC";
   } elseif ($sortType === "price-high-low") {
      $sortPhrase = "$table.selling_price DESC";
   } elseif ($sortType === "price-low-high") {
      $sortPhrase = "$table.selling_price ASC";
   }
   $query = "SELECT sub_categories.name AS subcategory_name, sub_categories.status AS subcategory_status, $table.* FROM $table JOIN sub_categories ON products.sub_category_id = sub_categories.id WHERE $table.category ='$category' AND sub_categories.name = '$subcategory' AND sub_categories.status = '1' AND products.status = '1' ORDER BY $sortPhrase";
   $queryRun = mysqli_query($conn, $query);
   $result = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
   return $result;
}

function getSlugActive($table, $slug)
{
   global $conn;
   $query = "SELECT sub_categories.name AS subcategory_name, sub_categories.status AS subcategory_status, $table.* FROM $table JOIN sub_categories ON products.sub_category_id = sub_categories.id WHERE slug = '$slug' AND sub_categories.status = 1 AND products.status = 1 LIMIT 1";
   $queryRun = mysqli_query($conn, $query);
   $result = mysqli_fetch_array($queryRun);
   return $result;
}

function getCartItems()
{
   global $conn;
   $userId = $_SESSION['authUser']['userId'];
   $query = "SELECT c.id as cid, c.product_id, c.product_size, c.product_quantity, s.name as sname, p.id as pid, p.name as pname, p.category, p.image, p.selling_price FROM carts c, products p, sub_categories s WHERE c.product_id = p.id AND c.user_id ='$userId' AND p.sub_category_id = s.id AND s.status = 1 ORDER BY c.created_at DESC";
   $queryRun = mysqli_query($conn, $query);
   $result = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);
   return $result;
}

// ALL SIDE FUNCTIONS
function redirect($url, $message)
{
   $_SESSION['swalToastMsg'] = $message;
   header('Location: ' . $url);
   exit();
}
