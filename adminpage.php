<?php
	include('database.php');
	session_start();
	$result = "";
	$result = $_SESSION['result'];
?>

<!doctype html>
<html>
<head>
<title>Admin's Home Page</title>
<link href="css/style2.css" rel="stylesheet" type="text/css"/>
</head>

<div class="form-style-5"
<body>

<center>
<h1>Welcome <?php echo($result['name']);?></h1>
<a href="#">Home</a>
<a href="profile.php">Profile</a>
<a href="addmedicine.php">Add Medicine</a>
<a href="view.php">View User</a>
<a href="logout.php">Logout</a>
</center>
</div>
</body>
</html>