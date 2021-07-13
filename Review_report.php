<?php 
      echo '<!DOCTYPE html>
            <html lang="en">

               <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
                  <link rel="icon" href="./icons/watermelon.svg">
                  <link rel="stylesheet" href="./css/main.css">
                  <link rel="stylesheet" href="./css/customer.css">
                  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                  <title>PDF report</title>
                 
                 
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
                  </div>';
                     echo '<main>
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
                                    <a href="#">All Reviews</a>
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
                           <h3>Review report</h3>


                           <div class="container mt-5">
                           
                           <form  action = "./includes/review_pdf.php"  method = "POST"  class = "offset-md-3 col-md-6">
                           <h3>Create your own PDF</h3>
                           <p>Fill out the details below and PDF will download</p>

                            <div class = "row mb-2">
                                <div class = "col-md-6">

                           <input type = "text" name = "customerid" placeholder= "CustomerID" class = "form-control" required>
                           </div>
                           <div class = "col-md-6">

                           <input type = "text" name = "reviewid" placeholder= "ReviewID" class = "form-control" required>
                           </div>
                           </div>
                           <div class = "mb-2">
                           <input type = "text" name = "review_category__id" placeholder= "Category" class = "form-control" required> 
                           </div>
                           <div class = "mb-2">
                          <textarea name = "message" placeholder = "your feedback" class= "form-control"> </textarea>
                          </div>
                          <button type = "submit" class = "btn btn-success btn-lg btn-block">Create PDF</button>
                          </form>
                          </div>
                            
                           </div>
                        </div>
                     </div>
                     </div>
                    
                  </main>
                  
                  <script src="./js/menu.js"></script>
                  <script src="./js/headsup.js"></script>


                  
               </body>

            </html>';
   /* else {
      //Redirecting to the error page
      header("Location: ./404.html");
      exit();
   }*/         
?>