<?php
    include('database.php');
	session_start();
	$u_mob = "";
	$result = $_SESSION['result'];
	$u_mob = $result['mobile'];
	
	$select = mysqli_query($connection, "SELECT * FROM PurchaseTable WHERE mobile = '$u_mob'");
	$num_row = mysqli_num_rows($select);
	$sum=0;
	if( $num_row ){
	?>
    <!doctype html>
	<html>
	<head>
	<link href="css/style2.css" rel="stylesheet" type="text/css"/>
	<style>
		p{
		color:#FFFFFF;
		margin-left:600px;
		font-size:24px;
		}

	</style>
	</head>
	<body>
	<div class="form-style-5">
	
		
		<table>
		
		<tr>
			<th>Medicine Name  </th>
			<th>Quantity  </th>
			<th>Power  </th>
			<th>Price  </th>
		</tr>
		
		<?php while($userrow = mysqli_fetch_assoc($select)) { ?>
		
		<tr>
			<td><?php echo $userrow['medicine_name']; ?></td>
		
			<td><?php echo $userrow['quantity']; ?></td>
	
			<td><?php echo $userrow['power']; ?></td>
	
			<td>
				<?php echo $userrow['price'];?>
				<?php
					$sum = $sum+$userrow['price']; 	
				?>
			</td>
		</tr>
		<?php } ?>
        </table>
		</div>
		</body>
<?php } ?>

<?php echo "<p  style='color:#FFFFFF;'>Total Price: $sum</p>";
	$sql = mysqli_query($connection, "DELETE FROM PurchaseTable where mobile = '$u_mob';");
	
?>
<center><a href="userpage.php">Go Home</a></center>

</html>
