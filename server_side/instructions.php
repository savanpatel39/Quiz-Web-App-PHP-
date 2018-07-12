<?php include 'database.php'; ?>
<?php 

	session_start();

	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else 
	{
		echo "<script>window.location.href='../index.php'</script>";
	}

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$cat_id = $_GET['cat_id'];

if($cat_id == "1")
{
	$answers = UniqueRandomNumbersWithinRange(1,20,10);	
}
else if($cat_id == "2")
{
	$answers = UniqueRandomNumbersWithinRange(21,40,10);		
}

$dsn="mysql:host=localhost;dbname=db_quiz";

$username = 'savan';

$passwor = 'savanpatel';


$db = new PDO($dsn,$username,$passwor);

$num = $answers[1];

// foreach($answers as $id )
// {

// 	echo "<br>";
// 	echo "array:"."$id";
// 	echo "<br>";
// 	$query = "SELECT id  FROM randomtest where id = $id";
// 	$statement = $db->prepare($query);



// $statement->execute();

// $result = $statement->fetch();

// echo "database:"."$result[id]";

// $num = "$result[id]";


// $_SESSION["num"] = $num;


// $ec = $_SESSION["num"];

// echo "echo:"."$ec";

		

// }



?>



<!-- <?php
/*
 *	Get Total Questions
 */
 $query ="SELECT * FROM questions_bank";
 //Get results
 $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;
?> --><!DOCTYPE html>
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
			<h1>Get ...Set...Go...</h1>
		</div>
	</header>
	<main>
		<div class="box effect7">
	 <div class="container" >
			<h2>Test Your <?echo $_GET['cat_name'];?> Knowledge</h2>
			<p>This is a multiple choice quiz to test your knowledge of <?echo $_GET['cat_name'];?></p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo "10"; ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo 10 * .5; ?> Minutes</li>
			</ul>
			<a href="question.php?n=<?php echo $num ?>&count=1&cat_id=<?php echo $cat_id;?>" class="start">Start Quiz</a>
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