<?php
   session_start();

   if(isset($_SESSION['admin_id'])) {
      include_once './includes/db_conn_inc.php';

     if(isset($_POST['submit'])) {
         $searchKey = $_POST['search'];
         $sql = "SELECT * FROM expense WHERE vehicle_id = '$searchKey'";
      } else { 
        
         $sql = "SELECT * FROM expense";
      }
      
      $expenses = mysqli_query($conn, $sql);
      $checkResult = mysqli_num_rows($expenses);

      echo '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <meta charset="UTF-8">
               
               <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
               <link rel="icon" href="./icons/watermelon.svg">
               <link rel="stylesheet" href="./css/main.css">
               <link rel="stylesheet" type="text/css" href="css/expenses_css.css">
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

                        <div class="form-container">
                           <form method="POST" class="search-form">
                              <p>Enter vehicle id to search expenses </p>
                              <input type="text" name="search" id="search">
                              <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                    id="search"></button>
                           </form>
                     </div>
                        <h3 id="orders">Vehicle Expenses</h3>
              </div>
                  </div>
               </main>';
echo '<div class="limiter">
      <div class="container-table100">
         <div class="wrap-table100">
               <div class="table">
                  <div class="row header">
                     <div class="cell">
                        Expense ID
                     </div>
                     <div class="cell">
                        Vehicle ID
                     </div>
                     <div class="cell">
                        Description
                     </div>
                     <div class="cell">
                        Cost
                     </div>
                     <div class="cell">
                       Date
                     </div>
                     <div class="cell">
                        Action
                     </div>
                  </div>';

                           if($checkResult > 0) {
                           while($row = mysqli_fetch_array($expenses)) {

                  echo'<div class="row">';
                  echo '<div class="cell" >'.$row['expense_id'].'</div>';
                  echo '<div class="cell" >'.$row['vehicle_id'].'</div>';
                  echo '<div class="cell" >'.$row['description'].'</div>';
                  echo '<div class="cell" >'.$row['cost'].'</div>';
                  echo '<div class="cell" >'.$row['date'].'</div>';
                  echo '<div class="cell" >'.'<button type="submit" name="submit" id="delete-customer" onclick="return confirm(\'Do you want to delete this vehicle ?\')"><a href="./includes/delete_expense.php?delete_id='.$row['expense_id'].'">Delete</a></button>';
                  echo' </div></div>';}}
                  echo '</div></div></div></div></div></div></div></div></div>';

  
             echo'  <form style="position: absolute;
  top: 118px;
  right: 700px;
  width: 100px;" method="post" action="./includes/export_expenses.php">
     <input  type="submit" name="export"  value="Export" />
    </form>
               <script src="./js/headsup.js"></script>
            </body>
         </html>';
   } else {
      header("Location: ./404.html");
      exit();
   }
?>