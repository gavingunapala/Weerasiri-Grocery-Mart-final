<?php session_start(); ?>
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

       <?php require_once './includes/process_inc.php' ?>
       <?php
       if(isset($_GET['delete2'])) {
          $checkSignup = $_GET['delete2'];


          if($checkSignup == "success") {
             echo "<div class='status-field alert-danger'><p class='success'>Record has been deleted.</p></div>";
          } else if($checkSignup == "unsuccess") {
             echo "<div class='status-field danger'><p class='error'>Record ha not been deleted.</p></div>";
          }
       }
        ?>

       <!--Content-->
    <div class="order-container">

    <h4 class="card-header text-center">
        <strong>Salary Details</strong>
    </h4><br>
    <div class="container">
    <?php
      include './includes/db_conn_inc.php';

      $sql = "SELECT* FROM salary";
      $query = mysqli_query($conn,$sql);
     ?>
    <div class="row justify-content-center">
      <table class="table table-striped " >
        <thead class="bg-info">
          <tr>
            <th>Salary ID</th>
            <th>Employee ID</th>
            <th>Basic Salary</th>
            <th>Salary Frequency</th>
            <th>Bonus</th>
            <th>Net Salary</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <?php while($row=mysqli_fetch_assoc($query)){?>
          <tr>
            <td><?php echo $row['salary_id']; ?></td>
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['basic_salary']; ?></td>
            <td><?php echo $row['salary_frequency']; ?></td>
            <td><?php echo $row['bonus']; ?></td>
            <td><?php echo $row['net_salary']; ?></td>

            <td>
              <a href="salary.php?edit2=<?php echo $row['salary_id'];?>" class="btn btn-outline-primary border border-primary"  value="UPDATE">UPDATE</a>
              <a href="./includes/process_inc.php?delete2=<?php echo $row['salary_id'];?>" class="btn btn-outline-danger border border-danger"  value="DELETE">DELETE</a>

            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
    <script type="text/javascript" src="./js/headsup.js">

    </script>
  </body>
</html>
