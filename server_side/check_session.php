<?php

 session_start();
 
  $user_id = " ";
 
 if(isset($_SESSION['user_id']))
 {
 	$user_id = $_SESSION['user_id'];
 }
 else 
 {
 	//echo "Session not created yet..";
 	echo "<script>window.location.href='../index.php'</script>";   
 }

?>