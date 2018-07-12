<?php

require('check_session.php');

try
	{
		$dsn="mysql:host=localhost;dbname=db_quiz";
		
		$db_username = 'savan';
		$db_password = 'savanpatel';
		
		$db = new PDO($dsn,$db_username,$db_password);
		
		$query = "SELECT * from category WHERE user_id=$user_id";
		
		$statement = $db->prepare($query);
		
		$statement->execute();
		
		$user_data = $statement->fetch();
		
	}
	catch(Exception $e)
	{
		$error = $e->getMessage();
		echo "<p>Error Message : $error</p>";	
	}

?>