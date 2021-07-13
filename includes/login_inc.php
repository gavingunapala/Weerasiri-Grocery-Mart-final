<?php
   session_start();
   
   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      //Setting up variables and escaping special characters (like sql statements)
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      //Error handling
      //Checking for empty inputs
      if(empty($username) || empty($password)) {
         header("Location: ../login.php?login=empty");
         exit();
      } else {
         //Searching for username in database
         $sql = "SELECT * FROM customer WHERE customer_username='$username'";
         $result = mysqli_query($conn, $sql);
         $checkResult = mysqli_num_rows($result);

         //Checking if there is any matching username
         if($checkResult < 1) {
            header("Location: ../login.php?login=invalid&username=$username");
            exit();
         } else {
            if ($row = mysqli_fetch_assoc($result)) {
               //Dehashing the password
               $hashedPasswordCheck = password_verify($password, $row['customer_password']);

               if($hashedPasswordCheck == false) {
                  header("Location: ../login.php?login=invalid&username=$username");
                  exit();
               } else if($hashedPasswordCheck == true) {
                  //Creating sessions and login user
                  $_SESSION['customer_id'] = $row['customer_id'];
                  $_SESSION['customer_name'] = $row['customer_name'];
                  $_SESSION['customer_email'] = $row['customer_email'];
                  $_SESSION['customer_username'] = $row['customer_username'];
                  $_SESSION['customer_password'] = $row['customer_password'];
                  $_SESSION['customer_mobile'] = $row['customer_mobile'];
                  $_SESSION['customer_address'] = $row['customer_address'];

                  header("Location: ../customer_profile.php?login=success");
                  exit();
               }
            }
         }
      }
   } else {
      header("Location: ../login.php");
      exit();
   }
?>