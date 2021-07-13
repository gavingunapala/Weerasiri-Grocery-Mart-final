<?php
   session_start();

   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      //Setting up variables and escaping special characters (like sql statements)
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $currentPassword = mysqli_real_escape_string($conn, $_POST['current_password']);

      //Error handling
      //Checking for empty inputs
      if(empty($name) || empty($email) || empty($username) || empty($newPassword) || empty($mobile) || empty($address) || empty($currentPassword)) {
         header("Location: ../edit_customer_profile.php?edit=empty");
         exit();
      } else {
         //Checking for valid name
         if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            header("Location: ../edit_customer_profile.php?edit=name_invalid");
            exit();
         } else {
            //Checking for valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               header("Location: ../edit_customer_profile.php?edit=email_invalid");
               exit();
            } else {
               //Checking for invalid mobile number
               if(!preg_match("/^[0-9]*$/", $mobile) || strlen($mobile) != 10) {
                  header("Location: ../edit_customer_profile.php?edit=mobile_invalid");
                  exit();
               } else {
                  $OldPassword =  $_SESSION['customer_password'];
                  $hashedOldPasswordCheck = password_verify($currentPassword, $OldPassword);

                  if($hashedOldPasswordCheck == false) {
                     header("Location: ../edit_customer_profile.php?edit=old_password_invalid");
                     exit();
                  } else if($hashedOldPasswordCheck == true) {
                     //Hashing the new password
                     $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                     //Updating user to table
                     $customerID = $_SESSION['customer_id'];
                     $sql = "UPDATE customer SET customer_name='$name', customer_email='$email', customer_username='$username', customer_password='$hashedNewPassword', customer_mobile='$mobile', customer_address='$address' WHERE customer_id='$customerID'";
                     $result = mysqli_query($conn, $sql);

                     //Updating sessions
                     $_SESSION['customer_name'] = $name;
                     $_SESSION['customer_email'] = $email;
                     $_SESSION['customer_username'] = $username;
                     $_SESSION['customer_password'] = $hashedNewPassword;
                     $_SESSION['customer_mobile'] = $mobile;
                     $_SESSION['customer_address'] = $address;

                     header("Location: ../customer_profile.php?edit=success");
                     exit();
                  }
               }
            }
         }
      }  
   }
?>