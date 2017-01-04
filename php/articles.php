<?php 
@session_start();

function get_publish_articles()
{	
	require'db.php';
	$datas = array();
	$sql = "SELECT * FROM articles WHERE public = 1 ORDER BY 7 DESC";
	$query = mysqli_query($_SESSION['link'],$sql);
	if ($query)
	{
		if(mysqli_num_rows($query) > 0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$datas[] = $row ; 
			}
		}
		mysqli_close($_SESSION['link']);
	}
	else
	{
		echo mysqli_error($_SESSION['link']);
	}
	return $datas;
}
?>
<?php
function get_user_id($author)
{	
	require'db.php';
	$nickname = array();
	$sql	= "SELECT nickname FROM merbers WHERE id IN(SELECT user_id FROM articles WHERE user_id =".$author.")";	
	$query = mysqli_query($_SESSION['link'],$sql);
	if($query)
		{
			$nickname[] = mysqli_fetch_assoc($query);
			return $nickname[0]['nickname']; 
			mysqli_close($_SESSION['link']);
		}
	else{
		echo mysqli_error($_SESSION['link']);
	}
}

function get_article($id)
{
	require 'db.php';
	$article = array();
	$sql = "SELECT * FROM articles WHERE id ='".$id."'";
	$query = mysqli_query($_SESSION['link'],$sql);
	if ($query) {
		$article[] = mysqli_fetch_assoc($query);
		return $article[0];
		mysqli_close($_SESSION['link']); 
	}
	else{
		echo mysqli_error($_SESSION['link']);
	}
}
function get_sb_articles($sb_id){
	require 'db.php';
	$datas = array();
	$sql = "SELECT * FROM articles WHERE user_id = '{$sb_id}' ORDER BY 7 DESC";
	$query = mysqli_query($_SESSION['link'],$sql);
	if ($query)
	{
		if(mysqli_num_rows($query) >= 0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$datas[] = $row ; 
			}
		}
		mysqli_close($_SESSION['link']);
	}
	else
	{
		echo mysqli_error($_SESSION['link']);
		mysqli_close($_SESSION['link']);
	}
	return $datas;
}

function delete_article($id)
{
	require 'db.php';
	$sql = "DELETE FROM articles WHERE id = '{$id}'";
	$query = mysqli_query($_SESSION['link'],$sql);
	if ($query) {
		mysqli_close($_SESSION['link']);
	}
	else
	{
		echo mysqli_error($_SESSION['link']);
		mysqli_close($_SESSION['link']);
	}
}
?>

