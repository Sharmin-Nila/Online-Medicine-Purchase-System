<?php
    include('database.php');
        $select = mysqli_query($connection, "SELECT * FROM InfoTable order by mobile desc");
?>

	<!doctype html>
	<html>
	<head>
		<link href="css/style2.css" rel="stylesheet" type="text/css"/>
	</head>
	<div class="form-style-5">
	<table>
	<tr>
		<th>User Name</th>
		<th>Age</th>
		<th>Mobile</th>
		<th>Address</th>
		<th>Email Id</th>
		<th>Sex</th>
	</tr>
	
	<?php while($userrow = mysqli_fetch_array($select)) {
	if($userrow['usertype'] == 'user'){
	
	?>
	<tr>
		<td><?php echo $userrow['name']; ?></td>
		<td><?php echo $userrow['age']; ?></td>
		<td><?php echo $userrow['mobile']; ?></td>
		<td><?php echo $userrow['address']; ?></td>
		<td><?php echo $userrow['email']; ?></td>
		<td><?php echo $userrow['sex']; ?></td>
	</tr>
	<?php } }?>
	</table>
	</div>
	</html>
	

<center><a href="adminpage.php">Go Home</a></center>
