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
					'item_quantity'		=>	$_POST["quantity"]
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
				'item_quantity'		=>	$_POST["quantity"]
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
					echo '<script>window.location="Store.php"</script>';
				}
			}
		}
	}

	if(isset($_POST['submit'])) {
		$searchKey = $_POST['search'];
		$sql = "SELECT * FROM item WHERE 'name' LIKE '%$searchKey%'";
	 }
	 else { 
		$sql = "SELECT * FROM item";
	 }
	 $customers = mysqli_query($conn, $sql);
	 $checkResult = mysqli_num_rows($customers);




	?>
<!DOCTYPE html>
<html>

   <head>
      <title>WGM | Store</title>
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

                     <a href="">Bakery items</a>
                  </div>
                  <div class="btn-container btn2">

                     <a href="#">Household items</a>
                  </div>
                  <div class="btn-container btn3">

                     <a href="">Snacks</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="order-container">
            <br />
            <div class="container">
               <div class="form-container">
                  <form method="POST" class="search-form">
                     <p>Enter product name to search items</p>
                     <input type="text" name="search" id="search" placeholder="Search...">
                     <button type="submit" name="submit"><img src="./icons/search.svg" alt="search"
                           id="search"></button>
                  </form>
               </div>

               <br />
               <center>
                  <h1>Store</h1>
               </center>
               <br /><br />
               <?php
				$query = "SELECT * FROM item ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
               <div class="col-md-4">
                  <form method="post" action="Store.php?action=add&id=<?php echo $row["id"]; ?>">
                     <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;"
                        align="center">
                        <img src="img/<?php echo $row["item_image"]; ?>" class="img-responsive" /><br />

                        <h4 class="text-info"><?php echo $row["item_name"]; ?></h4>

                        <h4 class="text-danger">Rs. <?php echo $row["item_unit_price"]; ?>.00</h4>

                        <input type="number" name="quantity" value="1" min="1" class="form-control" />

                        <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />

                        <input type="hidden" name="hidden_price" value="<?php echo $row["item_unit_price"]; ?>" />

                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                           value="Add to Cart" />

                           

                     </div>
                     
                  </form>
               </div>
               
               <?php
					}
				}
			?>


            </div>
         </div>

         <br />
      </div>
   </body>

</html>

<?php
	

 }         
?>