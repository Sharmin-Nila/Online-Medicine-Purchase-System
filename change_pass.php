<?php
	include('database.php');
	session_start();

	$errors = array();
	$result = $_SESSION['result'];

	if($_POST){
		
		if(empty($_POST['currentpassword']))
        {
            $errors['chpass1'] = "Enter Current Password";
        }
		
		if($_POST['currentpassword'] != $result['password']){
			$errors['chpass2'] = "Password must be correct";
		}
		
		if(empty($_POST['newpass']))
        {
            $errors['newpass1'] = "Enter New Password";
        }
		
		if(empty($_POST['retypepass']))
        {
            $errors['rpass1'] = "Retype New Password";
        }
		
		if(($_POST['retypepass']) != ($_POST['newpass']))
        {
            $errors['rpass2'] = "Password must be correct";
        }
		
		if(count($errors) == 0){
			$newpassword = $_POST['newpass'];
			$mob = $result['mobile'];
			$sql = "update InfoTable set password = '$newpassword' where mobile ='$mob';";
			$update = mysqli_query($connection, $sql);
			 
			if($update){
				$result['password'] = $newpassword;
				$_SESSION['result']=$result;
			}
		}
	}
?>

<!DOCTYPE>
<html>
    <head>
        <title>Change Password</title>
		<link href="css/style1.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
		<div class="form-style-5">
		<h2>Change Password</h2>
           <form method="post">
               <p>
                 <label for="currentpassword"> Current Password </label><br />
                 <input type="password" name="currentpassword" placeholder="Enter your current password"/>
               </p>
			   <p><?php if(isset($errors['chpass1'])) echo $errors['chpass1']; ?></p>
	            <p><?php if(isset($errors['chpass2'])) echo $errors['chpass2']; ?></p>
	
               <p>
                 <label  for="newpass"> New Password </label><br />
                 <input type="password" name="newpass" placeholder="Enter your new password"/>
               </p>
			   <p><?php if(isset($errors['npass1'])) echo $errors['npass1']; ?></p>
			   
			   <p>
                 <label  for="retyperpass"> Retype New Password </label><br />
                 <input type="password" name="retypepass" placeholder="Retype your new password"/>
               </p>
			   <p><?php if(isset($errors['rpass1'])) echo $errors['rpass1']; ?></p>
	            <p><?php if(isset($errors['rpass2'])) echo $errors['rpass2']; ?></p>
			   
               <p>
                 <input type="submit" name="change" value="Change"/>
				<?php
					if($result['usertype']=="user"){
						echo("<a href='userpage.php'>Go Home</a>");
					}
					else{
	
					echo("<a href='adminpage.php'>Go Home</a>");
					}
				?>
               </p>
           </form>
			</div>
    </body>
</html>