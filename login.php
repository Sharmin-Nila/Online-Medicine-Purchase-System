<?php
    include('database.php');
	
	session_start();
	
	if($_POST)
	{
		
		
        $errors = array();
        if(empty($_POST['mobile']))
        {
            $errors['mob1'] = "Please Enter Your Mobile Number";
        }      

        if(empty($_POST['password']))
        {
            $errors['pass1'] = "Please Enter Your Password";
        }
		
		$umob = $_POST['mobile'];
		$upassword = $_POST['password'];
		$sql = "select * from InfoTable where mobile = '$umob' and password='$upassword';";
		$select = mysqli_query($connection, $sql);
		$result=mysqli_fetch_assoc($select);
		$_SESSION['result']=$result;
		$numrow = mysqli_num_rows($select);
		if($numrow >0){
			$_SESSION['u_mob'] = $umob;
			if($result['usertype']=="user"){
				header("Location: userpage.php");
			}
			else{
				header("Location: adminpage.php");
			}
			exit();
		}
	}
?>



<!doctype html>
<html>
<head>
<title>Login Page</title>
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<div class="form-style-5">
	<h1>Login</h1>
	<form action="" method="post" name="login" class="form-style-5">
	<p>
		<label for="mobile">Mobile Number</label>
		<input type="text" name="mobile" />
	</p>
	
	<p><?php if(isset($errors['mob1'])) echo $errors['mob1']; ?></p>
	
	<p>
		<label for="password">Password</label>
		<input type="password" name="password" />
	</p>
	
	<p><?php if(isset($errors['pass1'])) echo $errors['pass1']; ?></p>
	
	<p>
		<input type="submit" name="login" value="Login"/>
		<a href="register.php">Register</a>
		<a href="home.php">Go Home</a>
		
	</p>
	</form>
	</div>
</body>
</html>