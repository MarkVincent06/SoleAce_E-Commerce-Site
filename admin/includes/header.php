<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>
      SoleAce - Dashboard
   </title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

   <!-- FONTAWESOME CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

   <!-- CSS Files -->
   <link id="pagestyle" href="assets/css/material-dashboard.min.css" rel="stylesheet" />

   <!-- JQUERY MINIFIED CDN -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

   <!-- SWAL-TOAST-MESSAGE JS -->
   <script src="./assets/js/swalToastMsg.js" type="module"></script>

   <!-- SWEETALERT CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

   <style>
      /* .nav-item:hover>.nav-link {
         background-color: red !important;
      } */

      .form-control {
         border: 1px solid #b3a1a1 !important;
         padding: 8px 10px;
      }
   </style>

</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- This session will handle toast messages -->
   <?php if (isset($_SESSION['swalToastMsg'])) : ?>
      <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
      <input id="toastMsg-input" type="hidden" value="<?php echo $_SESSION['swalToastMsg'];
                                                      unset($_SESSION['swalToastMsg']); ?>">
   <?php endif ?>

   <?php include 'sidebar.php'; ?>
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <?php include 'navbar.php'; ?>