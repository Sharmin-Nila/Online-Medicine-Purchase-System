<?php
	include('database.php');
	session_start();
	$result = "";
	$result = $_SESSION['result'];
?>

<!DOCTYPE>
<html>
    <head>
        <title>User's home page</title>
		<link href="css/style2.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
<div class="form-style-5">
        <center>
		<h2>Welcome <?php echo($result['name']);?></h2>
		<a href="#">Home</a>
		<a href="profile.php">Profile</a>
        <a href="Purchase.php">Purchase Medicine</a>
        <a href="logout.php">Log out</a>
		</center>
		</div>
    </body>
</html>