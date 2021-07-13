<?php
   session_start();

   if(isset($_SESSION['customer_id'])) {
    include_once './includes/db_conn_inc.php';

    if(isset($_POST['submit'])) {
       $searchKey = $_POST['search'];
       $sql = "SELECT * FROM customer_order WHERE item_name LIKE '%$searchKey%'";
    } else { 
       //All items
       $sql = "SELECT * FROM customer_order";
    }
    $customers = mysqli_query($conn, $sql);
    $checkResult = mysqli_num_rows($customers);
      echo '<!DOCTYPE html>
            <html lang="en">


               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <link rel="stylesheet" href="./css/cart.css">

                  <title>WGM | Order List</title>
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
                                    <a href="order_list.php">Order List</a>
                                 </div>
                                 <div class="btn-container btn3">
                                    <img src="./icons/edit.svg" alt="edit">
                                    <a href="./includes/bill_pdf.php">Details Report</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="order-container">
                           <div class="edit-form-container profile-details">
                              <h2 class="profile-title">All Orders</h2><br>
                                 <div class="orders-titles titles">
                                    
                                    <h3>Order ID</h3>
                                    <h3>Ordered Date</h3>
                                    <h3>Total Price</h3>
                                    <h3>Payment Method</h3>
                                    <h3>Action</h3>
                                 </div>';

                                 if($checkResult > 0) {
                                    while($row = mysqli_fetch_array($customers)) {
                                       echo "<hr>";
                                       echo '<div class="orders-titles customers">';
                                       echo "<p>".$row['order_id']."</p>";
                                       echo "<p>".$row['order_date']."</p>";
                                       echo "<p>Rs.".$row['total_price'].".00</p>";
                                       echo "<p>".$row['payment_method']."</p>";
                                       echo '<button type="submit" name="submit" id="delete-customer" onclick="return confirm(\'Do you want to delete this order ?\')"><a href="./includes/delete_orders_inc.php?delete_id='.$row['order_id'].'">Delete</a></button>';
                                       

                                       echo '</div>';
                                    }

                                    
                                 } 
                                 else {
                                    //echo "<p style='text-align: center;'>'There are no matches for '".$searchKey."'</p>";
                                    
                                 }

                                 
                               
                                      
                           
                    echo '</div>
<hr>
                    
            
   
                    </div>
                    

                    </div>
                    </div>
                    </div>
                  </main>
        
                  <script src="./js/cart.js"></script>
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