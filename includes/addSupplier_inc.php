<?php
if(isset($_POST['submit'])) {
   include_once 'db_conn_inc.php';
   require_once '../vendor/autoload.php';

   $sname = $_POST['s_name'];
   $cname = $_POST['cmpny_name'];
   $product = $_POST['item'];
   $mobile = $_POST['cntct'];
   $bankAcc = $_POST['bnk_acc'];
   $bankName = $_POST['bnk'];

   $sql = "INSERT INTO supplier (supplier_name, supplier_company_name, supplier_product, supplier_mobile, supplier_bank_acc_no, supplier_bank) VALUES ('$sname', '$cname', '$product', '$mobile', '$bankAcc', '$bankName');";
   $result = mysqli_query($conn, $sql);

   $mpdf = new \Mpdf\Mpdf();

   $supplierDetails = '';

   //Concatenating html and data into variable
   $supplierDetails .= '<h1>Weerasiri Grocery Mart</h1>';
   $supplierDetails .= '<p>A1, Yakkala</p><hr>';
   $supplierDetails .= '<h2>Supplier Details</h2><br>';
   $supplierDetails .= '<strong>Supplier Name : </strong>'.$sname.'<br />';
   $supplierDetails .= '<strong>Supplier Company Name : </strong>'.$cname.'<br />';
   $supplierDetails .= '<strong>Supplying Product : </strong>'.$product.'<br />';
   $supplierDetails .= '<strong>Supplier Mobile No : </strong>'.$mobile.'<br />';
   $supplierDetails .= '<strong>Supplier Bank Account : </strong>'.$bankAcc.'<br />';
   $supplierDetails .= '<strong>Supplier Bank Name : </strong>'.$bankName.'<br />';

   $mpdf->WriteHTML($supplierDetails);

   $mpdf->Output('Supplier Details.pdf', 'D');

   // Close connection
   mysqli_close($conn);

}else{
  echo "Something went wrong!";
}

?>
