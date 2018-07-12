<?php

	if(isset($_GET['flag']))
	{
		$flag = isset($_GET['flag']);
		if($flag == "false")
		{
			echo "<script>alert('No match found!!try again!!')</script>";
		}
	}

?>

<html>
	<head>
		<title>
			Quiz
		</title>
		
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
				
		<script language="javascript" type="text/javascript" src="javascript/script.js"></script>
		
	</head>
	
	<body div="bdy">
		<form method="get" action="server_side/login_check.php">
		<div class="box effect7">
			<table id="tab">
				<tr>
					<th> Login</th>
				</tr>
				<tr>
					<td> 
						<input type="text" id="userName" name="userName" placeholder="Username as your email address" title="Please fill up user name" required>	  
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="password" id="userPassword" name="userPassword" placeholder="Password" title="Please fill up user password" required>	  
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Login" name="sub" id="sub"/>
					</td>
				</tr>
				
				<tr>
					<td>
						<span id="signup_link"><a href="user_signup.php">Not a user yet!? Sign Up here</span>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</body>
	
</html>