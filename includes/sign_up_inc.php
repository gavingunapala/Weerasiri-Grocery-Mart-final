<?php
   if(isset($_POST['submit'])) {
      include_once 'db_conn_inc.php';

      //Setting up variables and escaping special characters (like sql statements)
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $city = mysqli_real_escape_string($conn, $_POST['city']);
      
      //Error handling
      //Checking for empty inputs
      if(empty($name) || empty($email) || empty($username) || empty($password) || empty($mobile) || empty($address) || empty($city)) {
         header("Location: ../sign_up.php?signup=empty&name=$name&email=$email&username=$username&mobile=$mobile&address=$address&city=$city");
         exit();
      } else {
         //Checking for valid name
         if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            header("Location: ../sign_up.php?signup=name_invalid&email=$email&username=$username&mobile=$mobile&address=$address&city=$city");
            exit();
         } else {
            //Checking for valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               header("Location: ../sign_up.php?signup=email_invalid&name=$name&username=$username&mobile=$mobile&address=$address&city=$city");
               exit();
            } else {
               //Checking for existing username
               $sql = "SELECT * FROM customer WHERE customer_username='$username'";
               $result = mysqli_query($conn, $sql);
               $checkResult = mysqli_num_rows($result);

               if($checkResult > 0) {
                  header("Location: ../sign_up.php?signup=user_exists&name=$name&email=$email&username=$username&mobile=$mobile&address=$address&city=$city");
                  exit(); 
               } else {
                  //Checking for invalid mobile number
                  if(!preg_match("/^[0-9]*$/", $mobile) || strlen($mobile) != 10) {
                     header("Location: ../sign_up.php?signup=mobile_invalid&name=$name&email=$email&username=$username&address=$address&city=$city");
                     exit();
                  } else {
                     //Checking for invalid city   City should only be yakkala.
                     $cityCheck = strcasecmp("Yakkala", $city);
                     
                     if($cityCheck != 0) {
                        header("Location: ../sign_up.php?signup=city_invalid&name=$name&email=$email&username=$username&mobile=$mobile&address=$address");
                        exit();
                     } else {
                        //Hashing the password
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        //Inserting user to table
                        $sql = "INSERT INTO customer (customer_name, customer_email, customer_username, customer_password, customer_mobile, customer_address) VALUES ('$name', '$email', '$username', '$hashedPassword', '$mobile', '$address');";
                        $result = mysqli_query($conn, $sql);

                        header("Location: ../login.php?signup=success");
                        exit();
                     }
                  }
               }
            }
         }
      }
   } else {
      header("Location: ../sign_up.php");
      exit();
   }
?>