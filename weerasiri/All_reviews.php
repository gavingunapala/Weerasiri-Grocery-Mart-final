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
                  <title>All reviews</title>

                  <style>
                  #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
                  
                 
                 
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
                              <a href="add_reviews.php">Add Reviews</a>
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
                           <h3>All reviews</h3>

                           <table id="customers">
  <tr>
    <th>Feedback Category</th>
    <th>Feedback</th>
    <th>Action</th>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>   <button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td> <button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><button type = "button">Update</button> 
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td> <button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td> <button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td> <button type = "button">Update</button>
    <button type = "button">Delete</button></td>
  </tr>
</table>

                           
                     </div>
                     </div>
                    
                  </main>
                  
                  <script src="./js/menu.js"></script>
                  <script src="./js/headsup.js"></script>     
               </body>

            </html>