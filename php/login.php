<?php 
@session_start();
require_once'db.php';
if(isset($_POST['account']) && isset($_POST['password']))
	{
	$account = $_POST['account'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM merbers WHERE account = '".$account."'AND password = '".md5($password)."'" ;
	$result = mysqli_query($_SESSION['link'],$sql);
	if(mysqli_num_rows($result) == 1)
		{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['Login'] = true ;
		$_SESSION['nickname'] = $row['nickname'];
		$_SESSION['gentle'] = $row['gentle'];
		$_SESSION['intro']  = $row['intro'];
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['signupdate'] = $row['signupdate'];
		mysqli_free_result($result);	
		mysqli_close($_SESSION['link']);	
		header("Location: ../");
	 	}
	else
		{
		mysqli_close($_SESSION['link']);

		header("Location: ../?fail=true");
		}
	}
else
	{
	mysqli_close($_SESSION['link']);
	session_unset();
	session_destroy();
	header("Location: ../");
	}
 ?>
