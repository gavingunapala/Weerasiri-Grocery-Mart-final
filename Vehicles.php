<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
      include_once './includes/db_conn_inc.php';
 //Search
     
         //All customers
         $sql = "SELECT * FROM vehicle";
      
      
      $vehicles = mysqli_query($conn, $sql);
      $checkResult = mysqli_num_rows($vehicles);

      echo '<!DOCTYPE html>
            <html lang="en">
            <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
               <link rel="icon" href="./icons/watermelon.svg">
               <link rel="stylesheet" href="./css/main.css">
               <link rel="stylesheet" type="text/css" href="css/vehicles_css.css">
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
                                 <a href="./Vehicles.php">Vehicles</a>
                              </div>
                              <div class="btn-container btn2">
                                 <a href="./Add_Vehicle.php">Add Vehicle</a>
                              </div>
                              <div class="btn-container btn3">
                                 <a href="./Enter_expenses.php">Enter expenses</a>
                              </div>
                              <div class="btn-container btn4">
                                 <a href="./Expenses_report.php">Expenses report</a>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                     <div class="order-container">
                        
                        <h3 id="orders">Vehicles</h3>
                        </div>
                  </div>
               </main>';
echo '<div class="limiter">
      <div class="container-table100">
         <div class="wrap-table100">
               <div class="table">
                  <div class="row header">
                     <div class="cell">
                        ID
                     </div>
                     <div class="cell">
                        Vehicle No
                     </div>
                     <div class="cell">
                        Brand
                     </div>
                     <div class="cell">
                        Color
                     </div>
                     <div class="cell">
                       Maileage
                     </div>
                     <div class="cell">
                        Action
                     </div>
                  </div>';

                           if($checkResult > 0) {
                           while($row = mysqli_fetch_array($vehicles)) {

                  echo'<div class="row">';
                  echo '<div class="cell" >'.$row['vehicle_id'].'</div>';
                  echo '<div class="cell" >'.$row['vehicle_regno'].'</div>';
                  echo '<div class="cell" >'.$row['vahicle_brand'].'</div>';
                  echo '<div class="cell" >'.$row['vehicle_color'].'</div>';
                  echo '<div class="cell" >'.$row['vehicle_mileage'].'</div>';
                  echo '<div class="cell" >'.'<button type="submit" name="submit" id="delete-customer" onclick="return confirm(\'Do you want to delete this vehicle ?\')"><a href="./includes/delete_vehicle_inc.php?delete_id='.$row['vehicle_id'].'">Delete</a></button>';
                  echo' </div></div>';}}
                  echo '</div></div></div></div></div></div></div></div></div>';
                  echo '
               <script src="./js/headsup.js"></script>
            </body>
         </html>';
   } else {
      header("Location: ./404.html");
      exit();
   }
?>