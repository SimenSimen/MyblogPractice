<?php 
@session_start();
require_once 'db.php';
require_once 'articles.php';

if(isset($_SESSION['Login']) && $_SESSION['Login'] == true){
	delete_article($_POST['id']);
	header("Location: ../bk/backend.php");
}

 ?>