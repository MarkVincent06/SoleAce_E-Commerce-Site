<?php

include 'config/dbconn.php';

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

function redirect($url, $message)
{
   $_SESSION['swalToastMsg'] = $message;
   header('Location: ' . $url);
   exit();
}
