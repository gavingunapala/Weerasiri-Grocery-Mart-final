<?php

      include_once './includes/db_conn_inc.php';

      //Search
      if(isset($_POST['submit'])) {
         $searchKey = $_POST['search'];
         $sql = "SELECT * FROM item WHERE item_name LIKE '%$searchKey%'";
      } else { 
         //All items
         $sql = "SELECT * FROM item";
      }
      $item = mysqli_query($conn, $sql);
      $checkResult = mysqli_num_rows($item);

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
               <link rel="stylesheet" href="./css/inventory_manager.css">

               <title>WGM | Inventory Manager</title>
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
                           <li><a href="./inventory_manager.php">Profile</a></li>
                           <li><form action="./includes/admin_logout_inc.php" method="POST" id="logout-form">
                           <button type="submit" name="submit" id="logout" onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                           </form></li>
                        </ul>
                     </nav>
                  </header>
               </div>';
               if(isset($_GET['delete'])) {
                  $checkitems = $_GET['delete'];

                  //Checking for user deleting errors
                  if($checkitems == "success") {
                     echo "<div class='status-field'><p class='success'>items deleted successfully</p></div>";
                  } else if($checkitems == "unsuccess") {
                     echo "<div class='status-field'><p class='error'>items not deleted. try again later</p></div>";
                  }
               }
               echo '<main>
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
                           <form method="POST" class="search-form">
                              <p>Enter name to search items</p>
                              <input type="text" name="search" id="search">
                              <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                                    id="search"></button>
                           </form>
                        </div>
                        <h3 id="orders">Product</h3>
                        <div class="orders-titles titles">
                        <table>
                        <tr>
                           <th>Item Id</th>
                           <th>Item Name</th>
                           <th>Description</th>
                           <th>price</th>
                           <th>Quentity</th>
                           <th>Action</th>
                        </tr>
                        </div>';
                        if($checkResult > 0) {
                           while($row = mysqli_fetch_array($item)) {
                             
                             

                              echo "<tr><td>".$row['id']."</td><td>".$row['item_name']."</td><td>".$row['item_description']."</td><td>Rs.".$row['item_unit_price']."</td><td>".$row['item_quentity']."</td><td>".'<button type="submit" name="submit" class="allDelete" id="delete-items" onclick="return confirm(\'Do you want to delete this item ?\')"><a href="./includes/inventory_manager_inc.php?delete_item='.$row['id'].'">Delete</a></button>'."</td></tr>";
                              
                           }
                        } 
                       
                        else {
                           echo "<p style='text-align: center;'>There are no matches for '".$searchKey."'</p>";
                        }
                        echo' </table>';
                  echo '</div>
                  </div>
               </main>
               <script src="./js/headsup.js"></script>
            </body>
         </html>';

?>