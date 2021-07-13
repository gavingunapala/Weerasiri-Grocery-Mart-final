<?php
   include_once 'db_conn_inc.php';

   if(isset($_POST['insert'])) {
       $order_id = $_POST['order_id'];
       $customer_name = $_POST['name'];
       $customer_address = $_POST['address'];
       $driver_id = $_POST['Did'];
       $vehicle_id = $_POST['id'];
       $status = $_POST['status'];  

    //    $order_id = $_SESSION['order_id'];

      //   echo $order_id;
      //   echo $driver_id;
      //  echo $customer_name;
      //  echo $customer_address;
      //  echo $vehicle_id;
      //  echo $status;

       $sql = "INSERT INTO delivery(order_id, driver_id, customer_name, customer_address, 
       vehicle_id, delivery_status) 
       VALUES ($order_id, $driver_id, '$customer_name', '$customer_address', $vehicle_id, '$status')";
       $result = mysqli_query($conn, $sql);
       

       if($result == false) {
              header("Location: ../all_deliveries.php");
        }
        else {
             header("Location: ../all_deliveries.php");
        }

   }
?>
