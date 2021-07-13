<?php
    session_start();
    include_once './includes/db_conn_inc.php';
?>

<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/supplier_manager.css">
      <title>Supplier Details</title>
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
                     <form action="./includes/admin_logout_inc.php" method="POST" id="logout-form">
                        <button type="submit" name="submit" class="logout-btn" id="logout"
                           onclick="return confirm('Do you want to log out from your account ?')">Log out</button>
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

               <a href="addSupplier.php"><button type="button" id="addSupp">Add Supplier</button></a>
               <a href="#"><button type="button" id="suppDetail">Supplier Details</button></a>

            </section>
         </div>

         <div class="right">
            <table>
               <tr>
                  <th>Supplier ID</th>
                  <th>Supplier Name</th>
                  <th>Company Name</th>
                  <th>Product</th>
                  <th>Mobile</th>
                  <th>Bank Account</th>
                  <th>Bank Name</th>
                  <th>Actions</th>
                  <th> </th>
               </tr>
               <?php

            $sql = "SELECT * FROM supplier;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>". $row['supplier_id']. "</td><td>". $row['supplier_name']."</td><td>".$row['supplier_company_name']."</td><td>".$row['supplier_product']."</td><td>"
                .$row['supplier_mobile']."</td><td>".$row['supplier_bank_acc_no']."</td><td>".$row['supplier_bank']."</td><td>"."<a href='./includes/supplier_remove.php?supplier_id=" .$row['supplier_id']. "'><button type='submit' name='remove' id='remove'>Remove</button></a></td><td>"."<a href='./updateSupplier.php?supplier_id=" .$row['supplier_id']. "'><button type='submit' name='edit' id='edit'>Edit</button></a></td></tr>";
              }
            }
             mysqli_close($conn);
        ?>
            </table>

         </div>

      </div>
   </body>

</html>