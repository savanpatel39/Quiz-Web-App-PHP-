<?php //session_start(); 

require 'check_session.php';

echo "user_id : $_SESSION[user_id]";


?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="box effect7">
			<div class="container">
				<h2>You're Done!</h2>
				<?php
					if( ((int)$_SESSION['score']) >= 8 )
					{
				?>
					<p>Congrats! You have completed the test</p>
					<p>Final Score: <?php echo $_SESSION['score']; ?></p>
					<a href=" ../insertscore.php?cat_id=$cat_id&display=false" class="start">Certificate</a>
				<?php
				}
				else if( ((int)$_SESSION['score']) <= 7 ) 
				{
				?>
				<p>Sorry! You have this test</p>
				<?php
				if($_GET['cat_id'] == "1")
				{
					$n=1;
				}
				else if($_GET['cat_id'] == "1")
				{
					$n=21;
				}?>
				<a href="category_page.php?id=<?php echo $_SESSION['user_id']?>" class="start">Take Again</a>
				<a href=" ../insertscore.php?cat_id=$cat_id&display=false" class="start">Certificate</a>
				<?php
				}
				?>
				
			</div>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2015, INFOMANIAC
		</div>
	</footer>
</body>
</html>
<?php session_destroy(); ?>