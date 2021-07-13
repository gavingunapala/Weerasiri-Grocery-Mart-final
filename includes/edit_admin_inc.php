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
      $acc_no = mysqli_real_escape_string($conn, $_POST['acc_no']);
      $bank = mysqli_real_escape_string($conn, $_POST['bank']);
      $currentPassword = mysqli_real_escape_string($conn, $_POST['current_password']);

      //Error handling
      //Checking for empty inputs
      if(empty($name) || empty($email) || empty($username) || empty($newPassword) || empty($mobile) || empty($acc_no) || empty($bank) || empty($currentPassword)) {
         header("Location: ../admin_edit_profile.php?edit=empty");
         exit();
      } else {
         //Checking for valid name
         if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            header("Location: ../admin_edit_profile.php?edit=name_invalid");
            exit();
         } else {
            //Checking for valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               header("Location: ../admin_edit_profile.php?edit=email_invalid");
               exit();
            } else {
               //Checking for invalid mobile number
               if(!preg_match("/^[0-9]*$/", $mobile) || strlen($mobile) != 10) {
                  header("Location: ../admin_edit_profile.php?edit=mobile_invalid");
                  exit();
               } else {
                  $OldPassword =  $_SESSION['admin_password'];
                  
                  if($OldPassword != $currentPassword) {
                     header("Location: ../admin_edit_profile.php?edit=old_password_invalid");
                     exit();
                  } else {
                     //Updating user to table
                     $adminID = $_SESSION['admin_id'];
                     $sql = "UPDATE admin SET admin_name='$name', admin_email='$email', admin_username='$username', admin_password='$newPassword', admin_mobile='$mobile', admin_acc_no='$acc_no', admin_bank='$bank' WHERE admin_id='$adminID'";
                     $result = mysqli_query($conn, $sql);

                     //Updating sessions
                     $_SESSION['admin_name'] = $name;
                     $_SESSION['admin_email'] = $email;
                     $_SESSION['admin_username'] = $username;
                     $_SESSION['admin_password'] = $newPassword;
                     $_SESSION['admin_mobile'] = $mobile;
                     $_SESSION['admin_acc_no'] = $acc_no;
                     $_SESSION['admin_bank'] = $bank;

                     header("Location: ../admin_edit_profile.php?edit=success");
                     exit();
                  }
               }
            }
         }
      }  
   }
?>