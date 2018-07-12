<?php

	require('check_session.php');
	
	$first_name = trim($_GET['fname']);
	$last_name = trim($_GET['lname']);
	$email_id = trim($_GET['email']);
	$phone_num = trim($_GET['phn']);
	$address = trim($_GET['address']);
	if(!empty($_GET['new_pwd']))
	{
		$password = trim($_GET['new_pwd']);		
	}
	else 
	{
		$password = trim($_GET['old_pwd']);
	}
		
		$dsn="mysql:host=localhost;dbname=db_quiz";
		$username = 'savan';
		$passwor = 'savanpatel';
		
		$db = new PDO($dsn,$username,$passwor);
		
		$query = "UPDATE user_details SET first_name=:first_name,last_name=:last_name,email_id=:email_id,address=:address,phone_num=:phone_num,password=:password WHERE user_id=$user_id";
		
		$statement = $db->prepare($query);
		
		$statement->bindValue(':first_name',$first_name);
		$statement->bindValue(':last_name',$last_name);
		$statement->bindValue(':email_id',$email_id);
		$statement->bindValue(':address',$address);
		$statement->bindValue(':phone_num',$phone_num);
		$statement->bindValue(':password',$password);
		$check = $statement->execute();
		
		if($check === TRUE)
		{
			header("Location: category_page.php");
		}
		
		//$affected_rows = $statement->rowCount();
		
		//echo "<br>Affected Rows : $affected_rows";
		//$statement->closeCursor();
		
?>