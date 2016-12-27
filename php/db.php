<?php 
@session_start();

$_SESSION['link'] = mysqli_connect('localhost','root','ad25395160','myblog');

if($_SESSION['link'])
{
	mysqli_query($_SESSION['link'],"SET NAMES utf8");
}
else
{
	echo "無法連接mysql資料庫 : " . mysqli_connect_error();
}

 ?>