<?php 
@session_start();
if (!isset($_POST['article_id']))
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
				header("Location: ../?post=true");		
			}
		else
			{
				mysqli_close($_SESSION['link']);
				header("Location: ../?post=false");
			}
	}
elseif(isset($_POST['article_id']))
	{
		require 'db.php';
		$id = $_POST['article_id'];
		$public = $_POST['public'];
		$title =  $_POST['article_title'];
		$content = $_POST['content'];
		$user_id = $_SESSION['user_id'];
		$sql = "UPDATE articles SET public = '{$public}' ,article_title= '{$title}' ,content = '{$content}' WHERE id ='{$id}'" ;
		$query = mysqli_query($_SESSION['link'],$sql);
		if ($query) 
			{
				mysqli_close($_SESSION['link']);
				header("Location: ../?post=true");		
			}
		else
			{
				mysqli_close($_SESSION['link']);
				header("Location: ../?post=false");
			}	
	}


 ?>