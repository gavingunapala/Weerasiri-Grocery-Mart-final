<?php 
session_start();
if(isset($_SESSION['customer_id'])) {
	include_once './includes/db_conn_inc.php';

	$connect = mysqli_connect("localhost", "root", "", "supermarketdb");

	if(isset($_POST["add_to_cart"]))
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
			if(!in_array($_GET["id"], $item_array_id))
			{
				$count = count($_SESSION["shopping_cart"]);
				$item_array = array(
					'item_id'			=>	$_GET["id"],
					'item_name'			=>	$_POST["hidden_name"],
					'item_price'		=>	$_POST["hidden_price"],
					'item_quantity'		=>	$_POST["item_quantity"]
				);
				$_SESSION["shopping_cart"][$count] = $item_array;
			}
			else
			{
				echo '<script>alert("Item Already Added")</script>';
			}
		}
		else
		{
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["item_quantity"]
			);
			$_SESSION["shopping_cart"][0] = $item_array;
		}
	}

	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "delete")
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($values["item_id"] == $_GET["id"])
				{
					unset($_SESSION["shopping_cart"][$keys]);
					echo '<script>alert("Item Removed")</script>';
					echo '<script>window.location="cart.php"</script>';
				}
			}
		}
	}

	?>
<!DOCTYPE html>
<html>

   <head>
      <title>WGM | Shopping Cart</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


      <link rel="icon" href="./icons/watermelon.svg">
      <link rel="stylesheet" href="./css/main.css">
      <link rel="stylesheet" href="./css/customer.css">
      <link rel="stylesheet" href="./css/cart.css">
   </head>

   <body>
      <div class="header-container">
         <header>
            <nav>
               <div class="name">
                  <h2>Weerasiri <span>Grocery Mart</span></h2>
               </div>
               <ul class="nav-links">
                  <li><a href="./customer_profile.php">Profile</a></li>
                  <li><a href="./cart.php" class="cart">Cart <img src="./icons/cart.svg" alt="cart"
                           class="cart-img"></a></li>
                  <li>
                     <form action="./includes/logout_inc.php" method="POST" id="logout-form">
                        <button type="submit" name="submit" class="logout-btn" id="logout"
                           onclick="return confirm(\'Do you want to log out from your account ?\')">Log out</button>
                     </form>
                  </li>
               </ul>
               <img src="./icons/menu-black.svg" alt="menu" id="menu">
               <img src="./icons/close.svg" alt="close" id="close">
            </nav>
         </header>
      </div>';
      <div class="content-container">
         <div class="profile-container">
            <div class="profile-content">
               <h2 class="hello">Hello,</h2>
               <h3><?php echo $_SESSION['customer_name'];?></h3>
               <div class="buttons">
                  <div class="btn-container btn1">
                     <img src="./icons/fruit-basket.svg" alt="basket">
                     <a href="Store.php">Start Shopping</a>
                  </div>
                  <div class="btn-container btn2">
                     <img src="./icons/review.svg" alt="review">
                     <a href="order_list.php">Order List</a>
                  </div>
                  <div class="btn-container btn3">
                     <img src="./icons/edit.svg" alt="edit">
                     <a href="./includes/details_pdf.php">Details Report</a>
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="order-container">
            <br />
            <div class="container">
               <h2>Ordered Items</h2>
               <br />

               <?php
				$query = "SELECT * FROM item ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				$count=0;
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>

               <?php
					}
				}
			?>
               <div style="clear:both"></div>
               <br />
               <h3>Cart Items</h3>
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <tr>
                        <th width="40%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                     </tr>
                     <?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
                     <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td> <?php echo $values["item_price"]; ?></td>
                        <td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>
                        </td>
                        <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                 class="text-danger">Remove</span></a></td>
                     </tr>
                     <?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
							$count = $count + ($values["item_quantity"]);
						}
					?>
                     <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">Rs. <?php echo number_format($total, 2); ?></td>
                        <td></td>
                     </tr>
                     <?php
					}
					?>

                  </table>
               </div>

               <br><br><br><br>
               <h2>Payment Method</h2>&nbsp;&nbsp;<br>

               <form action="" method="POST">
                  <input type="radio" name="example" value="Cash" required>&nbsp;&nbsp;Cash on delivery</option>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="example" value="Card">&nbsp;&nbsp;Card Payments</option>
                  <br><br>

                  <hr>
                  <h3>
                     <center>
                        <input type="submit" value="Checkout" name="checkout"><br>

                        <?php
if(isset($_POST['checkout'])) {
	$example = $_POST['example'];
	$customerID = $_SESSION['customer_id'];

	$sql = "INSERT INTO customer_order(no_of_items,payment_method,total_price,customer_id) 
    VALUES('$count','$example','$total', '$customerID')";

	$result = mysqli_query($conn, $sql);	

   if($result)
   {
      echo "<h2>! Your order has been placed successfully !</h2>";
   }
   else{
      echo "Not added";
   }
}
?>

                        <!--- onclick="myfunction()"> -->
               </form>

            </div>
         </div>

         <br />
      </div>
   </body>
   <script src="./js/cart.js"></script>
   <script src="./js/menu.js"></script>
   <script src="./js/headsup.js"></script>

</html>

<?php
	

 }         
?>