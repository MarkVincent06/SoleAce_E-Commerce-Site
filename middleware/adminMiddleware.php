<?php
include '../functions/myFunctions.php';

if (isset($_SESSION['auth'])) {
   if ($_SESSION['roleAs'] != 1) {
      redirect("../index.php", "top-end | 4000 | warning | You are not authorized to access this page. | 32em");
   }
} else {
   redirect("../sign-in.php", "top-end | 5000 | info | It looks like you are trying to access the admin page. Please sign-in to continue. | 32em");
}
