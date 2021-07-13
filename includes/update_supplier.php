</<?php
    session_start();
    include_once 'db_conn_inc.php';

    if(isset($_POST['submit'])){

      $supplierID = $_POST['supplierID'];
      $sname = $_POST['s_name'];
      $cname = $_POST['cmpny_name'];
      $product = $_POST['item'];
      $mobile = $_POST['cntct'];
      $bankAcc = $_POST['bnk_acc'];
      $bankName = $_POST['bnk'];

      $sql = "UPDATE supplier SET supplier_name='$sname', supplier_company_name='$cname', supplier_product='$product', supplier_mobile='$mobile', supplier_bank_acc_no='$bankAcc', supplier_bank='$bankName' WHERE supplier_id='$supplierID'";
      $result = mysqli_query($conn, $sql);
      header("location:../supplier_manager.php");

      // Close connection
      mysqli_close($conn);

   }else{
      header("location:../404.html");
   }

 ?>
