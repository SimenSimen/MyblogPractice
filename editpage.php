<?php 
@session_start();
require_once('php/userlog.php');
$id = $_GET['post_id'];
?>
<?php if(!isset($_GET['post_id']) || $login == false)
{
	header("Location: ../myblog");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Blog</title>
	<link rel="icon" href="img/icon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="js/jscript.js"></script>
</head>
<body>
	<?php require_once 'php/top_nav.php';?>
	<div id="postpage" class="container-fluid">	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-md-offset-3">
			<h2><p class="text-center">My Blog ★ 修改此篇文章</p></h2><br><br>
			<form class="form-horizontal" action="php/post.php" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-3" for="article_title">請輸入標題:</label>
					<div class="col-sm-6">
						<input class="form-control" id="article_title" placeholder="請輸入標題" data-validation="length" data-validation-length="min2-25" data-validation-error-msg="標題限制在2-25字內" name="article_title">
					</div>
				</div>
				<div class="form-group"> 
					<label for="the-textarea"><h3>文章內容</h3></label><br/>
					<p class="text-danger">還剩下 <span id="max-length-element">5000</span> 個字</p>
					<textarea class="form-control" name="content" id="the-textarea" rows="25" placeholder="請輸入點甚麼......"></textarea>
					<input id="idbtn" type="radio" name="article_id" value="<?php echo $id; ?>" checked>
				</div>
				<div class="form-group">
					<button type="sumbit" class="btn btn-primary btn-block" name="public" value="1">修改後發佈</button>
					<button type="sumbit" class="btn btn-primary btn-block" name="public" value="0">儲存後不發佈</button>
				</div>
			</form>
		</div>	
	</div>
</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3 col-xs-offset-5">
				<div id="copyright">&copy;CopyRight <?php echo date('Y'); ?></div>
			</div>
		</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="js/jsform.js"></script>
</body>
</html>