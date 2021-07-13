<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/employee_box.css">
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



      <?php
      if(isset($_GET['delete'])) {
         $checkSignup = $_GET['delete'];

         //Checking for user deleting errors
         if($checkSignup == "success") {
            echo "<div class='status-field'><p class='success'>Employee profile deleted successfully</p></div>";
         } else if($checkSignup == "unsuccess") {
            echo "<div class='status-field'><p class='error'>Not Deleted.</p></div>";
         }
      }
       ?>

      <h5 class="card-header text-center">
          <strong>Employee Details</strong>
      </h5><br><br>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8" id="emp-search">
            <form class="" method="POST">
              <div class=" row no-gutters align-items-center">
                <div class="col-auto">
                  <i class="fas fa-search h4 text-body"></i>
                    </div>
                      <div class="col">
                        <input name="nic" class="form-control form-control-lg form-control-borderless border border-secondary" width="200px" type="search" placeholder="Enter Nic Number..">
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-outline-primary border border-info" name="search" type="submit">Search</button>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
      </div><br>

      <div class="container">
        <?php
          include 'includes/db_conn_inc.php';
          if(isset($_POST['search'])){

            $search = $_POST['nic'];
            $query = "SELECT employee_id, image, first_name, last_name, nic, designation FROM employee WHERE NIC='$search' or First_Name='$search'";

          }else{
            $query = "SELECT employee_id, image, first_name, last_name, nic, designation FROM employee";
          }

          $result = mysqli_query($conn,$query);

          if($result):
            if(mysqli_num_rows($result)>0):
              while($product = mysqli_fetch_assoc($result)):
          ?>
          <div class="col-sm-4 col-md-3">
            <form class="" action="" method="post">
              <div class="products">
                <h3><?php echo $product['designation']; ?></h3>
                <img src="./images/<?php echo $product['image']; ?>" class="xard-img-top" width="150px" height="150px" alt=""><br>
                ID: <?php echo $product['employee_id']; ?><br>
                First_Name: <?php echo $product['first_name']; ?><br>
                Last_Name: <?php echo $product['last_name']; ?><br>
                Nic: <?php echo $product['nic']; ?><br>
              <div class="form-row">
                <!-- View Profile -->
                <div class="col">
                  <div class="md-form">
                    <a href="profile.php?edit=<?php echo $product['employee_id'] ?>" class="btn btn-outline-warning">View Profile</a>
                  </div>
                </div>
                <!-- Delete Profile -->
                <div class="col">
                  <div class="md-form">
                    <a href="./includes/process_inc.php?delete=<?php echo $product['employee_id'] ?>" class="btn btn-outline-danger">Delete Profile</a>
                  </div>
                </div>
              </div><br>
            </div>
            </form>
          </div>
          <?php
        endwhile;
      endif;
    endif;

          ?>
          </div>

    </div>
    <script type="text/javascript" src="./js/headsup.js">

    </script>
  </body>
</html>
