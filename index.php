<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description"
         content="Weerasiri Grocery Mart is a private property located in Yakkala town, Gampaha district. Their aim is to offer its products at highly affordable prices to meet the demands of the middle-income local market area residents. The business has been building a strong market position with its 70 years of excellence in the town. They expect to catch the interest of a regular loyal customer base with its broad variety of breads, sweets, Beverages and all kind of quality bakery products. The bakery always provides freshly prepared bakery and pastry products. during business operations and the area is dedicated to self-service. In the grocery mart section, they offer goods ranging from grocery products, dairy products, beverages, frozen food, stationery and household.">
      <meta name="robots" content="index, follow">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/index.css">
      <title>Weerasiri Grocery Mart</title>
   </head>

   <body>
      <div class='status-field home-status'>
         <?php
         if(isset($_GET['delete'])) {
            $checkDelete = $_GET['delete'];
         
            if($checkDelete == "success") {
               echo "<p class='success delete-success'>Your account has been deleted successfully</p>";
            } 
         }
      ?>
      </div>
      <div class="" id="landing">
         <header>
            <nav>
               <div class="name">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </div>
               <ul class="nav-links">
                  <li><a href="./index.php">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#contact">Contact</a></li>
               </ul>
               <img src="./icons/menu.svg" alt="menu" id="menu">
               <img src="./icons/close.svg" alt="close" id="close">
            </nav>
         </header>
         <main>
            <section class="hero" id="hero">
               <div class="text-content">
                  <h1><span>Supermarket</span> at Your Doorstep</h1>
                  <h3>Service available only in Yakkala area</h3>
                  <a href="./login.php" class="cta" id="home-cta">Explore</a>
               </div>
               <div class="img-container">
                  <img src="./images/cashier.png" alt="cashier">
               </div>
            </section>
         </main>
      </div>
      <section class="about" id="about">
         <div class="about-container">
            <div class="img-container">
               <img src="./images/fruits.png" alt="fruits">
            </div>
            <div class="text-content">
               <h1>About us</h1>
               <div class="our-story">
                  <h2>Our Stroy</h2>
                  <p>Weerasiri Grocery Mart is a private property established in Yakkala town, Gampaha district and we
                     have been serving our customers for over 70 years.
                     We offer our products to the customers at very reasonable prices. Here you can buy grocery
                     products, dairy products, beverages, frozen food, stationary, household, as well as our freshly
                     prepared bakery products.
                  </p>
               </div>
               <div class="our-mission">
                  <h2>Our Vision</h2>
                  <p>To be an independent, innovative, honest and sustainable cooperative in which customers are able to
                     choose from a wide range of goods at reasonable prices. In other words, to be a model company and a
                     reference in the distribution sector.</p>
               </div>
            </div>
         </div>
      </section>
      <section class="services" id="services">
         <h1>We Offer,</h1>
         <div class="services-container">
            <div class="card card 1">
               <div class="icon-container">
                  <img src="./icons/money.svg" alt="money">
               </div>
               <h3>Affordable Prices</h3>
            </div>
            <div class="card card 2">
               <div class="icon-container">
                  <img src="./icons/route.svg" alt="route">
               </div>
               <h3>Cash on Delivery</h3>
            </div>
            <div class="card card 3">
               <div class="icon-container">
                  <img src="./icons/clock.svg" alt="clock">
               </div>
               <h3>Delivery within 3 hours</h3>
            </div>
         </div>
      </section>
      <section class="contact" id="contact">
         <div class="contact-container">
            <div class="text-content">
               <h1>Contact us</h1>
               <form action="https://formspree.io/mknqqewe" method="POST">
                  <input type="email" placeholder="Your email" name="_replyto"> <br>
                  <button type="submit" id="submit-contact" value="Send">Submit</button>
               </form>
               <div class="location-container">
                  <img class="location" src="./icons/location.svg" alt="location">
                  <a href="https://www.google.com/maps/place/Weerasiri+Bake+House+%26+Stores/@7.0868127,80.0345609,15z/data=!4m5!3m4!1s0x0:0x16243091d85e3887!8m2!3d7.0868127!4d80.0345609"
                     target="blank">Our Location</a>
               </div>
            </div>
            <div class="img-container">
               <img src="./images/contact.png" alt="contact" class="contact-img">
            </div>
            <a href="#landing"><img src="./icons/up.svg" alt="up-arrow" class="up-arrow"></a>
         </div>
         <footer>
            <h3>Tel - 011 222 2222, 011 333 3333</h3>
            <ul class="social-links">
               <li><a href="#"><img src="./icons/facebook.svg" alt="facebook"></a></li>
               <li><a href="#"><img src="./icons/instagram.svg" alt="facebook"></a></li>
               <li><a href="#"><img src="./icons/twitter.svg" alt="facebook"></a></li>
            </ul>
         </footer>
      </section>
      <script src="./js/menu.js"></script>
      <script src="./js/headsup.js"></script>
   </body>

</html>