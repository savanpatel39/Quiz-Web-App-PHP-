<?php
	
	$first_name = trim($_GET['fname']);
	$last_name = trim($_GET['lname']);
	$email_id = trim($_GET['email']);
	$phone_num = trim($_GET['phn']);
	$address = trim($_GET['address']);
	$password = trim($_GET['pwd']);
	
	try
	{
		$dsn="mysql:host=localhost;dbname=db_quiz";
		$db_username = 'savan';
		$db_password = 'savanpatel';
		
		$db = new PDO($dsn,$db_username,$db_password);
		
		$query = "insert into user_details (first_name,last_name,email_id,address,phone_num,password) values(:first_name,:last_name,:email_id,:address,:phone_num,:password)";
		$statement = $db->prepare($query);
		
		$statement->bindValue(':first_name',$first_name);
		$statement->bindValue(':last_name',$last_name);
		$statement->bindValue(':email_id',$email_id);
		$statement->bindValue(':address',$address);
		$statement->bindValue(':phone_num',$phone_num);
		$statement->bindValue(':password',$password);
		
		$check = $statement->execute();
		
		if($check)
		{
			$query = "SELECT user_id from user_details WHERE first_name = '$first_name'";
			$statement = $db->prepare($query);
			$statement->execute();
			$data = $statement->fetch();
			//if($statement->rowCount() > 0)
			{
				session_start();
				$_SESSION['user_id'] = $data['user_id'];
				echo "<script>window.location.href='../server_side/category_page.php'</script>";
				die();
			}	
		}
	}
	catch(Exception $e)
	{
		$error = $e->getMessage();
		echo "<p>Error Message : $error</p>";	
	}
?>