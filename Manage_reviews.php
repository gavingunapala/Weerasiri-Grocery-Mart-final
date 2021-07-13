<?php
    include_once './includes/db_conn_inc.php';
    //search
    if(isset($_POST['submit'])) {
       $searchkey= $_POST['search'];
       $sql = "SELECT * FROM  feedback where feedback_content LIKE'%searchkey%'";
    }
    else{
       $sql = "SELECT * from feedback";
    }
    $item = mysqli_query($conn,$sql);
    $checkResult = mysqli_num_rows($item);

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
               <title>Customer manage reviews</title>
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
                                 <a href="./customer_orders.php">Manage Vehicles</a>
                              </div>
                              <div class="btn-container btn3">
                                 <a href="./customer_feedback.php">Manage Reviews</a>
                              </div>
                              <div class="btn-container btn4">
                                 <a href="./customer_feedback.php">Update Details</a>
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
                              <p>Enter name to search reviews</p>
                              <input type="text" name="search" id="search">
                              <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                    id="search"></button>
                           </form>
                        </div>
                        <h3 id="orders">Manage reviews</h3>
                        <div class="orders-titles titles">
                           <h3>Feedback ID</h3>
                           <h3>Feedback Topic</h3>
                           <h3>Feedback Content</h3>
                           <h3>Feedback Category</h3>
                           </div>';
                           if($checkResult > 0) {
                              while($row = mysqli_fetch_array($item)) {
                                 echo "<hr>";
                                 echo '<div class="orders-titles customers">';
                                 echo "<p>".$row['feedback_id']."</p>";
                                 echo "<p>".$row['feedback_topic']."</p>";
                                 echo "<p>".$row['feedback_content']."</p>";
                                 echo "<p>".$row['feedback_category']."</p>";
                                 echo '<button type="submit" name="submit" id="delete-customer" onclick="return confirm(\'Do you want to delete this customer ?\')"><a href="./includes/delete_reviews_inc.php?delete_id='.$row['feedback_id'].'">Delete</a></button>';
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
      
?>