<!--Jake Johnson 4.29.2018-->

<?php

// https://phppot.com/php/simple-php-shopping-cart/

session_start();

$thisUser = "Tina";
echo "user: ";
echo $thisUser;
echo "<br>";

require_once("dbcontroller.php");

$mysqli = new mysqli('localhost', 'root', 'skate100', 'hoh_online_ordering');

$db_handle = new DBController();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {

	case "add":
		$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
		$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>1, 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] = 1;
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	break;

	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;

	case "checkout":

		// check if cart is empty
		if(!empty($_SESSION["cart_item"])){

			// var for if you can order
			$canOrder = True;

			// check if user already has an order in database
			$result = $mysqli->query("SELECT user FROM tblorders");
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if ($row["user"] == $thisUser){
	    				echo "We already have an order placed in your name <br>";
	    				$canOrder = False;
	    			}
	    		}
			}
			// add order to database if user does not already have a order placed
			// https://stackoverflow.com/questions/15703608/php-mysql-query-where-x-variable
			if($canOrder == True){
				// start a row with user name
				$mysqli->query("INSERT INTO `tblorders`(`user`, `CANFRUT`, `CANVEGI`, 
					`TUNA`, `PB`, `CHILI`, `PASTA`, `CANSOUP`, `SNACKS`, `BREAD`, `PRODUCE`) VALUES
				 ('".$thisUser."',0,0,0,0,0,0,0,0,0,0)");
				// update the row with each item in session shopping cart
				foreach($_SESSION["cart_item"] as $k => $v){
					$mysqli->query("UPDATE tblorders SET ".$k." = 1 WHERE user = '".$thisUser."'");
				}

				echo "We have processed your order <br>";
			}

		}

		// Unset cart
		unset($_SESSION["cart_item"]);

	break;	

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Ordering</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<a id="btnCheckOut" href="index.php?action=checkout">Check Out</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>

<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
		}
		?>
</tbody>
</table>		
  <?php
} 
else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="100" height ="100"></div>
			<div class="product-tile-footer">
			<div class="product-title-and-adding">
				<?php echo $product_array[$key]["name"]; ?>
				<input type="submit" value="Add to Cart" class="btnAddAction" />
			</div>
<!-- 			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div> -->			
<!-- 			<div class="cart-action"><input type="submit" value="Add to Cart" class="btnAddAction" /></div> -->	
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>