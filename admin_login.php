<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/admin_login.css">
      <link rel="stylesheet" href="./css/main.css">
      <title>Admin Login</title>
   </head>

   <body>
      <div class="header-container">
         <header>
            <nav>
               <div class="name">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </div>
               <img src="./icons/menu-black.svg" alt="menu" id="menu">
               <img src="./icons/close.svg" alt="close" id="close">
            </nav>
         </header>
      </div>
      <div class="status-field">
         <?php
            //Checking if login is there in url
            if(isset($_GET['login'])) {
               $checkLogin = $_GET['login'];

               if($checkLogin == "empty") {
                  echo "<p class='error'>Username and password cannot be empty</p>";
               } else if($checkLogin == "invalid") {
                  echo "<p class='error'>Your username or password is invalid</p>";
               }
            }
         ?>
      </div>
      <main>
         <div class="form-container">
            <h1>Admin Login</h1>
            <form action="./includes/admin_login_inc.php" method="POST" autocomplete="off">
               <label for="username">Username</label>
               <input type="text" name="username">
               <br>
               <label for="password">Password</label>
               <input type="password" name="password" id="password">
               <div class="select">
                  <select name="type" id="type" class="filter-type">
                     <option value="Owner">Owner</option>
                     <option value="HR_manager">HR Manager</option>
                     <option value="Delivery_manager">Delivery Manager</option>
                     <option value="Inventory_manager">Inventory Manager</option>
                     <option value="Supplier_manager">Supplier Manager</option>
                  </select>
               </div>
               <button type="submit" name="submit">Login</button>
            </form>
         </div>
      </main>
      <script src="./js/headsup.js"></script>
   </body>

</html>