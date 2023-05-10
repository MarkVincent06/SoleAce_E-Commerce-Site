<?php
session_start();

include '../config/dbconn.php';

if (isset($_POST['signup'])) {
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   // Insert user data in the database
   $insertQuery = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES ('$firstname' '$lastname', '$email', '$phone', '$password')";
   $insertQueryRun = mysqli_query($conn, $insertQuery);

   if ($insertQueryRun) {
      $SESSION['successToastMsg'] = "Signed up successfully! Please sign in again.";
      header('Location: ../sign-in.php');
   } else {
      die("Something went wrong!");
   }
}
