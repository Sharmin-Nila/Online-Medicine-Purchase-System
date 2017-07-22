<!doctype html>
<html>
<head>
<link href="css/style2.css" rel="stylesheet" type="text/css"/>
</head>

<?php
session_start();
$result=$_SESSION['result'];
?>

<div class="form-style-5"
<center>

<table border="1px solid black">
	<tr>
    	<th colspan="2">Profile</th>
    </tr>
    
    <tr>
    	<th>Name</th>
        <td><?php echo $result['name']?></td>
    </tr>
    
    <tr>
    	<th>Age</th>
        <td><?php echo $result['age']?></td>
    </tr>
	
	<tr>
    	<th>Mobile</th>
        <td><?php echo $result['mobile']?></td>
    </tr>
    
	<tr>
    	<th>Address</th>
        <td><?php echo $result['address']?></td>
    </tr>
    
    <tr>
    	<th>Email</th>
        <td><?php echo $result['email']?></td>
    </tr>
	
	<tr>
    	<th>Sex</th>
        <td><?php echo $result['sex']?></td>
    </tr>
    
    
    <tr>
    	<th>User Type</th>
        <td><?php echo $result['usertype']?></td>
    </tr>
    
    <tr>
    <td colspan="2">
	<center><?php
		if($result['usertype']=="user"){
			echo("<a href='userpage.php'>Go Home</a>");
			echo("<a href='change_pass.php'>Change Password</a>");
		}
		else{
	
			echo("<a href='adminpage.php'>Go Home </a>");
			echo("<a href='change_pass.php'>Change Password</a>");
		}
	?></center>
	</td>
	</tr>
	</table>
	</center>
	</div>


