<?php

session_start();

if (isset($_SESSION['auth'])) {
   unset($_SESSION['auth']);
   unset($_SESSION['authUser']);

   $_SESSION['swalToastMsg'] = "top-end | 3000 | success | Signed out successfully! | 30em";
}

header('Location: index.php');
