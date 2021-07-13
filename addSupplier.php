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
      <link rel="stylesheet" href="./css/addSupplier.css">
      <title>Add Supplier</title>
   </head>

   <body>
      <div class="header-container">
         <header>
            <nav>
               <div class="name">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </div>
               <ul class="nav-links">
                  <li><a href="./supplier_manager.php">Profile</a></li>
                  <li>
                     <form action="./includes/logout_inc.php" method="POST" id="logout-form">
                        <button type="submit" name="submit" class="logout-btn" id="logout"
                           onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                     </form>
                  </li>
               </ul>
            </nav>
         </header>
      </div>
      <div class="split_screen">
         <div class="left">
            <section class="lft">
               <h1>Admin Panel, <br />Supplier Management</h1>
               <p>Navigate to the respective page using below buttons</p>

               <a href="#"><button type="button" id="addSupp">Add Supplier</button>
                  <a href="supplier_manager.php"><button type="button" id="suppDetail">Supplier Details</button></a>

            </section>
         </div>

         <div class="right">
            <form class="rght" action="./includes/addSupplier_inc.php" method="POST">
               <h3>Add Supplier Details</h3>

               <div class="add_details-container_s_name">
                  <label id="s_name_lbl" for="s_name_lbl">Supplier Name</label>
                  <input id="s_name" type="text" name="s_name" placeholder="Supplier Name" required>
               </div>

               <div class="add_details-container_cmpny_name">
                  <label id="cmpny_name_lbl" for="cmpny_name_lbl">The Company Name</label>
                  <input id="cmpny_name" type="text" name="cmpny_name" placeholder="Company name" required>
               </div>

               <div class="add_details-container_Item">
                  <label id="item_lbl" for="item_lbl">Product</label>
                  <input id="item" type="text" name="item" placeholder="Product" required>
               </div>

               <div class="add_details-container_Contact">
                  <label id="cntct_lbl" for="cntct_lbl">Mobile</label>
                  <input id="cntct" type="tel" name="cntct" title="Invalid Phone Number" placeholder="Mobile"
                     pattern="[0-9]{10}" required>
               </div>

               <div class="add_details-container_bank_acc">
                  <label id="bnk_acc_lbl" for="bnk_acc_lbl">Bank Account</label>
                  <input id="bnk_acc" type="text" name="bnk_acc" title="Invalid Bank Account Number"
                     placeholder="Bank Account No." pattern="[0-9]{12}" required>
               </div>

               <div class="add_details-container_bank_name">
                  <label id="bnk_lbl" for="bnk_lbl">Bank</label>
                  <input id="bnk" type="text" name="bnk" placeholder="Bank" title="Invalid Bank Name" required>
               </div>

               <button type="submit" name="submit" id="submit">Save Details & Print PDF</button>

            </form>
         </div>

      </div>
   </body>

</html>