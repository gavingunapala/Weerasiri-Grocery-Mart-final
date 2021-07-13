<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
      include_once './includes/db_conn_inc.php';

 $sql = "SELECT vehicle_id FROM vehicle";
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
               if(isset($_GET['expense'])) {
                  $checkSignup = $_GET['expense'];

                  //Checking for user deleting errors
                  if($checkSignup == "success") {
                     echo "<div class='status-field'><p class='success'>Expense Added successfully</p></div>";
                  } else if($checkSignup == "unsuccess") {
                     echo "<div class='status-field'><p class='error'>Expense not Added. try again</p></div>";
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
                        
                        <h3 id="orders">Enter expenses</h3>
                        ';
                        echo'<form style="position: absolute;
  top: 210px;
  left: 750px;
  width: 200px;
  height: 100px;" method="post" action="./includes/expense_process.php">
      
      <br>
      Vehicle Id:<br>
      <select style="position: relative; float: left; min-width: 270px; width: 100px; min-height: 45px; font-family: poppins, sans-serif; font-size: 18px; color: #777; font-weight: 300; background-color: #fff; color: #4B0082; box-shadow: 1px 2px 4px -2px " name="vehicle_id" data-style="btn-primary" >';
         
            if($checkResult > 0) {
            while($row = mysqli_fetch_array($vehicles)) {
            echo "<option value={$row['vehicle_id']}>".$row['vehicle_id']."</option>";
}
}       
  echo'  </select>
      <br>
      Description:<br>
      <select style="position: relative; float: left; min-width: 270px; width: 100px; min-height: 45px; font-family: poppins, sans-serif; font-size: 18px; color: #777; font-weight: 300; background-color: #fff; color: #4B0082; box-shadow: 1px 2px 4px -2px " name="description" data-style="btn-primary" > <option value="feul">Feul</option> <option value="maintenance">Maintenance</option> </select>
      <br>
      Cost:<br>
      <input type="text" name="cost" autocomplete="off" required>
      <br>
      Date:<br>
      <input type="text" name="date" id="datepicker" autocomplete="off" required>
      <br>
      <br>
      <input type="submit" name="addexpense" value="submit">
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