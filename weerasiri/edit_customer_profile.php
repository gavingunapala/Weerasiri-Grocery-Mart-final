<?php
   session_start();

   if(isset($_SESSION['customer_id'])) {
      include_once './includes/db_conn_inc.php';
      
      echo '<!DOCTYPE html>
            <html lang="en">

               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <link rel="stylesheet" href="./css/edit_customer_profile.css">
                  <title>Edit Profile</title>
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
                              <button type="submit" name="submit" id="logout" class="logout-btn" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                              </form></li>
                              </ul>
                           <img src="./icons/menu-black.svg" alt="menu" id="menu">
                           <img src="./icons/close.svg" alt="close" id="close">
                        </nav>
                     </header>
                  </div>';
                  if(isset($_GET['edit'])) {
                     $checkEdit = $_GET['edit'];
                     
                     if($checkEdit == "empty") {
                        echo "<div class='status-field'><p class='error edit-success'>Fields cannot be empty</p></div>";
                     } else if($checkEdit == "name_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid name</p></div>";
                     } else if($checkEdit == "email_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid email</p></div>";
                     } else if($checkEdit == "user_exists") {
                        echo "<div class='status-field'><p class='error edit-success'>This username is already taken</p></div>";
                     } else if($checkEdit == "mobile_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Enter a valid mobile number</p></div>";
                     } else if($checkEdit == "old_password_invalid") {
                        echo "<div class='status-field'><p class='error edit-success'>Your current password is invalid</p></div>";
                     }
                  }
                  echo'<main>
                     <div class="content-container">
                        <div class="profile-container">
                           <div class="profile-content">
                              <h2 class="hello">Hello,</h2>
                              <h3>'.$_SESSION['customer_name'].'</h3>
                              <div class="buttons">
                                 <div class="btn-container btn1">
                                    <img src="./icons/fruit-basket.svg" alt="basket">
                                    <a href="menu.php">Start Shopping</a>
                                 </div>
                                 <div class="btn-container btn2">
                                    <img src="./icons/review.svg" alt="review">
                                    <a href="#">Add Review</a>
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
                           <div class="edit-form-container">
                              <h2>Edit Profile</h2>
                              <form class="edit-form" action="./includes/edit_profile_inc.php" method="POST">
                                 <label for="name" id="edit-name">Name</label>
                                 <input type="text" name="name" id="name" required autocomplete="off"
                                    value="'.$_SESSION['customer_name'].'">
                                 <label for="email">E-mail</label>
                                 <input type="email" name="email" id="email" required autocomplete="off"
                                    value="'.$_SESSION['customer_email'].'">
                                 <label for="username">Username</label>
                                 <input type="text" name="username" id="username" required autocomplete="off"
                                    value="'.$_SESSION['customer_username'].'">
                                 <label for="password">Password</label>
                                 <input type="password" name="new_password" id="new_password" required autocomplete="off">
                                 <label for="mobile">Mobile Number</label>
                                 <input type="text" name="mobile" id="mobile" required autocomplete="off" maxlength="10"
                                    value="'.$_SESSION['customer_mobile'].'">
                                 <label for="address">Home Address</label>
                                 <input type="text" name="address" id="address" required autocomplete="off"
                                    value="'.$_SESSION['customer_address'].'">
                                 <label for="password">Enter Current Password to Save Changes</label>
                                 <input type="password" name="current_password" id="current_password" required autocomplete="off">
                                 <button type="submit" name="submit">Save Changes</button>
                              </form>
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