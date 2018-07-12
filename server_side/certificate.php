<?php 

	//require 'check_session.php';
	session_start();

	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else
	{
		echo "<script>window.location.href='../index.php'</script>";
	}
?>

<?php include 'database.php'; ?>
<?php
/*
 *  Get Total Questions
 */
 $query ="SELECT * FROM questions_bank";
 //Get results
 $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;
?>

<?php
$dsn="mysql:host=localhost;dbname=db_quiz";

$username = 'savan';

$passwor = 'savanpatel';


$db = new PDO($dsn,$username,$passwor);

$query = "SELECT cat_name  FROM category";

$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

foreach ($result as $data ) 
{

  $title[] = $data['cat_name'];
}
$query = "SELECT first_name,last_name FROM user_details WHERE user_id=$_SESSION[user_id]";
$statement = $db->prepare($query);
$statement->execute();
$user_data = $statement->fetch();

$user_fullName = $user_data['first_name']." ".$user_data['last_name'];

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
    height:570px;
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
    /*margin-left: 25px;
    margin-bottom: 25px;*/
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

#bdy
{
  /*margin-top: 100px;*/
}

#mar
{
  margin-top:20px;
  margin-left: 50px;
}


@media print {



header
{
display: none;
}

footer
{
  display: none;
}

nav
{
display: none;
}
}



</style>
</head>
<body id="bdy">

<header >
<h1>Congratulations</h1>
</header>

<nav >
<a href="../user_update.php?id=<?php echo $_SESSION['user_id'];?>">My account</a><br>
<a href="../server_side/user_score.php?id=<?php echo $_SESSION['user_id'];?>&task=select">Score</a><br>
<a href="../server_side/user_logout.php?id=<?php echo $_SESSION['user_id'];?>">Logout</a>
</nav>

<?php

if( (int)$_SESSION['score'] >= 8 && (int)$_SESSION['score'] <= 10)
	{
		echo "<script>alert('You have successfully passed the test.')</script>";
	}
	else if( (int)$_SESSION['score'] >= 0 && (int)$_SESSION['score'] <= 7 )
	{
		echo "<script>alert('Unfortunately you did not pass the test.Please try again later!')</script>";
	}


?>

<div id="main">

    <!-- <div  class="box effect7"> -->
      <div id="mar">
<div style="width:750px; height:550px; padding:10px; text-align:center; border: 1px solid #787878 " class="box effect7">
       <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b><?php echo $user_fullName?></b></span><br/><br/>
       <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
       <span style="font-size:30px"><?php echo "$title[0]"; ?></span> <br/><br/>
       <span style="font-size:20px">with score of <b><?php echo $_SESSION['score']; ?>&nbsp<b>of</b>&nbsp <?php echo 10; ?></b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>dated</i></span><br>
       <?php echo  date("Y/m/d") ?>

     <!--  <span style="font-size:30px">$dt</span> -->

</div>
<!-- </div> -->
</div>

      
</div>



<footer>
Copyright &copy; INFORMANIAC
</footer>



</body>
</html>
<?php session_destroy(); ?>
