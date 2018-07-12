<?php include 'database.php'; ?>
<?php


    $query ="SELECT * FROM questions_bank where cat_id = 1";
 //Get results
 $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;
 //echo "$total";



	if(isset($_POST['submit'])){
		//Get post variables
		$question_number = $_POST['question_number'];
		$cat_id = $_POST['cat_id'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		//Choices array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];
		
		//Question query
		$query = "INSERT INTO `questions_bank`(question_id,cat_id, question)
					VALUES('$question_number','$cat_id','$question_text')";
					
		//Run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Validate insert
		if($insert_row){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//Choice query
					$query = "INSERT INTO `options` (question_id, answer, options)
							VALUES ('$question_number','$is_correct','$value')";
							
					//Run query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
					
					//Validate insert
					if($insert_row){
						continue;
					} else {
						die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
					}
				}
			}
			$msg = 'Question has been added';
		}
	}
	
	/*
 	* Get total questions
	*/
	$query = "SELECT * FROM `questions_bank`";
	//Get The Results
	$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>QUIZ</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>QUIZ</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Add A Question</h1>
			<?php
				if(isset($msg)){
					echo '<p>'.$msg.'</p>';
				}
			?>
			<form method="post" action="add.php">
				<p>
					<label>Question Number: </label>
					<input type="number" value="<?php echo $next; ?>" name="question_number" />
				</p>
				<p>
					<label>Category Id: </label>
					<input type="number"  name="cat_id" />
				</p>
				
				<p>
					<label>Question Text: </label>
					<input type="text" name="question_text" />
				</p>
				<p>
					<label>Choice #1: </label>
					<input type="text" name="choice1" />
				</p>
				<p>
					<label>Choice #2: </label>
					<input type="text" name="choice2" />
				</p>
				<p>
					<label>Choice #3: </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Choice #4: </label>
					<input type="text" name="choice4" />
				</p>
				<p>
					<label>Choice #5: </label>
					<input type="text" name="choice5" />
				</p>
				<p>
					<label>Correct Choice Number: </label>
					<input type="number" name="correct_choice" />
				</p>
				<p>
					<input type="submit" name="submit" value="Submit" />
				</p>
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2015, 
		</div>
	</footer>
</body>
</html>