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
               <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://resources/demos/style.css">
  <script>
  $(function() {
       
       $("#datepicker").datepicker({  maxDate: 0 });
        
         });
  </script>
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
               if(isset($_GET['add'])) {
                  $checkSignup = $_GET['add'];

                  if($checkSignup == "success") {
                     echo "<div class='status-field'><p class='success'>add successfully</p></div>";
                  } else if($checkSignup == "unsuccess") {
                     echo "<div class='status-field'><p class='erro r'> not added. try again later</p></div>";
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
                        
                        <h3 id="orders">Add Vehicle</h3>
                        ';
                        echo'<form style="position: absolute;
  top: 220px;
  left: 750px;
  width: 200px;
  height: 100px;" method="post" action="./includes/vehicle_process.php">
      
      Registered Number:<br>
      <input type="text" name="reg" autocomplete="off" required>
      <br>
      Brand:<br>
      <input type="text" name="brand" autocomplete="off" required>
      <br>
      Model:<br>
      <input type="text" name="model" autocomplete="off" required>
      <br>
      Manufacture Year:<br>
      <input type="text" name="year" id="datepicker" autocomplete="off" required>
      <br>
      Vehicle Color:<br>
      <input type="text" name="color">
      <br>
      Mileage:<br>
      <input type="text" autocomplete="off" name="mileage">
      </br><br><br><br>
      <input type="submit" name="save" value="submit" >
   </form>';
                       
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