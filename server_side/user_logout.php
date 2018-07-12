<?php
	session_start();

	if(isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = " ";
		session_destroy();
		echo "<script>window.location.href='../index.php'</script>";
		die();
	}
	else
	{
		echo "<script>window.location.href='../index.php'</script>";
	}
?>