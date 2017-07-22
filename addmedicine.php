<?php
    include('database.php');
	
	session_start();
	
	if($_POST)
	{
		
		
        $errors = array();
		if(empty($_POST['medicine_id']))
        {
            $errors['med1'] = "Please Enter Medicine Id";
        }  
        if(empty($_POST['medicine_name']))
        {
            $errors['med2'] = "Please Enter Medicine Name";
        }      
		
		if(empty($_POST['power']))
        {
            $errors['pow1'] = "Please Enter Power";
        }
		
		if(empty($_POST['medicine_price']))
        {
            $errors['pri1'] = "Please Enter Price";
        }
		
		if(count($error)==0)
		{
			$medicine_id = mysqli_real_escape_string($connection, $_POST['medicine_id']);
			$medicine_name = mysqli_real_escape_string($connection, $_POST['medicine_name']);
			$medicine_power = mysqli_real_escape_string($connection, $_POST['medicine_power']);
			$medicine_price = mysqli_real_escape_string($connection, $_POST['medicine_price']);
			$update = mysqli_query($connection, "INSERT INTO MedicineTable(medicine_id, medicine_name, medicine_power, medicine_price) values
											  ('$medicine_id', '$medicine_name', '$medicine_power', '$medicine_price')");
		  
			  if($update)
			  {
			  	header('Location:addmedicine.php');
			  }
			  else
			  {
				header('Location:addmedicine.php');		 
			  }						  
              exit();
		}
	}
?>



<!doctype html>
<html>
<head>
<title>Add Medicine</title>
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<div class="form-style-5">
	<h2>Add Medicine</h2>
	<form action="" method="post" name="login">
	<p>
		<label for="medicine_id">Medicine Id</label>
		<input type="text" name="medicine_id" />
	</p>
	<p>
		<label for="medicine_name">Medicine Name</label>
		<input type="text" name="medicine_name" />
	</p>
	
	<p><?php if(isset($errors['med1'])) echo $errors['med1']; ?></p>
	
	<p>
		<label for="medicine_power">Power</label>
		<input type="text" name="medicine_power" />
	</p>
	
	<p><?php if(isset($errors['pow1'])) echo $errors['pow1']; ?></p>
	
	<p>
		<label for="medicine_price">Price</label>
		<input type="number" name="medicine_price" />
	</p>
	
	<p><?php if(isset($errors['pri1'])) echo $errors['pri1']; ?></p>
	
	
	<p>
		<input type="submit" name="add" value="Add"/>
		<a href="adminpage.php">Go Home</a>
	</p>
	</form>
	</div>
</body>
</html>