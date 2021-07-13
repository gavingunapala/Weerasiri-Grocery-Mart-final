<?php
require_once '../vendor/autoload.php';
//Grab variable
$customerID = $_POST['customerid'];
$reviewID = $_POST['reviewid'];
$category = $_POST['review_category__id'];
$feedback = $_POST['message'];

//create new PDF instance
$mpdf = new \Mpdf\Mpdf();

//create our PDF
$data = '';
$data .= '<h1>Your details</h1>';


//Add data
$data .='<strong>CustomerID</strong> ' .$customerID. '<br/>';
$data .='<strong>ReviewID</strong> ' .$reviewID. '<br/>';
$data .='<strong>Category</strong> ' .$category. '<br/>';
$data .='<strong>Feedback</strong> ' .$feedback. '<br/>';



if($message)
{
    $data  .= '<br/><strong>Message</strong><br />' . $feedback;
}



$mpdf->WriteHTML($data);
//output
$mpdf->output('mypdf.pdf','D');