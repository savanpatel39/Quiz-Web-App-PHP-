<?php

	require('server_side/check_session.php');
	//require('server_side/user_details_fetch.php');
	
	
	try
	{
		$dsn="mysql:host=localhost;dbname=db_quiz";
		
		$db_username = 'savan';
		$db_password = 'savanpatel';
		
		$db = new PDO($dsn,$db_username,$db_password);
		
		$query = "SELECT * FROM user_details WHERE user_id=$user_id";
		
		$statement = $db->prepare($query);
		
		$check = $statement->execute();
		
		$user_data = $statement->fetch();
	}
	catch(Exception $e)
	{
		$error = $e->getMessage();
		echo "<p>Error Message : $error</p>";	
	}
	

?>

<html>
	<head>
		<title>
			Database Trial
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<script language="javascript" type="text/javascript" src="javascript/script.js"></script>
	</head>
	
	<body onload="disableAll_edit()">
		<div class="box effect7" id="signupform">
		<form method="get" action="server_side/user_update.php" onsubmit="return check_buttons()" >
			<div style="height:5px;"> </div>
			<table id="tbl_signup" align = "center">
				<tr>
					<th colspan="2">Update Profile</th>
				</tr>
				
				<tr>
					<td>
						</td>
				</tr>
				
				<tr>
					<td>
						First Name
					</td>
					
					<td>
						<input readonly="readonly" type="text" name="fname" id="fname" pattern="[a-z A-Z]{1,}" title="Please enter your first name!" placeholder="Enter your first name" required value=<?php echo $user_data['first_name']?> >
					</td>
					
					<td>
						<input type="button" name="edit_first_name" id="edit_first_name" onclick="enable_edit('fname')" value="Edit">
					</td>
				</tr>
				
				<tr>
					<td>
						Last Name
					</td>
					
					<td>
						<input readonly="readonly"  type="text" name="lname" id="lname" pattern="[a-z A-Z]{1,}" title="Please enter your last name!" placeholder="Enter your last name" required value=<?php echo $user_data['last_name']?> >
					</td>
					
					<td>
						<input type="button" name="edit_last_name" id="edit_last_name" onclick="enable_edit('lname')" value="Edit">
					</td>
				</tr>
				
				<tr>
					<td>
						Email
					</td>
					
					<td>
						<input readonly="readonly"  type="email" name="email" id="email"  title="Please enter correct email address!" placeholder="Enter your email" required value=<?php echo $user_data['email_id']?> >
					</td>
					<td>
						<input type="button" name="edit_email" id="edit_email" onclick="enable_edit('email')" value="Edit">
					</td>
				</tr>
				
				<tr>
					<td>
						Address
					</td>
					
					<td>
						<textarea readonly="readonly"  rows="4" cols="19" name="address" id="address" placeholder="Enter your address" title="Please enter your address" required ><?php echo $user_data['address']?> </textarea>
					</td>
					<td>
						<input type="button" name="edit_address" id="edit_address" onclick="enable_edit('address')" value="Edit">
					</td>
				</tr>
				
				<tr>
					<td>
						Phone Number
					</td>
					<td>
						<input readonly="readonly"  type="text" name="phn" id="phn" pattern="[0-9]{1,10}" title="Please enter your first name!" placeholder="Enter your phone number" required value=<?php echo $user_data['phone_num']?> >
					</td>
					
					<td>
						<input type="button" name="edit_phn" id="edit_phn" onclick="enable_edit('phn')" value="Edit">
					</td>
					
				</tr>
				
				<tr>
					<td>
						Old Password
					</td>
					<td>
						<input readonly="readonly"  type="text" name="old_pwd" id="old_pwd" pattern="[0-9]{1,10}" title="Please enter your first name!" placeholder="Enter your phone number" required value=<?php echo $user_data['password']?> >
					</td>
					
					<td>
						<input type="button" name="edti_old_pwd" id="edit_old_pwd"onclick="enable_edit('old_pwd')" value="Edit">
					</td>
					
				</tr>
				
				<tr>
					<td>
						New Password
					</td>
					
					<td>
						<input readonly="readonly"  type="password" name="new_pwd" id="new_pwd" pattern="[a-z A-Z 0-9]{1,16}" title="Please enter a password!" required placeholder="Enter a passowrd" >
					</td>
				</tr>
				
				<tr>
					<td>
						Confirm Password
					</td>
					
					<td>
						<input readonly="readonly"  type="password" name="cnfrmpwd" id="cnfrmpwd" pattern="[a-z A-Z 0-9]{1,16}" title="Please enter password!" placeholder="Confirm password" required onblur="validatePassword()">
					</td>
				</tr>
				
				<tr align="right">
					<td colspan="2" align="center" id="submit_cell">
						<input type="submit" id="submit_signup" name="submit" value="Update">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</body>
</html>