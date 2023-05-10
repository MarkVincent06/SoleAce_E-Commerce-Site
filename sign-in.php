<?php session_start(); ?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/sign-in.css">

   <!-- GOOGLE FONTS LINK -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <!-- FONTAWESOME CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- JQUERY MINIFIED CDN -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

   <!-- VALIDATION JS -->
   <script src="./js/signin_validation.js" defer></script>

   <!-- SUCCESS-TOAST-MESSAGE-2 JS -->
   <script src="./js/showSuccessToastMsg2.js"></script>

   <!-- ERROR-TOAST-MESSAGE JS -->
   <script src="./js/showErrorToastMsg.js"></script>

   <!-- SWEETALERT CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>


   <title>SoleAce - Sign in</title>
</head>

<body>
   <!-- This session will handle the toast messages -->
   <?php if (isset($_SESSION['errorToastMsg'])) : ?>
      <input id="hidden-input" type="hidden" value="<?php echo $_SESSION['errorToastMsg'];
                                                      unset($_SESSION['errorToastMsg']); ?>">
   <?php elseif (isset($_SESSION['successToastMsg2'])) : ?>
      <input id="hidden-input" type="hidden" value="<?php echo $_SESSION['successToastMsg2'];
                                                      unset($_SESSION['successToastMsg2']); ?>">
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

   <!-- START OF SIGNIN FORM -->
   <main>
      <form action="./functions/authcode.php" method="POST" class="signin-container" id="signin-form">
         <h1 class="form-title">Sign in</h1>

         <!-- EMAIL INPUT -->
         <div class="text-input-container form-control">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php if (isset($_SESSION['lastEmailEntered'])) {
                                                                  echo $_SESSION['lastEmailEntered'];
                                                                  unset($_SESSION['lastEmailEntered']);
                                                               } ?>" placeholder="Enter email address">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <!-- PASSWORD INPUT -->
         <div class="password-input-container form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter password">
            <div class="alert-container">
               <i class="fa-solid fa-exclamation"></i>
               <small></small>
            </div>
         </div>

         <button type="submit" class="signin-btn" name="signin">Sign in</button>

         <p class="account-action">Don't have an account? <a href="./sign-up.php">Sign up</a></p>
      </form>
   </main>
   <!-- END OF SIGNIN FORM -->

</body>

</html>