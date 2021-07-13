<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/login.css">
      <title>Login</title>
   </head>

   <body>
      <header>
         <nav>
            <div class="name">
               <a href="./">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </a>
            </div>
            <ul class="nav-links">
               <li><a href="./index.php">Home</a></li>
               <li><a href="./#about">About</a></li>
               <li><a href="./#services">Services</a></li>
               <li><a href="./#contact">Contact</a></li>
            </ul>
            <img src="./icons/menu.svg" alt="menu" id="menu">
            <img src="./icons/close.svg" alt="close" id="close">
         </nav>
      </header>
      <div class="status-field">
         <?php
            //Checking if signup is there in url
            if(isset($_GET['signup'])) {
               $checkSignup = $_GET['signup'];

               if($checkSignup == "success") {
                  echo "<p class='success'>Your account has been created successfully</p>";
               }
            }
            //Checking if login is there in url
            if(isset($_GET['login'])) {
               $checkLogin = $_GET['login'];

               if($checkLogin == "invalid") {
                  echo "<p class='error'>Your username or password is invalid</p>";
               }
            }
         ?>
      </div>
      <main>
         <div class="form-container">
            <h1>Login</h1>
            <form action="./includes/login_inc.php" method="POST">
               <?php
               //Checking if username is there in url
               if(isset($_GET['username'])) {
                  $username = $_GET['username'];
                  //Filling text field with entered url
                  echo '<label for="username">Username</label>
                        <input type="text" name="username" id="username" required autocomplete="off" value="'.$username.'">';
               } else {
                  echo '<label for="username">Username</label>
                        <input type="text" name="username" id="username" required autocomplete="off">';
               }
               ?>
               <label for="password">Password</label>
               <input type="password" name="password" id="password" required autocomplete="off">
               <p class="sign-up">Don't have an account ? <a href="./sign_up.php"> Sign Up</a></p>
               <button type="submit" name="submit">Login</button>
            </form>
         </div>
         <div class="img-container">
            <img src="./images/food-table.png" alt="food" class="food">
         </div>
      </main>
      <script src="./js/menu.js"></script>
      <script src="./js/headsup.js"></script>
   </body>

</html>