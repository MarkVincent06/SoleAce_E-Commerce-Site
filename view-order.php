<?php

include 'functions/myFunctions.php';
include 'authenticate.php';

if (isset($_GET['t'])) {
   $trackingNo = $_GET['t'];

   $orderData = checkTrackingNoValid($trackingNo);

   if (mysqli_num_rows($orderData) === 0) {
      redirect("index.php", "top-end | 3000 | error | Tracking number does not exist! | 25em");
      die();
   }
} else {
   redirect("index.php", "top-end | 3000 | error | Something went wrong! | 25em");
   die();
}

$order = mysqli_fetch_array($orderData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSS LINK -->
   <link rel="stylesheet" href="./styles/view-order.css">
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

   <title>View Order | SoleAce</title>
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
      <div class="order-summary-header">
         <h1 class="order-summary-title">Order Summary</h1>
         <a class="back-button" href="my-orders.php">Back <i class="fa fa-reply" style="margin-left: 7px"></i></a>
      </div>
      <div class="container">

         <div class="delivery-details">
            <h2 class="order-title">Delivery Details</h2>
            <div class="form-group">
               <label for="name">Name:</label>
               <input type="text" id="name" value="<?= $order['name'] ?>" disabled>
            </div>
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="text" id="email" value="<?= $order['email'] ?>" disabled>
            </div>
            <div class="form-group">
               <label for="contact-no">Contact No:</label>
               <input type="text" id="contact-no" value="<?= $order['phone'] ?>" disabled>
            </div>
            <div class="form-group">
               <label for="contact-no">Tracking No:</label>
               <input type="text" id="contact-no" value="<?= $order['tracking_no'] ?>" disabled>
            </div>
            <div class="form-group">
               <label for="address">Address:</label>
               <input type="text" id="address" value="<?= htmlspecialchars($order['address']) ?>" disabled>
            </div>
            <div class="form-group">
               <label for="zip">Zip Code:</label>
               <input type="text" id="zip" value="<?= $order['zip_code'] ?>" disabled>
            </div>
            <div class="form-group">
               <label for="payment">Payment Method:</label>
               <?php
               if ($order['payment_method'] === "cod") {
                  $selectedPaymentMethod = "Cash on Delivery (COD)";
               } elseif ($order['payment_method'] === "card") {
                  $selectedPaymentMethod = "Credit/Debit Card";
               } elseif ($order['payment_method'] === "netbanking") {
                  $selectedPaymentMethod = "Net Banking";
               }
               ?>
               <input type="text" id="zip" value="<?= htmlspecialchars($selectedPaymentMethod) ?>" disabled>
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <?php
               if ($order['status'] == 0) {
                  $status = "Pending";
               } elseif ($order['status'] == 1) {
                  $status = "Delivered";
               } elseif ($order['status'] == 2) {
                  $status = "Cancelled";
               }
               ?>
               <input type="text" id="status" value="<?= $status ?>" disabled>
            </div>
         </div>

         <div class="order-items">
            <h2 class="order-title">Ordered Items</h2>
            <hr style="margin-bottom: 20px; margin-top: -10px">

            <?php
            $userId = $_SESSION['authUser']['userId'];

            $orderQuery = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, p.*, s.name as sname 
         FROM orders o, order_items oi, products p, sub_categories s 
         WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.product_id AND p.sub_category_id = s.id 
         AND o.tracking_no='$trackingNo'";
            $orderQueryRun = mysqli_query($conn, $orderQuery);
            $result = mysqli_fetch_all($orderQueryRun, MYSQLI_ASSOC);

            foreach ($result as $item) :
            ?>
               <div class="order-item">
                  <img src="./uploads/<?= $item['image'] ?>" alt="An image of a product">
                  <div class="item-details">
                     <h3 class="item-name"><?= $item['name'] ?></h3>
                     <p class="item-subcategory">
                        <?php
                        if ($item['sname'] === "Boys" || $item['sname'] === "Girls") {
                           echo "Kid's Shoes";
                        } elseif ($item['sname'] === "Sneakers") {
                           echo ucfirst($item['category']) . "'s " . $item['sname'];
                        } else {
                           echo ucfirst($item['category']) . "'s " . $item['sname'] . " Shoes";
                        }
                        ?>
                     </p>
                     <div class="item-selecton">
                        <p>Size: <?= $item['product_size'] ?></p>
                        <p>Quantity: <?= $item['product_quantity'] ?></p>
                     </div>
                     <p class="item-price">₱ <?= number_format($item['selling_price']) ?></p>
                  </div>
               </div>
            <?php endforeach ?>
            <hr style="margin-top: 20px;">
            <p class="total-price"><b>Total Price:</b> <span>₱ <?= number_format($order['total_price']) ?></span></p>

         </div>
      </div>

      <!-- START OF FOOTER SECTION -->
      <?php include './includes/footer.php' ?>
      <!-- END OF FOOTER SECTION -->
</body>

</html>