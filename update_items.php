 <!DOCTYPE html>
 <html lang="en">

    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
       <link rel="icon" href="./icons/watermelon.svg">
       <link rel="stylesheet" href="./css/main.css">
       <link rel="stylesheet" href="./css/customer.css">
       <link rel="stylesheet" href="./css/owner.css">
       <link rel="stylesheet" href="./css/update_items.css">
       <link rel="stylesheet" href="./css/inventory_manager.css">
       <title>WGM | Update Items</title>
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
                   <li>
                      <form action="./includes/admin_logout_inc.php" method="POST" id="logout-form">
                         <button type="submit" name="submit" id="logout"
                            onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                      </form>
                   </li>
                </ul>
             </nav>
          </header>
       </div>
       <main>
          <div class="content-container">
             <div class="profile-container">
                <div class="profile-content">
                   <h2 class="hello">Admin Panel</h2>
                   <h3>Inventory Manager</h3>
                   <div class="buttons">
                      <div class="btn-container btn1">
                         <a href="./inventory_manager.php">Inventory</a>
                      </div>
                      <div class="btn-container btn2">
                         <a href="./update_items.php">Add Items</a>
                      </div>
                      <div class="btn-container btn3">
                         <a href="./customer_feedback.php">Genarate EX</a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="order-container">
                <div class="form-container">

                </div>


                <h2 class="add"> Add New Items</h2><br><br>
                <form class="edit-form" action="./includes/add_items_inc.php" method="POST"
                   enctype="multipart/form-data">



                   <img src="img/placeholder.png" onclick="triggerclick()" id="imageplaceholder">
                   <lable for="image">Image</lable>
                   <input type="file" name="image" onchange="displayimage(this)" id="image" style="display:none;"
                      required><br>

                   <label for="productname" id="product_name">Product Name</label>
                   <input type="text" name="p_name" id="P_name" required><br>

                   <label for="category">Choose category:</label>

                   <select name="category" id="category">
                      <option value="bakery_items">bakery items</option>
                      <option value="household_items">household items</option>
                      <option value="Snacks">Snacks</option>
                   </select><br>

                   <label for="discription">Discription</label>
                   <input type="text" name="discription" id="discription" required><br>

                   <label for="price">price</label>
                   <input type="number" name="price" id="price" required><br>

                   <label for="quantity">quantity :</label>
                   <input type="number" name="quantity" id="quantity" required><br>

                   <br><br>

                   <button type="submit" name="submit">Save Changes</button>
                </form>
                <br>
                <br>

       </main>
       <script src="./js/headsup.js"></script>
       <script src="./js/up.js"></script>
    </body>

 </html>