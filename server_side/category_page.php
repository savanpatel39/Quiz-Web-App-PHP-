<?php

	// session_start();
	
	$user_id = " ";
	
	require 'check_session.php';
	
	if(isset($_GET['id']))
	{
		$_SESSION['user_id'] = $_GET['id'];
	}
	if(isset($_SESSION['user_id']))
	{
		 $user_id = $_SESSION['user_id'];
	}
	else 
	{
		//echo "Something went wrong!!!!";
		echo "<script>window.location.href='../index.php'</script>";
	}
	
	try
	{
		$dsn="mysql:host=localhost;dbname=db_quiz";
		
		$db_username = 'savan';
		$db_password = 'savanpatel';
		
		$db = new PDO($dsn,$db_username,$db_password);
		
		$query = "SELECT * from category";
		
		$statement = $db->prepare($query);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		
		$cat_ids[] = array();	
		
		foreach ($result as $data ) 
		{
			$cat_ids[] = $data['cat_id'];
		  	$cat_names[] = $data['cat_name'];
		  	$cat_desc[] = $data['cat_desc'];
		}
		
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

<!DOCTYPE html>
<html>
<head>
<style>
header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;   
}
nav {
    line-height:30px;
    background-color:#eeeeee;
    height:280px;
    width:17%;
    float:right;
    padding:5px;
    margin-top: 25px;       
    padding-left: 10px;
}
section {
    width:350px;
    float:left;
    padding:10px;    
}
footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
    padding:5px;   
}
#first
{
    margin-top: 25px;
    width: 35%;
    
    float: left;
    height: 250px;  
    padding: 20px;   
    margin-bottom: 25px;
}
#second
{
    margin-top: 25px;
    margin-left : 45px;
    
    width: 35%;
    float: left;
    height: 250px; 
    margin-bottom: 25px;
    padding: 20px;   
}

#main
{
    margin-left: 25px;
    margin-bottom: 25px;
}

.heading1
{
    width: 100%;
    text-align : center;
}

a
{
    text-decoration: none;
    cursor: hand;
    color: black;
}


.box h3{
    text-align:center;
    position:relative;
    /*top:380px;*/
}

.box {
    width:50%;
    height:300px;
    background:#FFF;
    /*margin:40px auto;*/
}

.effect7
{
    position:relative;
    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
    /*top : 120px;*/
}

.effect7:before, .effect7:after
{
    content:"";
    position:absolute; 
    z-index:-1;
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:0;
    bottom:0;
    left:10px;
    right:10px;
    border-radius:100px / 10px;
} 

.effect7:after
{
    right:10px; 
    left:auto; 
    transform:skew(8deg) rotate(3deg);
}

a.start{
  display:inline-block;
  color:#666;
  background:#f4f4f4;
  border:1px dotted #ccc;
  padding:6px 13px;
  text-align : center;
  width: 90%;
  margin-left: 10px;
  margin-top: 30px;
}

#body
{
  margin-top: 100px;
}

.desc
{
	padding-top : 20px;
	padding-left : 20px;
}

#title_username
{
	text-align: right;
}
</style>
</head>
<body id="body">

<header>
<h1>Choose Category</h1>
</header>

<nav>
	
<h3 id="title_username"><?php echo $fullname?></h3>
<a href="../user_update.php?id=<?php echo $_SESSION['user_id'];?>">My account</a><br>
<a href="../server_side/insertscore.php?id=<?php echo $_SESSION['user_id'];?>&display=true">Score</a><br>
<a href="../server_side/user_logout.php?id=<?php echo $_SESSION['user_id'];?>">Logout</a>
</nav>

<div id="main">

    <div id="first" class="box effect7">

        <div class="heading1" ><?php echo "$cat_names[0]"; ?>


        </div>

        <p class="desc"><?php echo "$cat_desc[0]"; ?></p>

      <a href="../server_side/instructions.php?id=<?php echo $_SESION['user_id']?>&cat_name=HTML&cat_id=1" class="start">Start Quiz</a>        

    </div>


    

    <div id="second" class="box effect7">

        <div class="heading1"><?php echo "$cat_names[1]"; ?></div>
        

        <p class="desc"><?php echo "$cat_desc[1]"; ?></p>

        <a href="../server_side/instructions.php?id=<?php echo $_SESION['user_id']?>&cat_name=PHP&cat_id=2" class="start">Start Quiz</a>


    </div>

      
</div>



<footer>
Copyright &copy; INFORMANIAC
</footer>



</body>
</html>
