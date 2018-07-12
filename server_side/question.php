<?php include 'database.php'; ?>
<?php //session_start(); ?>
<?php
	require 'check_session.php';

	if(!isset($_SESSION['count']))
	{
		$_SESSION['count'] = 1;
	}
	else
	{
		$count = $_SESSION['count'];
		$_SESSION['count'] = $count;		
	}

	//Set question number
	$number = (int) $_GET['n'];
	$count = (int)$_GET['count'];

	//$nnn = (int) $_GET['n'];
	
	/*
	*	Get total questions
	*/
	$query = "SELECT * FROM `questions_bank`";
	//Get result
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
		
	/*
	*	Get Question
	*/
	$cat_id = $_GET['cat_id'];
	
	$query = "SELECT * FROM `questions_bank`
				WHERE question_id = $number AND cat_id = $cat_id";
	//Get result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$question = $result->fetch_assoc();
	
	/*
	*	Get Choices
	*/
	$query = "SELECT * FROM `options`
				WHERE question_id = $number";
	//Get results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);



?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<link rel="stylesheet" href="../css/box.css" type="text/css" />
</head>
<body style="margin-top: 100px;">
	<header>
		<div class="container">
			<h1>Get..Set...Go...</h1>
		</div>
	</header>


	<main>
		<div class="box effect7">
		<div class="container">
		

			<div class="current">Question <?php echo $count; ?> of <?php echo "10"	; ?></div>
			<p class="question">
				<?php echo $question['question']; ?>
			</p>
			<form method="post" action="process.php" >
				<ul class="choices">
					<?php while($row = $choices->fetch_assoc()): ?>
						<li><input name="choice" type="radio" value="<?php echo $row['opt_id']; ?>" /><?php echo $row['options']; ?></li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
				<input type="hidden" name="count" value="<?php echo $count; ?>" />
				<input type="hidden" name="cat_id" value="<?php echo $cat_id;?>" />
			</form>
		</div>
	</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; INFORMANIAC
		</div>
	</footer>
</body>
</html>