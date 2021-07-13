<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/customer.css">
    <link rel="stylesheet" href="./css/owner.css">
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

    <?php require_once './includes/process_inc.php'; ?>

    <?php
    if(isset($_GET['add3'])) {
       $checkSignup = $_GET['add3'];


       if($checkSignup == "success") {
          echo "<div class='status-field'><p class='success'>Salary details saved successfully</p></div>";
       }else if($checkSignup == "unsuccess") {
          echo "<div class='status-field'><p class='error'>Not saved.</p></div>";
       }else if($checkSignup  == "updated"){
         echo "<div class='status-field'><p class='success'>Record Updated.</p></div>";
       }else if($checkSignup == "not_updated"){
         echo"<div class='status-field'><p class='error'>Recor not updated.</p></div>";
       }
    }
     ?>

    <div class="order-container">

      <h5 class="card-header text-center">
          <strong>Add Salary Details</strong>
      </h5><br>

      <div class="Card-body container" style="background:##f0e9e9">

        <form class="" style="color:#1a1818;" action="./includes/process_inc.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">

          <!--Employee ID/Designation-->
          <div class="form-row">

            <!--Employee ID-->
            <div class="col">
            <div class="md-form">
              <label for="">Employee ID</label>
              <input type="text" class="form-control border border-secondary" name="empid" value="<?php echo $empid; ?>" placeholder="ID" required>
            </div>
          </div>

            <!--Designation-->
            <div class="col">
          <div class="md-form">
            <label for="">Designation</label>
            <select name="designation" class="form-control border border-secondary" id="inputGroupSelect01">
              <option selected>Choose The Bank Name...</option>
              <option value="Admin">Admin</option>
              <option value="Helper">Helper</option>
              <option value="Driver">Driver</option>
            </select>
          </div>
        </div>

        </div><br>

        <div class="">
          <label for="">Bonus</label>
          <input type="text" class="form-control border border-secondary" name="bonus" value="<?php echo $bonus; ?>" placeholder="Enter The Bonus">
        </div><br>

        <div class="form-row">

          <?php
            if ($update == true){
           ?>
           <div class="col">
             <div class="md-form">
               <button type="submit" class="btn btn-outline-success form-control border border-success" name="update2">Update The Record</button>
             </div>
           </div>
         <?php }else{ ?>
          <div class="col">
            <div class="md-form">
              <button type="submit" class="btn btn-outline-success form-control border border-success" name="add3">Save The Record</button>
            </div>
          </div>
        <?php } ?>

          <div class="col">
            <div class="md-form">
              <a href="./salary_table.php" class="btn btn-outline-info form-control border border-info" name="delete2" value="">Salary Table</a>
            </div>
          </div>

        </div>



        </form>
      </div>

  </div>
  <script type="text/javascript" src="./js/headsup.js">

  </script>
  </body>
</html>
