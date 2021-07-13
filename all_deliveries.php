<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
      include_once './includes/db_conn_inc.php';

      //Search
      if(isset($_POST['submit'])) {
         $searchKey = $_POST['search'];
         $sql = "SELECT * FROM delivery WHERE delivery_id LIKE '%$searchKey%'";
      } else { 
         //All Deliveries
         $sql = "SELECT * FROM delivery";
      }
      $deliveries = mysqli_query($conn, $sql);
      $checkResult = mysqli_num_rows($deliveries);

      echo '<!DOCTYPE html>
            <html lang="en">
            <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
               <link rel="icon" href="./icons/watermelon.svg">
               <link rel="stylesheet" href="./css/main.css">
               <link rel="stylesheet" href="./css/customer.css">
               <link rel="stylesheet" href="./css/all_deliveries.css">
               <title>Admin - Delivery List</title>
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
                           <li><a href="./all_deliveries.php">Profile</a></li>
                           <li><form action="./includes/admin_logout_inc.php" method="POST" id="logout-form">
                           <button type="submit" name="submit" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                           </form></li>
                        </ul>
                     </nav>
                  </header>
               </div>';
               if(isset($_GET['delete'])) {
                  $checkSignup = $_GET['delete'];

                  //Checking for user deleting errors
                  if($checkSignup == "success") {
                     echo "<div class='status-field'><p class='success'>User deleted successfully</p></div>";
                  } else if($checkSignup == "unsuccess") {
                     echo "<div class='status-field'><p class='error'>User not deleted. try again later</p></div>";
                  }
               }
               echo '<main>
                  <div class="content-container">
                     <div class="profile-container">
                        <div class="profile-content">
                           <h2 class="hello">Admin Panel</h2>
                           <h3>Delivery Manager</h3>
                           <div class="buttons">
                              <div class="btn-container btn1">
                                 <a href="./add_deliveries.php">Add Deliveries</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./all_deliveries.php">All Deliveries</a>
                              </div>
                              <div class="btn-container btn2">
                              <a href="./add_deliveries.php">Update Deliveries</a>
                           </div>
                              <div class="btn-container btn5">
                                 <a href="./income_report.php">Income Report</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="order-container">
                     <div class="form-container">
                        <form method="POST" class="search-form">
                           <p>Enter Delivery Id</p>
                           <input type="text" name="search" id="search">
                           <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                 id="search"></button>
                        </form>
                     </div>
                     </div>
                     <div class="order-container">
                        <div class="form-container">
                           <form method="POST" class="search-form">
                          </form>
                        </div>
                        <h3 id="orders">Delivery List</h3>
                        <div class="orders-titles titles">
                           <h3>Delivery ID</h3>
                           <h3>Order NO</h3>
                           <h3>Driver ID</h3>
                           <h3>Status</h3>
                           <h3>Action</h3>
                           <h3></h3>
                        </div>';
                        if($checkResult > 0) {
                           while($row = mysqli_fetch_array($deliveries)) {
                              echo "<hr>";
                              echo '<div class="orders-titles customers">';
                              echo "<p>".$row['delivery_id']."</p>";
                              echo "<p>".$row['order_id']."</p>";
                              echo "<p>".$row['driver_id']."</p>";
                              
                              echo "<p>".$row['delivery_status']."</p>";
                              echo '<button type="submit" name="submit" id="delete-data" onclick="return confirm(\'Do you want to delete this customer ?\')"><a href="./includes/delete_deliveries_inc.php?delete_id='.$row['delivery_id'].'">Delete</a></button>';
                              echo '<a href="add_deliveries.php"><button class="button" type="button">Update</button></a>';
                              echo '</div>';
                           }
                        } 
                        else {
                           echo "<p style='text-align: center;'>There are no matches for '".$searchKey."'</p>";
                        }
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