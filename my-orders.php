<?php

include 'functions/myFunctions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/my-orders.css">
   <link rel="stylesheet" href="./styles/navigation.css">
   <link rel="stylesheet" href="styles/footer.css">

   <!-- GOOGLE FONTS LINK -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;600;700;900&display=swap" rel="stylesheet">

   <!-- FONTAWESOME CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- JQUERY MINIFIED CDN -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

   <!-- CUSTOM JS -->
   <script src="./js/custom.js" type="module"></script>

   <!-- SWAL-TOAST-MESSAGE JS -->
   <script src="./js/swalToastMsg.js" type="module"></script>

   <!-- SWEETALERT CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

   <title>My Orders | SoleAce</title>
</head>

<body>
   <!-- This session will handle some toast messages -->
   <?php if (isset($_SESSION['swalToastMsg'])) : ?>
      <!-- THIS HIDDEN INPUT WILL BE USED IN JS -->
      <input id="toastMsg-input" type="hidden" value="<?php echo $_SESSION['swalToastMsg'];
                                                      unset($_SESSION['swalToastMsg']);
                                                      ?>">
   <?php endif ?>

   <!-- START OF NAV -->
   <?php include './includes/navigation.php' ?>
   <!-- END  OF NAV -->

   <main>
      <h1>My Orders</h1>
      <table class="content-table">
         <thead>
            <tr>
               <th>No.</th>
               <th>Tracking No.</th>
               <th>Total Price</th>
               <th>Payment Method</th>
               <th>Status</th>
               <th>Date</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php
            $orders = getOrders();

            if ($orders) :
               for ($i = 0; $i < count($orders); $i++) :
                  if ($orders[$i]['payment_method'] == "cod") {
                     $orders[$i]['payment_method'] = "Cash On Delivery";
                  }
            ?>
                  <tr>
                     <td><?= ($i + 1) ?></td>
                     <td><?= $orders[$i]['tracking_no'] ?></td>
                     <td>₱ <?= number_format($orders[$i]['total_price']) ?></td>
                     <td><?= $orders[$i]['payment_method'] ?></td>
                     <?php
                     if ($orders[$i]['status'] == 0) {
                        $status = "Pending";
                     } elseif ($orders[$i]['status'] == 1) {
                        $status = "Delivered";
                     } elseif ($orders[$i]['status'] == 2) {
                        $status = "Cancelled";
                     }
                     ?>
                     <td><?= $status ?></td>
                     <td><?= $orders[$i]['created_at'] ?></td>
                     <td><a class="view-button" href="view-order.php?t=<?= $orders[$i]['tracking_no'] ?>">View Details</a></td>
                  </tr>
               <?php
               endfor;
            else :
               ?>
               <tr>
                  <td colspan="6">It seems like you haven't placed any orders yet. Start exploring our products and make your first purchase today!</td>
               </tr>
            <?php endif; ?>
         </tbody>
      </table>
   </main>

   <!-- START OF FOOTER SECTION -->
   <?php include './includes/footer.php' ?>
   <!-- END OF FOOTER SECTION -->
</body>

</html>