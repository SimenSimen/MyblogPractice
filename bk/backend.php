<?php 
@session_start();
require_once('../php/userlog.php');
$page = 1;
switch ($_GET['page']) {
	case 1:
		$page = 1;
		break;
	
	case 2:
		$page = 2;
		break;
}
?>
<?php 
require_once '../php/articles.php';
$data = get_sb_articles($user_id);

 ?>
<?php if($login): ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Blog後台</title>
	<link rel="icon" href="../img/icon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="../js/jscript.js"></script>
</head>
<body>
<?php include_once 'top_nav.php';?>
	<div id="menberpage" class="container">
		<div class="row">
			<div  class="col-xs-12">
			<?php if($page==1): ?>
				<div class="thumbnail">
					<a href="../img/continue.png">
						<img src="../img/continue.png" alt="menberpic">
					<div class="caption">
					</div>
					</a>
				</div>
				<table class="table">
					<tbody>
						<tr class="success">
							<th>會員暱稱：</th>
							<td><?php echo $nickname; ?></td>
						</tr>
						<tr>
							<th>性別：</th>
							<td><?php echo $gentle; ?></td>
						</tr>
						<tr>
							<th>自我介紹：</th>
							<td><?php echo $intro; ?></td>
						</tr>
						<tr>
							<th>註冊時間：</th>
							<td><?php echo $signupdate; ?></td>
						</tr>
					</tbody>
				</table>
			<?php elseif ($page==2): ?>	
				 <table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>文章標題</th>
							<th>文章內容</th>
							<th>文章狀態</th>
							<th>發佈時間</th>
							<th>修改時間</th>
							<th>文章管理</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($data as $article) :?>
						<tr>
							<td><?php echo mb_substr($article['article_title'],"0","10","UTF-8")."...."; ?></td>
							<td><?php echo mb_substr($article['content'],"0","25","UTF-8")."...."; ?></td>
							<td><?php echo $article['public']; ?></td>
							<td><?php echo $article['create_date']; ?></td>
							<td><?php echo $article['edit_date']; ?></td>
							<td>		
								<form action="../php/delete_article.php" method="POST">
								<a type="button" class="btn btn-success" href="../editpage.php?post_id=<?php echo $article['id']; ?>" >修改</a>
								<button type="submit" class="btn btn-danger" name="id" value="<?php echo $article['id']; ?>">刪除</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif ;?>
</body>
</html>
<?php elseif (!$login): ?>

<?php endif ;?>
