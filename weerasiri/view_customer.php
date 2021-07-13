<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
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
               <link rel="stylesheet" href="./css/owner.css">
               <title>Admin - Owner</title>
            </head>
            <body>
               <div class="header-container">
                  <header>
                     <nav>
                        <div class="name">
                           <h2>Weerasiri <span>Grocery Mart</span></h2>
                        </div>
                        <ul class="nav-links">
                           <li><a></a></li>
                           <li><a href="./owner.php">Profile</a></li>
                           <li><form action="./includes/admin_logout_inc.php" method="POST" id="logout-form">
                           <button type="submit" name="submit" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                           </form></li>
                        </ul>
                     </nav>
                  </header>
               </div>';
               echo '<main>
                  <div class="content-container">
                     <div class="profile-container">
                        <div class="profile-content">
                           <h2 class="hello">Admin Panel</h2>
                           <h3>Owner</h3>
                           <div class="buttons">
                              <div class="btn-container btn1">
                                 <a href="./owner.php">Manage Customers</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./customer_orders.php">Manage Vehicles</a>
                              </div>
                              <div class="btn-container btn3">
                                 <a href="./customer_feedback.php">Manage Feedbacks</a>
                              </div>
                              <div class="btn-container btn4">
                                 <a href="./admin_edit_profile.php">Update Details</a>
                              </div>
                              <div class="btn-container btn5">
                                 <a href="./customer_feedback.php">Income Report</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="order-container">
                        <h3 id="orders">Customer Details</h3>
                        <div class="pop-window">';
                           echo '<img src="./icons/close.svg" alt="close" id="close">';
                           if(isset($_GET['view_id'])) {
                              $viewID = $_GET['view_id'];
                              
                              $sql = "SELECT * FROM customer WHERE customer_id='$viewID'";
                              $customer = mysqli_query($conn, $sql);
                              $checkCustomer = mysqli_num_rows($customer);
                              
                              if($checkCustomer > 0) {
                                 while($row = mysqli_fetch_array($customer)) {
                                    echo '<div class="orders-titles customer">';
                                    echo "<p> Customer ID - ".$row['customer_id']."</p>";
                                    echo "<p> Customer Name - ".$row['customer_name']."</p>";
                                    echo "<p> Customer Username - ".$row['customer_username']."</p>";
                                    echo "<p> Customer Email - ".$row['customer_email']."</p>";
                                    echo "<p> Customer Mobile No - ".$row['customer_mobile']."</p>";
                                    echo "<p> Customer Address - ".$row['customer_address']."</p>";
                                    echo '<button type="submit" name="submit" id="back"><a href="./owner.php">Back to List</button>';
                                    echo '</div>';
                                 }
                              }
                           }
                        echo '</div>';
                  echo '</div>
                  </div>
               </main>
               <script src="./js/headsup.js"></script>
            </body>
         </html>';
   } else {
      header("Location: ./404.html");
      exit();
   }
?>