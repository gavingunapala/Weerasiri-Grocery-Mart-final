<?php
   session_start();
      include_once 'db_conn_inc.php';

      $PName = $_POST['p_name'];
      $category = $_POST['category'];
      $Disc = $_POST['discription'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $image =  time(). '_' . $_FILES['image']['name'];


//validate price
if($price > 0){


//add items to table.
      $sql = "INSERT INTO  item (item_name,item_unit_price,item_description,item_quentity,item_image,item_categery)
      VALUES('$PName','$price','$Disc ','$quantity','$image','$category')";
      $result = mysqli_query($conn,$sql);
      
//check img upload.
      if( $result== true)
      {
            $target='../img/';
            move_uploaded_file($_FILES["image"]["tmp_name"],$target.$image);
            header("Location: ../update_items.php?add_items=success");
      }
      else{
            header("Location: ../update_items.php?add_items=unsuccess");     
            exit();
      }
 }
 else{
      header("Location: ../update_items.php?price=invalidprice");
      exit();


 }

?>

    