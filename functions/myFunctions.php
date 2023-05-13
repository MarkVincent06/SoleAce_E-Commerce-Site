<?php

include '../config/dbconn.php';

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
