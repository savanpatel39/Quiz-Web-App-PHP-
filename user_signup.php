<html>
	<head>
		<title>
			Database Trial
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<script language="javascript" type="text/javascript" src="javascript/script.js"></script>
	</head>
	
	<body>
		<div class="box effect7" id="signupform">
		<form method="get" action="server_side/server_signup.php">
			<div style="height:5px;"> </div>
			<table id="tbl_signup" align = "center">
				<tr>
					<th colspan="2">Sign Up</th>
				</tr>
				
				<tr>
					<td>
						</td>
				</tr>
				
				<tr>
					<td>
						First Name<sup>*</sup> 
					</td>
					
					<td>
						<input type="text" name="fname" id="fname" pattern="[a-z A-Z]{1,}" title="Please enter your first name!" placeholder="Enter your first name" required>
					</td>
				</tr>
				
				<tr>
					<td>
						Last Name<sup>*</sup> 
					</td>
					
					<td>
						<input type="text" name="lname" id="lname" pattern="[a-z A-Z]{1,}" title="Please enter your last name!" placeholder="Enter your last name" required>
					</td>
				</tr>
				
				<tr>
					<td>
						Email<sup>*</sup>
					</td>
					
					<td>
						<input type="email" name="email" id="email"  title="Please enter correct email address!" placeholder="Enter your email" required>
					</td>
				</tr>
				
				<tr>
					<td>
						Address<sup>*</sup>
					</td>
					
					<td>
						<textarea rows="4" cols="19" name="address" id="address" placeholder="Enter your address" title="Please enter your address" required></textarea>
					</td>
				</tr>
				
				<tr>
					<td>
						Phone Number<sup>*</sup> 
					</td>
					<td>
						<input type="text" name="phn" id="phn" pattern="[0-9]{1,10}" title="Please enter your first name!" placeholder="Enter your phone number" required>
					</td>
				</tr>
				
				<tr>
					<td>
						Password<sup>*</sup> 
					</td>
					
					<td>
						<input type="password" name="pwd" id="pwd" pattern="[a-z A-Z 0-9]{1,16}" title="Please enter a password!" placeholder="Enter a passowrd" required>
					</td>
				</tr>
				
				<tr>
					<td>
						Confirm Password<sup>*</sup> 
					</td>
					
					<td>
						<input type="password" name="cnfrmpwd" id="cnfrmpwd" pattern="[a-z A-Z 0-9]{1,16}" title="Please enter password!" placeholder="Confirm password" required onblur="validatePassword()">
					</td>
				</tr>
				
				<tr align="right">
					<td colspan="2" align="center" id="submit_cell">
						<input type="submit" id="submit_signup" name="submit" value="Sign Up">
					</td>
				</tr>
			</table>
		</form>
		</div>
	</body>
</html>