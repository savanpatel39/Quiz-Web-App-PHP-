<?php
//Create connection credentials

require 'check_session.php';
include 'database.php';


	if(isset($_GET['display']))
	{
		$display = $_GET['display'];
		
		if($display == "true")
		{
			$query ="SELECT user_id FROM score_ex where user_id= $_SESSION[user_id]";
 			$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 			$total = $results->num_rows;
			if ($total == 0)
			{
				header("Location: user_score.php?task=take_quiz&id=$_SESSION[user_id]");
			}
			else if ($total > 0)
			{
				header("Location: user_score.php?task=select&id=$_SESSION[user_id]");	
			}
		}
		else if($display == "false")
		{
			$query = "SELECT user_id FROM score_ex where user_id= $user_id AND cat_id=$_GET[cat_id]";
			$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 			$total = $results->num_rows;
			//$total = (int)$_GET['total'];
			$total++;
			$query = "INSERT INTO score_ex (cat_id,user_id,score,attempt) VALUES ($_GET[cat_id],$_SESSION[user_id],$_SESSION[score],$total)";
			$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
			header("Location: certificate.php?cat_id=$_GET[cat_id]");
		}
	}
	
	
	// SELECT category.cat_name, score_ex.score, score_ex.attempt
// FROM score_ex
// LEFT JOIN category
// ON score_ex.cat_id=category.cat_id;