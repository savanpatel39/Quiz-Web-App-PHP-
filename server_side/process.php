<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	//Check to see if score is set_error_handler
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}

$cat_id = $_POST['cat_id'];
if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else 
	{
		echo "<script>window.location.href='../index.php'</script>";
	}
	
	if($_POST){

		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		


	// if(isset($_SESSION['count'])){
	//  	$count = $_SESSION['count'];
	// }
	// else
	// {
	// 	//$_SESSION['count'] = 1;
	// 	$count = $_SESSION['count'];		
	// 	$_SESSION['count']++;
	

	// 	$count = $_SESSION['count'];

		// echo "Out Count : $count";
		// if ($count > 10)
		// {
		// 	$_SESSION['count'] = " ";
		// 	session_destroy();
		// 	echo "In Count : $count";
		// 	header("Location: certificate.php");
		// }


		$a = (int)$_POST['count'];
		$a += 1;

		// echo " A : is : $a";

		if($cat_id == "1")
		{
			if($number >= 20)
			{
				$number = 1;
			}
		}
		else if($cat_id == "2")
		{
			if($number >= 40)
			{
				$number = 21;
			}
		}
		$next = $number+1;
		
		// /*
		// *	Get total questions
		// */
		// $query = "SELECT * FROM `questions_bank`";
		// //Get result
		// $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		// $total = $results->num_rows;
		
		
		/*
		*	Get correct choice
		*/
		
		$query = "SELECT * FROM `options`
					WHERE question_id = $number AND answer = 1";
					
		//Get result
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Get row
		$row = $result->fetch_assoc();
		
		//Set correct choice
		$correct_choice = $row['opt_id'];
		
		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}

		//Check if last question
		if($a == 11)
		{
			$query ="SELECT user_id FROM score_ex where user_id= $_SESSION[user_id]";
 			$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 			$total = $results->num_rows;

			if($total == 0)
			{
				header("Location: insertscore.php?cat_id=$cat_id&display=false&$_SESSION[score]&$_SESSION[user_id]");	
				//header("Location: final.php?cat_id=$cat_id&display=false");
				// navo pan exam pelli vaar aapeli che ane data insert karavno che evo user
			}
			else if($total > 0)
			{
				// header("Location: final.php?cat_id=$cat_id&display=false");
				//header("Location: final.php?cat_id=$cat_id&display=false");//&$_SESSION[score]//&$_SESSION[user_id]");
				header("Location: insertscore.php?cat_id=$cat_id&display=false&$_SESSION[score]&$_SESSION[user_id]");	
			}
			exit();
		} 
		else 
		{
			header("Location: question.php?n=$next&count=$a&cat_id=$cat_id");
		}
	}

	
	//from this page to final php ..
	//pass or fail will be calculated in this file and only status as fail or pass