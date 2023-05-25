<?php

include '../config/dbconn.php';
include 'myFunctions.php';

if (isset($_POST['signup'])) {
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   // Checks if email already exists in the database
   $checkEmailQuery = "SELECT email FROM users WHERE email='$email'";
   $checkEmailQueryRun = mysqli_query($conn, $checkEmailQuery);

   if (mysqli_num_rows($checkEmailQueryRun) > 0) {
      redirect("../sign-up.php", "top-end | 5000 | error | Sorry, this email address is already registered within our system. Please use a different email or try signing in. | 32em");
   } else {
      // Insert user data in the database
      $insertQuery = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";
      $insertQueryRun = mysqli_query($conn, $insertQuery);

      if ($insertQueryRun) {
         redirect("../sign-in.php", "top-end | 3000 | success | Signed up successfully! Please sign in again. | 30em");
      } else {
         die("Something went wrong!");
      }
   }
} else if (isset($_POST['signin'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   $loginQuery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $loginQueryRun = mysqli_query($conn, $loginQuery);

   if (mysqli_num_rows($loginQueryRun) > 0) {

      $_SESSION['auth'] = true;

      $userdata = mysqli_fetch_array($loginQueryRun);
      $userId = $userdata['id'];
      $username = $userdata['firstname'];
      $email = $userdata['email'];
      $roleAs = $userdata['role_as'];

      $_SESSION['authUser'] = [
         'userId' => $userId,
         'username' => $username,
         'email' => $email,
      ];

      $_SESSION['roleAs'] = $roleAs;

      // this will redirect to the admin page if the information for admin is correct else will redirect to the client page
      if ($roleAs == 1) {
         redirect("../admin/index.php", "top-end | 3000 | success | Welcome back, admin! You have successfully logged in. | 34em");
      } else {
         redirect("../index.php", "top-end | 3000 | success | Signed in successfully! Welcome, " . $userdata['firstname'] . ". | 30em");
      }
   } else {
      $_SESSION['lastEmailEntered'] = $email;
      redirect("../sign-in.php", "top-end | 5000 | error | We were unable to log you in with that email and password. Please double-check your information and try again. | 32em");
   }
}
