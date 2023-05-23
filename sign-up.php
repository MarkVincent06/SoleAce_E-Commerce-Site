<?php

include './functions/myFunctions.php';

if (isset($_SESSION['auth'])) {
   redirect("index.php", "top-end | 5000 | warning | You are already logged in. Please continue using the site. | 30em");
}


?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/sign-up.css">
   <link rel="stylesheet" href="styles/footer.css">


   <!-- GOOGLE FONTS LINK -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <!-- FONTAWESOME CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- JQUERY MINIFIED CDN -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

   <!-- VALIDATION JS -->
   <script src="./js/signup_validation.js" defer></script>

   <!-- SWAL-TOAST-MESSAGE JS -->
   <script src="./js/swalToastMsg.js" type="module"></script>

   <!-- SWEETALERT CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

   <title>Sign up | SoleAce</title>
</head>

<body>
   <!-- This session will display an error message if the email already exist in the db -->
   <?php if (isset($_SESSION['swalToastMsg'])) : ?>
      <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
      <input id="toastMsg-input" type="hidden" value="<?php echo $_SESSION['swalToastMsg'];
                                                      unset($_SESSION['swalToastMsg']); ?>">
   <?php endif ?>

   <!-- START OF LOGO NAV -->
   <nav>
      <div class="business-logo-container">
         <a href="./index.php">
            <img class="business-logo" src="./img/business-logo.png" alt="An image of a business logo">
         </a>
      </div>
   </nav>
   <!-- END OF LOGO NAV -->

   <!-- START OF SIGNUP FORM -->
   <main>
      <form action="./functions/authcode.php" method="POST" class="signup-container" id="signup-form">
         <h1 class="form-title">Create account</h1>

         <!-- FIRST NAME INPUT -->
         <div class="text-input-container form-control">
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" placeholder="Enter first name">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <!-- LAST NAME INPUT -->
         <div class="text-input-container form-control">
            <label for="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname" placeholder="Enter last name">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <!-- EMAIL INPUT -->
         <div class="text-input-container form-control">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter email address">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <!-- NUMBER INPUT -->
         <div class="number-input-container form-control">
            <label for="phone">Phone number</label>
            <input type="number" name="phone" id="phone" placeholder="Enter phone number">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <!-- PASSWORD INPUT -->
         <div class="password-input-container form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter password">
            <small class="password-tip"><i class="fa-solid fa-lightbulb"></i>Password must contain at least 6 characters</small>
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <!-- CONFIRM PASSWORD INPUT -->
         <div class="password-input-container form-control">
            <label for="confirm-password">Confirm password</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Re-enter password">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <button type="submit" class="signup-btn" name="signup">Sign up</button>

         <p class="account-action">Already have an account? <a href="./sign-in.php">Sign in</a></p>
      </form>
   </main>
   <!-- END OF SIGNUP FORM -->

   <!-- START OF FOOTER SECTION -->
   <?php include './includes/footer.php' ?>
   <!-- END OF FOOTER SECTION -->

</body>

</html>