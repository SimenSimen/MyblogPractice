<?php 
@session_start();
if (isset($_SESSION['Login']) && $_SESSION['Login'] == ture)
	{	
		require 'db.php';
		$public = $_POST['public'];
		$title =  $_POST['article_title'];
		$content = $_POST['content'];
		$user_id = $_SESSION['user_id'];
		$sql = "INSERT INTO articles(user_id,public,article_title,content) VALUES('".$user_id."','".$public."','".$title."','".$content."')";
		$query = mysqli_query($_SESSION['link'],$sql);
		if ($query) 
			{
				mysqli_close($_SESSION['link']);
				header("Location: http://localhost/myblog?post=true");		
			}
		else
			{
				mysqli_close($_SESSION['link']);
				header("Location: http://localhost/myblog?post=false");
			}
	}
else
	{
		mysqli_close($_SESSION['link']);
		header("Location: http://localhost/myblog");
	}


 ?>