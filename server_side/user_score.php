
<?php session_start(); ?>
<?php
 include 'database.php'; 
 //require 'check_session.php';
//session_start();

if(isset($_GET['id']))
{
 $_SESSION['user_id'] = $_GET['id'];
}

 if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
		echo "Session : $user_id";
	}
	else
	{
		echo "Something went wrong!!!";
		//echo "<script>window.location.href='../index.php'</script>";
	}
 
 
try
	{
		$dsn="mysql:host=localhost;dbname=db_quiz";
		
		$db_username = 'savan';
		$db_password = 'savanpatel';
		
		$db = new PDO($dsn,$db_username,$db_password);
		$statement = $db->query("SELECT first_name,last_name FROM user_details WHERE user_id = $user_id");
		$statement->execute();
		
		$user_data = $statement->fetch();
		$fullname =  $user_data['first_name']." ".$user_data['last_name'];
	}
	catch(Exception $e)
	{
		$error = $e->getMessage();
		echo "<p>Error Message : $error</p>";	
	}

?>

<html>
	<head>
		<title>MySQL Table Viewer</title>
	
	
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<link rel="stylesheet" href="../css/box.css" type="text/css" />
	
</head>
<style>
	
	#score_content_show
	{
		padding : 30;
		margin : 10px;
		//background-color : red;
	}
	
	#score_content_failed
	{
		padding : 50px;
		margin-left : 50px;
		margin-right : 50px;
		
	}
	
	nav {
    line-height:30px;
    background-color:#eeeeee;
    height:285px;
    width:17%;
    float:right;
    padding:5px;
    margin-top: 25px;       
    padding-left: 10px;
}
	
	#score_table
	{
		padding : 5px;
	}
	a.start{
  display:inline-block;
  color:#666;
  background:#f4f4f4;
  border:1px dotted #ccc;
  padding:6px 13px;
  text-align : center;
  width: 90%;
  margin-left: 15px;
  margin-right: 15px;
  margin-top: 30px;
}
	
</style>

<body id="bdy">
	
	<header>
		<div class="container">
			<h1>YOUR SCORE</h1>
		</div>
	</header>
	
<nav>
	
<h3 id="title_username"><?php echo $fullname?></h3>
<a href="../user_update.php?id=<?php echo $_SESSION['user_id'];?>">My account</a><br>
<a href="../server_side/insertscore.php?id=<?php echo $_SESSION['user_id'];?>&display=true">Score</a><br>
<a href="../server_side/category_page.php?id=<?php echo $_SESSION['user_id'];?>&display=true">Category Page</a><br>
<a href="../server_side/user_logout.php?id=<?php echo $_SESSION['user_id'];?>">Logout</a>
</nav>
	<div class="box effect7">
		
			<?php
			
			if(isset($_GET['task']))
			{
				if($_GET['task'] == "select")
				{
					// $db_host = 'localhost';
					// $db_user = 'root';
					// $db_pwd = '';
 					
					// $database = 'db_quiz';
					// $table = 'score_ex';
				
					
		 			if (!mysql_connect($db_host, $db_user, $db_pass))
					    die("Can't connect to database");
					
					if (!mysql_select_db($db_name))
					    die("Can't select database");
					
					// sending query
					$query = "SELECT category.cat_name, score_ex.score, score_ex.attempt FROM score_ex LEFT JOIN category ON score_ex.cat_id=category.cat_id";
					$result = mysql_query($query);
					if (!$result) {
					    die("Query to show fields from table failed");
					}
					
					$fields_num = mysql_num_fields($result);
					
					echo "<div id='score_content_show'>";
					echo "<table border='1' id='score_table' align='center'><tr>";
					// printing table headers
					for($i=0; $i<$fields_num; $i++)
					{
					    $field = mysql_fetch_field($result);
					    echo "<th>{$field->name}</th>";
					}
					echo "</tr>\n";
					// printing table rows
					while($row = mysql_fetch_row($result))
					{
					    echo "<tr>";
					
					    // $row is array... foreach( .. ) puts every element
					    // of $row to $cell variable
					    foreach($row as $cell)
					        echo "<td>$cell</td>";
					
					    echo "</tr>\n";
					}
					echo "</table>";
					echo "</div>";
					mysql_free_result($result);		
				}
				else if($_GET['task'] == "take_quiz")
				{
					echo "<div id='score_content_failed'>";
					echo "You don't have any data entry right for score now.<br>Please take a quiz!!";
					echo "</div>";
					echo "<a href='../server_side/category_page.php?' class='start'>Start Quiz</a>";
				}
			}
			else
			{
					echo "<div id='score_content_failed'>";
					echo "Task not set!!!!";
					echo "</div>";			
			}
			?>	
			
			</div>
	<footer>
			Copyright &copy; INFORMANIAC
	</footer>

</body>
</html>