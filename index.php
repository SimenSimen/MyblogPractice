<?php 
@session_start();
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
<?php require_once'php/articles.php'; 
$datas = get_publish_articles();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<title>My web</title>
	<link rel="icon" href="img/icon.ico">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="  crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="js/jscript.js"></script>

	<?php if(isset($_GET['fail']) || isset($_GET['post']) || isset($_GET['regist']))
	{	
		@$lg = $_GET['fail'];
		@$post = $_GET['post'];
		@$regist = $_GET['regist'];
		if($lg)
			{
				echo '<script>alert("請輸入正確的帳號密碼。");</script>';
			}
		switch ($post) {
			case 'true':
				echo '<script>alert("發佈成功!");</script>';
				break;
			
			case 'false':
				echo '<script>alert("發佈失敗!");</script>';
				break;
		}
		switch ($regist) {
			case 'true':
				echo '<script>alert("註冊成功!");</script>';
				break;
			
			case 'false':
				echo '<script>alert("註冊失敗，帳號或暱稱重複!");</script>';
				break;
		}
	}
?>
</head>
<body>
	<nav class="container-fluid">
		<div class="row">
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="nav">
					<div class="col-xs-6 col-md-2 ">
						<h2><p class="text-center">My Blog</p></h2>
					</div>
					<div class="visible-lg visible-md col-md-4">
						<ul class="nav nav-pills" style="margin: 20px;">
							<li role="presentation" class="active"><a href="#">文章發佈</a></li>
	 					 	<li role="presentation"><a href="#">我的作品</a></li>
	 					 	<li role="presentation"><a href="#">我的履歷</a></li>
	 					 	<li role="presentation"><a href="#">關於My Blog</a></li>
	 					 	<li role="presentation"><a href="recommand.php">給作者的話</a></li>
						</ul>
					</div>
					<?php if($login) :?>
					<div class="col-xs-6 col-md-4">
						<p style="padding-top:10px;"><h3>歡迎回來 ,<?php echo $nickname ;?>!☆★☆★☆★☆★☆★☆★</h3></p>
					</div>
					<div class="col-xs-2 col-md-2">
						<div style="margin-top: 20px">
							<form action="php/login.php" method="POST">
								<input type="submit" class="btn btn-default" name="logout" value="登出">
							</form>
						</div>		
					</div>
					<?php elseif(!$login): ?>
					<div class="visible-lg visible-md col-md-6">
					 	<div style="margin-top: 15px;">
							<form class="form-inline" action="php/login.php" method="POST" >
  								<div class="form-group">
    								<label class="sr-only" for="exampleInputEmail3">Account</label>
    									<input type="text" class="form-control" id="exampleInputEmail3" placeholder="Account" name="account" data-validation="letternumeric" data-validation-error-msg=" " >
  								</div>
  							 	<div class="form-group">
    								<label class="sr-only" for="exampleInputPassword3">Password</label>
    									<input type="password" class="form-control " id="exampleInputPassword3" placeholder="Password" name="password" data-validation="letternumeric" data-validation-error-msg=" ">
  								</div>
  								<button style="margin-left: 150px;" type="submit" class="btn btn-default">登入</button>
							</form>
						</div>
						<div id="registbtn" class="label label-info" style="cursor:pointer;">註冊新帳號</div>
						<div class='jumbotron' id='registpage' >
							<div class="row">
								<form class="form-horizontal" role="form" action="php/regist.php" method="POST">
									<div class="form-group">
										<div class ="col-xs-12">
											<label for="inputHelpBlock">你的暱稱</label>			
												<input type="text" class="form-control" id ="inputHelpBlock" aria-describedby="helpBlock" placeholder="2-8個字元" name="nickname" data-validation="letternumeric" data-validation-error-msg="請勿輸入特殊字元">
										</div>
									</div>
									<div class ="form-group">
										<div class ="col-xs-12">
											<label for="inputHelpBlock">請輸入要申請的帳號：</label>			
												<input type="text" class="form-control" id ="inputHelpBlock" aria-describedby="helpBlock" placeholder="8-20個英文字加數字" name="account" data-validation="length alphanumeric" data-validation-length="8-20" data-validation-error-msg="User name has to be an alphanumeric value (8-20 chars)">
										</div>
									</div>
									<div class="form-group">
										<div class ="col-xs-12">
											<label for="inputHelpBlock">請輸入密碼：</label>			
												<input type="password" class="form-control" id ="inputHelpBlock" aria-describedby="helpBlock" placeholder="6個以上英文字加數字" name="pass_confirmation" data-validation="strength" data-validation-strength="2" data-validation-length="min6">
										</div>
									</div>
									<div class="form-group">
										<div class ="col-xs-12">
											<label for="inputHelpBlock">請再次輸入密碼：</label>
												<input type="password" class="form-control" id ="inputHelpBlock" aria-describedby="helpBlock" placeholder="請再次輸入..." name = "pass" data-validation="confirmation">
										</div>
									</div>
									<div class="form-group" id="radioform">
										<div class="radio">
											<label class="raido-inline">
												<input type= "radio" name= "gentle" value="1" checked>男生
											</label>			
											<label class="raido-inline">
												<input type= "radio" name= "gentle" value="0">女生
											</label>
										</div>		
									</div>
									<textarea  id="textarea" class="form-group" name="intro" rows="3" placeholder="請簡短的自我介紹…"></textarea>
									<div><input type="submit" value="送出" class="btn btn-info"></div>	
								</form>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</nav>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>		
	
	<div class="container-fluid">
		<div class="mid">
			<div class="row">
				<div class="col-md-3">
					<?php if($login): ?>
						<div class= "userpage" >
   							<div class="thumbnail" style="margin-left: 37px; margin-top: 15px; border-radius: 50px; width: 200px ;height: 200px;">
      							<img class="img-circle" src="img/userphoto.jpg" alt="...">
   								<br />
   								<br />					
   							</div>
   							<div style="margin-left: 37px; margin-top: 15px;">
   								<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span>暱稱：<span class="label label-default"><?php echo $nickname; ?></span></p>
   								<p>性別：<span><?php echo $gentle; ?></span></p>
   								<p>自我介紹：</p>
   								<div style="overflow:hidden;text-overflow:ellipsis; width:auto;">
									<p><?php echo $intro;?></p>
   								</div>
   								<button id="postbtn" class="btn btn-default btn-sm" style="margin:15px 0px 15px 65px;">發表文章</button>
   								<p><span class="glyphicon glyphicon-time" aria-hidden="true"></span><span class="label label-warning">註冊時間：<?php echo $signupdate;?></span></p>  		
   							</div>
						</div>
					<?php elseif(!$login): ?>
						<div class ="guestpage">
							<img src="img/mrnobody.png" alt="mr.nobody">
							<br/>
							<span class="glyphicon glyphicon-search" aria-hidden="true" style="padding-left: 30px;"></span>
							<span class="label label-danger">登入以發佈文章及顯示個人資訊</span>
							<br>
							<br>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-xs-8 col-md-6">
				<?php if($login): ?>
					<div class="jumbotron" id="postpage" style="display: none;padding: 50px;">
						<div class="row">
							<div id="closebtn">
								<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
							</div>
							<div>		
								<p style="text-align: center; margin: 25px 0;"><span>文章發佈</span></p>
								<form class="form-horizontal" role="form" action="php/post.php" method="POST">
									<h3><span>文章標題：</span></h3>
									<div style="margin: 50px 0 ;">
										<input type="text" class="form-control input-sm" name="article_title" data-validation="length" data-validation-length="max25" data-validation-error-msg="請將標題控制在25字以內">
									</div>
									<h3><span>文章內容：</span></h3>
									<div style=>
						   				<p class="text-danger">還剩(<span id="maxlength">1000</span> 個字元)</p>
										<textarea class="form-control" rows="17" id="area" style="resize: none;" name="content"></textarea>
									</div>
									<hr>
									<div>
										<button class="btn btn-default" type="submit" name = "public" value="1">發佈</button>
										<button class="btn btn-default" type="submit" name = "public" value="0">儲存</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
				<?php endif; ?>
				<?php if(!empty($datas)): ?>
					<?php foreach ($datas as $articles):?>
					<div class="panel panel-info" style="margin-bottom: 0px;">
  						<div class="panel-heading">
  							<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
  							<span><?php echo $articles['article_title']; ?></span>
  							<div class="paneltitle pull-right">
  								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    							<span class="label label-default">文章作者："<?php echo get_user_id($articles['user_id']);?>"</span>
    							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
    							<span class="label label-warning">發佈時間：<?php echo $articles['create_date'] ;?></span>
    						</div>
  						</div>
  						<div class="panel-body">
    						<?php echo $articles['content']; ?>
  						</div>  						
  					</div>
  					<?php if($login && $user_id == $articles['user_id']): ?>
					<span class="label label-danger" style="cursor: pointer;">修改</span>
					<?php endif; ?>
  					<br/><br/>
   					<?php endforeach; ?>
  				<?php endif; ?>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="footer">
			<div class="row">
				<div class="col-md-3">				
				</div>
				<div class="col-xs-8 col-md-6" >
			
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
	
				
					
					
					
				
	<script src="js/jsform.js"></script>
</body>
</html>