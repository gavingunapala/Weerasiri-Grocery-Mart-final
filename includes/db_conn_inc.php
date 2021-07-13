<?php
   //Setting up variables
   $dbServername = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "supermarketdb";

   //Creating connection object
   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

   //Terminating connection
   if($conn->connect_error) {
      die($conn->connect_error);
   }
?>