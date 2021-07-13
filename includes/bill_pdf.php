<?php 
session_start();
require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
date_default_timezone_set("Asia/Colombo");

$customerData .= '<div style="text-align: center;">';
$customerData .= '<h1>Weerasiri Grocery Mart</h1>';
$customerData .= '<p>A1, Yakkala</p><hr>';
$customerData .= '</div>';
$customerData .= '<h2>Your Profile Details</h2><br>';
$customerData .= '<strong>Customer Name - </strong>'.$_SESSION['customer_name'].'<br><br>';
$customerData .= '<p>Generated on - '.date("Y-m-d   h:i:a").'</p>';

    $mpdf->WriteHTML($customerData);
    $mpdf->Output('My Bill Details.pdf', 'D');
?>
