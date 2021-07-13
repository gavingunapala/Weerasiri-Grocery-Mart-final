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

       <!--Content-->

    <div class="order-container">
    <div class="Card">

      <?php
      if(isset($_GET['save'])) {
         $checkSignup = $_GET['save'];

         //Checking for user deleting errors
         if($checkSignup == "success") {
            echo "<div class='status-field'><p class='success'>Employee Details added successfully</p></div>";
         } else if($checkSignup == "unsuccess") {
            echo "<div class='status-field'><p class='error'>Not saved</p></div>";
         }elseif ($checkSignup == "empty_invalid") {
            echo "<p class='error'>You have to fill all the fields</p>";
         } else if($checkSignup == "fname_invalid") {
            echo "<p class='error'>Enter a valid first name</p>";
         } else if($checkSignup == "lname_invalid") {
            echo "<p class='error'>Enter a valid last name</p>";
         } else if($checkSignup == "email_invalid") {
            echo "<p class='error'>Enter a valid email</p>";
         } else if($checkSignup == "user_exists") {
            echo "<p class='error'>This username is already taken</p>";
         } else if($checkSignup == "mobile_invalid") {
            echo "<p class='error'>Enter a valid mobile number</p>";
         }
      }
       ?>

      <h5 class="card-header text-center">
          <strong>Add Employee</strong>
      </h5><br>

      <div class="Card-body container" style="background:">

        <form class="" style="color:;" action="./includes/process_inc.php" method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <!--Profile Picture-->
            <?php
              if(isset($_GET['image'])){
                $name = $_GET['image'];
                ?>
                <div class="col">
                  <div class="md-form">
                    <label for="">Select the profile picture</label>
                    <input type="file" name="file" class="form-control border border-secondary" autocomplete="off" value="<?php echo $name; ?>" >
                  </div>
                </div>
                <?php
              }else{?>
                <div class="col">
                  <div class="md-form">
                    <label for="">Select the profile picture</label>
                    <input type="file" name="file" class="form-control border border-secondary" autocomplete="off" value="" >
                  </div>
                </div>
                <?php
              }
             ?>
            <!--First Name -->
            <?php
              if(isset($_GET['fname'])){
                $fname = $_GET['fname'];
                ?>
                <div class="col">
                  <div class="md-form">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control border border-secondary" autocomplete="off" value="<?php echo $fname; ?>" placeholder="Enrer your First Name" >
                  </div>
                </div>
                <?php
              }else{
                ?>
                <div class="col">
                  <div class="md-form">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control border border-secondary" autocomplete="off" placeholder="Enrer your First Name" >
                  </div>
                </div>
                <?php
              }
            ?>

            <!--Last Name -->
            <?php
              if(isset($_GET['lname'])){
                $lname = $_GET['lname'];
                ?>
                <div class="col">
                  <div class="md-form">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control border border-secondary" value="<?php echo $lname; ?>" autocomplete="off" placeholder="Enrer your Last Name" >
                  </div>
                </div>
                <?php
              }else{
                ?>
                <div class="col">
                  <div class="md-form">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control border border-secondary" autocomplete="off"  placeholder="Enrer your Last Name" >
                  </div>
                </div>
                <?php
              }
             ?>
          </div><br>

          <!--NIC / Bank Account_Number-->
          <div class="form-row">
            <!--NIC-->
            <?php
              if(isset($_GET['nic'])){
                $nic = $_GET['nic'];
                ?>
                <div class="col">
              <div class="md-form">
                <label for="">NIC Number</label>
                <input type="text" class="form-control border border-secondary" name="nic" value="<?php echo $nic ?>" autocomplete="off" placeholder="NIC">
              </div>
            </div>
                <?php
              }else{
                ?>
                <div class="col">
              <div class="md-form">
                <label for="">NIC Number</label>
                <input type="text" class="form-control border border-secondary" name="nic" autocomplete="off" placeholder="NIC">
              </div>
            </div>
                <?php
              }
             ?>


          <!--Bank Account-->
          <?php
          if(isset($_GET['accno'])){
            $accno = $_GET['accno'];?>

            <div class="col">
            <div class="md-form">
              <label for="">Bank Account Number</label>
              <input type="text" class="form-control border border-secondary" name="accno" autocomplete="off" value="<?php echo $accno; ?>" placeholder="Bank Account Number">
            </div>
          </div>
          <?php
        }else{ ?>
          <div class="col">
          <div class="md-form">
            <label for="">Bank Account Number</label>
            <input type="text" class="form-control border border-secondary" name="accno" autocomplete="off" placeholder="Bank Account Number">
          </div>
        </div>
      <?php }?>
        </div><br>

        <!--Bank/DOB-->
        <div class="form-row">
          <!--Bank-->

              <div class="col">
            <div class="md-form">
              <label for="">Bank</label>
              <select name="bank" class="form-control" id="inputGroupSelect01">
                <option selected>Choose The Bank Name...</option>
                <option value="BOC">BOC</option>
                <option value="Peopel's Bank">Peopel's Bank</option>
                <option value="Commercial Bank">Commercial Bank</option>
                <option value="Sampath Bank">Sampath Bank</option>
                <option value="HNB">HNB</option>
                <option value="NTB">NTB</option>
              </select>
            </div>
          </div>



        <!--DOB-->
        <?php
          if(isset($_GET['date'])){
            $date = $_GET['date'];?>
            <div class="col">
            <div class="md-form">
              <label for="">DOB</label>
              <input type="date" class="form-control border border-secondary" name="date" autocomplete="off" value="<?php echo $date; ?>" placeholder="Bank Account Number" >
            </div>
          </div>
            <?php
          }else{
            ?>
            <div class="col">
            <div class="md-form">
              <label for="">DOB</label>
              <input type="date" class="form-control border border-secondary" name="date" autocomplete="off" placeholder="Bank Account Number" >
            </div>
          </div>
            <?php
          }
         ?>
      <!--  <div class="col">
        <div class="md-form">
          <label for="">DOB</label>
          <input type="date" class="form-control border border-secondary" name="date" placeholder="Bank Account Number" required>
        </div>
      </div>-->
      </div><br>


          <!--Designation-->

          <div class="md-form mt-0">
            <label for="">Designation</label>
            <select name="designation" class="form-control" id="inputGroupSelect01">
              <option selected>Choose The Designation...</option>
              <option value="Driver">Driver</option>
              <option value="Helper">Helper</option>
            </select>
          </div><br>

          <!--TelePhone -->
          <?php if(isset($_GET['number'])){
            $number = $_GET['number'];?>
            <div class="md-form mt-0">
              <label for="">Telephone Number</label>
              <input type="text" class="form-control border border-secondary" autocomplete="off" name="number" value="<?php echo $number; ?>">
            </div><br>
            <?php
          }else {?>
          <div class="md-form mt-0">
            <label for="">Telephone Number</label>
            <input type="text" class="form-control border border-secondary" autocomplete="off" name="number" value="">
          </div><br>
        <?php } ?>

          <!--Email -->
          <?php
          if(isset($_GET['email'])){
            $email = $_GET['email'];?>
            <div class="md-form mt-0">
              <label for="">Email</label>
              <input type="text" class="form-control border border-secondary" name="email" autocomplete="off" value="<?php echo $email; ?>">
            </div><br>
            <?php
          }else{ ?>
          <div class="md-form mt-0">
            <label for="">Email</label>
            <input type="text" class="form-control border border-secondary" name="email" value="">
          </div><br>
        <?php } ?>

          <!--Address-->
          <?php if(isset($_GET['address'])){
            $adr = $_GET['address'];?>
            <div class="form-group black-border">
                <label for="">Address</label>
                <textarea name="address" rows="3" class="form-control border border-secondary"><?php echo $adr ?></textarea>
            </div><br><?php
          }else{ ?>
          <div class="form-group black-border">
              <label for="">Address</label>
              <textarea name="address" rows="3" class="form-control border border-secondary"></textarea>
          </div><br>
        <?php } ?>

          <div class="md-form mt-0">
            <button type="submit" class="btn btn-success form-control border border-success" name="save">ADD</button>
          </div><br>

        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="./js/headsup.js">

  </script>
  </body>
</html>
