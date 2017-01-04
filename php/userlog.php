<?php 
 if(isset($_SESSION['Login']))
 {
	$login = $_SESSION['Login'];
	$nickname = $_SESSION['nickname'];
	$gentle = $_SESSION['gentle'];
	$intro = $_SESSION['intro'];
	$user_id = $_SESSION['user_id'];
	$signupdate = $_SESSION['signupdate'];
	switch ($gentle) {
		case 1:
			$gentle = "男";
			break;
		
		default:
			$gentle = "女";
			break;
	}
 }
 else
{
	$login = false;
}
 ?>