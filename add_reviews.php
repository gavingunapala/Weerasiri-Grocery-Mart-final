<?php
   session_start();
   
   
  
  
  ?>
     
      <!DOCTYPE html>
            <html lang="en">

               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <link rel = "stylesheet" href = "./css/style.css">
                  <title>Profile</title>
                 
                 
               </head>

               <body>
                  <div class="header-container">
                     <header>
                        <nav>
                           <div class="name">
                              <h2>Weerasiri <span>Grocery Mart</span></h2>
                           </div>
                           <ul class="nav-links">
                              <li><a href="./customer_profile.php">Profile</a></li>
                              <li><a href="./cart.php" class="cart">Cart <img src="./icons/cart.svg" alt="cart"
                                       class="cart-img"></a></li>
                              <li><form action="./includes/logout_inc.php" method="POST" id="logout-form">
                              <button type="submit" name="submit" class="logout-btn" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                              </form></li>
                              </ul>
                           <img src="./icons/menu-black.svg" alt="menu" id="menu">
                           <img src="./icons/close.svg" alt="close" id="close">
                        </nav>
                     </header>
                  </div>
                     <main>
                     <div class="content-container">
                        <div class="profile-container">
                           <div class="profile-content">
                              <h2 class="hello">Hello,</h2>
                             
                              <div class="buttons">
                              <div class="btn-container btn2">
                              <img src="./icons/review.svg" alt="review">
                              <a href="#">Add Reviews</a>
                           </div>
                                 <div class="btn-container btn2">
                                    <img src="./icons/review.svg" alt="review">
                                    <a href="All_reviews.php">All Reviews</a>
                                 </div>
                                 <div class="btn-container btn3">
                                    <img src="./icons/edit.svg" alt="edit">
                                    <a href="./includes/details_pdf.php">Review Report</a>
                                 </div>
                                
                              </div>
                           </div>
                        </div>  
                        <div class="order-container">
                           <div class="edit-form-container profile-details">
                           <h3>Add reviews</h3>

                           <form action="./includes/insert_reviews_inc.php" method="POST">
                           
                           <label for="ctype">Category topic:</label><br>
                           <input type="text" id="ctype" name="topic" required><br>
                           <label for="feedback">Feedback:</label><br>
                           <input type="text" id="fback" name="content" required><br>
                           <label for="star rating">Star rating:</label><br><br><br><br>
                           
                           <div class = "box">
                           <a class = "ion-android-star b1"></a>
                           <a class = "ion-android-star b2"></a>
                           <a class = "ion-android-star b3"></a>
                           <a class = "ion-android-star b4"></a>
                           <a class = "ion-android-star b5"></a>
                           </div>    

                           <br>
                           <br>
                           <br>
                           <label for="ctype">Category</label><br>
                           <input type="text" id="fback" name="category" required><br><br>
                        
                           <input type="submit" name = "submit" value="Submit">
                         </form>  
                           </div>
                        </div>
                     </div>
                     </div>
                    
                  </main>
                  
                  <script src="./js/menu.js"></script>
                  <script src="./js/headsup.js"></script>     
               </body>

            </html>