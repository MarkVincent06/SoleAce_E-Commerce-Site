<?php

function redirect($url, $message)
{
   $_SESSION['swalToastMsg'] = $message;
   header('Location: ' . $url);
   exit();
}
