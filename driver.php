<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/owner.css">
    <link rel="stylesheet" href="./css/customer.css">
    <link rel="stylesheet" href="./css/side.css">
    <title> Admin - HR Manager </title>

  </head>
  <body>
    <!--Header-->
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
    <!--Side Bar-->
    <div class="content-container">
       <div class="profile-container">
          <div class="profile-content">
             <h2 class="hello">Admin Panel</h2>
             <h3>HR Manager</h3><br>
             <div class="buttons">
                <div class="btn-container btn1">
                   <a href="./employeelist.php">Employee List</a>
                </div>
                <div class="btn-container btn2">
                   <a href="./addEmployee.php">Add Employee</a>
                </div>
                <div class="btn-container btn3">
                   <a href="./salary.php">Add Salary Details</a>
                </div>
                <div class="btn-container btn5">
                   <a href="./customer_feedback.php">Salary Report</a>
                </div>
                <div class="btn-container btn5">
                   <a href="./driver.php">Add </a>
                </div>
                <div class="btn-container btn5">
                   <a href="./helper.php">Add Attendance</a>
                </div>
             </div>
          </div>
       </div>

       <!--Content-->
    <div class="order-container">


      <?php require_once './includes/process_inc.php'; ?>

      <?php
      if(isset($_GET['add'])) {
         $checkSignup = $_GET['add'];

         //Checking for user deleting errors
         if($checkSignup == "success") {
            echo "<div class='status-field'><p class='success'>Details saved successfully.</p></div>";
         } else if($checkSignup == "unsuccess") {
            echo "<div class='status-field'><p class='error'>Not saved.</p></div>";
         }
      }
       ?>

      <h4 class="card-header text-center">
        <strong>Add</strong>
      </h4><br>

      <div class="class-body container mt-5">
        <form class="offset-md-3 col-md-6" action="./includes/process_Inc.php" method="post">
          <div class="md-form md-2">
            <label for="">Driver ID</label>
            <input type="text" name="did" class="form-control border border-secondary" placeholder="Enter Driver ID" value="">
          </div><br>
          <div class="mb-2">
            <label for="">No Of Delivery</label>
            <input type="number" class="form-control border border-secondary" name="num" min="0" value="0">
          </div><br>
          <div class="md-form mt-0">
            <input type="submit" class="btn btn-outline-success btn-block border border-success" name="add" value="ADD">
          </div><br>
        </form><br><br>
      </div>

  </div>


<!--  <div class="order-container">
   <div class="container">
     <?php
       include './includes/db_conn_inc.php';

       $sql = "SELECT* FROM driver";
       $result = mysqli_query($conn,$sql);
      ?>
      <div class="row justify-content-cener">
        <table class="table table-striped">
          <thead class="bg-info">
            <tr>
              <th>Driver ID</th>
              <th>No_Of_Delivery</th>
            </tr>
          </thead>
          <?php while($row=mysqli_fetch_assoc($result)){ ?>
            <tr>
              <td><?php echo $row['driver_id']; ?></td>
              <td><?php echo $row['no_of_delivery']; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
   </div>
 </div>-->


  <script type="text/javascript" src="./js/headsup.js">

  </script>
  </body>
</html>
