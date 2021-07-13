<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
      include_once './includes/db_conn_inc.php';

      //Search
      if(isset($_POST['submit'])) {
         $searchKey = $_POST['search'];
         $sql = "SELECT * FROM customer WHERE customer_name LIKE '%$searchKey%'";
      } else {
         //All customers
         $sql = "SELECT * FROM customer";
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
                           <h3>Owner</h3>
                           <div class="buttons">
                              <div class="btn-container btn1">
                                 <a href="./owner.php">Manage Customers</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./Vehicles.php">Manage Vehicles</a>
                              </div>
                              <div class="btn-container btn3">
                                 <a href="./Manage_reviews.php">Manage Feedbacks</a>
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
                        <div class="form-container">
                           <form method="POST" class="search-form">
                              <p>Enter name to search customers</p>
                              <input type="text" name="search" id="search">
                              <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                    id="search"></button>
                           </form>
                        </div>
                        <h3 id="orders">All Registered Customers</h3>
                        <div class="orders-titles titles">
                           <div class="right">
                              <table>
                                 <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Username</th>
                                    <th>Customer Mobile</th>
                                    <th>Actions</th>
                                 </tr>';
                              if($checkResult > 0) {
                                 while($row = mysqli_fetch_array($customers)) {
                                    echo "<tr><td>". $row['customer_id']. "</td><td>". $row['customer_name']."</td><td>".$row['customer_username']."</td><td>".$row['customer_mobile']."</td>";
                                    echo '<div class="action-btn">';
                                       echo '<td><button name="submit" id="delete-customer" class="view-customer")"><a href="./view_customer.php?view_id='.$row['customer_id'].'">View</a></button>';
                                       echo '<button type="submit" name="submit" id="delete-customer" class="delete-customer" onclick="return confirm(\'Do you want to delete this customer ?\')"><a href="./includes/delete_customer_inc.php?delete_id='.$row['customer_id'].'">Delete</a></button></td></tr>';
                                    echo '</div>';
                                    echo '</div>';
                                 }
                              } else {
                                 echo "<p style='text-align: center;'>There are no matches for '".$searchKey."'</p>";
                              }
                        echo '</table>

                           </div></div>
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