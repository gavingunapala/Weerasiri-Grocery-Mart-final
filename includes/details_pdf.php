<?php
   session_start();
   require_once '../vendor/autoload.php';

   //Creating mpdf instance
   $mpdf = new \Mpdf\Mpdf();

   $customerData = '';
   date_default_timezone_set("Asia/Colombo");

   //Concatenating html and data into variable
   $customerData .= '<div style="text-align: center;">';
   $customerData .= '<h1>Weerasiri Grocery Mart</h1>';
   $customerData .= '<p>A1, Yakkala</p><hr>';
   $customerData .= '</div>';
   $customerData .= '<h2>Your Profile Details</h2><br>';
   $customerData .= '<strong>Customer Name - </strong>'.$_SESSION['customer_name'].'<br><br>';
   $customerData .= '<strong>Customer Email - </strong>'.$_SESSION['customer_email'].'<br><br>';
   $customerData .= '<strong>Customer Username - </strong>'.$_SESSION['customer_username'].'<br><br>';
   $customerData .= '<strong>Customer Mobile No - </strong>'.$_SESSION['customer_mobile'].'<br><br>';
   $customerData .= '<strong>Customer Address - </strong>'.$_SESSION['customer_address'].'<br><br>';
   $customerData .= '<p>Generated on - '.date("Y-m-d   h:i:a").'</p>';
   //Writing pdf
   $mpdf->WriteHTML($customerData);
   //Outputting to browser as pdf
   $mpdf->Output('My Details.pdf', 'D');
?>