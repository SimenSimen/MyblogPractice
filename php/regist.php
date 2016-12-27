<?php  
@session_start();
require_once "db.php" ;
if(isset($_POST['account']) && isset($_POST["nickname"]) && isset($_POST['pass_confirmation']))
	{
		$account = $_POST["account"];
		$password = $_POST['pass_confirmation'];
		$gentle  = $_POST["gentle"];
		$nickname = $_POST["nickname"];
		$intro = $_POST["intro"];

		$sql = "SELECT account FROM merbers WHERE account = '".$account."'";
		$query = mysqli_query($_SESSION['link'],$sql);
		echo mysqli_num_rows($query);
		if(mysqli_num_rows($query) < 1)
			{	
				$sql = "SELECT account FROM merbers WHERE nickname = '".$nickname."'";
				$query = mysqli_query($_SESSION['link'],$sql);
				echo mysqli_num_rows($query);
				if (mysqli_num_rows($query) < 1)
					{
						$sql = "INSERT INTO merbers(account,password,gentle,nickname,intro) VALUES ('".$account."','".md5($password)."','".$gentle."','".$nickname."','".$intro."')";
						$query = mysqli_query($_SESSION['link'], $sql );
						mysqli_close($_SESSION['link']);
						header("Location: http://localhost/myblog?regist=true");
					}
				else
					{
						mysqli_close($_SESSION['link']);
						header("Location: http://localhost/myblog?regist=false");	
					}
			}
		else
			{
				mysqli_close($_SESSION['link']);
				header("Location: http://localhost/myblog?regist=false");
			}

	}
else
	{
		echo "請正確瀏覽本網站";
	}
?>