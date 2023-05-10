<?php
session_start();

include '../config/dbconn.php';

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
      $_SESSION['errorToastMsg'] = "Sorry, this email address is already registered within our system. Please use a different email or try signing in.";
      header('Location: ../sign-up.php');
   } else {
      // Insert user data in the database
      $insertQuery = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";
      $insertQueryRun = mysqli_query($conn, $insertQuery);

      if ($insertQueryRun) {
         $_SESSION['successToastMsg2'] = "Signed up successfully! Please sign in again.";
         header('Location: ../sign-in.php');
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
      echo "ACCOUNT FOUND!";
      // $_SESSION['auth'] = true;

      // $userdata = mysqli_fetch_array($loginQueryRun);
      // $username = $userdata['firstname'] . " " . $userdata['lastname'];
      // $email = $userdata['email'];

      // $_SESSION['authUser'] = [
      //    'username' => $username,
      //    'email' => $email,
      // ];

      // $_SESSION['successToastMsg2'] = "Signed in successfully! Welcome, " . $userdata['firstname'] . ".";
      // header('Location: ../index.php');
   } else {
      $_SESSION['errorToastMsg'] = "We were unable to log you in with that email and password. Please double-check your information and try again.";
      $_SESSION['lastEmailEntered'] = $email;
      header('Location: ../sign-in.php');
   }
}
