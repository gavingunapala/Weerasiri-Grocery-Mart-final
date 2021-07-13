<!DOCTYPE html>
<html lang="en" dir="ltr">

   <head>
      <meta charset="utf-8">
      <title>Add Deliveries</title>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/customer.css">
      <link rel="stylesheet" href="./css/add_deliveries.css">

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
                  <li><a href="./add_deliveries.php">Profile</a></li>
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
                  <h3>Delivery Manager</h3>
                  <div class="buttons">
                     <div class="btn-container btn1">
                        <a href="./add_deliveries.php">Add Deliveries</a>
                     </div>
                     <div class="btn-container btn2">
                        <a href="./all_deliveries.php">All Deliveries</a>
                     </div>
                     <div class="btn-container btn2">
                        <a href="./add_deliveries.php">Update Deliveries</a>
                     </div>
                     <div class="btn-container btn5">
                        <a href="./income_report.php">Income Report</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <form class="" action="./includes/insert_deliveries_inc.php" method="POST">
            <?php
      $mysqli = new mysqli('localhost','root','','supermarketdb') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT o.order_id, c.customer_name, c.customer_address FROM customer_order o, customer c
      WHERE o.order_id = c.customer_id ") or die($mysqli->error);
           ?>

            <h3 class="title1">Add Deliveries</h3>
            <table>

               <thead>
                  <form>

                     <tr>
                        <th>Order NO</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Driver ID</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                        <th></th>
                     </tr>
                  </form>
               </thead>

               <?php 
                  while ($row = mysqli_fetch_array($result)){
                     ?>
               <tr>
                  <td><input type="text" name="order_id" value="<?php $order_id = $row['order_id']; echo $order_id; ?>">
                  </td>
                  <td><input type="text" name="name" value="<?php echo $row['customer_name']; ?>"></td>
                  <td><input type="text" name="address" value="<?php echo $row['customer_address']; ?>"></td>
                  <td>
                     <div class="select">
                        <select name="Did" id="driver_type" class="filter-type" required>
                           <option selected>Driver ID</option>
                           <?php
                           $res = $mysqli->query("SELECT employee_id FROM employee WHERE designation = 'Driver'") or die(mysqli_errpr($mysqli));
                           while($rows = mysqli_fetch_array($res)) { ?>
                           <option value="<?php echo $rows['employee_id']?>"><?php echo $rows['employee_id']?></option>
                           <?php
                              }            
                           ?>
                        </select>
                     </div>
                  </td>
                  <td>
                     <div class="select">
                        <select name="id" id="vehicle_type" class="filter-type" required>
                           <option value="Vehicle">Vehicle</option>
                           <option value=1>1</option>
                           <option value=2>2</option>
                           <option value=3>3</option>
                        </select>
                     </div>
                  </td>
                  <td>
                     <div class="select">
                        <select name="status" id="status_type" class="filter-type" required>
                           <option value="Status">Status</option>
                           <option value="ongoing">Ongoing</option>
                           <option value="Delivered">Delivered</option>
                           <option value="Cancelled">Cancelled</option>
                        </select>
                     </div>
                  </td>
                  <td>
                     <div>
                        <a href="all_deliveries.php"><button type="submit" name="insert" class="btn">ADD</button></a>
                     </div>
                  </td>
               </tr>

               <?php
        }
       ?>
            </table>
         </form>
   </body>





</html>