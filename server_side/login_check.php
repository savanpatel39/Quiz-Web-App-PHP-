<?php
	
	$userName = trim($_GET['userName']);
	$userPassword = trim($_GET['userPassword']);
	
	try
	{
		$dsn="mysql:host=localhost;dbname=db_quiz";
		$username = 'savan';
		$password = 'savanpatel';
		
		$db = new PDO($dsn,$username,$password);
		
		$query = "SELECT user_id FROM user_details WHERE email_id = :userName AND password = :userPassword";
		
		$statement = $db->prepare($query);
		
		$statement->bindValue(':userName',$userName);
		$statement->bindValue(':userPassword',$userPassword);
		$statement->execute();		
		
		if( $statement->rowCount() > 0  )
		{
			$login = $statement->fetch();	
			session_start();
			$_SESSION['user_id'] = $login['user_id'];
			header("Location: category_page.php");
		}
		else
		{
			header("Location: ../index.php?flag='false'");
		}
	}
	catch(Exception $e)
	{
		$error = $e->getMessage();
		echo "<p>Error Message : $error</p>";
	}
?>
