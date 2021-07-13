<?php
   session_start();

   if(isset($_SESSION['customer_id'])) {
      include_once './includes/db_conn_inc.php';

      $customerID = $_SESSION['customer_id'];
      $sql = "SELECT * FROM customer WHERE customer_id='$customerID'";
      $result = mysqli_query($conn, $sql);
      $checkResult = mysqli_num_rows($result);

      if($checkResult > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            $customerName = $row['customer_name'];
            $customerEmail = $row['customer_email'];
            $customerUsername = $row['customer_username'];
            $customerMobile = $row['customer_mobile'];
            $customerAddress = $row['customer_address'];
         }
      }
      echo '<!DOCTYPE html>
            <html lang="en">

               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <title>Profile</title>
               </head>

               <body>
                  <div class="header-container">
                     <header>
                        <nav>
                           <div class="name">
                              <h2>Weerasiri <span>Grocery Mart</span></h2>
                           </div>
                           <ul class="nav-links">
                              <li><a href="./customer_profile.php">Profile</a></li>
                              <li><a href="./cart.php" class="cart">Cart <img src="./icons/cart.svg" alt="cart"
                                       class="cart-img"></a></li>
                              <li><form action="./includes/logout_inc.php" method="POST" id="logout-form">
                              <button type="submit" name="submit" class="logout-btn" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                              </form></li>
                              </ul>
                           <img src="./icons/menu-black.svg" alt="menu" id="menu">
                           <img src="./icons/close.svg" alt="close" id="close">
                        </nav>
                     </header>
                  </div>';
                   if(isset($_GET['edit'])) {
                     $checkEdit = $_GET['edit'];

                     if($checkEdit == "success") {
                         echo "<div class='status-field'><p class='success edit-success'>Your account has been updated successfully</p></div>";
                        }
                     }
                     echo '<main>
                     <div class="content-container">
                        <div class="profile-container">
                           <div class="profile-content">
                              <h2 class="hello">Hello,</h2>
                              <h3>'.$_SESSION['customer_name'].'</h3>
                              <div class="buttons">
                                 <div class="btn-container btn1">
                                    <img src="./icons/fruit-basket.svg" alt="basket">
                                    <a href="Store.php">Start Shopping</a>
                                 </div>
                                 <div class="btn-container btn2">
                                    <img src="./icons/review.svg" alt="review">
                                    <a href="add_reviews.php">Add Review</a>
                                 </div>
                                 <div class="btn-container btn3">
                                    <img src="./icons/edit.svg" alt="edit">
                                    <a href="./includes/details_pdf.php">Details Report</a>
                                 </div>
                                 <div class="btn-container btn4">
                                    <img src="./icons/delete.svg" alt="delete">
                                    <a href="./includes/delete_profile_inc.php" name="submit" class="delete-btn" onclick="return confirm(\'Do you want to delete your account ?\')">Delete Account</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="order-container">
                           <div class="edit-form-container profile-details">
                              <h2 class="profile-title">Profile Details</h2>
                              <div class="customer-details">
                                 <h3>Name - '.$customerName.'</h3>
                                 <h3>Email - '.$customerEmail.'</h3>
                                 <h3>Username - '.$customerUsername.'</h3>
                                 <h3>Mobile Number - '.$customerMobile.'</h3>
                                 <h3>Delivery Address - '.$customerAddress.'</h3>
                              </div>
                              <a href="./edit_customer_profile.php" class="edit">Edit Details</a>
                           </div>
                        </div>
                     </div>
                     </div>
                  </main>
                  
                  <script src="./js/menu.js"></script>
                  <script src="./js/headsup.js"></script>
               </body>

            </html>';
   } else {
      //Redirecting to the error page
      header("Location: ./404.html");
      exit();
   }         
?>