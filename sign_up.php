<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/sign_up.css">
      <title>Sign Up</title>
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
      <main>
         <div class="status-field">
            <?php
               //Checking if signup is there in url
               if(isset($_GET['signup'])) {
                  $checkSignup = $_GET['signup'];

                  //Checking for signup errors
                  if($checkSignup == "empty") {
                     echo "<p class='error'>You have to fill all the fields</p>";
                  } else if($checkSignup == "name_invalid") {
                     echo "<p class='error'>Enter a valid name</p>";
                  } else if($checkSignup == "email_invalid") {
                     echo "<p class='error'>Enter a valid email</p>";
                  } else if($checkSignup == "user_exists") {
                     echo "<p class='error'>This username is already taken</p>";
                  } else if($checkSignup == "mobile_invalid") {
                     echo "<p class='error'>Enter a valid mobile number</p>";
                  } else if($checkSignup == "city_invalid") {
                     echo "<p class='error'>Sorry, you are not eligible to register</p>";
                  }
               }
            ?>
         </div>
         <h1>Sign Up</h1>
         <form action="./includes/sign_up_inc.php" method="POST">
            <?php
               //Filling input fields when there is any error
               if(isset($_GET['name'])) {
                  $name = $_GET['name'];
                  echo '<label for="name">Name</label>
                        <input type="text" name="name" id="name" autocomplete="off" maxlength="50" value="'.$name.'">';
               } else {
                  echo '<label for="name">Name</label>
                        <input type="text" name="name" id="name" autocomplete="off" maxlength="50">';
               }
               
               if(isset($_GET['email'])) {
                  $email = $_GET['email'];
                  echo '<label for="email">E-mail</label>
                        <input type="email" name="email" id="email" autocomplete="off" maxlength="50" value="'.$email.'">';
               } else {
                  echo '<label for="email">E-mail</label>
                        <input type="email" name="email" id="email" autocomplete="off" maxlength="50">';
               }

               if(isset($_GET['username'])) {
                  $username = $_GET['username'];
                  echo '<label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" maxlength="20" value="'.$username.'">';
               } else {
                  echo '<label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" maxlength="20">';
               }

               echo '<label for="password">Password</label>
                     <input type="password" name="password" id="password" autocomplete="off" maxlength="50">';

               if(isset($_GET['mobile'])) {
                  $mobile = $_GET['mobile'];
                  echo '<label for="mobile">Mobile Number</label>
                        <input type="text" name="mobile" id="mobile" autocomplete="off" maxlength="10" value="'.$mobile.'">';
               } else {
                  echo '<label for="mobile">Mobile Number</label>
                        <input type="text" name="mobile" id="mobile" autocomplete="off" maxlength="10">';
               }

               if(isset($_GET['address'])) {
                  $address = $_GET['address'];
                  echo '<label for="address">Home Address</label>
                        <input type="text" name="address" id="address" autocomplete="off" maxlength="50" value="'.$address.'">';
               } else {
                  echo '<label for="address">Home Address</label>
                        <input type="text" name="address" id="address" autocomplete="off" maxlength="50">';
               }

               if(isset($_GET['city'])) {
                  $city = $_GET['city'];
                  echo '<label for="city">City</label>
                        <input type="text" name="city" id="city" autocomplete="off" value="'.$city.'">';
               } else {
                  echo '<label for="city">City</label>
                        <input type="text" name="city" id="city" autocomplete="off" placeholder="Only yakkala area customers can be registered">';
               }
            ?>
            <button type="submit" name="submit">Sign Up</button>
         </form>
         <img src="./images/cup-cake.png" alt="cup-cake" id="cup-cake">
         <img src="./images/doughnut.png" alt="cup-cake" id="doughnut">
      </main>
      <footer>
         <h3>Tel - 011 222 2222, 011 333 3333</h3>
         <ul class="social-links">
            <li><a href="#"><img src="./icons/facebook.svg" alt="facebook"></a></li>
            <li><a href="#"><img src="./icons/instagram.svg" alt="facebook"></a></li>
            <li><a href="#"><img src="./icons/twitter.svg" alt="facebook"></a></li>
         </ul>
      </footer>
      <script src="./js/menu.js"></script>
      <script src="./js/headsup.js"></script>
   </body>

</html>