<?php
    include('database.php');
	
	session_start();
	$result = $_SESSION['result'];
	$u_mob = "";
	$u_mob = $result['mobile'];
	
	if($_POST)
	{
		
		
        $errors = array();
        if(empty($_POST['medicine']))
        {
            $errors['med1'] = "Please Enter Medicine Name";
        }      

        if(empty($_POST['quantity']))
        {
            $errors['quan1'] = "Please Enter Quantity";
        }
		
		if(empty($_POST['power']))
        {
            $errors['pow1'] = "Please Enter Power";
        }
		
		if(count($error)==0)
		{
			$medicine = mysqli_real_escape_string($connection, $_POST['medicine']);
			$quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
			$power = mysqli_real_escape_string($connection, $_POST['power']);
			$select = mysqli_query($connection, "SELECT * from MedicineTable where medicine_name = '$medicine'");
			$mprice = mysqli_fetch_array($select);
			$price = $quantity*$mprice['medicine_price'];
			$update = mysqli_query($connection, "INSERT INTO PurchaseTable(mobile, medicine_name, quantity, power, price) values
											  ('$u_mob', '$medicine', '$quantity', '$power', '$price')");
		  
			  if($update)
			  {
			  	header('Location:purchase.php');
			  }
			  else
			  {
				header('Location:purchase.php');		 
			  }						  
              exit();
		}
	}
?>



<!doctype html>
<html>
<head>
<title>Purchase Page</title>
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<div class="form-style-5">
	<h2>Purchase</h2>
	<form action="" method="post" name="login">
	<p>
		<label for="medicine">Medicine Name</label>
		<input type="text" name="medicine" />
	</p>
	
	<p><?php if(isset($errors['med1'])) echo $errors['med1']; ?></p>
	
	<p>
		<label for="quantity">Quantity</label>
		<input type="number" name="quantity" />
	</p>
	
	<p><?php if(isset($errors['quan1'])) echo $errors['quan1']; ?></p>
	
	<p>
		<label for="power">Power</label>
		<input type="text" name="power" />
	</p>
	
	<p><?php if(isset($errors['pow1'])) echo $errors['pow1']; ?></p>
	
	<p>
		<input type="submit" name="add" value="Add"/>
		<a href="receipt.php">Show Receipt</a>
		<a href='userpage.php'>Go Home</a>
	</p>
	</form>
	</div>
</body>
</html>