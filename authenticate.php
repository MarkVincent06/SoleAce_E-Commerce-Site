<?php

if (!isset($_SESSION['auth'])) {
   redirect("sign-in.php", "top-end | 5000 | info | Oops! It looks like you're not signed in. Please sign in to use this feature. | 32em");
}
