<?php
include('database.php');
if($_POST)
	{
		if(empty($_POST['name'])){
			$error['name1']="Please Enter Your User Name";
			}
		if(empty($_POST['password'])){
			$error['pass1']="Please Enter the Password";
			}
		if(strlen($_POST['password'])<6){
			$error['pass2']="Password must be six character long";
			}
		if(empty($_POST['conpassword'])){
			$error['pass3']="Please Confirm the Password";
			}
		if(($_POST['conpassword'])!=($_POST['password'])){
			$error['pass4']="Password not matched";
			}	
		if(empty($_POST['age'])){
			$error['age1']="Please Enter Your age";
			}	
		if(empty($_POST['mobile'])){
			$error['mob1']="Please Enter Your Mobile Number";
			}
		
		if(empty($_POST['address'])){
			$error['adrs']="Please Enter your Address";
			}
		if(empty($_POST['email'])){
			$error['email1']="Please Enter the Email";
			}		
		
			
			
		if(count($error)==0)
		{
			$name = mysqli_real_escape_string($connection, $_POST['name']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			$age = mysqli_real_escape_string($connection, $_POST['age']);
			$mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
			$address = mysqli_real_escape_string($connection, $_POST['address']);
			$email = mysqli_real_escape_string($connection, $_POST['email']);
			$sex = mysqli_real_escape_string($connection, $_POST['sex']);
			$type = mysqli_real_escape_string($connection, $_POST['usertype']);
			$update = mysqli_query($connection, "INSERT INTO InfoTable(name, password, age, mobile, address, email, sex, usertype) values
											  ('$name', '$password', '$age', '$mobile', '$address', '$email', '$sex', '$type')");
		  
			  if($update)
			  {	$msg="Successfully registered!!";
			  	echo "<script type='text/javascript'>alert('$msg');</script>";
			  	header('Location:register.php');
			  }
			  else
			  {	
			  	$errormsg="Something Went Wrong, Try Again";
				echo "<script type='text/javascript'>alert('$errormsg');</script>";
				header('Location:register.php');		 
			  }						  
              exit();
		}
	}

?>


<!Doctype html>

<html>

<head>
<title>Registration form</title>
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div class="form-style-5">
<h1>Sign Up</h1>

<form method="post">
<p>
	<label for="name">User Name:</label>
	<input type="text" name="name">
</p>

<p><?php if(isset($error['name1'])) echo $error['name1']?></p>

<p>
	<label for="password">Password:</label>
	<input type="password" name="password" />
</p>

<p><?php if(isset($error['pass1'])) echo $error['pass1']?></p>
<p><?php if(isset($error['pass2'])) echo $error['pass2']?></p>
<p>
	<label for="conpassword">Confirm Password:</label>
	<input type="password" name="conpassword"/>
</p>

<p><?php if(isset($error['pass3'])) echo $error['pass3']?></p>
<p><?php if(isset($error['pass4'])) echo $error['pass4']?></p>

<p>
	<label for="age">Age:</label>
	<input type="text" name="age"/>
</p>

<p><?php if(isset($error['age1'])) echo $error['age1']?></p>


<p>
	<label for="address">Address:</label>
	<input type="text" name="address"/>
</p>

<p><?php if(isset($error['adrs'])) echo $error['adrs']?></p>

<p>
	<label for="mobile">Mobile Number:</label>
	<input type="text" name="mobile"/>
</p>

<p><?php if(isset($error['mob1'])) echo $error['mob1']?></p>

<p>
	<label for="email">Email:</label>
	<input type="email" name="email"/>
</p>

<p><?php if(isset($error['email1'])) echo $error['email1']?></p>

<p>
	<label for="sex">Sex:</label>
	<select name="sex">
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	</select>
</p>


<p>
	<label for="usertype">User Type</label>
	<select name="usertype">
	<option value="user">User</option>
	<option value="admin">Admin</option>
	</select>
</p>

<p>
	<input type="submit" name="register" value="Register"/>
	<a href="login.php">login</a>
	<a href="home.php">Go Home</a></p>

</form>
</div>
</body>

</html>